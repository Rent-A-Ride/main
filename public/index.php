<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\OwnerController;
use app\controllers\VehicleController;
use app\controllers\VehicleOwnerController;
use app\controllers\DriverController;
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

$app->router->get("/logout", [AuthController::class, "logout"]);
$app->router->post("/logout", [AuthController::class, "logout"]);

$app->router->get("/vehicleOwner/add-vehicle", [VehicleController::class, "add_VehiclePage"]);
$app->router->post("/vehicleOwner/add-vehicle", [VehicleController::class, "vehowneraddVehicle"]);

$app->router->get("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);
$app->router->post("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);

$app->router->get("/viewVehicleowner", [OwnerController::class, "ownerVehicleOwner"]);

$app->router->get("/viewownerDriver", [OwnerController::class, "ownerDriver"]);


$app->router->get("/vehicleowner_vehicle", [VehicleOwnerController::class, "VehicleOwnerVehicle"]);

$app->router->get("/ownerProfile", [OwnerController::class, "ownerProfile"]);

$app->router->get("/adminViewVehicleOwner", [OwnerController::class, "ViewVehicleOwnerProfile"]);

$app->router->get("/admin_customer", [OwnerController::class, "admin_Customer"]);

$app->router->get("/adminadd_vowner", [OwnerController::class, "admin_addVehicleOwner"]);

$app->router->get("/admin/driver/driverProfile", [OwnerController::class, "ViewDriverProfile"]);


$app->router->get("/review", [DriverController::class, "view_reviews"]);

$app->router->get("/admin/OverView", [OwnerController::class, "ownerFirstPage"]);

$app->router->get("/admin/vehicle/add_vehicle", [OwnerController::class, "adminaddVehicle"]);


$app->router->get("/admin/accept_vehicle", [OwnerController::class, "adminacceptedVehicle"]);
//Hasantha

$app->router->get("/selectUserType", [AuthController::class, "selectuser"]);

$app->router->get("/Customer/Register", [AuthController::class, 'cusRegister']);
$app->router->post("/Customer/Register", [AuthController::class, 'cusRegister']);



































//Tharundya

$app->router->get("/driver/driver_profile", [DriverController::class, 'driverViewProfile']);
$app->router->get("/driver/editprofile", [DriverController::class, 'driverEditProfile']);

$app->router->get("/driver/review", [DriverController::class, 'driverViewReview']);

$app->router->get("/driver/requests", [DriverController::class, 'driverViewRequests']);

$app->router->get("/Driver/Register", [AuthController::class, 'getDriverRegistration']);
$app->router->post("/Driver/Register", [AuthController::class, 'getDriverRegistration']);




$app->router->get("/vehicleOwner/Profile", [VehicleOwnerController::class, 'vehownerViewProfile']);

$app->router->get("/vehicleOwner/Register", [AuthController::class, 'vehOwnerRegistration']);
$app->router->post("/vehicleOwner/Register", [AuthController::class, 'vehOwnerRegistration']);


$app->router->get("/vehicleOwner/editProfile", [VehicleOwnerController::class, 'getEditProfile']);

$app->router->get("/vehicleOwner/Payments", [VehicleOwnerController::class, 'getPayments']);

$app->router->get("/vehicleOwner/completeAddNewVehicle", [VehicleOwnerController::class, 'completeAddNewVehicle']);

$app->router->get("/vehicleOwner/viewVehicleProfile", [VehicleOwnerController::class, 'vehownerVehicleProfile']);

$app->router->get("/vehicleOwner/UpdateVehicle", [VehicleOwnerController::class, 'vehownerUpdateVehicle']);



$app->run();