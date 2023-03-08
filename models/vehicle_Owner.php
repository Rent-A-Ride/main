<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Request;
use app\core\Response;
use app\core\Database;



class vehicle_Owner extends dbModel
{
    protected string $Owner_Nic = '';
    protected string $owner_Fname;
    protected string $owner_Lname;
    protected string $owner_area = '';
    protected string $owner_address;
    protected string $phone_No;
    protected string $gender = '';
    protected string $email = '';
    protected string $license_No ;

    // private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


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

    public function vehicle_Owner_login($user_id)
    {
        $sql = "SELECT * FROM vehicleowner WHERE user_ID=:user_id";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':user_id',$user_id);
        $statement->execute();
        $vehicleowner= $statement->fetchObject();
        if(!$vehicleowner){
            $errors['vehicleowner'] = 'Email does not have vehicle owner account';
        }

        if (empty($errors)){
            return $vehicleowner;
        }
        else {
            return $errors;
        }
                

    }

    public function getVehicleowner(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner INNER JOIN users WHERE vehicleowner.user_ID=users.user_ID AND vehicleowner.admin_approved=1 ")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function Vehicleowner_profile($user_id){
    
        return Application::$app->db->pdo->query("SELECT * FROM users INNER JOIN vehicleowner where vehicleowner.user_ID=$user_id AND users.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getnotApprovedVehicleowner(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner INNER JOIN users WHERE vehicleowner.user_ID=users.user_ID AND vehicleowner.admin_approved=0 ")->fetchAll(\PDO::FETCH_ASSOC);

    }


    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vehicleowner';
    }

    public function attributes(): array
    {
        //return the above created properties
        return ['Owner_nic', 'owner_Fname', 'owner_Lname', 'owner_area', 'owner_address', 'phone_No', 'gender', 'email'];
    }

    public static function primaryKey(): string
    {
        return 'Owner_nic';
    }

    /**
     * @return string
     */
    public function getOwnerNic(): string
    {
        return $this->Owner_Nic;
    }

    /**
     * @param string $Owner_Nic
     */
    public function setOwnerNic(string $Owner_Nic): void
    {
        $this->Owner_Nic = $Owner_Nic;
    }

    /**
     * @return string
     */
    public function getOwnerFname(): string
    {
        return $this->owner_Fname;
    }

    /**
     * @param string $owner_Fname
     */
    public function setOwnerFname(string $owner_Fname): void
    {
        $this->owner_Fname = $owner_Fname;
    }

    /**
     * @return string
     */
    public function getOwnerLname(): string
    {
        return $this->owner_Lname;
    }

    /**
     * @param string $owner_Lname
     */
    public function setOwnerLname(string $owner_Lname): void
    {
        $this->owner_Lname = $owner_Lname;
    }

    /**
     * @return string
     */
    public function getOwnerArea(): string
    {
        return $this->owner_area;
    }

    /**
     * @param string $owner_area
     */
    public function setOwnerArea(string $owner_area): void
    {
        $this->owner_area = $owner_area;
    }

    /**
     * @return string
     */
    public function getOwnerAddress(): string
    {
        return $this->owner_address;
    }

    /**
     * @param string $owner_address
     */
    public function setOwnerAddress(string $owner_address): void
    {
        $this->owner_address = $owner_address;
    }

    /**
     * @return string
     */
    public function getPhoneNo(): string
    {
        return $this->phone_No;
    }

    /**
     * @param string $phone_No
     */
    public function setPhoneNo(string $phone_No): void
    {
        $this->phone_No = $phone_No;
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

}