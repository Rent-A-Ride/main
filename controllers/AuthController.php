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
use app\models\customer_verification;
use app\models\driver;
use app\models\owner;
use app\models\user;
use app\models\vehicle_Owner;
use app\models\vehicleowner;
use app\models\vehicleOwnerRegister;
use Exception;

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
                Application::$app->session->setFlash('success', 'Registration Successfully!');
                $response->redirect("/login");
                exit();

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




    public function login(Request $req, Response $res){
        $login = new LoginForm();


        if($req->isPost()){
            $body=$req->getBody();
            // var_dump($body);
            $login->loadData($body);
            if($login->validate()){
                $user = $login->login($body['user_type']);
                if($user === true){
                    if($body['user_type']=='owner'){
                        $res->redirect('/owner');
                    }
                    else if($body['user_type']=='vehicleowner'){
                        Application::Redirect('/vehicleowner/vehicles');
                    }
                    else if($body['user_type']=='driver'){
                        $res->redirect('/driver/driver_profile');
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

            if ($request->getBody()['nic']){
                    $customer->setGender($this->setGenderFromNIC($customer->getNic()));
            }
            if ($customer->validate() && $customer->save()){
                $email=$customer->getEmail();
                $name=$customer->getFirstname().''.$customer->getLastname();
                $customer->setEmail($email);
                $cus=$customer->findOne(['email'=>$email]);
                
                $cus_id=$cus->cus_Id;
                $code = rand(100000, 999999);
                $subject = "Verification Code";
                $msg = "Hi".' '.$name.'<br>'.'Thanks For Register Our System <br>'.'Your verification code is:'.' '.$code;
                
                $emailData = [
                    'email' => $email,
                    'subject' => $subject,
                    'body' => $msg
                ];

                try {
                   Application::$app->email->sendEmail($emailData);
                } catch ( Exception $e) {
                    echo $e->getMessage();
                }

                $emailv=new customer_verification;
                $emailv->setCusId($cus_id);
                $emailv->setCode($code);
               
                if ($emailv->save()) {
                    $customere =[
                        'email'=>$email
                    ];
                    
                    
                    
                    $this->setLayout("emailVerify");
                    return $this->render("/component/verifyEmail",['email'=>$customere,'model'=>$emailv]);

                }

                 $response->redirect("/user/verifyEmail");
                // ->session->setFlash('success', 'Registration Successfully!');
                // Application::$app->session->setFlash('success', 'Registration Successfully!');
                // Application::$app->response->redirect('/login');
                // $response->redirect("/login");
                // exit();
            }


            return $response->render('Customer/v_Register','auth-reg', [
                'model' => $customer
            ]);
        }
//        $this->setLayout('main');
        return $response->render('Customer/v_Register','auth-reg', [
            'model' => $customer
        ]);
    }

    public function getDriverRegistration(Request $req, Response $res){
        // return $res->render("/driver/driver_registration","main_2");
        $driver = new driver();

        if ($req->isPost()){
            $body=$req->getBody();
            
            $img_name = $_FILES['license']['name'];
            $unique_id = 'd'.uniqid().$body['driver_Fname'];
            $destination_image = Application::$ROOT_DIR.'/public/assets/img/driver/';
            if($img_name) {
                $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_new_name = $unique_id . '.' . $img_ext;
                move_uploaded_file($_FILES['license']['tmp_name'], $destination_image . $img_new_name);
                $body['license_scan_copy']=$img_new_name;
            }
            $driver->loadData($body);

            if ($driver->validate() && $driver->save()){

                    // ->session->setFlash('success', 'Registration Successfully!');
                    Application::$app->session->setFlash('success', 'Registration Successfully!');
                    // Application::$app->response->redirect('/login');
                    $res->redirect("/login");
                    exit();

            }

            return $res->render('/driver/driver_registration','main_2', [
                'model' => $driver
            ]);
        }

        return $res->render('/driver/driver_registration','main_2', [
            'model' => $driver
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

    public function setGenderFromNIC($NIC)
    {
        $nic=trim($NIC);
        if (!empty($nic)) {
            if (preg_match('/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/', $nic)) {
                if (strlen($nic) === 10) {
                    if ($nic[2] < 5) {
                        return "male";
                    } else {
                        return "female";
                    }
                } else {
                    if ($nic[4] < 5):
                        return "male";
                    else:
                        return "female";
                    endif;
                }
            }
        }
    }

    public function verifyEmail(Request    $req, Response $res){
        $customer = new Customer();
        $emaiv = new customer_verification();
        if ($req->isPost()) {
            $body=$req->getBody();
            $email=$body['email'];
            $digit1=$body['digit1'];
            $digit2=$body['digit2'];
            $digit3=$body['digit3'];
            $digit4=$body['digit4'];
            $digit5=$body['digit5'];
            $digit6=$body['digit6'];
            $code=$digit1.$digit2.$digit3.$digit4.$digit5.$digit6;
            $customer->setEmail($email);
            $cus=$customer->findOne(['email'=>$email]);
            $emaiv->setCusId($cus->cus_Id);
            $cus_id=$cus->cus_Id;
            $verify=$emaiv->findOne(['cus_Id'=>$cus_id]);
            // var_dump($verify->cus_code==$code);
            // exit;
            if ($verify->cus_code==$code) {
                $customer->UpdateStatus($cus_id);
                Application::$app->session->setFlash('success', 'Registration Successfully!');
                $res->redirect("/login");
                // exit();
            }
            else {
                
                $a=[
                    'email'=>$email
                ];
                
                $emaiv->addError('unmatched',"Otp code does't matched!");
                $this->setLayout("emailVerify");
                return $this->render("/component/verifyEmail",['email'=>$a,'model'=>$emaiv]);
            }


            
        }
        // else{
            // $cus_id=$_GET['id'];
            // $customer->setcus_Id($cus_id);
            // $cus=$customer->findOne(['cus_Id'=>$cus_id]);
            // $email=$cus->email;
            // $this->setLayout("emailVerify");
            // return $this->render("/component/verifyEmail",['email'=>$email]);
        // }

    }
}