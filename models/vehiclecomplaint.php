<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Model;

class vehiclecomplaint extends dbModel
{
    protected string $com_ID;
    protected int $cus_ID;
    protected string $cus_Name;
    protected int $veh_Id;
    protected string $Vehicle_No;
    protected string $complaint;
    protected ?string $proof = null;
    protected int $status = 0;

    public static function tableName(): string
    {
        return 'vehiclecomplaint';
    }

    public static function primaryKey():string
    {
        return 'com_ID';
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
        return ['com_ID', 'cus_ID', 'cus_Name', 'veh_Id', 'Vehicle_No', 'complaint', 'proof' ,'status'];
    }

    public function viewcomplaint(){
        return Application::$app->db->pdo->query("SELECT * FROM vehiclecomplaint")->fetchAll(\PDO::FETCH_ASSOC);

    }

    /**
     * @return string
     */
    public function getComID(): string
    {
        return $this->com_ID;
    }

    /**
     * @param string $com_ID
     */
    public function setComID(string $com_ID): void
    {
        $this->com_ID = $com_ID;
    }

    /**
     * @return int
     */
    public function getCusID(): int
    {
        return $this->cus_ID;
    }

    /**
     * @param int $cus_ID
     */
    public function setCusID(int $cus_ID): void
    {
        $this->cus_ID = $cus_ID;
    }

    /**
     * @return string
     */
    public function getCusName(): string
    {
        return $this->cus_Name;
    }

    /**
     * @param string $cus_Name
     */
    public function setCusName(string $cus_Name): void
    {
        $this->cus_Name = $cus_Name;
    }

    /**
     * @return int
     */
    public function getVehId(): int
    {
        return $this->veh_Id;
    }

    /**
     * @param int $veh_Id
     */
    public function setVehId(int $veh_Id): void
    {
        $this->veh_Id = $veh_Id;
    }

    /**
     * @return string
     */
    public function getVehicleNo(): string
    {
        return $this->Vehicle_No;
    }

    /**
     * @param string $Vehicle_No
     */
    public function setVehicleNo(string $Vehicle_No): void
    {
        $this->Vehicle_No = $Vehicle_No;
    }

    /**
     * @return string
     */
    public function getComplaint(): string
    {
        return $this->complaint;
    }

    /**
     * @param string $complaint
     */
    public function setComplaint(string $complaint): void
    {
        $this->complaint = $complaint;
    }

    /**
     * @return string
     */
    public function getProof(): string
    {
        return $this->proof;
    }

    /**
     * @param string $proof
     */
    public function setProof(string $proof): void
    {
        $this->proof = $proof;
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



}