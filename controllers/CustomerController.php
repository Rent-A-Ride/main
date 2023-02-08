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

    public function ownerGetCustomer(Request $req, Response $res){
            $customer = new adminCustomer();
            $customerdetails = $customer->getcustomer();
            return $customerdetails;
        
    }

}

