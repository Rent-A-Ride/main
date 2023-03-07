<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\Customer;
use app\models\driver;
use app\models\driver_complaint_resolve_notification;
use app\models\drivercomplaint;
use app\models\license_expire_notification;
use app\models\owner;
use app\models\ren_insuarance;
use app\models\ren_license;
use app\models\veh_insurance;
use app\models\vehicle;
use app\models\vehicle_Owner;
use app\models\vehiclecomplaint;
use app\models\veh_license;
use app\models\vehicle_complaint_resolve_notification;
use app\models\vehicleowner;

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
            // $license = new vehicle();
            // $licenseExp = $license->licenseExp();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $vehicle = new veh_license();
            $veh_license=$vehicle->licenseExp();
            return $res->render("/admin/admin_licenseExp","owner-dashboard",['complaint'=>$veh_license],['profile_img'=>$owner_img, 'function'=>'licenseexpiring']);
        }
    }


    public function admin_resolve_vehicleComplaint(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $notification = new vehicle_complaint_resolve_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                var_dump($body);
                $notification->loadData($body);
                $notification->save();
                $res->redirect('/admin/vehicleComplaint');
            }
            
        }
    }

    public function admin_resolve_driverComplaint(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $notification = new driver_complaint_resolve_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                var_dump($body);
                $notification->loadData($body);
                $notification->save();
                $res->redirect('/admin/driverComplaint');
            }
            
        }
    }

    public function admin_license_exp_notification(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $notification = new license_expire_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                var_dump($body);
                $notification->loadData($body);
                $notification->save();
                $res->redirect('/admin/license_Exp');
            }
            
        }
    }

    public function admin_vehicle_disable(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicle = new vehicle();
            if ($req->isPost()){
                $body=$req->getBody();
                $veh_id=$body['veh_Id'];
                $vehicle->admindisablevehicle(intval($veh_id));
                $res->redirect('/admin-vehicle');
            }
            
        }
    }

    public function admin_customer_disable(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicle = new adminCustomer();
            if ($req->isPost()){
                $body=$req->getBody();
                $cus_id=$body['cus_Id'];
                $vehicle->admindisablecustomer(intval($cus_id));
                $res->redirect('/admin_customer');
            }
            
        }
    }

    public function admin_vehowner_disable(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicleowner = new vehicleowner();
            if ($req->isPost()){
                $body=$req->getBody();
                $cus_id=$body['vo_Id'];
                $vehicleowner->admindisablevehowner(intval($cus_id));
                $res->redirect('/viewVehicleowner');
            }
            
        }
    }

    public function admin_driver_disable(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $driver = new driver();
            if ($req->isPost()){
                $body=$req->getBody();
                $cus_id=$body['driver_Id'];
                $driver->admindisabledriver(intval($cus_id));
                $res->redirect('/viewownerDriver');
            }
            
        }
    }

    public function admin_accept_vehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicle = new vehicle();
            if ($req->isPost()){
                $body=$req->getBody();
                $veh_id=$body['veh_Id'];
                $vehicle->adminaccept_vehicle(intval($veh_id));
                $res->redirect('/admin/vehicle/add_vehicle');
            }
            
        }
    }

    public function admin_vehowner_accept(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $vehicleowner = new vehicleowner();
            if ($req->isPost()){
                $body=$req->getBody();
                $cus_id=$body['vo_Id'];
                $vehicleowner->adminacceptvehowner(intval($cus_id));
                $res->redirect('/adminadd_vowner');
            }
            
        }
    }

    public function admin_updateVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ren_license = new ren_license();
            $ren_ins=new ren_insuarance();

            if ($req->isPost()){
                $body=$req->getBody();
                // var_dump($body);
                // die();
                $vehicle_lin=new veh_license();
                $vehicle_lin->updatelicense($body);
                $res->redirect("/admin-vehicle");


            }
            else{
                $query=$req->query();
                $reneve_license=$ren_license->licenseren((int)$query["id"]);
                $reneve_ins=$ren_ins->insren((int)$query["id"]);
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
                return $res->render('/admin/vehicleUpdate',"owner-dashboard",['ren_lin'=>$reneve_license,'ren_ins'=>$reneve_ins],['profile_img'=>$owner_img,'function'=>'Vehicle']);
            }
            
        }
    }

    public function admin_updateins(Request $req, Response $res){
        if ($req->isPost()){
            $body=$req->getBody();
            // var_dump($body);
            // die();
            $vehicle_lin=new veh_insurance();
            $vehicle_lin->updateinsuarance($body);
            $res->redirect("/admin-vehicle");


        }
    }
    


    


//    public function ownerLogout(){
//
//    }

}
