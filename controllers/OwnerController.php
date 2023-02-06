<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\driver;
use app\models\owner;
use app\models\vehicle_Owner;

class OwnerController
{

    public function ownerFirstPage(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/owner","owner-dashboard",['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }

    public function ownerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $ownerprofile = new owner();
            $ownerdetails  = $ownerprofile->owner_profile($req->session->get("user_id"));
            
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/admin_profile","owner-dashboard",['owner_details'=>$ownerdetails],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");

    }

    public function ownerVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->ownerGetVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/admin-vehicle","owner-dashboard",['result'=>$vehicle],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }
    public function ownerVehicleProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->viewVehicleProfile($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/ownerViewVehicleProfile","owner-dashboard",['result'=>$vehicle],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }

    public function ownerVehicleOwner(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $vehicleowner = new vehicle_Owner();
            $vehicleownerdetails = $vehicleowner->getVehicleowner();
            
            return $res->render("/admin/admin_VehicleOwner","owner-dashboard",['vehicleowner'=>$vehicleownerdetails], ['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }
        
    public function ownerDriver(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $driver = new driver();
            $driverdetails = $driver->getDriver();  
             
            return $res->render("/admin/admin_Driver","owner-dashboard",['driver'=>$driverdetails],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }

    public function ViewVehicleOwnerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new VehicleOwnerController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewVehicleownerProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/adminViewVehicleOwnerProfile","owner-dashboard",['owner_details'=>$Vehicleownerdetails],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");

    }

    public function admin_Customer(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $customer = new CustomerController();
            $customerdetails=$customer->ownerGetVehicle($req,$res);
            
            
             
            return $res->render("/admin/admin_customer","owner-dashboard",['adminCustomer'=>$customerdetails],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }


    public function admin_addVehicleOwner (Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $notV_owner=new vehicle_Owner();
            $vehnotApproved=$notV_owner->getnotApprovedVehicleowner();
            
            
            
             
            return $res->render("/admin/adminadd_vehicleowner","owner-dashboard",['vehicleowner'=>$vehnotApproved],['profile_img'=>$owner_img]);
        }
        return $res->render("HomePage","home");
    }
    


    


//    public function ownerLogout(){
//
//    }

}
