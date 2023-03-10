<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Customer;
use app\models\LoginForm;
use app\models\RegisterModel;
use app\core\Session;
use app\models\adminCustomer;
use app\models\driver;
use app\models\owner;
use app\models\user;
use app\models\vehicle_Owner;
use app\models\vehicleowner;

class AuthController extends Controller
{
    // public function login_form(Request $req, Response $res)
    // {
    //     // $params = [
    //     //     'name' => "Rent A Ride"
    //     // ];
    //     // $this->setLayout('home');
    //     // return $this->render('HomePage');
    //     return $res->render('login','main_1');
    // }

//    public function register(Request $request)
//    {
//        $registerModel = new RegisterModel();
//        if ($request->isPost()){
//
//            $registerModel->loadData($request->getBody());
//
//            if ($registerModel->validate() && $registerModel->register()){
//                return 'Success';
//            }
//
//            return $this->render('register', [
//                'model' => $registerModel
//            ]);
//        }
//        $this->setLayout('auth');
//        return $this->render('register', [
//            'model' => $registerModel
//        ]);
//    }



    public function login(Request $req, Response $res){
        $login = new LoginForm();


        if($req->isPost()){
            $body=$req->getBody();
            // var_dump($body);
            $login->loadData($body);
            if($login->validate()){
                $user = $login->login($body['user_type']);

                if(!$user){
                    $res->redirect('/login');
                }
                if($user === true){
                    if($body['user_type']=='owner'){
                        $res->redirect('/owner');
                    }
                    else if($body['user_type']=='vehicleowner'){
                        $res->redirect('/vehicleOwner/Profile');
                    }
                    else if($body['user_type']=='driver'){
                        $res->redirect('/driver/Profile');
                    }
                    else if ($body['user_type']=='customer'){
                        return Application::Redirect('/Customer/Home');
                    }

                }
            }

        }

        $this->setLayout('main_1');
        return $this->render('login', [
            'model' => $login
        ]);

    }
    public function logout(Request $req, Response $res){
           Application::$app->logout();
           return $res->redirect("/");
    }

    public function selectuser(Request $req, Response $res){
        return $res->render('selectUserType','main_1');
    }

//    Customer
    public function cus_register(Request $request,Response $response)
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
//        $this->setLayout('main');
        return $response->render('Customer/v_Register','cusAuth', [
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

//     public function cus_login(Request $request, Response $response)
//     {
//         $cuslogin = new LoginForm();
//         if ($request->isPost()){
//             $cuslogin->loadData($request->getBody());
// //            echo '<pre>';
// //            var_dump($cuslogin->cuslogin());
// //            echo '</pre>';
// //            exit();
//             if ($cuslogin->validate() && $cuslogin->cuslogin()) {
//                 $response->redirect('/Customer/Home');
//                 return;
//             }
//         }
//         $this->setLayout('auth');
//         return $this->render('Customer/v_login', [
//             'model' => $cuslogin
//         ]);
//     }

    public function cus_logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
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