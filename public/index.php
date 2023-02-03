<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\OwnerController;
use app\controllers\VehicleController;
use app\controllers\VehicleOwnerController;
use app\core\Application;


require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

 
$config = [
    'db'=> [
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__),$config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/login', [AuthController::class, 'login_form']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

//admin functionalities
$app->router->get("/owner", [OwnerController::class, "ownerFirstPage"]);

$app->router->get("/admin-vehicle", [OwnerController::class, "ownerVehicle"]);

$app->router->get("/logout", [AuthController::class, "adminLogout"]);
$app->router->post("/logout", [AuthController::class, "adminLogout"]);

$app->router->get("/add-vehicle", [VehicleController::class, "add_VehiclePage"]);
$app->router->post("/add-vehicle", [VehicleController::class, "owneraddVehicle"]);

$app->router->get("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);
$app->router->post("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);

$app->router->get("/viewVehicleowner", [OwnerController::class, "ownerVehicleOwner"]);

$app->router->get("/viewownerDriver", [OwnerController::class, "ownerDriver"]);


$app->router->get("/vehicleowner_vehicle", [VehicleOwnerController::class, "VehicleOwnerVehicle"]);

$app->router->get("/ownerProfile", [OwnerController::class, "ownerProfile"]);

$app->router->get("/adminViewVehicleOwner", [OwnerController::class, "ViewVehicleOwnerProfile"]);

$app->router->get("/admin_customer", [OwnerController::class, "admin_Customer"]);

$app->router->get("/adminadd_vowner", [OwnerController::class, "admin_addVehicleOwner"]);




$app->run();