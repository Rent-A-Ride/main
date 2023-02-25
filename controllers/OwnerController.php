<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\driver;
use app\models\drivercomplaint;
use app\models\owner;
use app\models\vehicle;
use app\models\vehicle_Owner;
use app\models\vehiclecomplaint;

class OwnerController
{

    public function ownerFirstPage(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/owner","owner-dashboard",[],['profile_img'=>$owner_img, 'function'=>'Dashboard']);
        }
        return $res->render("HomePage","home");
    }

    public function ownerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $ownerprofile = new owner();
            $ownerdetails  = $ownerprofile->owner_profile($req->session->get("user_id"));
            
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/admin_profile","owner-dashboard",['owner_details'=>$ownerdetails],['profile_img'=>$owner_img, 'function'=>'Profile']);
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
             return $res->render("/admin/admin-vehicle","owner-dashboard",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }
    public function ownerVehicleProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $query=$query=$req->query();
            $vehicle1 = $vehicles->viewVehicleProfile($req,$res,$query);
            $vehicle2=$vehicles->viewVehicleProfilelicense($req,$res,$query);
            
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/ownerViewVehicleProfile","owner-dashboard",['veh_info'=>$vehicle1,'veh_li'=>$vehicle2],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function ownerVehicleOwner(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $vehicleowner = new vehicle_Owner();
            $vehicleownerdetails = $vehicleowner->getVehicleowner();
            
            return $res->render("/admin/admin_VehicleOwner","owner-dashboard",['vehicleowner'=>$vehicleownerdetails], ['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");
    }
        
    public function ownerDriver(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $driver = new driver();
            $driverdetails = $driver->getDriver();  
             
            return $res->render("/admin/admin_Driver","owner-dashboard",['driver'=>$driverdetails],['profile_img'=>$owner_img, 'function'=>'Driver']);
        }
        return $res->render("Home","home");
    }

    public function ViewVehicleOwnerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new VehicleOwnerController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewVehicleownerProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/adminViewVehicleOwnerProfile","owner-dashboard",['owner_details'=>$Vehicleownerdetails],['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");

    }

    public function admin_Customer(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $customer = new CustomerController();
            $customerdetails=$customer->ownerGetCustomer($req,$res);
            return $res->render("/admin/admin_customer","owner-dashboard",['adminCustomer'=>$customerdetails],['profile_img'=>$owner_img, 'function'=>'Customer']);
        }
        return $res->render("Home","home");
    }


    public function admin_addVehicleOwner (Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $notV_owner=new vehicle_Owner();
            $vehnotApproved=$notV_owner->getnotApprovedVehicleowner();
            
            
            
             
            return $res->render("/admin/adminadd_vehicleowner","owner-dashboard",['vehicleowner'=>$vehnotApproved],['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");
    }

    public function ViewDriverProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new DriverController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewDriverProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img($req->session->get("user_id"));
            
            // var_dump($Vehicleownerdetails);
            // die();
            return $res->render("/admin/adminView_driverProfile","owner-dashboard",['owner_details'=>$Vehicleownerdetails],['profile_img'=>$owner_img, 'function'=>'Driver']);
        }
        return $res->render("Home","home");

    }

    public function adminaddVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->ownerGetVehicletoAdd($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/admin_addNewVehicle","owner-dashboard",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function adminacceptedVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->addVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/admin_addNewVehicle","owner-dashboard",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function admin_vehicleComplaint(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehiclecom= new vehiclecomplaint();
            $vehiclecomplaint=$vehiclecom->viewcomplaint();
            // var_dump($vehiclecomplaint);
            // die();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/admin_vehicleComplaint","owner-dashboard",['complaint'=>$vehiclecomplaint],['profile_img'=>$owner_img, 'function'=>'vehiclecomplaint']);
        }
    }

    public function admin_driverComplaint(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $drivercom= new drivercomplaint();
            $drivercomplaint=$drivercom->viewcomplaint();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/admin_driverComplaint","owner-dashboard",['complaint'=>$drivercomplaint],['profile_img'=>$owner_img, 'function'=>'drivercomplaint']);
        }
    }
    

    public function admin_licenseExp(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $license = new vehicle();
            $licenseExp = $license->licenseExp();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/admin_licenseExp","owner-dashboard",['complaint'=>$licenseExp],['profile_img'=>$owner_img, 'function'=>'licenseexpiring']);
        }
    }


    


    


//    public function ownerLogout(){
//
//    }

}
