<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\RegisterModel;
use app\core\Session;
use app\models\Customer;
use app\models\driver;
use app\models\owner;
use app\models\user;
use app\models\vehicle_Owner;

class AuthController extends Controller
{
    public function login_form(Request $req, Response $res)
    {
        // $params = [
        //     'name' => "Rent A Ride"
        // ];
        // $this->setLayout('main_1');
        // return $this->render('login');
        // $this->setLayout("main_1");
        // return $this->render()
        return $res->render('login','main_1');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()){

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()){
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
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
            $user_id=$result->user_ID;
            
            $owner = new owner($body);
            $result1=$owner->owner_login($user_id);
            
            if (is_array($result1)) {

                $vehicle_owner=new vehicle_Owner($body);
                $result2=$vehicle_owner->vehicle_Owner_login($user_id);
                if (is_array($result2)) {
                    $driver=new driver($body);
                    $result3=$driver->driver_login($user_id);
                    if (is_array($result3)) {
                        // $req->session->set("authenticated",true);
                        // $req->session->set("user_email",$result->email);
                        // $req->session->set("user_role","customer");
                        // return $res->render("/customer/customer","customer-dashboard");
                
                    }
                    else {
                        $req->session->set("user_id",$result->user_ID);
                        $req->session->set("authenticated",true);
                        $req->session->set("user_email",$result->email);
                        $req->session->set("user_role","driver");
                        return $res->render("/driver/driver","driver-dashboard");
                    
                }
                
                }
                else {
                    $req->session->set("user_id",$result->user_ID);
                    $req->session->set("authenticated",true);
                    $req->session->set("user_email",$result->email);
                    $req->session->set("user_role","vehicleowner");
                    return $res->render("/VehicleOwner/vehicleowner","vehicleOwner-dashboard");
                    
                }


                
            }
            else {
                $req->session->set("user_id",$result->user_ID);
                $req->session->set("authenticated",true);
                $req->session->set("user_email",$result->email);
                $req->session->set("user_role","owner");
                $ownerprofile = new owner();
                $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
                return $res->render("/admin/owner","owner-dashboard",layoutParams:['profile_img'=>$owner_img]);
                
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

}