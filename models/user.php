<?php

namespace app\models;

use app\core\Request;
use app\core\Response;
use app\core\Database;
use app\core\Application;



class user 
{
    // private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
        
        $this->body= $registerBody;


    }

    public function login():array|object
    {
        $errors = [];
        $user = null;

        if (!filter_var($this->body['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Email must be a valid email address';
        }
        else {
            $sql = "SELECT * FROM users WHERE email=:email";
            $statement = Application::$app->db->pdo->prepare($sql);
            $statement->bindValue(':email',$this->body["email"]);

            $statement->execute();
            $user= $statement->fetchObject();
            if(!$user){
                $errors['email'] = 'Email does not exsits, please create an account';
            }
            elseif (!password_verify($this->body['password'],$user->password))
            {
                $errors['password']='Password is incorrect';
            }



        }
        if (empty($errors)){
    
            return $user;
        }
        return $errors;
        
    }
    



}