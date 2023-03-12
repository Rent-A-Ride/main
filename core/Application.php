<?php

namespace app\core;

use app\models\Customer;
use app\models\driver;
use app\models\LoginForm;
use app\models\owner;
use app\models\vehicleowner;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?Controller $controller = null;

//    Customer
    public string $layout = 'main';
    public string $customerClass;
    public ?Customer $customer;
    public ?driver $driver;
    public ?vehicleowner $vehicleowner;
    public ?owner $owner;
    public ?dbModel $user;

    

    public static Application $app;

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    public static function Redirect($path): void
    {
        Application::$app->response->redirect($path);
    }


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function __construct($rootPath, array $config)
    {
        $this->customerClass = $config['customerClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
         $this->session = new Session();
        $this->router = new Router($this->request,$this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        $userType = $this->session->get('user_role');

        if ($userType === 'customer'){
            if ($primaryValue) {
                $primaryKey = $this->customerClass::primaryKey();
                $this->user = $this->customerClass::findOne([$primaryKey => $primaryValue ]);
            } else {
                $this->user = null;
            }
        }


    }

    public function run()
    {   
        try {
            echo $this->router->resolve();
        }catch (\Exception $e) {
            
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function login(dbModel $user, $user_type ): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        $this->session->set("user_role",$user_type);
        $this->session->set("authenticated",true);

        // var_dump($user);
        
//        if($user_type=='owner'){
//            $this->owner = $user;
//            $primaryValue = $this->owner->getuser_ID();
//            $this->session->set("user_role","owner");
//            $this->session->set("authenticated",true);
//            $this->session->set("user_id",$primaryValue);
//            // $this->session->set("user_email",$user['email']);
//        }
//        else if($user_type=='vehicleowner'){
//            $this->vehicleowner = $user;
//            $primaryKey=$this->vehicleowner->primaryKey();
//            $primaryValue = $this->vehicleowner->getvo_ID();
//            $this->session->set("user_role","vehicleowner");
//            $this->session->set("authenticated",true);
//            $this->session->set("user_id",$primaryValue);
//            // $this->session->set("user_email",$user['email']);
//        }
//        else if($user_type=='driver'){
//            $this->driver = $user;
//            $primaryValue = $user['user_ID'];
//            $this->session->set("user_role","owner");
//            $this->session->set("authenticated",true);
//            $this->session->set("user_id",$primaryValue);
//            // $this->session->set("user_email",$user['email']);
//        }
//        else{
//            $this->customer = $user;
//            $primaryValue = $this->customer->getcus_Id();
//            $this->session->set("user_role","customer");
//            $this->session->set("authenticated",true);
//            $this->session->set("user_id",$primaryValue);


            // $this->session->set("user_email",$user['email']);
//        }


        

        return true;

    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }


}