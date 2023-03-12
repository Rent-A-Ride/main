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
    public string $profile_pic;
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
        return Application::$app->db->pdo->query("SELECT * FROM users INNER JOIN owner where owner.user_ID=$user_id AND users.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function owner_img($user_id){
        return Application::$app->db->pdo->query("SELECT users.profile_img, owner.first_Name, owner.last_Name FROM users INNER JOIN owner WHERE users.user_ID=$user_id AND owner.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }
    



}