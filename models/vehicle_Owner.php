<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Request;
use app\core\Response;
use app\core\Database;



class vehicle_Owner extends dbModel
{
    protected string $vo_ID = '';
    protected string $Nic = '';
    protected string $owner_Fname;
    protected string $owner_Lname;
    protected string $owner_area = '';
    protected string $owner_address;
    protected string $phone_No;
    protected string $gender = '';
    protected string $email = '';
    protected string $license_No ;
    protected string $password = '';
    public string $passwordConfirm = '';
    protected string $profile_pic = '';


    // private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


    }



    public function vehicle_Owner_login($email)
    {
        $sql = "SELECT * FROM vehicleowner WHERE email=:email";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':email',$email);
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

    /**
     * @return string
     */
    public function getVoID(): string
    {
        return $this->vo_ID;
    }

    /**
     * @param string $vo_ID
     */
    public function setVoID(string $vo_ID): void
    {
        $this->vo_ID = $vo_ID;
    }



    public function getVehicleowner(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner WHERE vehicleowner.admin_approved=1 ")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function Vehicleowner_profile($user_id){
    
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner where vehicleowner.vo_ID=$user_id ")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getnotApprovedVehicleowner(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner WHERE vehicleowner.admin_approved=0 ")->fetchAll(\PDO::FETCH_ASSOC);

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
        return ['Nic', 'owner_Fname', 'owner_Lname', 'owner_address', 'phone_No', 'gender', 'email', 'password'];
    }

    public static function primaryKey(): string
    {
        return 'vo_ID';
    }

    /**
     * @return string
     */
    public function getNic(): string
    {
        return $this->Nic;
    }

    /**
     * @param string $Nic
     */
    public function setNic(string $Nic): void
    {
        $this->Nic = $Nic;
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
    public function getProfilePic(): string
    {
        return $this->profile_pic;
    }

    /**
     * @param string $profile_pic
     */
    public function setProfilePic(string $profile_pic): void
    {
        $this->profile_pic = $profile_pic;
    }


    public function veh(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner")->fetchAll(\PDO::FETCH_ASSOC);
    }



}