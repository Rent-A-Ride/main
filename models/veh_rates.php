<?php

namespace app\models;

use app\core\dbModel;

class veh_rates extends dbModel
{
    protected string $vehType;
    protected string $minPrice;
    protected string $maxPrice;


    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {

        return 'veh_rates';
    }

    public function attributes(): array
    {

        return ['vehType','minPrice','maxPrice'];
    }

    public static function primaryKey(): string
    {
        return 'vr_Id';
    }

    /**
     * @return string
     */
    public function getVehType(): string
    {
        return $this->vehType;
    }

    /**
     * @param string $vehType
     */
    public function setVehType(string $vehType): void
    {
        $this->vehType = $vehType;
    }

    /**
     * @return string
     */
    public function getMinPrice(): string
    {
        return $this->minPrice;
    }

    /**
     * @param string $minPrice
     */
    public function setMinPrice(string $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return string
     */
    public function getMaxPrice(): string
    {
        return $this->maxPrice;
    }

    /**
     * @param string $maxPrice
     */
    public function setMaxPrice(string $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }


}