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
    // private \PDO $pdo;
    private array $body;
    public string $driver_ID;
    public string $Nic;
    public string $driver_Fname;
    public string $driver_Lname;
    public string $email;
    public string $phoneNo;
    public string $license_No;
    public string $area;
    public string $address;
    public string $gender;
    public string $status;
    public string $admin_approved;
    public string $password;
    public string $category;
    public string $profile_pic;
    public int $status;
//    public string $profile_pic;


    public function __construct(array $registerBody=[])
    {
        
        $this->body= $registerBody;


    }
    public static function tableName(): string
    {
        return 'driver';
    }

    public static function primaryKey():string
    {
        return 'driver_ID';
    }

    public function rules(): array
    {
        return [];
    }
    public function attributes(): array
    {
        return ['Nic','driver_Fname','driver_Lname','email','phoneNo','area','address','gender','admin_approved','password', 'profile_pic', 'license_No', 'status','category'];
    }

    public function displayName(): string
    {
        return $this->driver_Fname.' '.$this->driver_Lname;
    }

    public function userProfile(string $data)
    {
        return $this->$data;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
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
    public function getaddDriver(){
        return Application::$app->db->pdo->query("SELECT * FROM driver WHERE driver.admin_approved=0")->fetchAll(\PDO::FETCH_ASSOC);

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
        return Application::$app->db->pdo->query("SELECT * FROM driver_requests INNER JOIN driver WHERE driver_requests.driver_ID=$user_id AND driver.driver_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getReviews($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM drivers_reviews INNER JOIN users WHERE drivers_reviews.user_ID=$user_id AND users.user_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function avgReviews($user_id){
        return Application::$app->db->pdo->query("SELECT AVG(points) as Average FROM drivers_reviews WHERE drivers_reviews.user_ID=$user_id")->fetch(\PDO::FETCH_ASSOC);
    }

    // public function getPayments($user_id){
    //     return Application::$app->db->pdo->query("SELECT * FROM  INNER JOIN users WHERE drivers_invoice.user_ID=$user_id AND users.user_ID=$user_id ORDER BY invoice_no DESC")->fetchAll(\PDO::FETCH_ASSOC);
    // }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param array $body
     */
    public function setBody(array $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getDriverId(): string
    {
        return $this->driver_ID;
    }

    /**
     * @param string $driver_id
     */
    public function setDriverId(string $driver_id): void
    {
        $this->driver_ID = $driver_id;
    }

    /**
     * @return string
     */
    public function getDriverFname(): string
    {
        return $this->driver_Fname;
    }

    /**
     * @param string $driver_Fname
     */
    public function setDriverFname(string $driver_Fname): void
    {
        $this->driver_Fname = $driver_Fname;
    }

    /**
     * @return string
     */
    public function getDriverLname(): string
    {
        return $this->driver_Lname;
    }

    /**
     * @param string $driver_Lname
     */
    public function setDriverLname(string $driver_Lname): void
    {
        $this->driver_Lname = $driver_Lname;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $area
     */
    public function setArea(string $area): void
    {
        $this->area = $area;
    }

    /**
     * @return string
     */
    public function getDriverAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $driver_address
     */
    public function setDriverAddress(string $driver_address): void
    {
        $this->address = $driver_address;
    }

    /**
     * @return string
     */
    public function getPhoneNo(): string
    {
        return $this->phoneNo;
    }

    /**
     * @param string $phoneNo
     */
    public function setPhoneNo(string $phoneNo): void
    {
        $this->phoneNo = $phoneNo;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getLicenseNo(): string
    {
        return $this->license_No;
    }

    /**
     * @param string $license_No
     */
    public function setLicenseNo(string $license_No): void
    {
        $this->license_No = $license_No;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getProfile(): string
    {
        return $this->profile_pic;
    }


    /**
     * @param string $password
     */
    public function setProfile(string $profile_pic): void
    {
        $this->profile_pic = $profile_pic;
    }

     /**
     * @return string
     */
    public function getStatus(): int
    {
        return $this->status;
    }


    /**
     * @param string $password
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getdriverCount(){
        return Application::$app->db->pdo->query("SELECT COUNT(driver_ID) As driver_count FROM driver")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getrejectrequest($user_id){
        $user_id=intval($user_id);
        return Application::$app->db->pdo->query("SELECT * FROM driver_requests INNER JOIN driver WHERE driver_requests.driver_ID=driver.driver_ID AND driver.driver_ID=$user_id AND driver_requests.accept=2 ORDER BY driver_requests.reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function UpdateProfile($body,$driver_id){
        
        $fname=$body['firstname'];
        $lname=$body['lastname'];
        $phoneNo=$body['phoneNo'];
        $address=$body['address'];
        $area=$body['area'];
        // var_dump($vehicle_id);
        $query1="UPDATE driver SET driver_Fname=:firstname,driver_Lname=:lastname,phoneNo=:phoneNO, area=:area, `address`=:addres WHERE driver_ID=$driver_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":firstname",$fname);
        $statement1->bindValue(":lastname",$lname);
        $statement1->bindValue(":phoneNO",$phoneNo);
        $statement1->bindValue(":addres",$address);
        $statement1->bindValue(":area", $area);
        $statement1->execute();
    }
    

}