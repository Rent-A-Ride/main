<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\vehicle;


class VehicleController
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
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->getVehicle();
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);
        }
        return $res->render("login","main");
    }
    
    public function vehicleownerGetVehicle(Request $req, Response $res){
        
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->vehicleOwnergetVehicle($req->session->get("user_id"));
            
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);
        }
        return $res->render("login","main");
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
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicleModel = new vehicle();
            $vehicles = $vehicleModel->getVehicletoAdd();
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);
        }
        return $res->render("login","main");
    }

    public function addVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $query=$req->query();
            $vehicleModel = new vehicle();

            $vehicleModel->getVehicletoAdd((int)$query["id"]);
            $vehicleModel->adminacceptVehiclelicense((int)$query["id"]);
            $vehicleModel->adminacceptVehicleinsuarance((int)$query["id"]);
            $vehicles = $vehicleModel->getVehicletoAdd();
//            print_r($vehicles);
            return $vehicles;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);
        }
        return $res->render("login","main");
    }



}