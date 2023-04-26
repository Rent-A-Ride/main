<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;
use app\core\dbModel;



class driver extends dbModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public string $nic = '';
    public string $driver_Fname;
    public string $driver_Lname;
    public string $email;
    public string $phone_No;
    public string $gender = '';
    public string $driver_address;

    public string $driver_area;

    public string $license_No;
    public string $password;
    public string $passwordConfirm = '';
    public string $profile_pic='';
    public int $status = self::STATUS_INACTIVE;
    // private \PDO $pdo;
    private array $body;

    public static function tableName(): string
    {
        return 'driver';
    }

    public static function primaryKey():string
    {
        return 'driver_ID';
    }

    public function save(): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function __construct(array $registerBody=[])
    {
        
        $this->body= $registerBody;


    }

    public function rules(): array
    {
        return [
            'nic' => [self::RULE_REQUIRED],
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'phoneno' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'gender' => [self::RULE_REQUIRED],
            'address' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['nic', 'firstname', 'lastname', 'email', 'phoneno', 'gender', 'address', 'password', 'status'];
    }

    // public function login():array|object
    // {
    //     $errors = [];
    //     $owner = null;

    //     if (!filter_var($this->body['email'],FILTER_VALIDATE_EMAIL))
    //     {
    //         $errors['email'] = 'Email must be a valid email address';
    //     }
    //     else {
    //         $sql = "SELECT * FROM users WHERE email=:email";
    //         $statement = $this->pdo->prepare($sql);
    //         $statement->bindValue(':email',$this->body["email"]);

    //         $statement->execute();
    //         $owner= $statement->fetchObject();
    //         if(!$owner){
    //             $errors['email'] = 'Email does not exsits, please create an account';
    //         }
    //         elseif (!password_verify($this->body['password'],$owner->password))
    //         {
    //             $errors['password']='Password is incorrect';
    //         }



    //     }
    //     if (empty($errors)){
    //         return $owner;
    //     }
    //     return $errors;
        
    // }

    public function driver_login($email)
    {
        $sql = "SELECT * FROM driver WHERE driver.email=:email";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':email',$email);
        $statement->execute();
        $driver= $statement->fetchObject();
        if(!$driver){
            $errors['driver'] = 'Email does not have driver account';
        }

        if (empty($errors)){
            return $driver;
        }
        else {
            return $errors;
        }
                

    }

    public function getDriver(){
        return Application::$app->db->pdo->query("SELECT * FROM driver WHERE driver.admin_approved=1")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function acceptRequests($user_id){
        $sql="UPDATE driver_requests SET accept =1 WHERE reservation_id = $user_id";
        Application::$app->db->pdo->query($sql)->execute();
    }

    public function rejectRequests($user_id){
        $sql="UPDATE driver_requests SET accept =2 WHERE reservation_id = $user_id";
        Application::$app->db->pdo->query($sql)->execute();
    }

    public function getDriverbyId($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM driver WHERE driver.driver_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function updateDriver($user_id){

        try {
            $stmt = Application::$app->db->pdo->prepare("UPDATE 
            driver 
            SET 
            driver_Fname = :f_name, 
            driver_Lname = :l_name,
            driver_address = :address,
            phone_No= :contact_no WHERE driver_ID = :driver_id");
            $stmt->bindValue(":driver_id", $user_id);
            $stmt->bindValue(":f_name", $this->body['firstname']);
            $stmt->bindValue(":l_name", $this->body['lastname']);
            $stmt->bindValue(":address", $this->body['address']);
            $stmt->bindValue(":contact_no", $this->body['phone']);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            return $e->getMessage();
            //throw $th;
        }

    }

    // public function getreviews($user_id){
    //     return Application::$app->db->pdo->query("SELECT * FROM driver_reviews where driver.Id=$user_Id")->fetchAll(\PDO::FETCH_ASSOC);
    // }

    public  function admindisabledriver($driver_id){
        $availability=0;
        // var_dump($vehicle_id);
        $query1="UPDATE driver SET admin_approved =:availability WHERE driver_ID=$driver_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":availability",$availability);
        $statement1->execute();
    }
    

    

    public function getrequest($user_id){
        // var_dump($user_id);
        return Application::$app->db->pdo->query("SELECT * FROM driver_requests INNER JOIN users WHERE driver_requests.user_ID=$user_id AND users.user_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getReviews($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM drivers_reviews INNER JOIN users WHERE drivers_reviews.user_ID=$user_id AND users.user_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function avgReviews($user_id){
        return Application::$app->db->pdo->query("SELECT AVG(points) as Average FROM drivers_reviews WHERE drivers_reviews.user_ID=$user_id")->fetch(\PDO::FETCH_ASSOC);
    }

    public function getPayments($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM drivers_invoice INNER JOIN users WHERE drivers_invoice.user_ID=$user_id AND users.user_ID=$user_id ORDER BY invoice_no DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    

}