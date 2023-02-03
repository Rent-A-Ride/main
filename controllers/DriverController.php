<?php
namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\models\driver;

class DriverController extends Controller
{

    public function view_reviews(Request $req, Response $res){
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
        
       
    }
}





?>