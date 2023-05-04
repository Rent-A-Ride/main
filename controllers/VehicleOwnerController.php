<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Customer;
use app\models\driver;
use app\models\driver_requests;
use app\models\license_expire_notification;
use app\models\owner;
use app\models\ren_ecotest;
use app\models\veh_ecotest;
use app\models\veh_insurance;
use app\models\veh_license;
use app\models\VehBooking;
use app\models\vehicle;
use app\models\vehicle_Owner;
use app\models\VehInfo;
use app\models\viewCustomerReq;

class VehicleOwnerController extends Controller
{

    // public function VehicleOwnerProfile(Request $req, Response $res){

    //      return $res->render("/admin/owner","owner-dashboard");
    // }

    public function VehicleOwnerVehicle(Request $req, Response $res){
        if (Application::$app->session->get("user_role")==="vehicleowner"){
            $voId = Application::$app->user->getVoID();
            $vehicles = vehicle::retrieveAll(['vo_ID'=>$voId]);

            $param = [
                'vehicles'=>$vehicles
            ];
        
//        print_r($vehicle);
         return $res->render("/VehicleOwner/vehicleOwner_vehicle","vehicleOwner-dashboard",$param);
        }
    }
    //this function for owner
    public function viewVehicleownerProfile(Request $req, Response $res){
            
        $query=$req->query(); 
        $vehicleownerModel=new vehicle_Owner() ;
        $vehiclesowner=$vehicleownerModel->Vehicleowner_profile((int)$query["id"]);

        return $vehiclesowner;

    }
    public function vehownerViewProfile(Request $req,Response $res){


            $vehowner = new vehicle_Owner();
            $vehicleowner = $vehowner->Vehicleowner_profile(Application::$app->session->get("user"));
            $id = Application::$app->session->get("user_id");
            $nic = $vehicleowner[0]['Nic'];

            if ($req->isPost()) {
                $vehicleowner = [new vehicle_Owner()];
                $vehicleowner[0]->loadData($req->getBody());

                if ($vehicleowner[0]->update($nic, ['owner_Fname', 'owner_Lname', 'phone_No', 'owner_address', 'license_No'])) {
                    $req->session->setFlash('success', 'Profile Updated Successfully!');
                    $res->redirect('/vehicleOwner/Profile');
                    return;
                } else {
                    echo '<pre>';
                    var_dump("fail");
                    echo '</pre>';
                    exit();
                }
//                $req->setFlash('profileUpdateErr', 'There was some error in updating your profile!');
                return $res->render("VehicleOwner/vehicleOwnerProfile", "vehicleOwner-dashboard", ['vehicleowner' => $vehicleowner]);

            }


            return $res->render("VehicleOwner/vehicleOwnerProfile", "vehicleOwner-dashboard", ['vehicleowner' => $vehicleowner]);

    }

//    public function getEditProfile(Request $req,Response $res)
//{
//    if ($req->session->get("user_role") === "vehicleowner") {
//        return $res->render("/VehicleOwner/vehicleOwnerEditProfile", "vehicleOwner-dashboard");
//    }
//}

    public function getPayments(Request $req,Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
            return $res->render("/VehicleOwner/vehicleOwnerPayments","vehicleOwner-dashboard");
        }
    }

    public function completeAddNewVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
            return $res->render("/VehicleOwner/popupbox/popupbox","vehicleOwner-dashboard");
        }
    }

