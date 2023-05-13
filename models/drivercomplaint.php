<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Model;

class drivercomplaint extends dbModel
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
        return Application::$app->db->pdo->query("SELECT * FROM drivercomplaint")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function resolve($com_Id){
        $admin_approved=1;
        $query1="UPDATE drivercomplaint  SET com_status =:admin_approved WHERE com_ID=$com_Id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":admin_approved",$admin_approved);
        $statement1->execute();
    }

}