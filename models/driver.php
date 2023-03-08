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

    public function acceptRequests($user_id){
        $sql="UPDATE driver_requests SET accept =1 WHERE reservation_id = $user_id";
        Application::$app->db->pdo->query($sql)->execute();
    }

    public function rejectRequests($user_id){
        $sql="UPDATE driver_requests SET accept =2 WHERE reservation_id = $user_id";
        Application::$app->db->pdo->query($sql)->execute();
    }

    public function getDriverbyId($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM driver INNER JOIN users WHERE driver.user_ID=$user_id AND users.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function update_driver($user_id){
        return Application::$app->db->pdo->query("UPDATE driver SET ")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getrequest($user_id){
        // var_dump($user_id);
        return Application::$app->db->pdo->query("SELECT * FROM driver_requests INNER JOIN users WHERE driver_requests.user_ID=$user_id AND users.user_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getReviews($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM drivers_reviews INNER JOIN users WHERE drivers_reviews.user_ID=$user_id AND users.user_ID=$user_id ORDER BY reservation_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function avgReviews($user_id){
        return Application::$app->db->pdo->query("SELECT AVG(points) as Average FROM drivers_reviews WHERE drivers_reviews.user_ID=$user_id")->fetch(\PDO::FETCH_ASSOC);
    }

    public function getPayments($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM drivers_invoice INNER JOIN users WHERE drivers_invoice.user_ID=$user_id AND users.user_ID=$user_id ORDER BY invoice_no DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    

}