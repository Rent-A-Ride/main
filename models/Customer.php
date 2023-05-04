<?php

namespace app\models;

use app\core\Application;
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
    public string $address = '';
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

    /**
     * @return string
     */
    public function getNic(): string
    {
        return $this->nic;
    }

    /**
     * @param string $nic
     */
    public function setNic(string $nic): void
    {
        $this->nic = $nic;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneno(): string
    {
        return $this->phoneno;
    }

    /**
     * @param string $phoneno
     */
    public function setPhoneno(string $phoneno): void
    {
        $this->phoneno = $phoneno;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPasswordConfirm(): string
    {
        return $this->passwordConfirm;
    }

    /**
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return string
     */
    public function getProfilePic(): string
    {
        return $this->profile_pic;
    }

    /**
     * @param string $profile_pic
     */
    public function setProfilePic(string $profile_pic): void
    {
        $this->profile_pic = $profile_pic;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    












    public function getCustomer_count(){
        return Application::$app->db->pdo->query("SELECT COUNT(cus_Id) As customer_count FROM customer")->fetchAll(\PDO::FETCH_ASSOC);
    }




}