<?php

use app\controllers\AuthController;
use app\controllers\CustomerController;
use app\controllers\notificationController;
use app\controllers\SiteController;
use app\controllers\OwnerController;
use app\controllers\VehicleController;
use app\controllers\VehicleOwnerController;
use app\controllers\DriverController;
use app\core\Application;
use app\models\Customer;
use app\models\driver;
use app\models\Email\Email;
use app\models\owner;
use app\models\vehicle;
use app\models\vehicle_Owner;
use app\models\vehicleowner;


require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

 
$config = [
    'customerClass'=>Customer::class,
    'ownerClass'=>owner::class,
    'vehicleOwnerClass'=> vehicleowner::class,
    'driverClass'=> driver::class,
    'db'=> [
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ],
    'email'=>[
        'host'=>$_ENV['EMAIL_HOST'],
        'port'=>$_ENV['EMAIL_PORT'],
        'username'=>$_ENV['EMAIL_USERNAME'],
        'password'=>$_ENV['EMAIL_PASSWORD'],
        'encryption'=>$_ENV['EMAIL_ENCRYPTION'],
    ]
];

$app = new Application(dirname(__DIR__),$config);



$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/login', [AuthController::class, 'login']);
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


$app->router->get("/vehicleowner/vehicles", [VehicleOwnerController::class, "VehicleOwnerVehicle"]);

$app->router->get("/ownerProfile", [OwnerController::class, "ownerProfile"]);
$app->router->post("/ownerProfile", [OwnerController::class, "ownerProfile"]);

$app->router->get("/adminViewVehicleOwner", [OwnerController::class, "ViewVehicleOwnerProfile"]);

$app->router->get("/admin_customer", [OwnerController::class, "admin_Customer"]);

$app->router->get("/adminadd_vowner", [OwnerController::class, "admin_addVehicleOwner"]);
$app->router->post("/adminadd_vowner", [OwnerController::class, "admin_vehowner_accept"]);
$app->router->get("/admin/driver/driverProfile", [OwnerController::class, "ViewDriverProfile"]);


$app->router->get("/review", [DriverController::class, "view_reviews"]);

$app->router->get("/admin/OverView", [OwnerController::class, "ownerFirstPage"]);

$app->router->get("/admin/vehicle/add_vehicle", [OwnerController::class, "adminaddVehicle"]);
$app->router->post("/admin/vehicle/add_vehicle", [OwnerController::class, "admin_accept_vehicle"]);


$app->router->get("/admin/accept_vehicle", [OwnerController::class, "adminacceptedVehicle"]);
$app->router->get("/admin/vehicleComplaint", [OwnerController::class, "admin_vehicleComplaint"]);
$app->router->post("/admin/vehicleComplaint", [OwnerController::class, "admin_resolve_vehicleComplaint"]);
$app->router->get("/admin/driverComplaint", [OwnerController::class, "admin_driverComplaint"]);
$app->router->post("/admin/driverComplaint", [OwnerController::class, "admin_resolve_driverComplaint"]);
$app->router->get("/admin/license_Exp", [OwnerController::class, "admin_licenseExp"]);
$app->router->post("/admin/license_Exp", [OwnerController::class, "admin_license_exp_notification"]);

$app->router->post("/admin/vehicle/disable", [OwnerController::class, "admin_vehicle_disable"]);
$app->router->post("/admin/customer/disable", [OwnerController::class, "admin_customer_disable"]);
$app->router->post("/admin/vehicleowner/disable", [OwnerController::class, "admin_vehowner_disable"]);
$app->router->post("/admin/driver/disable", [OwnerController::class, "admin_driver_disable"]);

$app->router->get("/admin/vehicle/update", [OwnerController::class, "admin_updateVehicle"]);
$app->router->post("/admin/vehicle/update", [OwnerController::class, "admin_updateVehicle"]);

$app->router->post("/admin/vehicle_ins/update", [OwnerController::class, "admin_updateins"]);

$app->router->get("/admin/vehicle/disable_vehicle", [OwnerController::class, "admin_disableVehicle"]);
$app->router->post("/admin/vehicle/disable_vehicle", [OwnerController::class, "admin_disableVehicle"]);

$app->router->get("/admin/managepayment", [OwnerController::class, "manage_vehownerPayment"]);
$app->router->post("/admin/managepayment", [OwnerController::class, "manage_vehownerPayment"]);

