<?php

namespace app\models;

use app\core\dbModel;

class driver_requests extends dbModel
{
    protected string $reservation_id = '';
    protected string $driver_ID;
    protected string $user_ID;
    protected string $vehicle_ID;
    protected string $start_date;
    protected string $end_date;
    protected string $Destination;
    protected string $pickup_location;
    protected bool $accept;

    /**
     * @return bool
     */
    public function isAccept(): bool
    {
        return $this->accept;
    }

    /**
     * @param bool $accept
     */
    public function setAccept(bool $accept): void
    {
        $this->accept = $accept;
    }

    /**
     * @return string
     */
    public function getReservationId(): string
    {
        return $this->reservation_id;
    }

    /**
     * @param string $reservation_id
     */
    public function setReservationId(string $reservation_id): void
    {
        $this->reservation_id = $reservation_id;
    }

    /**
     * @return string
     */
    public function getDriverID(): string
    {
        return $this->driver_ID;
    }

    /**
     * @param string $driver_ID
     */
    public function setDriverID(string $driver_ID): void
    {
        $this->driver_ID = $driver_ID;
    }

    /**
     * @return string
     */
    public function getUserID(): string
    {
        return $this->user_ID;
    }

    /**
     * @param string $user_ID
     */
    public function setUserID(string $user_ID): void
    {
        $this->user_ID = $user_ID;
    }

    /**
     * @return string
     */
    public function getVehicleID(): string
    {
        return $this->vehicle_ID;
    }

    /**
     * @param string $vehicle_ID
     */
    public function setVehicleID(string $vehicle_ID): void
    {
        $this->vehicle_ID = $vehicle_ID;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
    {
        $this->end_date = $end_date;
    }



    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->Destination;
    }

    /**
     * @param string $Destination
     */
    public function setDestination(string $Destination): void
    {
        $this->Destination = $Destination;
    }

    /**
     * @return string
     */
    public function getPickupLocation(): string
    {
        return $this->pickup_location;
    }

    /**
     * @param string $pickup_location
     */
    public function setPickupLocation(string $pickup_location): void
    {
        $this->pickup_location = $pickup_location;
    }

    /**
     * @return string
     */

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'driver_request';
    }

    public function attributes(): array
    {
        // TODO: Implement attributes() method.
        return [
            'reservation_id',
            'driver_ID',
            'user_ID',
            'vehicle_ID',
            'start_date',
            'end_date',
            'Destination',
            'pickup_location',
            'accept'
        ];
    }

    public static function primaryKey(): string
    {
        return 'reservation_id';
    }
}