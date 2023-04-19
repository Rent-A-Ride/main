<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Customer;
use app\models\RegisterModel;
use app\core\Session;
use app\models\adminCustomer;
use app\models\driver;
use app\models\LoginForm;
use app\models\owner;
use app\models\user;
use app\models\users;
use app\models\vehicle_Owner;
use app\models\vehicleowner;
use app\models\vehicleOwnerRegister;

class AuthController extends Controller
{
    public function login_form(Request $req, Response $res)
    {
       
        return $res->render('login','main_1');
    }

    public function VO_register(Request $request, Response $response)
    {
        $vehicleOwnerRegister = new vehicleowner();

        if ($request->isPost())
        {
            $vehicleOwnerRegister->loadData($request->getBody());
//            echo '<pre>';
//            var_dump($vehicleOwnerRegister);
//            echo '</pre>';
//            exit();

            if ($vehicleOwnerRegister->validate() && $vehicleOwnerRegister->save())
            {
                var_dump("Success");
                return 'Success';

            }
            echo '<pre>';
            var_dump($vehicleOwnerRegister->errors);
            echo '</pre>';
            exit();

            $this->setLayout('authVO');
            return $this->render('VehicleOwner/vehicleOwnerRegistration', [
                'model' => new vehicleOwnerRegister()
            ]);
        }

            $this->setLayout('authVO');
            return $this->render('VehicleOwner/vehicleOwnerRegistration', [
                'model' => new vehicleOwnerRegister()
            ]);
    }


    public function login(Request $req, Response $res)
    {
        $body = $req->getBody();
        $user = new user($body);
        $result = $user->login();
       

        if (is_array($result)){
            return $res->render("login","main_1",['errors' => $result]);

        }
        else {
            // $user_id=$result->user_ID;
            $email = $result->email;
            
            $owner = new owner($body);
            $result1=$owner->owner_login($email);
            
            if (is_array($result1)) {

                $vehicle_owner=new vehicle_Owner($body);
                $result2=$vehicle_owner->vehicle_Owner_login($email);
                if (is_array($result2)) {
                    $driver=new driver($body);
                    $result3=$driver->driver_login($email);
                    if (is_array($result3)) {
        
                        $req->session->set("authenticated",true);
                        $req->session->set("user_email",$result->email);
                        $req->session->set("user_role","customer");
                        $res->redirect('/customer');
                       
                        // return $res->render("/adminCustomer/adminCustomer","adminCustomer-dashboard");
                
                    }
                    else {
                        
                        $req->session->set("user_id",$result->user_ID);
                        $req->session->set("authenticated",true);
                        $req->session->set("user_email",$result->email);
                        $req->session->set("user_role","driver");
                        $res->redirect('../driver/driver_profile');
                    
                }
                
                }
                else {
                    $req->session->set("user_id",$result->user_ID);
                    $req->session->set("authenticated",true);
                    $req->session->set("user_email",$result->email);
                    $req->session->set("user_role","vehicleowner");
                    $vehicle_owner=new vehicle_Owner();
                    $veh = $vehicle_owner->Vehicleowner_profile($req->session->get("user_id"));
                    return $res->render("/VehicleOwner/vehicleOwnerProfile","vehicleOwner-dashboard",['vehicleowner'=>$veh]);
//                    $res->redirect("/vehicleOwner/Profile");
//                    return ;
                    
                }


                
            }
            else {
                $req->session->set("user_id",$result->user_ID);
                $req->session->set("authenticated",true);
                $req->session->set("user_email",$result->email);
                $req->session->set("user_role","owner");
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
                return $res->render("/admin/owner","owner-dashboard",[],['profile_img'=>$owner_img, 'function'=>'Dashboard']);
                
            }

            
        }


    }
    public function logout(Request $req, Response $res){
        // if ($req->session->get("authenticated") && $req->session->get("user_role") ==="owner") {
           $req->session->destroy();
            return $res->redirect("/");
        // }
        // return $res->redirect("/");
    }

    public function selectuser(Request $req, Response $res){
        return $res->render('selectUserType','main_1');
    }

//    Customer
    public function cusRegister(Request $request,Response $response)
    {
        $customer = new Customer();
        if ($request->isPost()){

            $customer->loadData($request->getBody());

            if ($customer->validate() && $customer->save()){
                // ->session->setFlash('success', 'Registration Successfully!');
                $request->session->setFlash('success', 'Registration Successfully!');
                // Application::$app->response->redirect('/login');
                $response->redirect("/login");
                exit();
            }

            return $response->render('Customer/cus_Register','main', [
                'model' => $customer
            ]);
        }
       
        return $response->render('Customer/cus_Register','main', [
            'model' => $customer
        ]);
    }

    public function getDriverRegistration(Request $req, Response $res){
        // return $res->render("/driver/driver_registration","main_2");
        $customer = new Customer();
        
        if ($req->isPost()){

            $customer->loadData($req->getBody());
            
            if ($customer->validate() && $customer->save()){
               
                    // ->session->setFlash('success', 'Registration Successfully!');
                    $req->session->setFlash('success', 'Registration Successfully!');
                    // Application::$app->response->redirect('/login');
                    $res->redirect("/login");
                    exit();
    
            }

            return $res->render('/driver/driver_registration','main_2', [
                'model' => $customer
            ]);
        }
       
        return $res->render('/driver/driver_registration','main_2', [
            'model' => $customer
        ]);
    }


    public function vehOwnerRegistration(Request    $req, Response $res){
        // return $res->render("/driver/driver_registration","main_2");
        $user = new users();
        $vehicleowner = new vehicleowner();
        if ($req->isPost()){

            $user->loadData($req->getBody());
            $vehicleowner->loadData($req->getBody());

            if ($user->validate() && $user->save()){
                if($vehicleowner->validate() && $vehicleowner->save()){
                    // ->session->setFlash('success', 'Registration Successfully!');
                    $req->session->setFlash('success', 'Registration Successfully!');
                    // Application::$app->response->redirect('/login');
                    $res->redirect("/login");
                    exit();
                }
            }

            return $res->render('/VehicleOwner/vehOwner_register','main_3', [
                'model' => $user,'model'=>$vehicleowner
            ]);
        }
       
        return $res->render('/VehicleOwner/vehOwner_register','main_3', [
            'model' => $user, 'model'=>$vehicleowner
        ]);
    }
}