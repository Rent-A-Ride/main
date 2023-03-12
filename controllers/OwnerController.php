<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
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
use app\models\cusVehicle;
use app\models\vehicle_Owner;
use app\models\vehiclecomplaint;
use app\models\veh_license;
use app\models\vehicle;
use app\models\vehicle_complaint_resolve_notification;
use app\models\vehicleowner;

class OwnerController extends Controller
{

    public function ownerFirstPage(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/owner",[],['profile_img'=>$owner_img, 'function'=>'Dashboard']);
        }
        return $res->render("HomePage","home");
    }

    public function ownerProfile(Request $req, Response $res){
        
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            
            $ownerprofile = new owner();
            $ownerdetails  = $ownerprofile->owner_profile(Application::$app->session->get("user"));
            
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_profile",['owner_details'=>$ownerdetails],['profile_img'=>$owner_img, 'function'=>'Profile']);
        }
        return $res->render("HomePage","home");

    }

    public function ownerVehicle(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->ownerGetVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
//        print_r($vehicle);
            $this->setLayout("owner-dashboard");
             return $this->render("/admin/admin-vehicle",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }
    public function ownerVehicleProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $query=$query=$req->query();
            $vehicle1 = $vehicles->viewVehicleProfile($req,$res,$query);
            $vehicle2=$vehicles->viewVehicleProfilelicense($req,$res,$query);
            
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
             return $this->render("/admin/ownerViewVehicleProfile",['veh_info'=>$vehicle1,'veh_li'=>$vehicle2],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function ownerVehicleOwner(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){    
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $vehicleowner = new vehicle_Owner();
            $vehicleownerdetails = $vehicleowner->getVehicleowner();
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_VehicleOwner",['vehicleowner'=>$vehicleownerdetails], ['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");
    }
        
    public function ownerDriver(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $driver = new driver();
            $driverdetails = $driver->getDriver();  
            $this->setLayout("owner-dashboard"); 
            return $this->render("/admin/admin_Driver",['driver'=>$driverdetails],['profile_img'=>$owner_img, 'function'=>'Driver']);
        }
        return $res->render("Home","home");
    }

    public function ViewVehicleOwnerProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new VehicleOwnerController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewVehicleownerProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img(Application::$app->session->get("user"));
            
            $this->setLayout("owner-dashboard");
            return $res->render("/admin/adminViewVehicleOwnerProfile","owner-dashboard",['owner_details'=>$Vehicleownerdetails],['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");

    }

    public function admin_Customer(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $customer = new adminCustomer();
            $customerdetails=$customer->getcustomer($req,$res);
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_customer",['adminCustomer'=>$customerdetails],['profile_img'=>$owner_img, 'function'=>'Customer']);
        }
        return $res->render("Home","home");
    }


    public function admin_addVehicleOwner (Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $notV_owner=new vehicle_Owner();
            $vehnotApproved=$notV_owner->getnotApprovedVehicleowner();
            
            
            
            $this->setLayout("owner-dashboard"); 
            return $this->render("/admin/adminadd_vehicleowner",['vehicleowner'=>$vehnotApproved],['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        return $res->render("Home","home");
    }

    public function ViewDriverProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new DriverController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewDriverProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img(Application::$app->session->get("user"));
            
            // var_dump($Vehicleownerdetails);
            // die();
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/adminView_driverProfile",['owner_details'=>$Vehicleownerdetails],['profile_img'=>$owner_img, 'function'=>'Driver']);
        }
        return $res->render("Home","home");

    }

    public function adminaddVehicle(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->ownerGetVehicletoAdd($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
//        print_r($vehicle);
            $this->setLayout("owner-dashboard");
             return $this->render("/admin/admin_addNewVehicle",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function adminacceptedVehicle(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->addVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
//        print_r($vehicle);
            $this->setLayout("owner-dashboard");
             return $this->render("/admin/admin_addNewVehicle",['result'=>$vehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        return $res->render("Home","home");
    }

    public function admin_vehicleComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehiclecom= new vehiclecomplaint();
            $vehiclecomplaint=$vehiclecom->viewcomplaint();
            // var_dump($vehiclecomplaint);
            // die();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_vehicleComplaint",['complaint'=>$vehiclecomplaint],['profile_img'=>$owner_img, 'function'=>'vehiclecomplaint']);
        }
    }

    public function admin_driverComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $drivercom= new drivercomplaint();
            $drivercomplaint=$drivercom->viewcomplaint();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_driverComplaint",['complaint'=>$drivercomplaint],['profile_img'=>$owner_img, 'function'=>'drivercomplaint']);
        }
    }
    

    public function admin_licenseExp(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            // $license = new vehicle();
            // $licenseExp = $license->licenseExp();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $vehicle = new veh_license();
            $veh_license=$vehicle->licenseExp();
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_licenseExp",['complaint'=>$veh_license],['profile_img'=>$owner_img, 'function'=>'licenseexpiring']);
        }
    }


    public function admin_resolve_vehicleComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
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
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
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
