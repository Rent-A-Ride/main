<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\cusVehicle;
use app\models\vehicle;
use app\models\vehicleowner;
use Exception;

class VehicleController extends Controller
{

    public function add_VehiclePage(Request $req, Response $res){
        if($req->session->get("authenticated") && $req->session->get("user_role") === "vehicleowner") {

               return $res->render("/VehicleOwner/vehowner-addVehicle","vehicleOwner-dashboard");
        }

            return $res->render("login","main");


    }

    public function vehowneraddVehicle(Request $req, Response $res){

        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner") {
            $body = $req->getBody();
            $vehicle = new vehicle($body);
            // var_dump($vehicle);

//            print_r($_FILES['vehicle_image']);die;
            $img_name = $_FILES['vehicle_image']['name'];
            $img_size = $_FILES['vehicle_image']['size'];
            $tmp_name = $_FILES['vehicle_image']['tmp_name'];
            $img_error = $_FILES['vehicle_image']['error'];

            $result = $vehicle->addVehicle($img_error,$img_name,$tmp_name,$req->session->get("user_id"));


            if (is_array($result)) {
                return $res->render("/VehicleOwner/vehowner-addVehicle", "vehicleOwner-dashboard", ['errors' => $result]);
            }
            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->vehicleOwnergetVehicle($req->session->get("user_id"));
            return $res->render("/VehicleOwner/vehicleOwnerDriverAssign", "vehicleOwner-dashboard", ['result' => $vehicles]);

        }
        return $res->render("login","main");

    }


    public function ownerGetVehicle(Request $req, Response $res){
            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->getVehicle();
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);


    }
    
    public function vehicleownerGetVehicle(Request $req, Response $res){
        

            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->vehicleOwnergetVehicle(Application::$app->session->get("user"));
            
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);

    }

    public function viewVehicleProfile(Request $req, Response $res,$query){
            
             
            $vehicleModel=new vehicle();
            $vehicles=$vehicleModel->getVehiclebyId((int)$query["id"]);
            return $vehicles;


    }
    public function viewVehicleProfilelicense(Request $req, Response $res,$query){
            
        
        $vehicleModel=new vehicle();
        $vehicles=$vehicleModel->getVehiclelicensebyId((int)$query["id"]);
        return $vehicles;


    }
    public function ownerGetVehicletoAdd(Request $req, Response $res){

            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->getVehicletoAdd();
            
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);

    }

    public function addVehicle(Request $req, Response $res){

            $query=$req->query();
            $vehicleModel = new vehicle();


            $vehicleModel->adminacceptVehicle((int)$query["id"]);
            $vehicleModel->adminacceptVehiclelicense((int)$query["id"]);
            $vehicleModel->adminacceptVehicleinsuarance((int)$query["id"]);
            $vehicles = $vehicleModel->getvoByVehId((int)$query["id"]);
            $vo_Id=$vehicles[0]['vo_Id'];
            $vowner=new vehicleowner();
            $vo=$vowner->getvehOwner($vo_Id);
            $subject = "Added Your Vehicle Into Our System";
                $msg = "Vehicle :".$vehicles[0]['plate_No']."</br><b>Welcome To Our System Your Vehicle IS Added Successfully</b> "."</b> <br>.";
                
                $emailData = [
                    'email' => $vo[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }

//            print_r($vehicles);
            return true;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);

    }



}