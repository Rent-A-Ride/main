<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CancelBookings;
use app\models\Customer;
use app\models\customer_payment;
use app\models\driver;
use app\models\driver_requests;
use app\models\Notification;
use app\models\system_complaints;
use app\models\veh_Reviews;
use app\models\VehBooking;
use app\models\cusVehicle;
use app\models\vehicle;
use app\models\vehicle_Owner;
use app\models\vehiclecomplaint;
use app\models\vehicleowner;
use app\models\VehInfo;
use app\models\vehOwner_complaints;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->customerMiddleware(new AuthMiddleware(['profile']));
        $this->customerMiddleware(new AuthMiddleware(['VehicleBooking']));
        $this->customerMiddleware(new AuthMiddleware(['vehicleInfo']));
        $this->customerMiddleware(new AuthMiddleware(['vehicleBookingTable']));
    }

    public function home(Request $request, Response $response): string
    {
        $vehicle = cusVehicle::retrieveAll(['availability' => 1]);
////        select all vehicle which are not in veh booking table
//        $vehicle = array_filter($vehicle, function ($veh) {
//            return !VehBooking::findWhere(['veh_Id' => $veh->getVehId(), 'status' => 1]);
//        });


//        // get the vehicle ratings by vehicle id
        $ratingsById = [];
        $count = 0.0;
//
        foreach ($vehicle as $veh) {
            $ratingsById[$veh->getVehId()] = veh_Reviews::findOne(['veh_Id' => $veh->getVehId()]);
        }

        foreach ($ratingsById as $rating) {
            if (!empty($rating)) {
                $count += $rating->getRating();
            }
        }

        $params = [
            'model' => $vehicle,
            'ratings' => $ratingsById,
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_customerHome', $params);
    }

    public function profile(Request $request, Response $response)
    {

        $id=Application::$app->user->cus_Id;
        $customer=Customer::findOne(['cus_Id'=>$id]);

        if ($request->isPost()){
            $customer->loadData($request->getBody());
            if ($customer->validateWith(['firstname','lastname','address']) && $customer->update($id,['firstname','lastname', 'phoneno', 'address'])){
                Application::$app->session->setFlash('profileUpdate', 'Profile Updated Successfully!');
                Notification::sendNotification($id, 'Profile Updated', 'Your profile has been updated successfully!', '/Customer/Profile');
                $response->redirect('/Customer/Profile');
                return;
            }
            Application::$app->session->setFlash('profileUpdateErr', 'There was some error in updating your profile!');
            $this->setLayout('customer-dashboard');
            return $this->render('Customer/v_customerProfile',[
                'model'=>$customer,
            ]);

        }

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_customerProfile',[
            'model'=>$customer,
            'FirstName'=>$customer->firstname,
        ]);
    }

    public function VehicleBooking(Request $request, Response $response)
    {

        $vehBooking = new VehBooking();
        if ($request->isPost()){
            $vehBooking->loadData($request->getBody());
            if ($vehBooking->saveAs(['booking_Id','status'])){
                Application::$app->session->setFlash('Success', 'Booking Request send successfully!');
                $response->redirect('/Customer/VehicleBookingTable');
                return;
            }
            Application::$app->session->setFlash('bookingErr', 'There was some error in booking your vehicle!');
            $this->setLayout('customer-dashboard');
            return $this->render('Customer/v_viewBookings',[
                'model'=>$vehBooking,
            ]);
        }

        $params = [
            'model' => $vehBooking
        ];
        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_viewBookings', $params);
    }

    public function vehicleInfo(Request $request, Response $response)
    {
        $vehBooking = new VehBooking();
        $cus_Id = Application::$app->user->cus_Id;

        if ($request->isPost()){
            $vehBooking->loadData($request->getBody());
            $vehBooking->setCusId($cus_Id);
            $vehBooking->setVoId($request->getBody()['veh_Id']);
//            $ve);hBooking->setCusId(Application::$app->user::primaryKey());
//            $vehBooking->setVoId($vehicle->getVoId()

            if ($vehBooking->saveAs(['booking_Id','status'])){
                Application::$app->session->setFlash('success', 'Booking Request send successfully!');
                $response->redirect('/Customer/VehicleBookingTable');
            }else{
                Application::$app->session->setFlash('error', 'There was some error in booking your vehicle!');
                $response->redirect('/Customer/Home');
            }
            return;


        }

        $id=$request->getBody()['id'] ?? '';
        $vehInfo = VehInfo::findOne(['veh_Id' => $id]);
        $vehicle = vehicle::findOne(['veh_Id' => $id]);
        $vehOwner = vehicleowner::findOne(['vo_Id' => $vehicle->getVoId()]);




        if($request->isGet()){
            $vehInfo = VehInfo::findOne(['veh_Id' => $id]);
            $vehicle = cusVehicle::findOne(['veh_Id' => $id]);
            $vehBooking = new VehBooking();

            $type=$request->getBody()['type'] ?? '';
            if ($type==='submit'){
                $veh_Id=$request->getBody()['id'];
                $location=$request->getBody()['location'];
                $start_date=$request->getBody()['startDate'];
                $end_date=$request->getBody()['endDate'];
//                $vehBooking = new VehBooking();

                $params = [
                    'vehInfo' => $vehInfo,
                    'vehicle' => $vehicle,
                    'vehBooking' => $vehBooking,
                    'veh_Id'=>$veh_Id,
                    'location'=>$location,
                    'start_date'=>$start_date,
                    'end_date'=>$end_date,
                    'model' => $vehBooking
                ];
                $this->setLayout('customer-dashboard');
                return $this->render('Customer/v_customerBooking', $params);
            }else{
                $params = [
                    'vehInfo' => $vehInfo,
                    'vehicle' => $vehicle,
                    'vehBooking' => $vehBooking,
                    'vehOwner' => $vehOwner,
                ];
                $this->setLayout('customer-dashboard');
                return $this->render('Customer/v_vehicleInfo', $params);
            }
        }
    }

    public function vehicleBookingTable(Request $request, Response $response)
    {
        $id=Application::$app->user->cus_Id;
        $vehBooking = VehBooking::retrieveAll(['cus_Id' => $id]);
        $vehicle = cusVehicle::retrieveAll();

        $vehicleById = [];
        $driverById = [];
        $driverReq = [];

        foreach ($vehBooking as $vehBook) {
            $vehicleById[$vehBook->getVehId()] = cusVehicle::findOne(['veh_Id' => $vehBook->getVehId()]);
            if ($vehBook->getDriverReq() == 1 && $vehBook->getStatus() == 1) {
                $driverReq[$vehBook->getBookingId()] = driver_requests::findOne(['reservation_id' => $vehBook->getBookingId()]);
                $driverById[$driverReq[$vehBook->getBookingId()]->getDriverID()] = driver::findOne(['driver_ID' => $driverReq[$vehBook->getBookingId()]->getDriverID()]);
            }
        }

        $params = [
            'vehBooking' => $vehBooking,
            'vehicleById' => $vehicleById,
            'driverById' => $driverById,
            'driverReq' => $driverReq,
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_viewBookings', $params);
    }

    public function activeBookings(Request $request, Response $response)
    {
        $id=Application::$app->user->cus_Id;
        $vehBooking = VehBooking::retrieveAll(['cus_Id' => $id, 'status' => 2]);

        $vehicleById = [];
        $driverById = [];
        $driverReq = [];
        $cusPayment = [];

        foreach ($vehBooking as $vehBook) {
            $vehicleById[$vehBook->getVehId()] = cusVehicle::findOne(['veh_Id' => $vehBook->getVehId()]);
            $cusPayment[$vehBook->getBookingId()] = customer_payment::findOne(['booking_Id' => $vehBook->getBookingId()]);
            if ($vehBook->getDriverReq() == 1 && $vehBook->getStatus() == 2) {
                $driverReq[$vehBook->getBookingId()] = driver_requests::findOne(['reservation_id' => $vehBook->getBookingId()]);
                $driverById[$driverReq[$vehBook->getBookingId()]->getDriverID()] = driver::findOne(['driver_ID' => $driverReq[$vehBook->getBookingId()]->getDriverID()]);
            }
        }


        $params = [
            'vehBooking' => $vehBooking,
            'vehicleById' => $vehicleById,
            'driverById' => $driverById,
            'driverReq' => $driverReq,
            'cusPayment' => $cusPayment,
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_activeBookings', $params);
    }

    public function completedBookings(Request $request, Response $response)
    {
        $id = Application::$app->user->cus_Id;
        $vehBooking = VehBooking::retrieveAll(['cus_Id' => $id, 'status' => 3]);

        $vehicleById = [];
        $driverById = [];
        $driverReq = [];
        $cusPayment = [];

        foreach ($vehBooking as $vehBook) {
            $vehicleById[$vehBook->getVehId()] = cusVehicle::findOne(['veh_Id' => $vehBook->getVehId()]);
            $cusPayment[$vehBook->getBookingId()] = customer_payment::findOne(['booking_Id' => $vehBook->getBookingId()]);
            if ($vehBook->getDriverReq() == 1 && $vehBook->getStatus() == 3) {
                $driverReq[$vehBook->getBookingId()] = driver_requests::findOne(['reservation_id' => $vehBook->getBookingId()]);
                $driverById[$driverReq[$vehBook->getBookingId()]->getDriverID()] = driver::findOne(['driver_ID' => $driverReq[$vehBook->getBookingId()]->getDriverID()]);
            }
        }

        $params = [
            'vehBooking' => $vehBooking,
            'vehicleById' => $vehicleById,
            'driverById' => $driverById,
            'driverReq' => $driverReq,
            'cusPayment' => $cusPayment,
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_completedBookings', $params);
    }

    public function customerSettings(Request $request, Response $response)
    {
        $id=Application::$app->user->cus_Id;
        $customer = new Customer();
        $customer=Customer::findOne(['cus_Id'=>$id]);
        $this->thisIsCustomer($response);

        //Change the password
        if ($request->isPost()){
            $customer=Customer::findOne(['cus_Id'=>$id]);

            $customer->loadData($request->getBody());
            $mode=$request->getBody()['mode'] ?? '';



            if ($mode==='change-password'){

                $currentPassword=$request->getBody()['current-password'];
                $newPassword=$request->getBody()['new-password'];
                $confirmPassword=$request->getBody()['confirm-password'];

                //check if old password is match, if nor add error
                if (!password_verify( $currentPassword,$customer->getPassword())){
                    $customer->addError('change-password','Current password is incorrect!');
                    $this->setLayout('customer-dashboard');
                    return $this->render('Customer/v_customerSettings',[
                        'customer'=>$customer,
                    ]);
                }
                //check if new password and confirm password are match, if not add error
                if ($newPassword!==$confirmPassword){
                    $customer->addError('change-password','Passwords are not match!');
                    $this->setLayout('customer-dashboard');
                    return $this->render('Customer/v_customerSettings',[
                        'customer'=>$customer,
                    ]);
                }

                //check if new password is same as old password, if so add error
                if (password_verify($newPassword,$customer->getPassword())){
                    $customer->addError('change-password','New password is same as old password!');
                    $this->setLayout('customer-dashboard');
                    return $this->render('Customer/v_customerSettings',[
                        'customer'=>$customer,
                    ]);
                }

                $customer->setPassword($newPassword);

                //check if new password is validate
                if (!$customer->validateWith(['password'])){
                    $this->setLayout('customer-dashboard');
                    return $this->render('Customer/v_customerSettings',[
                        'customer'=>$customer,
                    ]);
                }

                //if all the above conditions are passed, update the password




                if ($customer->validateWith(['password']) && $customer->update($id,['password'])){
                    Application::$app->session->setFlash('success', 'Password Updated Successfully!');
                    $response->redirect('/Customer/Settings');
                    return;
                }


                Application::$app->session->setFlash('error', 'There was some error in updating your password!');
                $this->setLayout('customer-dashboard');
                return $this->render('Customer/v_customerSettings',[
                    'customer'=>$customer,
                ]);
            }
        }


        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_customerSettings',[
            'customer'=>$customer,
        ]);
    }

    public function cancelBooking(Request $request, Response $response)
    {
        $cus_Id = $this->thisIsCustomer($response);

        $bookingId = $request->getBody()['bookingId'];
        $vehBooking = VehBooking::findOne(['booking_Id' => $bookingId]);

        $cancellation = new CancelBookings();
        $cancellation->setBookingId($bookingId);
        $cancellation->setCusId($cus_Id);
        $cancellation->setReason($request->getBody()['reason']);
        $cancellation->setComment($request->getBody()['comment']);

        if ($cancellation->save()) {
            $vehBooking->deleteOne($bookingId);
            Application::$app->session->setFlash('success', 'Booking cancellation completed!');
            Application::$app->response->redirect('/Customer/VehicleBookingTable');

            return json_encode([
                'success' => true,
                'message' => 'Booking cancellation completed!'
            ]);
        }
        return $response->redirect('/Customer/VehicleBookingTable');
    }

    public function customerPayment(Request $request, Response $response)
    {
        // get the booking id from the request body
        if ($request->isGet()){
            $bookingId = $request->getBody()['booking'];
            $vehBooking = VehBooking::findOne(['booking_Id' => $bookingId]);

            if ($vehBooking->getStatus() != 1 ){
                Application::$app->session->setFlash('error', 'You cannot pay for this booking!');
                Application::$app->response->redirect('/Customer/VehicleBookingTable');
            }

            $total = $vehBooking->getRentalPrice();

            $params = [
                'bookingId' => $bookingId,
                'total' => $total
            ];


            $this->setLayout('customer-dashboard');
            return $this->render('Customer/v_customerPay', $params);
        }

        if ($request->isPost()){

            $Stripe = new StripeClient($_ENV['STRIPE_SECRET_KEY']);
            $bookingId = $request->getBody()['bookingId'];
            $totalPay = $request->getBody()['total_pay'];
            $payment_type = $request->getBody()['payment-type'];
            $totalRent = $request->getBody()['total-rent'];

            if ($payment_type == 'full'){
                $name = 'Full Payment for #'.$bookingId.' Booking';
            }
            if ($payment_type == 'advance'){
                $name = 'Advance Payment for #'.$bookingId.' Booking';
            }

            $item[] = [
                'price_data' => [
                    'currency' => 'lkr',
                    'unit_amount' => $totalPay * 100,
                    'product_data' => [
                        'name' => $name,
                    ],
                ],
                'quantity' => 1,
            ];
            Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $item,
                'mode' => 'payment',
                'success_url' => 'http://localhost:8080/Customer/PaymentSuccess?bookingId='.$request->getBody()['bookingId'].'&payment_amount='.$totalPay.'&session_id={CHECKOUT_SESSION_ID}'. '&payment_type='.$payment_type.'&total_rent='.$totalRent,
                'cancel_url' => 'http://localhost:8080/Customer/PaymentCancel',
            ]);

            $response->redirect($checkout_session->url);

        }
    }

    public function paymentSuccess(Request $request, Response $response)
    {


        $bookingId = $request->getBody()['bookingId'];
        $payment_amount = $request->getBody()['payment_amount'];
        $payment_type = $request->getBody()['payment_type'];
        $totalRent = $request->getBody()['total_rent'];

        $customerPayment = new Customer_payment();
        $customerPayment->setBookingId($bookingId);
        $customerPayment->setPaymentAmount($payment_amount);
        $customerPayment->setTotalRent($totalRent);
        $vehBooking = VehBooking::findOne(['booking_Id' => $bookingId]);


        if ($payment_type == 'full'){
            $customerPayment->setStatusPay($customerPayment::FULL_PAYMENT);
            $vehBooking->setPayStatus(2);
        }elseif ($payment_type == 'advance'){
            $customerPayment->setStatusPay($customerPayment::ADVANCE_PAYMENT);
            $vehBooking->setPayStatus(1);
        }


        $params = [
            'payment_amount' => $payment_amount,
        ];

        if ($customerPayment->save()) {

            $vehBooking->setStatus(2);
            if ($vehBooking->update($bookingId, ['status', 'pay_status'])){
                if ($request->isPost()) {
                    Application::$app->session->setFlash('success', 'Payment Successful!');
                    $response->redirect('/Customer/VehicleBookingTable');
                    exit();
                }
                $this->setLayout('customer-dashboard');
                return $this->render('Customer/v_paymentSuccess', $params);
            }

        }

        Application::$app->session->setFlash('error', 'Payment Failed!');
        $response->redirect('/Customer/VehicleBookingTable');
        exit();
    }


    public function customerComplaint(Request $request, Response $response)
    {
        $cusId = Application::$app->user->cus_Id;

        $bookings = VehBooking::retrieveAll(['cus_Id' => $cusId]);

        $vehOwners = [];

        foreach ($bookings as $booking) {
            $vehOwners[$booking->getVoId()] = vehicle_Owner::findOne(['vo_Id' => $booking->getVoId()]);
        }

        $vehOwners = array_filter($vehOwners, function($value) {
            return !is_bool($value);
        });

        $vehicles = [];

        foreach ($bookings as $booking) {
            $vehicles[$booking->getVehId()] = vehicle::findOne(['veh_Id' => $booking->getVehId()]);
        }

        $vehicles = array_filter($vehicles, function($value) {
            return !is_bool($value);
        });


        if ($request->isPost()){
            if ($request->getBody()["complaint-about"] === 'vehicle-owner') {
                $complaint = new vehOwner_complaints();
                $complaint->setCid(uniqid(true));
                $this->cusComplaint($complaint, $cusId, $request);

                if ($complaint->save()) {
                    Application::$app->session->setFlash('success', 'Complaint sent successfully!');
                    $response->redirect('/Customer/Complaints');
                    return;
                }
            }
            if ($request->getBody()['complaint-about'] === 'vehicle'){
                $complaint = new vehiclecomplaint();
                $complaint->setComID('VC'.uniqid(true));
                $complaint->setCusId($cusId);
                $customer = Customer::findOne(['cus_Id' => $cusId]);
                $complaint->setCusName($customer->firstname.' '.$customer->lastname);
                $complaint->loadData($request->getBody());
                $vehicle = vehicle::findOne(['veh_Id' => $request->getBody()['veh_Id']]);
                $complaint->setVehicleNo($vehicle->getPlateNo());
                $complaint->setComplaint(trim($request->getBody()['complaint']));

//                echo '<pre>';
//                var_dump($complaint);
//                echo '</pre>';
//                exit();

                if (isset($_FILES['images'])) {
                    $uploadDir = Application::$ROOT_DIR . '/public/assets/img/uploads/customer-complaints/';

                        $fileName = uniqid().'-'.$_FILES['images']['name'][0];
                        $uploadFile = $uploadDir . $fileName;

                        if (move_uploaded_file($_FILES['images']['tmp_name'][0], $uploadFile)) {
                                $complaint->setProof($fileName);
                        } else {
                            $complaint->addError('proof', 'File was not uploaded.');
                            die('File was not uploaded.');
                        }

                    if ($complaint->save()) {
                        Application::$app->session->setFlash('success', 'Complaint sent successfully!');
                        $response->redirect('/Customer/Complaints');
                        return;
                    }else {
                        $params = [
                            'bookings' => $bookings,
                            'vehOwners' => $vehOwners,
                            'vehicles' => $vehicles,
                            'complaint' => $complaint
                        ];

                        $this->setLayout('customer-dashboard');
                        return $this->render('Customer/v_customerComplaints', $params);
                    }


                }

            }
            if ($request->getBody()['complaint-about'] === 'system') {
                $complaint = new system_complaints();
                $complaint->setCid("SC".uniqid(true));
                $this->cusComplaint($complaint, $cusId, $request);

                if ($complaint->save()) {
                    Application::$app->session->setFlash('success', 'Complaint sent successfully!');
                    $response->redirect('/Customer/Complaints');
                    return;
                }else {
//                    echo '<pre>';
//                    var_dump($complaint->errors);
//                    echo '</pre>';
//                    exit();
                    $params = [
                        'bookings' => $bookings,
                        'vehOwners' => $vehOwners,
                        'vehicles' => $vehicles,
                        'complaint' => $complaint
                    ];

                    $this->setLayout('customer-dashboard');
                    return $this->render('Customer/v_customerComplaints', $params);
                }


            }
        }

//        if ($request->isGet()){
//            echo '<pre>';
//            var_dump($request->getBody());
//            echo '</pre>';
//            exit();
//        }

        $params = [
            'bookings' => $bookings,
            'vehOwners' => $vehOwners,
            'vehicles' => $vehicles
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_customerComplaints', $params);
    }

    /**
     * @param Response $response
     * @return void
     */
    public function thisIsCustomer(Response $response)
    {
        if (Application::isGuest()) {
            Application::$app->session->setFlash('error', 'You are not logged in!');
            $response->redirect('/login');
            exit;
        } elseif (Application::whoIsThis() == !'customer') {
            Application::$app->session->setFlash('error', 'You are not logged in as a customer!');
            $response->redirect('/login');
            exit;
        }

        $cus_Id = Application::$app->user->cus_Id;
        return $cus_Id;
    }

    /**
     * @param system_complaints $complaint
     * @param $cusId
     * @param Request $request
     * @return void
     */
    public function cusComplaint(system_complaints $complaint, $cusId, Request $request): void
    {
        $complaint->setCusId($cusId);
        $complaint->loadData($request->getBody());
        $complaint->setComplaint(trim($request->getBody()['complaint']));

//                echo '<pre>';
//                var_dump($complaint);
//                echo '</pre>';
//                exit();

        if (isset($_FILES['images'])) {
            $fileCount = count($_FILES['images']['name']);
            $uploadDir = Application::$ROOT_DIR . '/public/assets/img/uploads/customer-complaints/';

            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = uniqid() . '-' . $_FILES['images']['name'][$i];
                $uploadFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadFile)) {
                    if ($i === 0) {
                        $complaint->setImage1($fileName);
                    } else if ($i === 1) {
                        $complaint->setImage2($fileName);
                    } else if ($i === 2) {
                        $complaint->setImage3($fileName);
                    }
                } else {
                    die('File was not uploaded.');
                }
            }
        }
    }
}