$app->router->get("/admin/managedriverpayment", [OwnerController::class, "manage_driverPayment"]);
$app->router->post("/admin/managedriverpayment", [OwnerController::class, "manage_driverPayment"]);

$app->router->get("/admin/add-driver", [OwnerController::class, "add_driver"]);

$app->router->get("/admin/manageCustomerPayment", [OwnerController::class, "manage_customer_Payment"]);
$app->router->post("/admin/manageCustomerPayment", [OwnerController::class, "manage_customer_Payment"]);

$app->router->get("/admin/Settings", [OwnerController::class, "setting"]);
$app->router->post("/admin/Settings", [OwnerController::class, "setting"]);

$app->router->get("/admin/chart", [OwnerController::class, "test1"]);
$app->router->get("/admin/charts", [OwnerController::class, "test2"]);

$app->router->get("/admin/vehicleownerInvoice", [OwnerController::class, "vehowerInvoice"]);
$app->router->post("/admin/vehicleownerInvoice", [OwnerController::class, "vehowerInvoice"]);

$app->router->get("/admin/driverInvoice", [OwnerController::class, "driverInvoice"]);
$app->router->post("/admin/driverInvoice", [OwnerController::class, "driverInvoice"]);


//Hasantha
$app->router->post('/notifications', [notificationController::class, 'notification']);
$app->router->get('/notifications', [notificationController::class, 'notification']);

//update notification status
$app->router->get('/update-notification-status', [notificationController::class, 'updateNotificationStatus']);
$app->router->post('/update-notification-status', [notificationController::class, 'updateNotificationStatus']);


$app->router->get('/Customer/login', [AuthController::class, 'cus_login']);
$app->router->post('/Customer/login', [AuthController::class, 'cus_login']);

$app->router->get("/selectUserType", [AuthController::class, "selectuser"]);

$app->router->get("/Customer/Register", [AuthController::class, 'cus_register']);
$app->router->post("/Customer/Register", [AuthController::class, 'cus_register']);

$app->router->get("/Customer/Home", [CustomerController::class, 'home']);
$app->router->post("/Customer/Home", [CustomerController::class, 'home']);

$app->router->get("/Customer/Profile", [CustomerController::class, 'profile']);
$app->router->post("/Customer/Profile", [CustomerController::class, 'profile']);

$app->router->post("/upload", [SiteController::class, 'uploadImage']);

$app->router->get("/VehicleInfo", [CustomerController::class, 'vehicleInfo']);
$app->router->post("/VehicleInfo", [CustomerController::class, 'vehicleInfo']);

$app->router->get('/Customer/VehicleBooking', [CustomerController::class, 'VehicleBooking']);
$app->router->post('/Customer/VehicleBooking', [CustomerController::class, 'VehicleBooking']);

$app->router->get('/Customer/VehicleBookingTable', [CustomerController::class, 'vehicleBookingTable']);
$app->router->post('/Customer/VehicleBookingTable', [CustomerController::class, 'vehicleBookingTable']);

$app->router->get('/Customer/VehicleBookingTable/Active', [CustomerController::class, 'activeBookings']);
$app->router->post('/Customer/VehicleBookingTable/Active', [CustomerController::class, 'activeBookings']);

$app->router->get('/Customer/VehicleBookingTable/Complete', [CustomerController::class, 'completedBookings']);

$app->router->get('/Customer/Settings', [CustomerController::class, 'customerSettings']);
$app->router->post('/Customer/Settings', [CustomerController::class, 'customerSettings']);

$app->router->post("/cancelBooking", [CustomerController::class, 'cancelBooking']);

$app->router->get("/Customer/Payment", [CustomerController::class, 'customerPayment']);
$app->router->post("/Customer/Payment", [CustomerController::class, 'customerPayment']);

$app->router->get("/Customer/PaymentSuccess", [CustomerController::class, 'paymentSuccess']);
$app->router->post("/Customer/PaymentSuccess", [CustomerController::class, 'paymentSuccess']);

$app->router->get("/Customer/Complaints", [CustomerController::class, 'customerComplaint']);
$app->router->post("/Customer/Complaints", [CustomerController::class, 'customerComplaint']);










// view customer Pending requests
$app->router->get("/CustomerPendingRequest", [VehicleOwnerController::class, 'viewCustomerPendingRequests']);
$app->router->post("/CustomerPendingRequest", [VehicleOwnerController::class, 'viewCustomerPendingRequests']);

// view customer Accepted requests
$app->router->get("/CustomerAcceptedRequest", [VehicleOwnerController::class, 'viewCustomerAcceptedRequests']);

