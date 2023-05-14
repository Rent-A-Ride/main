<?php
namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\models\Customer;
use app\models\driver;
use app\models\driver_requests;
use app\models\driverInvoice;
use app\models\driverpayment;
use app\models\Notification;
use app\models\VehBooking;
use app\models\vehicle_Owner;
use app\models\voNotifications;

class DriverController extends Controller
{

    public function driverViewReview(Request $req, Response $res){
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();

            $driver_reviews=$driverModel->getReviews(Application::$app->session->get('user'));            
           return $res->render("/driver/driver_reviews","driver-dashboard", ['driver'=>$driver_reviews]);
        }
        return $res->redirect("/");
       
    }


    public function driverViewProfile(Request $req, Response $res){
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
            if($req->isPost()){
                $body=$req->getBody();
                $driverModel=new driver();
                $driverModel->UpdateProfile($body,Application::$app->session->get('user'));
                $res->redirect('/driver/driver_profile');

            }else {
                $driverModel=new driver();

                $driver_profile=$driverModel->getDriverbyId(Application::$app->session->get('user')); 

                $Reviews=$driverModel->avgReviews(Application::$app->session->get('user'));

                $Remainder= $Reviews['Average']*100- ceil($Reviews['Average'])*100;

                if($Remainder<50){
                    $Reviews['Average'] =floor($Reviews['Average']);
                }else{
                    $Reviews['Average']=floor($Reviews['Average']) + 0.5;
                }

                return $res->render("/driver/driver_profile","driver-dashboard", ['driver'=>$driver_profile,'reviews'=>$Reviews['Average']]);
                
            }
            

            
        }else {
           return $res->redirect("/");
        }
        
    }


    

    public function driverViewRequests(Request $req, Response $res){
        $driverModel=new driver();
        
        if($req->isPost()){
            if(!empty($_POST)){
                $action=$_POST['action'];
                if($action==='Accept'){
    
                    $driverModel->acceptRequests($_POST['res_id']);
                    $dr_req=new driver_requests();
                    $vehbooking=new VehBooking();
                    $booking=$dr_req->getbookingByResId($_POST['res_id']);
                    $dr=$driverModel->getDriverbyId($booking[0]['driver_ID']);
                    $drivername=$dr[0]['driver_Fname'].$dr[0]['driver_Lname'];
                    $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                    $drver_id=$booking[0]['driver_ID'];
                    $cus_id=$booking[0]['user_ID'];
                    Notification::sendNotification($cus_id,"Booking Confirmation","Your booking ".$_POST['res_id']." is confirmed.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                    voNotifications::sendNotification($vo[0]['vo_Id'],"Booking Accepted","Booking".$_POST['res_id']."is accepted by ".$drivername,'/CustomerAcceptedRequest');

                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);

                    $dr_req=new driver_requests();
                    $vehbooking=new VehBooking();
                    $booking=$dr_req->getbookingByResId($_POST['res_id']);
                    $dr=$driverModel->getDriverbyId($booking[0]['driver_ID']);
                    $drivername=$dr[0]['driver_Fname'].$dr[0]['driver_Lname'];
                    $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                    $drver_id=$booking[0]['driver_ID'];
                    $cus_id=$booking[0]['user_ID'];
                    Notification::sendNotification($cus_id,"Booking Rejection","Your booking ".$_POST['res_id']." is rejected.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                    voNotifications::sendNotification($vo[0]['vo_Id'],"Booking Rejected","Booking".$_POST['res_id']."is rejected by ".$drivername,'/CustomerAcceptedRequest');
                }
            }
        }
        
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest(Application::$app->session->get('user')); 
           

           $customer =[];

           foreach($driver_request as $row){
                $customer[$row['user_ID']] = Customer::findOne(['cus_Id' => $row['user_ID'] ]);
           }

           
           
           return $res->render("/driver/driver_requests","driver-dashboard",['driver'=>$driver_request,'customer'=>$customer]);
        }
        return $res->redirect("/");
    }

    public function driverViewAcceptRequests(Request $req, Response $res){
        $driverModel=new driver();
        
        if($req->isPost()){
            if(!empty($_POST)){
                $action=$_POST['action'];
                var_dump($_POST);
                if($action==='Accept'){
                    
                    
                    $driverModel->acceptRequests($_POST['res_id']);
                    $dr_req=new driver_requests();
                    $vehbooking=new VehBooking();
                    $booking=$dr_req->getbookingByResId($_POST['res_id']);
                    $dr=$driverModel->getDriverbyId($booking['driver_ID']);
                    $drivername=$dr['driver_Fname'].$dr['driver_Lname'];
                    $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                    $drver_id=$booking['driver_ID'];
                    $cus_id=$booking['user_ID'];
                    Notification::sendNotification($cus_id,"Booking Confirmation","Your booking ".$_POST['res_id']." is confirmed.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                    voNotifications::sendNotification($vo['vo_Id'],"Booking Accepted","Booking".$_POST['res_id']."is accepted by ".$drivername,'/CustomerAcceptedRequest');


                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);
                    $dr_req=new driver_requests();
                    $vehbooking=new VehBooking();
                    $booking=$dr_req->getbookingByResId($_POST['res_id']);
                    $dr=$driverModel->getDriverbyId($booking[0]['driver_ID']);
                    $drivername=$dr[0]['driver_Fname'].$dr[0]['driver_Lname'];
                    $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                    $drver_id=$booking[0]['driver_ID'];
                    $cus_id=$booking[0]['user_ID'];
                    Notification::sendNotification($cus_id,"Booking Rejection","Your booking ".$_POST['res_id']." is rejected.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                    voNotifications::sendNotification($vo[0]['vo_Id'],"Booking Rejected","Booking".$_POST['res_id']."is rejected by ".$drivername,'/CustomerAcceptedRequest');
                }
            }
        }
        
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest(Application::$app->session->get('user')); 
           

           $customer =[];

           foreach($driver_request as $row){
                $customer[$row['user_ID']] = Customer::findOne(['cus_Id' => $row['user_ID'] ]);
           }


           return $res->render("/driver/driver_AcceptedRequest","driver-dashboard",['driver'=>$driver_request, 'customer'=>$customer]);
        }
        return $res->redirect("/");
    }

    public function driverViewRejectRequests(Request $req, Response $res){
        $driverModel=new driver();
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {
            if($req->isPost()){
                if(!empty($_POST)){
                    $action=$_POST['action'];
                    if($action==='Accept'){
    
                        $driverModel->acceptRequests($_POST['res_id']);
                        $driverModel->acceptRequests($_POST['res_id']);
                        $dr_req=new driver_requests();
                        $vehbooking=new VehBooking();
                        $booking=$dr_req->getbookingByResId($_POST['res_id']);
                        $dr=$driverModel->getDriverbyId($booking['driver_ID']);
                        $drivername=$dr['driver_Fname'].$dr['driver_Lname'];
                        $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                        $drver_id=$booking['driver_ID'];
                        $cus_id=$booking['user_ID'];
                        Notification::sendNotification($cus_id,"Booking Confirmation","Your booking ".$_POST['res_id']." is confirmed.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                        voNotifications::sendNotification($vo['vo_Id'],"Booking Accepted","Booking".$_POST['res_id']."is accepted by ".$drivername,'/CustomerAcceptedRequest'); 

                    }else if($action==='Reject'){
                        $driverModel->rejectRequests($_POST['res_id']);
                        $dr_req=new driver_requests();
                        $vehbooking=new VehBooking();
                        $booking=$dr_req->getbookingByResId($_POST['res_id']);
                        $dr=$driverModel->getDriverbyId($booking[0]['driver_ID']);
                        $drivername=$dr[0]['driver_Fname'].$dr[0]['driver_Lname'];
                        $vo=$vehbooking->getbookingByResId($_POST['res_id']);
                        $drver_id=$booking[0]['driver_ID'];
                        $cus_id=$booking[0]['user_ID'];
                        Notification::sendNotification($cus_id,"Booking Rejection","Your booking ".$_POST['res_id']." is rejected.",'/Customer/VehicleBookingTable/Active - Driver Accept');
                        voNotifications::sendNotification($vo[0]['vo_Id'],"Booking Rejected","Booking".$_POST['res_id']."is rejected by ".$drivername,'/CustomerAcceptedRequest');
                    }
                }   
            }
            else {
                $driver_request=$driverModel->getrejectrequest(Application::$app->session->get('user')); 

                $customer =[];

                foreach($driver_request as $row){
                     $customer[$row['user_ID']] = Customer::findOne(['cus_Id' => $row['user_ID'] ]);
                }

                return $res->render("/driver/driver_RejectedRequests","driver-dashboard",['driver'=>$driver_request,  'customer'=>$customer]);
            }
        
        }
        // else {
        //     return $res->redirect("/");
        // }
        
    }


    public function viewDriverProfile(Request $req, Response $res){
            
        $query=$req->query(); 
        $vehicleownerModel=new driver() ;
        $vehiclesowner=$vehicleownerModel->getDriverbyId((int)$query["id"]);

        return $vehiclesowner;

    }

    public function driverEditProfile(Request $req, Response $res){
        
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
           return $res->render("/driver/driver_editProfile","driver-dashboard");
        }
        return $res->redirect("/");
    }

    public function driverViewPayments(Request $req, Response $res){
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();
            $driverPaymentModel = new driverpayment();
            $driverInvoiceModel = new driverInvoice();

            $driver_payment=$driverPaymentModel->getdriverPayments(Application::$app->session->get('user'));  
            $driver_invoice=$driverInvoiceModel->getdriverinvoice(Application::$app->session->get('user'));    
                  
           return $res->render("/driver/driver_payment","driver-dashboard", ['driverp'=>$driver_payment,'driverinv'=>$driver_invoice]);
        }
        return $res->redirect("/");
    }


    public function driverAvailability(Request $req, Response $res){
        if(Application::$app->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();

            $driver_bookings=$driverModel->getBookings(Application::$app->session->get('user'));      

            // var_dump($driver_bookings);
            // exit;
            
            
           return $res->render("/driver/driver_availability","driver-dashboard",['bookings'=> $driver_bookings]);
        }
        return $res->redirect("/");
       
    }
}





?>