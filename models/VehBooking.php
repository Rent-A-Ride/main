<?php

namespace app\models;

use app\core\dbModel;

class VehBooking extends dbModel
{
    protected string $booking_Id;
    protected string $cus_Id;
    protected string $vo_Id;
    protected string $veh_Id;
    protected string $pickupLocation;
    protected string $startDate;
    protected string $endDate;
    protected string $Destination;
    protected float $rental_price = 0;
    protected string $payMethod;
    protected string $note;
    protected bool $driverReq = false;
    protected string $status;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vehbooking';
    }

    public function attributes(): array
    {
        return ['booking_Id','cus_Id','vo_Id','veh_Id','pickupLocation','startDate','endDate','Destination','rental_price','payMethod','driverReq','status'];
    }

    public static function primaryKey(): string
    {
        return 'booking_Id';
    }

    /**
     * @return string
     */
    public function getBookingId(): string
    {
        return $this->booking_Id;
    }

    /**
     * @param string $booking_Id
     */
    public function setBookingId(string $booking_Id): void
    {
        $this->booking_Id = $booking_Id;
    }

    /**
     * @return string
     */
    public function getCusId(): string
    {
        return $this->cus_Id;
    }

    /**
     * @param string $cus_Id
     */
    public function setCusId(string $cus_Id): void
    {
        $this->cus_Id = $cus_Id;
    }

    /**
     * @return string
     */
    public function getVoId(): string
    {
        return $this->vo_Id;
    }

    /**
     * @param string $vo_Id
     */
    public function setVoId(string $vo_Id): void
    {
        $this->vo_Id = $vo_Id;
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
    public function getPickupLocation(): string
    {
        return $this->pickupLocation;
    }

    /**
     * @param string $pickupLocation
     */
    public function setPickupLocation(string $pickupLocation): void
    {
        $this->pickupLocation = $pickupLocation;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
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
    public function getRentalPrice(): string
    {
        return $this->rental_price;
    }

    /**
     * @param float $rental_price
     */
    public function setRentalPrice(float $rental_price): void
    {
        $this->rental_price = $rental_price;
    }

    /**
     * @return string
     */
    public function getPayMethod(): string
    {
        return $this->payMethod;
    }

    /**
     * @param string $payMethod
     */
    public function setPayMethod(string $payMethod): void
    {
        $this->payMethod = $payMethod;
    }

    /**
     * @return string
     */
    public function getDriverReq(): string
    {
        return $this->driverReq;
    }

    /**
     * @param string $driverReq
     */
    public function setDriverReq(string $driverReq): void
    {
        $this->driverReq = $driverReq;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }




}