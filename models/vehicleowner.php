<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Model;

class vehicleowner extends dbModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public string $Nic;
    public int $vo_ID;
    public string $owner_Fname;
    public string $owner_Lname;
//    public string $owner_area;
    public string $owner_address;
    public string $phone_No;
//    public string $license_No= '';
    public string $email = '';
    public string $gender = '';
     public string $password;
     public string $passwordConfirm;
    public ?string $profile_pic = '';



    public static function tableName(): string
    {
        return 'vehicleowner';
    }

    public static function primaryKey():string
    {
        return 'vo_ID';
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'Nic' => [self::RULE_REQUIRED],
            'owner_Fname' => [self::RULE_REQUIRED],
            'owner_Lname' => [self::RULE_REQUIRED],
//            'owner_area' => [self::RULE_REQUIRED],
            'owner_address' => [self::RULE_REQUIRED],
//            'phone_No' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
//                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
//            ]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
//            'license_No' => [self::RULE_REQUIRED],
            
            'gender' => [self::RULE_REQUIRED],
             'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
             'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['Nic', 'vo_ID', 'owner_Fname', 'owner_Lname', 'owner_address', 'phone_No','email','gender','password'];
    }

//    display name
    public function displayName(): string
    {
        return $this->owner_Fname . ' ' . $this->owner_Lname;
    }

    public function update($id, $Include=[], $Exclude = []): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::update($id, $Include, $Exclude);
    }


    public  function admindisablevehowner($vo_id){
        $availability=0;
        // var_dump($vehicle_id);
        $query1="UPDATE vehicleowner SET admin_approved =:availability WHERE vo_ID=$vo_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":availability",$availability);
        $statement1->execute();
        $query2="UPDATE vehicle SET `availability` =:availability WHERE vo_ID=$vo_id";
        $statement2= Application::$app->db->prepare($query2);
        $statement2->bindValue(":availability",$availability);
        $statement2->execute();
    }

    public  function adminacceptvehowner($vo_id){
        $availability=1;
        // var_dump($vehicle_id);
        $query1="UPDATE vehicleowner SET admin_approved =:availability WHERE vo_ID=$vo_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":availability",$availability);
        $statement1->execute();
    }


    public function getVeh_oCount(){
        return Application::$app->db->pdo->query("SELECT COUNT(vo_ID) As veho_count FROM vehicleowner")->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return int
     */
    public function getVoID(): int
    {
        return $this->vo_ID;
    }

    /**
     * @param int $vo_ID
     */
    public function setVoID(int $vo_ID): void
    {
        $this->vo_ID = $vo_ID;
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
    public function getPasswordConfirm(): string
    {
        return $this->passwordConfirm;
    }

    /**
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return string|null
     */
    public function getProfilePic(): ?string
    {
        return $this->profile_pic;
    }

    /**
     * @param string|null $profile_pic
     */
    public function setProfilePic(?string $profile_pic): void
    {
        $this->profile_pic = $profile_pic;
    }


}