<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';
    public string $user_type = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login($user_type)
    {   
        // var_dump($user_type);
        if($user_type=='owner'){
           
           $user = owner::findOne(['email'=>$this->email]);
        }
        else if($user_type=='vehicleowner'){
            $user = vehicleowner::findOne(['email'=>$this->email]); 
         }
        else if($user_type=='driver'){
            $user = driver::findOne(['email'=>$this->email]); 
        }
        else if ($user_type=='customer'){
            $user = Customer::findOne(['email'=>$this->email]);
        }
        
        
        if (!$user) {
             $this->addError('email', 'User does not exist');
             return false;
        }
        if (!password_verify($this->password, $user->password)) {
             $this->addError('password', 'Password is incorrect');
             return false;
        }

        
        return Application::$app->login($user,$user_type);
    }
}