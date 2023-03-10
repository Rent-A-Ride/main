<?php

namespace app\core;

use app\models\Customer;

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

    

    public static Application $app;

    public static function isGuest(): bool
    {
        return !self::$app->customer;
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

        $primaryValue = $this->session->get('customer');
        if ($primaryValue) {
            $primaryKey = $this->customerClass::primaryKey();
            $this->customer = $this->customerClass::findOne([$primaryKey => $primaryValue ]);
        } else {
            $this->customer = null;
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

    public function login(dbModel $customer): bool
    {
        $this->customer = $customer;
        $primaryKey = $customer->primaryKey();
        $primaryValue = $customer->{$primaryKey};
        $this->session->set('customer', $primaryValue);

        return true;

    }

    public function logout()
    {
        $this->customer = null;
        $this->session->remove('customer');
    }


}