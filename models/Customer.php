<?php

namespace app\models;

use app\core\dbModel;
use app\core\Model;

class Customer extends dbModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $phoneno;
    public string $gender = '';
    public string $password;
    public string $passwordConfirm;
    public int $status = self::STATUS_INACTIVE;



    public static function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey():string
    {
        return 'id';
    }

    public function save(): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'phoneno' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
                self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            ]],
            'gender' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'phoneno', 'gender', 'password', 'status'];
    }
}