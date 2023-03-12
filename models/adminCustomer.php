<?php

namespace app\models;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Database;
use app\core\Model;



class adminCustomer 
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

    

    public function getcustomer(){
        
        return Application::$app->db->pdo->query("SELECT * FROM customer WHERE customer.status=1")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public  function admindisablecustomer($cus_id){
        $admin_approved=0;
        var_dump($cus_id);
        $query1="UPDATE customer SET status =:availability WHERE cus_Id=$cus_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":availability",$admin_approved);
        $statement1->execute();
    }
                

    



}