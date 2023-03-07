<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\owner;
use app\models\vehicle_Owner;

class VehicleOwnerController
{

    // public function VehicleOwnerProfile(Request $req, Response $res){

    //      return $res->render("/admin/owner","owner-dashboard");
    // }

    public function VehicleOwnerVehicle(Request $req, Response $res){
        $vehicles = new VehicleController();
        $vehicle=[];
        $vehicle = $vehicles->vehicleownerGetVehicle($req,$res);
        
//        print_r($vehicle);
         return $res->render("/VehicleOwner/vehicleOwner_vehicle","vehicleOwner-dashboard",['result'=>$vehicle]);
    }

    public function viewVehicleownerProfile(Request $req, Response $res){
            
        $query=$req->query(); 
        $vehicleownerModel=new vehicle_Owner() ;
        $vehiclesowner=$vehicleownerModel->Vehicleowner_profile((int)$query["id"]);

        return $vehiclesowner;

    }
    public function vehownerViewProfile(Request $req,Response $res){

        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){
            return $res->render("VehicleOwner/vehicleOwnerProfile","vehicleOwner-dashboard");
        }
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
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="vehicleowner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $query=$query=$req->query();
            $vehicle1 = $vehicles->viewVehicleProfile($req,$res,$query);
            $vehicle2=$vehicles->viewVehicleProfilelicense($req,$res,$query);
            // $vehicle = $vehicles->viewVehicleProfile($req,$res,$query);
            // $ownerprofile = new owner();
            // $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/VehicleOwner/vehicleOwnerVehicleProfile","vehicleOwner-dashboard",['veh_info'=>$vehicle1,'veh_li'=>$vehicle2]);
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













}
