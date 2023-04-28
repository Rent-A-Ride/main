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
    public string $Owner_Nic;
    public int $vo_ID;
    public string $owner_Fname;
    public string $owner_Lname;
    public string $owner_area;
    public string $owner_address;
    public string $phone_No;
    public string $license_No;
    public string $email;
    public string $gender = '';
    // public string $password;
    // public string $passwordConfirm;
    public int $admin_approved = self::STATUS_INACTIVE;



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
        $this->admin_approved = self::STATUS_INACTIVE;
        // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        // $user=Application::$app->db->pdo->query("SELECT * FROM users WHERE users.email=$_POST['email']")->fetchAll(\PDO::FETCH_ASSOC);
        // $this->user_ID = ;
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'Owner_Nic' => [self::RULE_REQUIRED],
            'owner_Fname' => [self::RULE_REQUIRED],
            'owner_Lname' => [self::RULE_REQUIRED],
            'owner_area' => [self::RULE_REQUIRED],
            'owner_address' => [self::RULE_REQUIRED],
            'phone_No' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'license_No' => [self::RULE_REQUIRED],
            
            'gender' => [self::RULE_REQUIRED],
            // 'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            // 'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['Owner_Nic', 'vo_ID', 'owner_Fname', 'owner_Lname', 'owner_area', 'owner_address', 'phone_No','email','gender','admin_approved'];
    }

    public function getvo_ID(){
        return $this->vo_ID;
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
}