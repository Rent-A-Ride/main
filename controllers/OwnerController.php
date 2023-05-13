<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\cus_notification;
use app\models\Customer;
use app\models\customer_payment;
use app\models\driver;
use app\models\driver_complaint_resolve_notification;
use app\models\drivercomplaint;
use app\models\license_expire_notification;
use app\models\owner;
use app\models\ren_insuarance;
use app\models\ren_license;
use app\models\veh_insurance;
use app\models\cusVehicle;
use app\models\driver_requests;
use app\models\driverInvoice;
use app\models\driverpayment;
use app\models\Email\Email;
use app\models\MonthlyRevenue;
use app\models\vehicle_Owner;
use app\models\vehiclecomplaint;
use app\models\veh_license;
use app\models\VehBooking;
use app\models\vehicle;
use app\models\vehicle_complaint_resolve_notification;
use app\models\vehicleowner;
use app\models\vehicleownerinvoice;
use app\models\vehicleownerpayment;
use app\models\vehiclereview;
use DateTime;
use Exception;

class OwnerController extends Controller
{
    

    public function ownerFirstPage(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $vehicle = new vehicle();
            $vehicle_count=$vehicle->getvehicleCount();
            $vowner=new vehicleowner();
            $vowner_count=$vowner->getVeh_oCount();
            $driver=new driver();
            $driver_count=$driver->getdriverCount();
            $customer= new Customer();
            $customer_count=$customer->getCustomer_count();
           
            
            
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/owner",['vehicle_count'=>$vehicle_count,'vowner_count'=>$vowner_count,'driver_count'=>$driver_count,'customer_count'=>$customer_count],['profile_img'=>$owner_img, 'function'=>'Dashboard']);
        }
        else {
            return $res->render("HomePage","home");
        }
        
    }

    public function test1(){
        $vehicle = new vehicle();
        $data=$vehicle->getvehicleCountForVehType();
        $result= json_encode($data);
        echo($result);
        // print_r($result);
    }

    public function test2(){
        $monthlFee=new MonthlyRevenue();
        $data1=$monthlFee->getMonthlyRevenue();
        // var_dump($data1);
        // exit;
        $result1= json_encode($data1);
        echo($result1);
        // print_r($result);
    }

    public function test3(){
        $monthlFee=new VehBooking();
        $data1=$monthlFee->getMonthlyBooking();
        $result1= json_encode($data1);
        echo($result1);
        // print_r($result);
    }

    public function ownerProfile(Request $req, Response $res){
        
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            
            if ($req->isPost()){
                $body=$req->getBody();
                $ownerprofile = new owner();
                $ownerprofile->update_profile($body,Application::$app->session->get("user"));
                Application::$app->session->setFlash('profileUpdate', 'Profile Updated Successfully!');
                $res->redirect("/ownerProfile");



            }
            else{
                $ownerprofile = new owner();
                $ownerdetails  = $ownerprofile->owner_profile(Application::$app->session->get("user"));
            
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/admin_profile",['owner_details'=>$ownerdetails],['profile_img'=>$owner_img, 'function'=>'Profile']);
            }
            
        }
        else{
            return $res->render("HomePage","home");
        }
        

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
        else{
            return $res->render("Home","home");
        }
        
    }
    public function ownerVehicleProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $query=$query=$req->query();
            $vehicle1 = $vehicles->viewVehicleProfile($req,$res,$query);
            $vehicle2=$vehicles->viewVehicleProfilelicense($req,$res,$query);
            $review=new vehiclereview();
            $reviews=$review->getReviews((int)$query["id"]);
            $book=new VehBooking();
            $vehiclebook = $book->getvehBooking((int)$query["id"]);
           
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
             return $this->render("/admin/ownerViewVehicleProfile",['veh_info'=>$vehicle1,'veh_li'=>$vehicle2,'reviews'=>$reviews,'bookings'=>$vehiclebook],['profile_img'=>$owner_img, 'function'=>'Vehicle']);
        }
        else{
            return $res->render("Home","home");
        }
        
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
        else{
            return $res->render("Home","home");
        }
        
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
        else{
            return $res->render("Home","home");
        }
        
    }

    public function ViewVehicleOwnerProfile(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new VehicleOwnerController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewVehicleownerProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img(Application::$app->session->get("user"));
            
            $this->setLayout("owner-dashboard");
            return $res->render("/admin/adminViewVehicleOwnerProfile","owner-dashboard",['vehicleowner'=>$Vehicleownerdetails],['profile_img'=>$owner_img, 'function'=>'Vehicle Owner']);
        }
        else{
            return $res->render("Home","home");
        }
        

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
        else{
            return $res->render("Home","home");
        }
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
        else{
            return $res->render("Home","home");
        }
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
        else{
            return $res->render("Home","home");
        }

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
        else{
            return $res->render("Home","home");
        }
    }

    public function adminacceptedVehicle(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){   
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->addVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
//          

            $res->redirect('/admin/vehicle/add_vehicle');
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_vehicleComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehiclecom= new vehiclecomplaint();
            $vehiclecomplaint=$vehiclecom->viewcomplaint();
            $resolve=new vehicle_complaint_resolve_notification();
            $resolvenot=$resolve->get_not();
            $data=[];
            foreach($resolvenot as $row){
                $data[$row['com_ID']]=$row['action'];
            }
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_vehicleComplaint",['complaint'=>$vehiclecomplaint,'data'=>$data],['profile_img'=>$owner_img, 'function'=>'complaint']);
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_driverComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $drivercom= new drivercomplaint();
            $drivercomplaint=$drivercom->viewcomplaint();
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $resolve=new driver_complaint_resolve_notification();
            $resolvenot=$resolve->get_not();
            $data=[];
            foreach($resolvenot as $row){
                $data[$row['com_ID']]=$row['action'];
            }
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_driverComplaint",['complaint'=>$drivercomplaint,'data'=>$data],['profile_img'=>$owner_img, 'function'=>'complaint']);
        }
        else{
            return $res->render("Home","home");
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
            $veh_ins = new veh_insurance();
            $vehicle_ins = $veh_ins->insExp();

            $this->setLayout("owner-dashboard");
            return $this->render("/admin/admin_licenseExp",['complaint'=>$veh_license,'veh_ins'=>$vehicle_ins],['profile_img'=>$owner_img, 'function'=>'licenseexpiring']);
        }
        else{
            return $res->render("Home","home");
        }
    }


    public function admin_resolve_vehicleComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $notification = new vehicle_complaint_resolve_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                // var_dump($body['com_ID']);
                // exit;
                $notification->loadData($body);
                $notification->save();
                $com=new vehiclecomplaint;
                $com->resolve(intval($body['com_ID']));

                $res->redirect('/admin/vehicleComplaint');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_resolve_driverComplaint(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $notification = new driver_complaint_resolve_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                // var_dump($body);
                $notification->loadData($body);
                $notification->save();
                $com=new drivercomplaint();
                $com->resolve(intval($body['com_ID']));
                $res->redirect('/admin/driverComplaint');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_license_exp_notification(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $notification = new license_expire_notification();
            if ($req->isPost()){
                $body=$req->getBody();
                // var_dump($body);
                // exit;
                $notification->loadData($body);
                $notification->save();
                $subject = "Informing License Expiering";
                $msg = "Vehicle :".$body['plate_No']."<br><b>Please Reneave Above Vehicle License.</b> "."</b> <br>";
                
                $emailData = [
                    'email' => $body['owner_email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/admin/license_Exp');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_vehicle_disable(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehicle = new vehicle();
            if ($req->isPost()){
                $body=$req->getBody();
                $veh_id=$body['veh_Id'];
                $vehicle->admindisablevehicle(intval($veh_id));
                $vehicles = $vehicle->getvoByVehId(intval($veh_id));
                $vo_Id=$vehicles[0]['vo_Id'];
                $vowner=new vehicleowner();
                $vo=$vowner->getvehOwner($vo_Id);
                $subject = "Admin Disable Vehicle";
                    $msg = "Your Vehicle:".' '.$vehicles[0]['plate_No']."is disabled on"."";
                
                $emailData = [
                    'email' => $vo[0]['email'],
                    'subject' => "Verify your email",
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }

                $res->redirect('/admin-vehicle');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_customer_disable(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $customer = new adminCustomer();
            if ($req->isPost()){
                $body=$req->getBody();
                $cus_id=$body['cus_Id'];
                $cus_mail=$customer->getcustomerbyID(intval($cus_id));
                $customer ->admindisablecustomer(intval($cus_id));
                $subject = "Discontinued Your Account";
                    $msg = "Your Account has been disabled".' '."as your bad behaviour.";
                
                $emailData = [
                    'email' => $cus_mail[0]['email'],
                    'subject' => "Discontinued Your Account",
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/admin_customer');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_vehowner_disable(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehicleowner = new vehicleowner();
            if ($req->isPost()){
                $body=$req->getBody();
                $veh_id=$body['vo_Id'];
                $vehicleowner->admindisablevehowner(intval($veh_id));
                $vehicleowner=new vehicle_Owner();
                $veh_owner=$vehicleowner->Vehicleowner_profile(intval($veh_id));
                $subject = "Discontinued Your Account Temporary";
                    $msg = "Your Account has been disabled temporary".' '."as your bad behaviour.";
                
                $emailData = [
                    'email' => $veh_owner[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/viewVehicleowner');
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_driver_disable(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $driver = new driver();
            if ($req->isPost()){
                $body=$req->getBody();
                $driver_id=$body['driver_Id'];
                $driver->admindisabledriver(intval($driver_id));
                $drive=$driver->getDriverbyId(intval($driver_id));

                $subject = "Discontinued Your Account Temporary";
                    $msg = "Your Account has been disabled temporary".' '."as your bad behaviour.";
                
                $emailData = [
                    'email' => $drive[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/viewownerDriver');
            }
            
        }
        else{
            return $res->render("Home","home");
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
        else{
            return $res->render("Home","home");
        }
    }

    public function admin_vehowner_accept(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehicleowner = new vehicleowner();
            if ($req->isPost()){
                $body=$req->getBody();
                $vo_id=$body['vo_Id'];
                $vehicleowner->adminacceptvehowner(intval($vo_id));
                $vehicleowner=new vehicle_Owner();
                $veh_owner=$vehicleowner->Vehicleowner_profile(intval($vo_id));
                $subject = "Account Reactivated";
                    $msg = "Your Account has been reactivated.";
                
                $emailData = [
                    'email' => $veh_owner[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/adminadd_vowner');
            }
            
        }
        else{
            return $res->render("Home","home");
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
        else{
            return $res->render("Home","home");
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

    public function   admin_disableVehicle(Request $req, Response $res){

        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $vehicle = new vehicle();
            if ($req->isPost()){
                $body=$req->getBody();
                $veh_id=$body['veh_Id'];
                $vehicle->adminenableVehicle(intval($veh_id));
                $res->redirect('/admin/vehicle/disable_vehicle');
                
            }
            else{
                $disableVehicle = $vehicle->admin_enableVehicle();
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));

                $this->setLayout("owner-dashboard");
                return $this->render("/admin/admin_enableVehicle",['result'=>$disableVehicle],['profile_img'=>$owner_img, 'function'=>'Vehicle']);

            }
            
        }
        else{
            return $res->render("Home","home");
        }

    }

    public function manage_vehownerPayment(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $currentMonth = date('m');
            if ($req->isPost()) {
                $img_name = $_FILES['pay_proof']['name'];
                $pdf_name = $_FILES['invoice']['name'];

                // Generate a unique ID with one letter prefix
                $unique_id = 'I'. $currentMonth . uniqid();

                // Set the destination folder
                $destination_image = Application::$ROOT_DIR.'/public/assets/img/PaymentSlip/';
                $destination_pdf = Application::$ROOT_DIR.'/public/assets/Invoice/VehicleOwner_Invoice/';

                // Save the image file with a unique name
                if($img_name) {
                    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_new_name = $unique_id . '.' . $img_ext;
                    move_uploaded_file($_FILES['pay_proof']['tmp_name'], $destination_image . $img_new_name);
                }

                // Save the PDF file with a unique name
                if($pdf_name) {
                    $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
                    $pdf_new_name = $unique_id . '.' . $pdf_ext;
                    move_uploaded_file($_FILES['invoice']['tmp_name'], $destination_pdf . $pdf_new_name);
                }
                // var_dump($_FILES);
                $body=$req->getBody();
                
                $vo_id=(int)$body['vo_Id'];
                $date_obj = DateTime::createFromFormat('Y-m-d', $body['month']);  // parse string to DateTime object
                $month_name = $date_obj->format('F');
                $current_datetime = date('Y-m-d H:i:s');
                $booking = new vehicleownerpayment();
                $booking->confirm_payment($vo_id,$body['month'],$img_new_name);
                $invoi=new vehicleownerinvoice();
                $invoi->confirm_invoice($vo_id,$body['month'],$pdf_new_name);
                $vehicleowner=new vehicle_Owner();
                $veh_owner=$vehicleowner->Vehicleowner_profile(intval($vo_id));
                $subject = "Payment Successfully Complete";
                    $msg = "Your".' '.$month_name."payment successfully completed on".' '.$current_datetime;
                
                $emailData = [
                    'email' => $veh_owner[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                Application::$app->session->setFlash('success', 'Vehicle Owner Payment Successfully!');
                $res->redirect("/admin/managepayment");
            }
            else {
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                $vehicleowner = new vehicle_Owner();
                $vehicleowners= $vehicleowner->veh();
                $booking = new vehicleownerpayment();
                $payment = $booking->getpayment_currentMonth();
                $allpayment=$booking->getpayment();
                $invoi=new vehicleownerinvoice();
                $invoice=$invoi->getvoInvoice();
                // var_dump($invoice);
                // exit;
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/manage_payment",['vehicleowners'=>$vehicleowners, 'rent'=>$payment,'rent2'=>$allpayment,'invoice'=>$invoice],['profile_img'=>$owner_img, 'function'=>'Payment']);
            }
            
        }  
        else{
            return $res->render("Home","home");
        }  
    }

    public function manage_driverPayment(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            if ($req->isPost()) {
                $currentMonth = date('m');
                $img_name = $_FILES['pay_proof']['name'];
                $pdf_name = $_FILES['invoice']['name'];

                // Generate a unique ID with one letter prefix
                $unique_id = 'I'. $currentMonth . uniqid();

                // Set the destination folder
                $destination_image = Application::$ROOT_DIR.'/public/assets/img/PaymentSlip/';
                $destination_pdf = Application::$ROOT_DIR.'/public/assets/Invoice/DriverInvoice/';

                // Save the image file with a unique name
                if($img_name) {
                    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_new_name = $unique_id . '.' . $img_ext;
                    move_uploaded_file($_FILES['pay_proof']['tmp_name'], $destination_image . $img_new_name);
                }

                // Save the PDF file with a unique name
                if($pdf_name) {
                    $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);
                    $pdf_new_name = $unique_id . '.' . $pdf_ext;
                    move_uploaded_file($_FILES['invoice']['tmp_name'], $destination_pdf . $pdf_new_name);
                }
                $body=$req->getBody();
                $driver_id=(int)$body['driver_Id'];
                $booking = new driverpayment();
                $booking->confirm_payment($driver_id,$body['month'],$img_new_name);
                $inv= new driverInvoice();
                $inv->confirm_invoice($driver_id,$body['month'],$pdf_new_name);
                $driver= new driver();
                $drive=$driver->getDriverbyId(intval($driver_id));
                $date_obj = DateTime::createFromFormat('Y-m-d', $body['month']);  // parse string to DateTime object
                $month_name = $date_obj->format('F');
                $current_datetime = date('Y-m-d H:i:s');

                $subject = "Payment Successfully Complete";
                    $msg = "Your".' '.$month_name."payment successfully completed on".' '.$current_datetime;
                
                $emailData = [
                    'email' => $drive[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                Application::$app->session->setFlash('success', 'Driver Payment Successfully!');
                $res->redirect("/admin/managedriverpayment");
            }else{
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                $driver = new driver();
                $drivers= $driver->getDriver();
                $booking = new driverpayment();
                $payment = $booking->getpayment_currentMonth();
                $allpayment=$booking->getpayment();
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/manageDriverPayment",['drivers'=>$drivers, 'rent'=>$payment,'rent2'=>$allpayment],['profile_img'=>$owner_img, 'function'=>'Payment']);

            }
            
        }
        else{
            return $res->render("Home","home");
        }    
    }

    public function add_driver(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){


            if ($req->isPost()) {
                // $body=$req->getBody();
                // $vo_id=(int)$body['vo_Id'];
                // $booking = new vehicleownerpayment();
                // $booking->confirm_payment($vo_id);
                // $res->redirect("/admin/managepayment");
            }
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
            $driver = new driver();
            $driverdetails = $driver->getaddDriver(); 
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/adminadd_driver",['driver'=>$driverdetails],['profile_img'=>$owner_img, 'function'=>'Driver']);
        }
        else{
            return $res->render("Home","home");
        }

    }


    public function manage_customer_Payment(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
           

            if ($req->isPost()){
                $body=$req->getBody();
                
                $notification = new cus_notification();
                $notification->insertmsg($body);
                $cus_id=$body['cus_Id'];
                $customer=new adminCustomer();
                $cus_mail=$customer->getcustomerbyID(intval($cus_id));
                

                $subject = "Payment Successfully Complete";
                    $msg = "Dear".' '.$body['cus_name']."<br>".$body['msg'];
                
                $emailData = [
                    'email' => $cus_mail[0]['email'],
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }
                $res->redirect('/admin/manageCustomerPayment');

            }
            else{
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                $cus_payment=new customer_payment();
                $payment=$cus_payment->manageCustomerPayment();
                // var_dump($payment);
                // exit;
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/manage_cusPayment",['payment'=>$payment],['profile_img'=>$owner_img, 'function'=>'Payment']);
            }
            
        }
        else{
            return $res->render("Home","home");
        }
    }

    public function setting(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            if ($req->isPost()){
                $body=$req->getBody();
                
                $owner= new owner();
                $errors=$owner->update_password($body);
                
                if ($errors==true) {
                    
                    $res->redirect('/admin/Settings');
                }
                else {
                    $ownerprofile = new owner();
                    $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                    $owner= $ownerprofile->owner_profile(Application::$app->session->get("user"));
                    $this->setLayout("owner-dashboard");
                    return $this->render("/admin/admin_settings",['owner'=>$owner,'errors'=>$errors],['profile_img'=>$owner_img, 'function'=>'Setting']);
                     
                }

            }
            else{

                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                $owner= $ownerprofile->owner_profile(Application::$app->session->get("user"));
               $this->setLayout("owner-dashboard");
                return $this->render("/admin/admin_settings",['owner'=>$owner],['profile_img'=>$owner_img, 'function'=>'Setting']);
            
            }
        }
        else{
            return $res->render("Home","home");
        }
    }


    public function vehowerInvoice(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            if ($req->isPost()) {
                $body=$req->getBody();
                
                $vo_ID=intval($body['vo_ID']);
                $vehicle=new vehicle();
                $veh_ownerVehicle=$vehicle->vehicleOwnergetVehicle($vo_ID);
                
                $veh_booking=new VehBooking();
                $vehiclebooking=$veh_booking->getBookingForMonth($vo_ID,$body['month']);

                $vo = new vehicleowner();
                $vowner=$vo->getvehOwner($vo_ID);
                
                $this->setLayout("invoice");
                return $this->render("/admin/voInvoice",['vehicle'=>$veh_ownerVehicle,'veh_booking'=>$vehiclebooking,'vowner'=>$vowner],['function'=>'Invoice']);


            }
            else {
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img(Application::$app->session->get("user"));
                $vehicleowner = new vehicle_Owner();
                $vehicleowners= $vehicleowner->veh();
                // $booking = new vehicleownerpayment();
                // $payment = $booking->getpayment_currentMonth();
                // $allpayment=$booking->getpayment();
                $invoi=new vehicleownerinvoice();
                $invoice=$invoi->getvoInvoice();
                // var_dump($invoice);
                // exit;
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/adminGenarateVoInvoice",['vehicleowners'=>$vehicleowners,'invoice'=>$invoice],['profile_img'=>$owner_img, 'function'=>'Invoice']);
            }
            
        }
        else{
            return $res->render("Home","home");
        }

    }

    public function driverInvoice(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

            if ($req->isPost()) {
                $body=$req->getBody();
                
                $driver_ID=intval($body['driver_ID']);
                $request= new driver_requests();
                $requests=$request->getdriverReqforDriver($body['month'],$driver_ID);
                $dri=new driver();
                $driver=$dri->getDriverbyId($driver_ID);
                $this->setLayout("invoice");
                return $this->render("/admin/driverInvoice",['requests'=>$requests,'driver'=>$driver],['function'=>'Invoice']);


            }
            else {
               
                $driver = new driver();
                $drivers= $driver->getDriver();
                $invoi=new driverInvoice();
                $invoice=$invoi->getvoInvoice();
                $this->setLayout("owner-dashboard");
                return $this->render("/admin/adminGenarateDriverInvoice",['drivers'=>$drivers,'invoice'=>$invoice],['function'=>'Invoice']);
            }
            
        }
        else{
            return $res->render("Home","home");
        }

    }


    public function driversInvoice(Request $req, Response $res){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){

                $body=$req->getBody();
                
                $driver_ID=intval($body['driver_ID']);
                $request= new driver_requests();
                $requests=$request->getdriverReqforDriver($body['month'],$driver_ID);
                $dri=new driver();
                $driver=$dri->getDriverbyId($driver_ID);
                $this->setLayout("invoice");
                return $this->render("/admin/driverInvoice",['requests'=>$requests,'driver'=>$driver],['function'=>'Invoice']);


            
            
        }
        else{
            return $res->render("Home","home");
        }

    }


    public function uploadImage(Request  $request, Response $response)
    {
        $image=$_FILES['image'];
        var_dump($image);
        $owner=owner::findOne(['user_Id'=>Application::$app->session->get('user')]);
        $image['name']='profile'.Application::$app->session->get('user').'.jpg';

        if (!empty($image)){
            move_uploaded_file($image['tmp_name'],Application::$ROOT_DIR.'/public/assets/img/uploads/userProfile/'.$image['name']);
        }
        $owner->profile_pic=$image['name'];
        $owner->update(Application::$app->session->get('user'),['profile_pic'=>$owner->profile_pic]);
        Application::$app->session->setFlash('profileUpdate', 'Profile picture Updated Successfully!');
        Application::$app->response->redirect('/ownerProfile');


        return json_encode(['status'=>true]);

    }

    public function viewCusProfile(Request  $request, Response $response){
        if (Application::$app->session->get("authenticated")&&Application::$app->session->get("user_role")==="owner"){
            $query=$request->query();
            $customer=new Customer();
            $cus=$customer->getCustomerByuserID((int)$query["id"]);
            
            $this->setLayout("owner-dashboard");
            return $this->render("/admin/adminviewCustomer",['customer_details'=>$cus]);
        }
        else{
            return $response->render("Home","home"); 
        }
    }

}
