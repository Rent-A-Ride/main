<?php

namespace app\models;

use app\core\dbModel;
use app\core\Model;

class vehicleOwnerRegister extends dbModel
{
    public string $vo_ID = '';
    public string $Nic = '';
    public string $owner_Fname = '' ;
    public string $owner_Lname = '';


    public string $email = '';
    public string $phone_No = '';
//    public string $owner_area = '';

    public string $owner_address =  '';
    public string $gender = '';


    public string $license_No = '';
    public string $password = '';
    public string $Confirm_Password = '';

    public string $profile_pic = '';

    public function register()
    {
        echo "Processing register";
    }

    public function rules(): array
    {
        return [
            'owner_Fname' => [self::RULE_REQUIRED],
            'owner_Lname' => [self::RULE_REQUIRED],
            'Nic' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=> [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'Confirm_Password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'Password']],
        ];
    }


    public static function tableName(): string
    {
        return 'vehicleowner';
    }

    public function attributes(): array
    {
        return ['Owner_Nic', 'user_ID', 'owner_Fname', 'owner_Lname', 'owner_area', 'owner_address', 'phone_No','email','gender'];
    }


    public static function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
    }
}