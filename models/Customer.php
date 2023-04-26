<?php

namespace app\models;

use app\core\dbModel;
use app\core\Model;

class Customer extends dbModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public string $cus_Id;
    public string $nic = '';
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $phoneno;
    public string $gender = '';
    public string $address;
    public string $password;
    public string $passwordConfirm = '';
    public string $profile_pic='';
    public int $status = self::STATUS_INACTIVE;



    public static function tableName(): string
    {
        return 'customer';
    }

    public static function primaryKey():string
    {
        return 'cus_Id';
    }

    public function save(): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function update($id, $Include=[], $Exclude = []): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::update($id, $Include, $Exclude);
    }



    public function rules(): array
    {
        return [
            'nic' => [self::RULE_REQUIRED],
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'phoneno' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'gender' => [self::RULE_REQUIRED],
            'address' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64], self::RULE_PASSWORD],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['nic', 'firstname', 'lastname', 'email', 'phoneno', 'gender', 'address', 'password', 'status'];
    }

    public function displayName(): string
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function userProfile(string $data)
    {
        return $this->$data;
    }
    public function getcus_Id(){
        return $this->cus_Id;
    }


}