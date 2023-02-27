<?php

namespace app\controllers;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\driver;
use app\models\LoginForm;
use app\models\owner;
use app\models\vehicle;
use app\models\vehicle_Owner;

class CustomerController 
{

    public function ownerGetCustomer(Request $req, Response $res){
            $customer = new adminCustomer();
            $customerdetails = $customer->getcustomer();
            return $customerdetails;
        
    }

    public function home(Request $request, Response $response)
    {
        $cus=new LoginForm();
        $email=$request->session->get("user_email");
        $cus->cuslogin($email);
        $vehicle = vehicle::retrieveAll();
        $params = [
            'model' => $vehicle
        ];

        
        return $response->render('customer/cusHome','cus', $params);
    }

}

