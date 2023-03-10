<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\CusProfile;
use app\models\Customer;
use app\models\VehBooking;
use app\models\cusVehicle;
use app\models\VehInfo;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->customerMiddleware(new AuthMiddleware(['profile']));
        $this->customerMiddleware(new AuthMiddleware(['home']));
        $this->customerMiddleware(new AuthMiddleware(['VehicleBooking']));
        $this->customerMiddleware(new AuthMiddleware(['vehicleInfo']));
        $this->customerMiddleware(new AuthMiddleware(['vehicleBookingTable']));
    }

    public function home(Request $request, Response $response)
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

        $id=Application::$app->customer->cus_Id;
        $customer=Customer::findOne(['cus_Id'=>$id]);

        if ($request->isPost()){
            $customer->loadData($request->getBody());
            if ($customer->validateWith(['firstname','lastname','address']) && $customer->update($id,['firstname','lastname', 'phoneno', 'address'])){
                Application::$app->session->setFlash('profileUpdate', 'Profile Updated Successfully!');
                $response->redirect('/profile');
                return;
            }
            Application::$app->session->setFlash('profileUpdateErr', 'There was some error in updating your profile!');
            $this->setLayout('cus');
            return $this->render('Customer/profile',[
                'model'=>$customer,
            ]);

        }

        $this->setLayout('cus');
        return $this->render('Customer/profile',[
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
                $response->redirect('/home');
                return;
            }
            Application::$app->session->setFlash('bookingErr', 'There was some error in booking your vehicle!');
            $this->setLayout('cus');
            return $this->render('Customer/cusBooking',[
                'model'=>$vehBooking,
            ]);
        }

        $params = [
            'model' => $vehBooking
        ];
        $this->setLayout('cus');
        return $this->render('Customer/cusBooking', $params);
    }

    public function vehicleInfo(Request $request, Response $response)
    {
        $id=$request->getBody()['id'] ?? '';
        $vehInfo = VehInfo::findOne(['veh_Id' => $id]);
        $vehicle = cusVehicle::findOne(['veh_Id' => $id]);
        $vehBooking = new VehBooking();
        $cus_Id = Application::$app->customer->cus_Id;

        if ($request->isPost()){
            $vehBooking->loadData($request->getBody());
            $vehBooking->setCusId($cus_Id);
            $vehBooking->setVoId($request->getBody()['veh_Id']);
//            $ve);hBooking->setCusId(Application::$app->customer::primaryKey());
//            $vehBooking->setVoId($vehicle->getVoId()

            if ($vehBooking->saveAs(['booking_Id','status'])){
                Application::$app->session->setFlash('success', 'Booking Request send successfully!');
                $response->redirect('/VehicleBookingTable');
                return;
            }else{
                Application::$app->session->setFlash('error', 'There was some error in booking your vehicle!');
//                $this->setLayout('cus');
//                return $this->render('Customer/cusBooking',[
//                    'model'=>$vehBooking,
//                ]);
            }

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
                $this->setLayout('cus');
                return $this->render('Customer/cusBooking', $params);



            }else{
                $params = [
                    'vehInfo' => $vehInfo,
                    'vehicle' => $vehicle,
                    'vehBooking' => $vehBooking
                ];
                $this->setLayout('cus');
                return $this->render('Customer/vehicleInfo', $params);
            }
        }
    }

    public function vehicleBookingTable(Request $request, Response $response)
    {
        $id=Application::$app->customer->cus_Id;
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

        $this->setLayout('cus');
        return $this->render('Customer/cusBookingTable', $params);
    }

    public function customerSettings(Request $request, Response $response)
    {
        $this->setLayout('cus');
        return $this->render('Customer/cusSettings');
    }
}