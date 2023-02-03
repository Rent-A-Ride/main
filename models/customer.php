<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;



class customer
{
    private \PDO $pdo;
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
        $sql = "SELECT * FROM customer WHERE user_ID=:user_id";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':user_id',$user_id);
        $statement->execute();
        $customer= $statement->fetchObject();
        if(!$customer){
            $errors['customer'] = 'Email does not have owner account';
        }

        if (empty($errors)){
            return $customer;
        }
        else {
            return $errors;
        }
    }

    public function getcustomer(){
        
        return Application::$app->db->pdo->query("SELECT * FROM customer INNER JOIN users ON customer.user_ID=users.user_ID INNER JOIN customerdoc ON customer.custmer_ID=customerdoc.customer_ID")->fetchAll(\PDO::FETCH_ASSOC);

    }
                

    



}