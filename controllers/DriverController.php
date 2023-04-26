<?php
namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\models\driver;
use app\models\vehicle_Owner;

class DriverController extends Controller
{

    public function driverViewReview(Request $req, Response $res){
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();

            $driver_reviews=$driverModel->getReviews($req->session->get('user_id'));            
           return $res->render("/driver/driver_reviews","driver-dashboard", ['driver'=>$driver_reviews]);
        }
        return $res->redirect("/");
       
    }

    public function driverAvailability(Request $req, Response $res){
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            // $driverModel=new driver();

            // $driver_reviews=$driverModel->getReviews($req->session->get('user_id'));            
           return $res->render("/driver/driver_availability","driver-dashboard");
        }
        return $res->redirect("/");
       
    }


    public function driverViewProfile(Request $req, Response $res){
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();

            $driver_profile=$driverModel->getDriverbyId($req->session->get('user_id')); 

            $Reviews=$driverModel->avgReviews($req->session->get('user_id'));

            $Remainder= $Reviews['Average']*100- ceil($Reviews['Average'])*100;

            if($Remainder<50){
                $Reviews['Average'] =floor($Reviews['Average']);
            }else{
                $Reviews['Average']=floor($Reviews['Average']) + 0.5;
            }


            return $res->render("/driver/driver_profile","driver-dashboard", ['driver'=>$driver_profile,'reviews'=>$Reviews['Average']]);

            
        }
        return $res->redirect("/");
    }


    public function updateDriverDetails(request $req, Response $res){
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {
        
        $body = $req->getBody();
        $drievr_id = $req->session->get('user_id');
        $driverModel = new driver($body);
        $result = $driverModel->updateDriver($drievr_id);
        if($result) {
            $res->redirect("/driver/driver_profile");
        } else {
            return $result;
        }
   
     }
     else{
        $res->redirect("/");
    }
    }

    

    public function driverViewRequests(Request $req, Response $res){
        $driverModel=new driver();
        
        if($req->isPost()){
            if(!empty($_POST)){
                $action=$_POST['action'];
                if($action==='Accept'){
    
                    $driverModel->acceptRequests($_POST['res_id']);

                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);
                }
            }
        }
        
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest($req->session->get('user_id')); 
           
           return $res->render("/driver/driver_requests","driver-dashboard",['driver'=>$driver_request]);
        }
        return $res->redirect("/");
    }

    public function driverViewAcceptRequests(Request $req, Response $res){
        $driverModel=new driver();
        
        if($req->isPost()){
            if(!empty($_POST)){
                $action=$_POST['action'];
                if($action==='Accept'){
    
                    $driverModel->acceptRequests($_POST['res_id']);

                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);
                }
            }
        }
        
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest($req->session->get('user_id')); 
           
           return $res->render("/driver/driver_AcceptedRequest","driver-dashboard",['driver'=>$driver_request]);
        }
        return $res->redirect("/");
    }

    public function driverViewRejectRequests(Request $req, Response $res){
        $driverModel=new driver();
        
        if($req->isPost()){
            if(!empty($_POST)){
                $action=$_POST['action'];
                if($action==='Accept'){
    
                    $driverModel->acceptRequests($_POST['res_id']);

                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);
                }
            }
        }
        
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest($req->session->get('user_id')); 
           
           return $res->render("/driver/driver_RejectedRequests","driver-dashboard",['driver'=>$driver_request]);
        }
        return $res->redirect("/");
    }


    public function viewDriverProfile(Request $req, Response $res){
            
        $query=$req->query(); 
        $vehicleownerModel=new driver() ;
        $vehiclesowner=$vehicleownerModel->getDriverbyId((int)$query["id"]);

        return $vehiclesowner;

    }

    public function driverEditProfile(Request $req, Response $res){
        
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
           return $res->render("/driver/driver_editProfile","driver-dashboard");
        }
        return $res->redirect("/");
    }

    public function driverViewPayments(Request $req, Response $res){
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            $driverModel=new driver();

            $driver_invoice=$driverModel->getPayments($req->session->get('user_id'));            
           return $res->render("/driver/driver_payment","driver-dashboard", ['driver'=>$driver_invoice]);
        }
        return $res->redirect("/");
    }
}





?>