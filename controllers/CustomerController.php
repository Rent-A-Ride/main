<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\adminCustomer;
use app\models\driver;
use app\models\owner;
use app\models\vehicle_Owner;

class CustomerController
{

    public function ownerGetVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $customer = new adminCustomer();
            $customerdetails = $customer->getcustomer(); 
//            print_r($vehicles);
            return $customerdetails;
//            return $res->render(view: "admin-vehicle",layout: "owner-dashboard",pageParams: ["vehicles"=>$vehicles]);
        }
        return $res->render("login","main");
    }

}

