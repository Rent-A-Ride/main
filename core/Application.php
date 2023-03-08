<?php

namespace app\core;

use app\models\vehicle_Owner;

class Application
{
    public static string $ROOT_DIR;
    public string $layout = 'vehicleOwner-dashboard';

    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?Controller $controller = null;
    public ?dbModel $vehicleOwner;

    public static Application $app;
    

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
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
//         $this->session = new Session();
        $this->router = new Router($this->request,$this->response);
        $this->db = new Database($config['db']);

    }

    public function run()
    {
        echo $this->router->resolve();
    }

}