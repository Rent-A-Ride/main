<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Customer;
use app\models\VehBooking;
use app\models\cusVehicle;
use app\models\VehInfo;

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
        $vehicle = cusVehicle::retrieveAll();
        $params = [
            'model' => $vehicle
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
                $response->redirect('/profile');
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
                Application::$app->session->setFlash('bookingSuccess', 'Booking Request send successfully!');
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
        $id=$request->getBody()['id'] ?? '';
        $vehInfo = VehInfo::findOne(['veh_Id' => $id]);
        $vehicle = cusVehicle::findOne(['veh_Id' => $id]);
        $vehBooking = new VehBooking();
        $cus_Id = Application::$app->user->cus_Id;

        if ($request->isPost()){
            $vehBooking->loadData($request->getBody());
            $vehBooking->setCusId($cus_Id);
            $vehBooking->setVoId($request->getBody()['veh_Id']);
//            $ve);hBooking->setCusId(Application::$app->user::primaryKey());
//            $vehBooking->setVoId($vehicle->getVoId()

            if($vehBooking->saveAs(['booking_Id','status'])){
                Application::$app->session->setFlash('success', 'Booking Request send successfully!');
                $response->redirect('/VehicleBookingTable');
            }else{
                Application::$app->session->setFlash('error', 'There was some error in booking your vehicle!');
                $response->redirect('/Customer/Home');
                //                $this->setLayout('customer-dashboard');
//                return $this->render('Customer/cusBooking',[
//                    'model'=>$vehBooking,
//                ]);
            }
            return;

        }
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
                    'vehBooking' => $vehBooking
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

        foreach ($vehicle as $veh) {
            $vehicleById[$veh->getVehId()] = $veh;
        }

        $params = [
            'vehBooking' => $vehBooking,
            'vehicleById' => $vehicleById
        ];

        $this->setLayout('customer-dashboard');
        return $this->render('Customer/v_viewBookings', $params);
    }

    public function customerSettings(Request $request, Response $response)
    {
        $customer = new Customer();
        if (Application::isGuest()) {
            Application::$app->session->setFlash('error', 'You are not logged in!');
            $response->redirect('/login');
            exit;
        }elseif (Application::whoIsThis() ==! 'customer'){
            Application::$app->session->setFlash('error', 'You are not logged in as a customer!');
            $response->redirect('/login');
            exit;
        }

        $id=Application::$app->user->cus_Id;

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
        $bookingId = $request->getBody()['bookingId'];
        $vehBooking = VehBooking::findOne(['booking_Id' => $bookingId]);
        $vehBooking->setStatus(0);it add *



        return json_encode(['status' => true]);
    }
}