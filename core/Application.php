<?php

namespace app\core;

use app\models\Customer;
use app\models\driver;
use app\models\LoginForm;
use app\models\owner;
use app\models\vehicleowner;

use app\models\vehicle_Owner;

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
    public string $driverClass;
    public string $vehicleOwnerClass;
    public string $ownerClass;
    public ?Customer $customer;
    public ?driver $driver;
    public ?vehicleowner $vehicleowner;
    public ?owner $owner;
    public ?dbModel $user = null;

    

    public static Application $app;

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    public static function whoIsThis(): string
    {
        if(self::$app->user){
            return self::$app->user->tableName();
        }
        return "Guest";
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
        $this->driverClass = $config['driverClass'];
        $this->vehicleOwnerClass = $config['vehicleOwnerClass'];
        $this->ownerClass = $config['ownerClass'];
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
        elseif ($userType === 'vehicleowner'){
            if ($primaryValue) {
                $primaryKey = $this->vehicleOwnerClass::primaryKey();
                $this->user = $this->vehicleOwnerClass::findOne([$primaryKey => $primaryValue ]);
            } else {
                $this->user = null;
            }
        }
        elseif ($userType === 'driver'){
            if ($primaryValue) {
                $primaryKey = $this->driverClass::primaryKey();
                $this->user = $this->driverClass::findOne([$primaryKey => $primaryValue]);
            } else {
                $this->user = null;
            }
        }elseif ($userType === 'owner'){
            if ($primaryValue) {
                $primaryKey = $this->ownerClass::primaryKey();
                $this->user = $this->ownerClass::findOne([$primaryKey => $primaryValue]);
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

            if (is_int($e->getCode())){
                $this->response->setStatusCode($e->getCode());
            }
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
        
        // $primaryKey = $customer->primaryKey();
        // $primaryValue = $customer->{$primaryKey};
        // $this->session->set('customer', $primaryValue);


            // $this->session->set("user_email",$user['email']);
//        }




        return true;

    }

    public function logout()
    {
        $this->user = null;

        $this->session->remove('user');
        $this->session->remove('user_role');
        $this->session->remove('authenticated');
        session_regenerate_id(true);
    }


}