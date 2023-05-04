<?php

namespace app\models;

use app\core\dbModel;

class VehInfo extends dbModel
{

    protected string $veh_Id;
    protected string $year;
    protected string $capacity;
    protected string $transmission = '';
    protected string $fuel_type;
    protected string $Description;
    protected string $vehColor;
    protected string $seatsCount = '';
    protected string $avgfuel;

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
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getCapacity(): string
    {
        return $this->capacity;
    }

    /**
     * @param string $capacity
     */
    public function setCapacity(string $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return string
     */
    public function getTransmission(): string
    {
        return $this->transmission;
    }

    /**
     * @param string $transmission
     */
    public function setTransmission(string $transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuel_type;
    }

    /**
     * @param string $fuel_type
     */
    public function setFuelType(string $fuel_type): void
    {
        $this->fuel_type = $fuel_type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return string
     */
    public function getVehColor(): string
    {
        return $this->vehColor;
    }

    /**
     * @param string $vehColor
     */
    public function setVehColor(string $vehColor): void
    {
        $this->vehColor = $vehColor;
    }

    /**
     * @return string
     */
    public function getSeatsCount(): string
    {
        return $this->seatsCount;
    }

    /**
     * @param string $seatsCount
     */
    public function setSeatsCount(string $seatsCount): void
    {
        $this->seatsCount = $seatsCount;
    }

    /**
     * @return string
     */
    public function getAvgfuel(): string
    {
        return $this->avgfuel;
    }

    /**
     * @param string $avgfuel
     */
    public function setAvgfuel(string $avgfuel): void
    {
        $this->avgfuel = $avgfuel;
    }


    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vehicle_info';
    }

    public function attributes(): array
    {
        return ['veh_Id','year','capacity','transmission','fuel_type','Description','vehColor','seatsCount','avgfuel'];
    }

    public static function primaryKey(): string
    {
        return 'veh_Id';
    }
}