// view customer Rejected requests
$app->router->get("/CustomerRejectedRequest", [VehicleOwnerController::class, 'viewCustomerRejectedRequests']);


//// Vehicle Owner
//$app->router->get("/vehicleOwner/Profile", [VehicleOwnerController::class, 'vehownerViewProfile']);
//$app->router->post("/vehicleOwner/Profile", [VehicleOwnerController::class, 'vehownerViewProfile']);


//Tharundya

$app->router->get("/driver/driver_profile", [DriverController::class, 'driverViewProfile']);
$app->router->post("/driver/driver_profile", [DriverController::class, 'driverViewProfile']);
$app->router->get("/driver/editprofile", [DriverController::class, 'driverEditProfile']);

$app->router->get("/driver/review", [DriverController::class, 'driverViewReview']);

$app->router->get("/driver/requests", [DriverController::class, 'driverViewRequests']);
$app->router->get("/driver/driver_AcceptedRequest", [DriverController::class, 'driverViewAcceptRequests']);
$app->router->get("/driver/driver_RejectedRequests", [DriverController::class, 'driverViewRejectRequests']);


$app->router->post("/driver/requests", [DriverController::class, 'driverViewRequests']);
$app->router->get("/driver/payments", [DriverController::class, 'driverViewPayments']);


$app->router->get("/Driver/Register", [AuthController::class, 'getDriverRegistration']);
$app->router->post("/Driver/Register", [AuthController::class, 'getDriverRegistration']);


//Buddhi -VO

$app->router->get("/vehicleOwner/Profile", [VehicleOwnerController::class, 'vehownerViewProfile']);
$app->router->post("/vehicleOwner/Profile", [VehicleOwnerController::class, 'vehownerViewProfile']);

//$app->router->get("/vehicleOwner/Register", [AuthController::class, 'vehOwnerRegistration']);
//$app->router->post("/vehicleOwner/Register", [AuthController::class, 'vehOwnerRegistration']);


$app->router->get("/vehicleOwner/editProfile", [VehicleOwnerController::class, 'getEditProfile']);

$app->router->get("/vehicleOwner/Payments", [VehicleOwnerController::class, 'getPayments']);

$app->router->get("/vehicleOwner/completeAddNewVehicle", [VehicleOwnerController::class, 'completeAddNewVehicle']);

//$app->router->get("/vehicleOwner/viewVehicleProfile", [VehicleOwnerController::class, 'vehownerVehicleProfile']);

$app->router->get("/vehicleOwner/UpdateVehicle", [VehicleOwnerController::class, 'vehownerUpdateVehicle']);
$app->router->post("/vehicleOwner/UpdateVehicle", [VehicleOwnerController::class, 'vehownerUpdateVehicle']);

$app->router->post("/vehicleOwner/acceptBooking", [VehicleOwnerController::class, 'acceptBooking']);

//Vehicle Owner Registration
$app->router->get("/vehicleOwner/Register", [AuthController::class, 'VO_register']);
$app->router->post("/vehicleOwner/Register", [AuthController::class, 'VO_register']);
$app->router->get("/Customer/ExpieringNotification", [VehicleOwnerController::class, 'expier_notification']);

//vehicle owner add new vehicle
$app->router->get("/vehicleOwner/addNewVehicle", [VehicleOwnerController::class, 'addNewVehicle']);
$app->router->post("/vehicleOwner/addNewVehicle", [VehicleOwnerController::class, 'addNewVehicle']);

//vehicle owner booking calendar
$app->router->get("/vehicleOwner/bookingCalendar", [VehicleOwnerController::class, 'bookingCalendar']);
$app->router->post("/vehicleOwner/bookingCalendar", [VehicleOwnerController::class, 'bookingCalendar']);
$app->router->get("/Customer/ExpieringNotification", [VehicleOwnerController::class, 'expier_notification']);




//vehicle owner view vehicle profile
$app->router->get("/vehicleOwner/viewVehicleProfile", [VehicleOwnerController::class, 'VehicleProfile']);


//vehicle owner edit vehicle profile details
$app->router->get("/vehicleOwner/editVehicleProfile", [VehicleOwnerController::class, 'editVehicleProfile']);
$app->router->post("/vehicleOwner/editVehicleProfile", [VehicleOwnerController::class, 'editVehicleProfile']);

$app->router->get("/driver/availability", [DriverController::class, 'driverAvailability']);

$app->run();

