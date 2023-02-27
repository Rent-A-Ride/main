<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;



class vehicle_Owner
{
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
        $sql = "SELECT * FROM vehicleowner WHERE vo_ID=:user_id";
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
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner WHERE vehicleowner.admin_approved=1 ")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function Vehicleowner_profile($user_id){
    
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner where vehicleowner.vo_ID=$user_id ")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getnotApprovedVehicleowner(){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleowner INNER JOIN users WHERE vehicleowner.user_ID=users.user_ID AND vehicleowner.admin_approved=0 ")->fetchAll(\PDO::FETCH_ASSOC);

    }
    



}