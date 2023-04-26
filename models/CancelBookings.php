<?php

namespace app\models;

use app\core\dbModel;

class CancelBookings extends dbModel
{
    protected Int $booking_Id;
    protected Int $cus_Id;
    protected String $reason;
    protected String $comment;

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [];
    }

    public static function tableName(): string
    {
        return 'cancelBookings';
    }

    public function attributes(): array
    {
        // TODO: Implement attributes() method.
        return ['booking_Id','cus_Id','reason','comment'];
    }

    public static function primaryKey(): string
    {
        return 'Id';
    }



    /**
     * @return Int
     */
    public function getBookingId(): int
    {
        return $this->booking_Id;
    }

    /**
     * @param Int $booking_Id
     */
    public function setBookingId(int $booking_Id): void
    {
        $this->booking_Id = $booking_Id;
    }

    /**
     * @return Int
     */
    public function getCusId(): int
    {
        return $this->cus_Id;
    }

    /**
     * @param Int $cus_Id
     */
    public function setCusId(int $cus_Id): void
    {
        $this->cus_Id = $cus_Id;
    }

    /**
     * @return String
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param String $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return String
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param String $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }


}