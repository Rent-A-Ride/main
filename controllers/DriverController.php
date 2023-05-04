<?php
namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\models\driver;
use app\models\vehicle_Owner;

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

                }else if($action==='Reject'){
                    $driverModel->rejectRequests($_POST['res_id']);
                }
            }
        }
        
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest(Application::$app->session->get('user')); 
           
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
        
        
        if(Application::$app->session->get('authenticated')==true && Application::$app->session->get('user_role')=="driver")
        {   
           
           $driver_request=$driverModel->getrequest(Application::$app->session->get('user')); 
           
           return $res->render("/driver/driver_AcceptedRequest","driver-dashboard",['driver'=>$driver_request]);
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

                    }else if($action==='Reject'){
                        $driverModel->rejectRequests($_POST['res_id']);
                    }
                }   
            }
            else {
                $driver_request=$driverModel->getrejectrequest(Application::$app->session->get('user')); 
                return $res->render("/driver/driver_RejectedRequests","driver-dashboard",['driver'=>$driver_request]);
            }
        
        }
        else {
            return $res->redirect("/");
        }
        
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

            $driver_invoice=$driverModel->getPayments(Application::$app->session->get('user_id'));            
           return $res->render("/driver/driver_payment","driver-dashboard", ['driver'=>$driver_invoice]);
        }
        return $res->redirect("/");
    }
}





?>