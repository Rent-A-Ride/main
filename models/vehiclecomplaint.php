<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Model;

class vehiclecomplaint extends dbModel
{

    



    public static function tableName(): string
    {
        return 'vehiclecomplaint';
    }

    public static function primaryKey():string
    {
        return 'id';
    }

    public function save(): bool
    {
        return parent::save();
    }

    public function rules(): array
    {
        return [
            // 'firstname' => [self::RULE_REQUIRED],
            // 'lastname' => [self::RULE_REQUIRED],
            // 'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
            //     self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            // ]],
            // 'phoneno' => [self::RULE_REQUIRED, self::RULE_PHONENO, [
            //     self::RULE_UNIQUE, 'class' => self::class, 'attribute'
            // ]],
            // 'gender' => [self::RULE_REQUIRED],
            // 'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            // 'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function attributes(): array
    {
        return ['com_ID', 'cus_ID', 'cus_Name', 'veh_id', 'Vehicle_No', 'complaint'];
    }

    public function viewcomplaint(){
        return Application::$app->db->pdo->query("SELECT * FROM vehiclecomplaint")->fetchAll(\PDO::FETCH_ASSOC);

    }

}