//    public function vehownerVehicleProfile(Request $req, Response $res){
//        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
//
//            $vehicles = new VehicleController();
//            $vehicle=[];
//            $vehicle = $vehicles->viewVehicleProfile($req,$res);
//            // $ownerprofile = new owner();
//            // $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
////        print_r($vehicle);
//             return $res->render("/VehicleOwner/vehicleOwnerVehicleProfile","vehicleOwner-dashboard",['result'=>$vehicle]);
//        }
//        return $res->render("Home","home");
//    }

    public function vehownerUpdateVehicle(Request $req, Response $res){
        if (Application::$app->session->get("user_role")==="vehicleowner"){
            $veh_ecotest = new ren_ecotest();
//            $veh_insurance = new veh_insurance();
//            $veh_license = new veh_license();
            $id = $req->getBody()['id']??'';
            $vehicle = vehicle::findOne(['veh_Id' => $id]);
            $params = [
                'vehicle' => $vehicle
            ];



             if ($req->isPost()) {
                 $veh_Id = $req->getBody()['veh_Id'];

                 // Handle the scan copy upload
                 if (isset($_FILES['scan_copy'])) {
                     $file = $_FILES['scan_copy'];
                     $file['name'] = 'vehEco'.$veh_Id.'.'.$file['type'];
//                     $file['name'] = 'vehIns'.$veh_Id.'.'.$file['type'];
                     $filename = $file['name'];
                     $tmp_name = $file['tmp_name'];
                     $path = Application::$ROOT_DIR.'/public/assets/img/uploads/renewal/eco/' . $filename;

                     if (!empty($file)){
                         move_uploaded_file($tmp_name, $path);
                         $veh_ecotest->setScanCopy($filename);
                     } else {
                         $veh_ecotest->setScanCopy("dull.jpg");
                     }

                 }

                    $veh_ecotest->setVehId($veh_Id);
                    $veh_ecotest->setExDate($req->getBody()['ex_date']);



                 if ($veh_ecotest->save()) {
//                     $req->session->setFlash('success', 'Vehicle Updated Successfully!');
                     $res->redirect('/vehicleowner_vehicle');
                     return;
                 } else {
                     echo '<pre>';
                     var_dump("fail");
                     echo '</pre>';
                     exit();
                 }

             }

            return $res->render("/VehicleOwner/vehicleOwnerUpdateDocuments","vehicleOwner-dashboard", $params);
        }
        return $res->render("Home","home");
    }


    public function viewCustomerPendingRequests(Request $request, Response $response): string
    {
        $cusReq = viewCustomerReq::retrieveAll();
        $customer = Customer::retrieveAll();
        $vehicle = vehicle::retrieveAll();
        $driver = driver::retrieveAll();

//        echo '<pre>';
//        var_dump($driver);
//        echo '</pre>';
//        exit();

        $getCustomerById = [];
        $getVehicleById = [];
        foreach ($customer as $cus){
            $getCustomerById[$cus->cus_Id] = $cus;
        }
        foreach ($vehicle as $veh){
            $getVehicleById[$veh->getVehId()] = $veh;
        }

        if ($request->isPost()){

            $type=$request->getBody()['type'] ?? '';

            if ($type == 'driver') {
                $driverId = $request->getBody()['driver_ID'];
                $bookingId = $request->getBody()['booking_Id'];
                $driver = driver::findOne(['driver_Id' => $driverId]);
                $booking = viewCustomerReq::findOne(['booking_Id' => $bookingId]);

                $driverReq = new driver_requests();

                $driverReq->setDriverId($driverId);
                $driverReq->setReservationId($bookingId);
                $driverReq->setUserID($booking->getCusId());
                $driverReq->setVehicleID($booking->getVehId());
                $driverReq->setStartDate(date($booking->getStartDate()));
                $driverReq->setEndDate($booking->getEndDate());
                $driverReq->setPickupLocation($booking->getPickupLocation());
                $driverReq->setDestination($booking->getDestination());
                $driverReq->setAccept(0);


                if ($driverReq->save()){
                    $booking->setStatus(2);
                    if ($booking->update($bookingId, ['status'])){
//                        Application::$app->session->setFlash('success', 'Driver Assigned Successfully!');
                        return $response->redirect('/CustomerAcceptedRequest');
                    }
                }else{
//                    Application::$app->session->setFlash('error', 'There was some error in assigning driver!');
                    return $response->redirect('/CustomerAcceptedRequest');
                }



            }

//            echo '<pre>';
//            var_dump($request->getBody());
//            echo '</pre>';
//            exit();

            $bookingId = $request->getBody()['booking_Id'];
            $booking = viewCustomerReq::findOne(['booking_Id' => $bookingId]);
            $booking->setStatus(1);
            if ($booking->update($bookingId, ['status'])){
//                Application::$app->session->setFlash('success', 'Booking Accepted Successfully!');
                return $response->redirect('/CustomerAcceptedRequest');
            }




            $params = [
                "model" => $cusReq,
                'customer' => $getCustomerById,
                'vehicle' => $getVehicleById,
                'driver' => $driver
            ];
            return $this->render("/VehicleOwner/vehicleOwnerPendingCustomerReq", "vehicleOwner-dashboard", $params);
        }



        $params = [
            "model" => $cusReq,
            'customer' => $getCustomerById,
            'vehicle' => $getVehicleById,
            'driver' => $driver
        ];
        return $this->render("/VehicleOwner/vehicleOwnerPendingCustomerReq", "vehicleOwner-dashboard", $params);


    }

    public function viewCustomerAcceptedRequests(Request $request, Response $response): string
    {
        $cusReq = viewCustomerReq::retrieveAll();
        $customer = Customer::retrieveAll();
        $vehicle = vehicle::retrieveAll();
        $driver = driver::retrieveAll();


        $getCustomerById = [];
        $getVehicleById = [];
        foreach ($customer as $cus){
            $getCustomerById[$cus->cus_Id] = $cus;
        }
        foreach ($vehicle as $veh){
            $getVehicleById[$veh->getVehId()] = $veh;
        }



        $params = [
            "model" => $cusReq,
            'customer' => $getCustomerById,
            'vehicle' => $getVehicleById,
            'driver' => $driver
        ];
        return $response->render("/VehicleOwner/vehicleOwnerAcceptedReq", "vehicleOwner-dashboard", $params);
    }

    public function viewCustomerRejectedRequests(Request $request, Response $response): string
    {
        $cusReq = viewCustomerReq::retrieveAll();

        $params = [
            "model" => $cusReq
        ];
        return $response->render("/VehicleOwner/vehicleOwnerRejectedReq", "vehicleOwner-dashboard", $params);
    }

    public function acceptBooking(Request $request, Response $response): string
    {
        // Retrieve the booking ID from the request
        $bookingId = $request->getBody()['booking_Id'];


        // Update the booking status in the database
        $booking = viewCustomerReq::findOne($bookingId);

        $booking->setStatus(1);
        $result = $booking->update($bookingId, ['status']);

        // Return a JSON response indicating success or failure
        if ($result) {
            $response->redirect('/CustomerAcceptedRequest');
            return json_encode(['status'=>true]);
        } else {
            return $response->withJson(['status' => 'error']);
        }
    }

    public function addNewVehicle(Request $request, Response $response)
    {

        $vehicle = new vehicle();
        $vehinfo = new VehInfo();
        $vehLicense = new veh_license();
        $vehInsurance = new veh_insurance();
        $vehEcoTest = new veh_ecotest();

        $vo_Id = Application::$app->user->getVoID();


        if ($request->isPost()){

            $vehID = uniqid('veh', true);

            $vehicle->loadData($request->getBody());
            $vehinfo->loadData($request->getBody());
            $vehLicense->loadData($request->getBody());
            $vehInsurance->loadData($request->getBody());
            $vehEcoTest->loadData($request->getBody());

            $vehicle->setAvailability(1);
            $vehicle->setVoId($vo_Id);




            if(isset($_FILES)) {
                if (isset($_FILES['front_view'])){
                    $file = $_FILES['front_view'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'front'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehicle->setFrontView($filename);
                    }
                }
                if (isset($_FILES['back_view']['tmp_name'])){
                    $file = $_FILES['back_view'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'back'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehicle->setBackView($filename);
                    }
                }
                if (isset($_FILES['side_view']['tmp_name'])){
                    $file = $_FILES['side_view'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'side'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehicle->setSideView($filename);
                    }
                }
                if (isset($_FILES['lic_scan_copy']['tmp_name'])){
                    $file = $_FILES['lic_scan_copy'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'lic'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/Documents/lic/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehLicense->setLicScanCopy($filename);
                    }
                }
                if (isset($_FILES['ins_scan_copy']['tmp_name'])){
                    $file = $_FILES['ins_scan_copy'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'ins'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/Documents/ins/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehInsurance->setInsScanCopy($filename);
                    }
                }
                if (isset($_FILES['eco_scan_copy']['tmp_name'])){
                    $file = $_FILES['eco_scan_copy'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file['name'] = $vehID.'eco'.'.'.$extension;
                    $filename = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $path = Application::$ROOT_DIR.'/public/assets/img/uploads/vehicle/Documents/eco/' . $filename;

                    if (!empty($file)){
                        move_uploaded_file($tmp_name, $path);
                        $vehEcoTest->setEcoScanCopy($filename);
                    }
                }
            }
//            $vehId = uniqid();

            if ($vehicle->validate() && $vehicle->saveAs(['veh_Id'])){
                // find the newly saved vehicle with plat number
                $veh = vehicle::findOne(['plate_no' => $vehicle->getPlateNo()]);


                $vehinfo->setVehId($veh->getVehId());
                $vehLicense->setVehId($veh->getVehId());
                $vehInsurance->setVehId($veh->getVehId());
                $vehLicense->setLicOwner($veh->getVoId());
                $vehEcoTest->setVehId($veh->getVehId());

                if (($vehinfo->validate() && $vehinfo->save()) && ($vehLicense->validate() && $vehLicense->save()) && ($vehInsurance->validate() && $vehInsurance->save()) && ($vehEcoTest->validate() && $vehEcoTest->save())){
//                Application::$app->session->setFlash('success', 'Vehicle Added Successfully!');
                    return $response->redirect('/vehicleOwner/addNewVehicle');
                }
            }





            echo '<pre>';
            var_dump($vehicle);
            echo '</pre>';
            exit();

            return $response->render("/VehicleOwner/vehicleOwnerAddNewVehicle", "vehicleOwner-dashboard");


        }
        return $response->render("/VehicleOwner/vehicleOwnerAddNewVehicle", "vehicleOwner-dashboard");
    }

    public function expier_notification(Request $req,Response $res)
    {
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="vehicleowner"){

            $exp_not=new license_expire_notification();
            $exp=$exp_not->retreivedetails(Application::$app->session->get("user"));
            $this->setLayout("vehicleOwner-dashboard");
            return $this->render("/VehicleOwner/vehicleOwner_notification",['model'=>$exp]);
        }

    }
//vehicle owner booking calendar
    public function bookingCalendar(Request $request,Response $response)
    {
        if ($request->isGet()){
            if (isset($request->getBody()['search-date'])) {
                $date = $request->getBody()['search-date'];
                $booking = VehBooking::findBetweenDates($date);

                return json_encode($booking);
            }

        }

        $this->setLayout("vehicleOwner-dashboard");
        return $this->render("/VehicleOwner/vo_bookingCalendar");
    }

//    !!!!!!!!!!!!
//vehicle owner view vehicle profile to be completed
    public function viewVehicleProfile(Request $request,Response $response)
    {
        $this->setLayout("vehicleOwner-dashboard");
        return $this->render("/VehicleOwner/vehicleOwnerViewVehicleProfile");
    }












}
