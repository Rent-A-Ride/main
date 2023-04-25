<?php

namespace app\models;

use app\core\dbModel;

class ren_ecotest extends dbModel
{

    protected string $veh_Id;
    protected string $scan_copy = '';
    protected string $ex_date;

    public function rules(): array
    {
        return [
            'veh_Id' => [self::RULE_REQUIRED],
            'scan_copy' => [self::RULE_REQUIRED],
            'ex_date' => [self::RULE_REQUIRED],
        ];
    }

    public static function tableName(): string
    {
        return 'ren_ecotest';
    }

    public function attributes(): array
    {
        return ['veh_Id', 'scan_copy', 'ex_date'];
    }

    public static function primaryKey(): string
    {
        return 'veh_Id';
    }

    /**
     * @return string
     */
    public function getVehId(): string
    {
        return $this->veh_Id;
    }

    /**
     * @param string $veh_Id
     */
    public function setVehId(string $veh_Id): void
    {
        $this->veh_Id = $veh_Id;
    }

    /**
     * @return string
     */
    public function getScanCopy(): string
    {
        return $this->scan_copy;
    }

    /**
     * @param string $scan_copy
     */
    public function setScanCopy(string $scan_copy): void
    {
        $this->scan_copy = $scan_copy;
    }

    /**
     * @return string
     */
    public function getExDate(): string
    {
        return $this->ex_date;
    }

    /**
     * @param string $ex_date
     */
    public function setExDate(string $ex_date): void
    {
        $this->ex_date = $ex_date;
    }


}