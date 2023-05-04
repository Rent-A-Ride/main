<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;
use app\core\dbModel;

class owner extends dbModel
{
    // private \PDO $pdo;
    private array $body;
    public string $user_ID;
    public string $first_Name;
    public string $last_Name;
    public string $email;
    public string $Nic;
    public string $profile_pic= '';
    public string $license_No;
    public string $phone_No;
    public string $Owner_area;
    public string $gender = '';
    // public string $address;
    // public string $password;
    // public string $passwordConfirm = '';

    public function __construct(array $registerBody=[])
    {
        
        $this->body= $registerBody;


    }

    public static function tableName(): string
    {
        return 'owner';
    }

    public static function primaryKey():string
    {
        return 'user_ID';
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['user_ID','Owner_area','phone_No','Nic','email','first_Name','last_Name','profile_pic','license_No'];
    }

    public function save(): bool
    {
        return parent::save();
    }

    public function displayName(): string
    {
        return $this->first_Name.' '.$this->last_Name;
    }

    public function userProfile(string $data)
    {
        return $this->$data;
    }

    public function getuser_ID(){
        return $this->user_ID;
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

    public function owner_login($email)
    {
        $sql = "SELECT * FROM owner WHERE email=:email";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':email',$email);
        $statement->execute();
        $owner= $statement->fetchObject();
        if(!$owner){
            $errors['owner'] = 'Email does not have owner account';
        }

        if (empty($errors)){
            return $owner;
        }
        else {
            return $errors;
        }
                

    }

    public function owner_profile($user_id){
        
        return Application::$app->db->pdo->query("SELECT * FROM  owner where owner.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function owner_img($user_id){
        return Application::$app->db->pdo->query("SELECT users.profile_img, owner.first_Name, owner.last_Name FROM users INNER JOIN owner WHERE users.user_ID=$user_id AND owner.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update_profile($body,$user_id){
        $user_id=(int)$user_id;
        
        $query1="UPDATE `owner` SET first_Name=:firstname, last_Name=:lastname, phone_No=:phoneno, Owner_area=:addres, license_No=:license_No  WHERE user_ID=$user_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":firstname",$body['firstname']);
        $statement1->bindValue(":lastname",$body['lastname']);
        $statement1->bindValue(":phoneno",$body['phoneno']);
        $statement1->bindValue(":addres",$body['address']);
        $statement1->bindValue(":license_No",$body['license_No']);
        
        
        $statement1->execute();
    }

    public function update_password($body){
        $errors=$this->validate_password($body);
        if (empty($errors)) {
            $new_password=password_hash($body['new_password'], PASSWORD_DEFAULT);
            $email=$body['email'];
            
            $query1="UPDATE `owner` SET `password`=:passcode WHERE email=:email";
            $statement1= Application::$app->db->prepare($query1);
            $statement1->bindValue(":passcode",$new_password);
            $statement1->bindValue(":email",$email);
            $statement1->execute();
            return true;
        }
        else {
            return $errors;
        }

    }

    public function validate_password($body)
    {
        $errors=[];
        $current_password=$body['current_password'];
        $new_password=$body['new_password'];
        if (strlen($body['current_password'])==0) {
           $errors['current_password']="Please Enter Current Password";
        }
        if (strlen($body['new_password'])==0) {
            $errors['new_password']="Please Enter New Password";
        }
        if (strlen($body['confirm_password'])==0) {
            $errors['confirm_password']="Please Enter Confirm Password";
        }
        $recent_password=Application::$app->db->pdo->query("SELECT * FROM  owner")->fetchAll(\PDO::FETCH_ASSOC);
        $recent_password=$recent_password[0]['password'];
        if (!password_verify($body['current_password'], $recent_password)) {
            $errors['current_password']="Please Enter Correct Recent Password";
        }
        if ($body['new_password']!=$body['confirm_password']) {
            $errors['confirm_password']="New password miss match with confirm password";
        }
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        if (!preg_match($pattern, $new_password)) {
            $errors['new_password']="Your password must be exists minimum 1 uppercase letter 1 lowercase letter and special character";
        }
        if (strlen($body['new_password'])<8) {
            $errors['new_password']="Your password length must be grater than 8";
        }
        if (strlen($body['new_password'])>64) {
            $errors['new_password']="Your password length must be lesser than 64";
        }
        return $errors;
         
    }
    



}