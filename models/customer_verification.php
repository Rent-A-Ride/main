<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class customer_verification extends dbModel
{
    protected int $cus_Id;
    public string $cus_code;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'customer_verification';
    }

    public function attributes(): array
    {
        return ['cus_Id','cus_code'];
    }

    public static function primaryKey(): string
    {
        return 'cus_Id';
    }

    /**
     * @return string
     */
    public function getCusId(): int
    {
        return $this->cus_Id;
    }

    /**
     * @param string $booking_Id
     */
    public function setCusId(string $cus_Id): void
    {
        $this->cus_Id = $cus_Id;
    }

    

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->cus_code;
    }

    /**
     * @param string $veh_Id
     */
    public function setCode(string $code): void
    {
        $this->cus_code = $code;
    }

    public function verifycode($code){

    }



    





}