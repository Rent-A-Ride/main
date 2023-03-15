<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\owner;
use app\models\vehicle_Owner;
use app\models\viewCustomerReq;

class VehicleOwnerController extends Controller
{

    // public function VehicleOwnerProfile(Request $req, Response $res){

    //      return $res->render("/admin/owner","owner-dashboard");
    // }

    public function VehicleOwnerVehicle(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="vehicleowner"){
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->vehicleownerGetVehicle($req,$res);
        
//        print_r($vehicle);
         return $res->render("/VehicleOwner/vehicleOwner_vehicle","vehicleOwner-dashboard",['result'=>$vehicle]);
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
        $vehicleowner=$vehowner->Vehicleowner_profile(Application::$app->session->get("user"));
        $id = Application::$app->session->get("user_id");
        $nic = $vehicleowner[0]['Nic'];

            if ($req->isPost()){
                $vehicleowner =[new vehicle_Owner()];
                $vehicleowner[0]->loadData($req->getBody());

                if ($vehicleowner[0]->update($nic,['owner_Fname','owner_Lname', 'phone_No', 'owner_address', 'license_No'])){
                    $req->session->setFlash('success', 'Profile Updated Successfully!');
                    $res->redirect('/vehicleOwner/Profile');
                    return;
                }else{
                    echo '<pre>';
                    var_dump("fail");
                    echo '</pre>';
                    exit();
                }
//                $req->setFlash('profileUpdateErr', 'There was some error in updating your profile!');
                return $res->render("VehicleOwner/vehicleOwnerProfile","vehicleOwner-dashboard",['vehicleowner'=>$vehicleowner]);

            }


            return $res->render("VehicleOwner/vehicleOwnerProfile","vehicleOwner-dashboard",['vehicleowner'=>$vehicleowner]);

    }

    public function getEditProfile(Request $req,Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
            return $res->render("/VehicleOwner/vehicleOwnerEditProfile","vehicleOwner-dashboard");
        }
    }

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

    public function vehownerVehicleProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="vehicleowner"){ 
            $query=$req->query();
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->viewVehicleProfile($req,$res,$query);
            // $ownerprofile = new owner();
            // $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/VehicleOwner/vehicleOwnerVehicleProfile","vehicleOwner-dashboard",['result'=>$vehicle]);
        }
        return $res->render("Home","home");
    }

    public function vehownerUpdateVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){ 
             
            // $vehicles = new VehicleController();
            // $vehicle=[];
            // $vehicle = $vehicles->viewVehicleProfile($req,$res);
            // $ownerprofile = new owner();
            // $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/VehicleOwner/vehicleOwnerUpdateDocuments","vehicleOwner-dashboard");
        }
        return $res->render("Home","home");
    }

    public function viewCustomerPendingRequests(Request $request, Response $response): string
    {
        $cusReq = viewCustomerReq::retrieveAll();

        $params = [
            "model" => $cusReq
        ];
        return $response->render("/VehicleOwner/vehicleOwnerPendingCustomerReq", "vehicleOwner-dashboard", $params);
    }

    public function viewCustomerAcceptedRequests(Request $request, Response $response): string
    {
        $cusReq = viewCustomerReq::retrieveAll();

        $params = [
            "model" => $cusReq
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












}
