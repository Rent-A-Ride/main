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
            // $user_id=$req->session->get('user_Id');
            // $driver = new driver();
            // $driver_review = $driver->getreviews($user_Id);
            // var_dump($driver_review);
            // $this->setLayout('driver-dashboard');
            // return $this->render("driver_reviews",);
            return $res->render("/driver/driver_reviews","driver-dashboard");
        }
        return $res->redirect("/");

        
       
    }

    public function driverViewProfile(Request $req, Response $res){
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            
           return $res->render("/driver/driver_profile","driver-dashboard");
        }
        return $res->redirect("/");
    }

    public function driverViewRequests(Request $req, Response $res){
        
        if($req->session->get('authenticated')==true && $req->session->get('user_role')=="driver")
        {   
            
           return $res->render("/driver/driver_requests","driver-dashboard");
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

    
}





?>