<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;



class driver
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

    public function driver_login($user_id)
    {
        $sql = "SELECT * FROM driver WHERE user_ID=:user_id";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':user_id',$user_id);
        $statement->execute();
        $driver= $statement->fetchObject();
        if(!$driver){
            $errors['driver'] = 'Email does not have owner account';
        }

        if (empty($errors)){
            return $driver;
        }
        else {
            return $errors;
        }
                

    }

    public function getDriver(){
        return Application::$app->db->pdo->query("SELECT * FROM driver INNER JOIN users WHERE driver.user_ID=users.user_ID ")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getDriverbyId($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM driver INNER JOIN users WHERE driver.user_ID=users.user_ID AND users.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);

    }

    // public function getreviews($user_id){
    //     return Application::$app->db->pdo->query("SELECT * FROM driver_reviews where driver.Id=$user_Id")->fetchAll(\PDO::FETCH_ASSOC);
    // }
    



}