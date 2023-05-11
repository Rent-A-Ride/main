<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class customer_payment extends dbModel
{
    protected int $booking_Id;
    protected float $total_rent;
    protected float $payment_amount;
    protected string $status_pay;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'customer_payment';
    }

    public function attributes(): array
    {
        return ['booking_Id','total_rent','payment_amount','remaining_amount','status'];
    }

    public static function primaryKey(): string
    {
        return 'booking_Id';
    }

    /**
     * @return int
     */
    public function getBookingId(): int
    {
        return $this->booking_Id;
    }

    /**
     * @param int $booking_Id
     */
    public function setBookingId(int $booking_Id): void
    {
        $this->booking_Id = $booking_Id;
    }

    /**
     * @return float
     */
    public function getTotalRent(): float
    {
        return $this->total_rent;
    }

    /**
     * @param float $total_rent
     */
    public function setTotalRent(float $total_rent): void
    {
        $this->total_rent = $total_rent;
    }

    /**
     * @return float
     */
    public function getPaymentAmount(): float
    {
        return $this->payment_amount;
    }

    /**
     * @param float $payment_amount
     */
    public function setPaymentAmount(float $payment_amount): void
    {
        $this->payment_amount = $payment_amount;
    }

    /**
     * @return string
     */
    public function getStatusPay(): string
    {
        return $this->status_pay;
    }

    /**
     * @param string $status_pay
     */
    public function setStatusPay(string $status_pay): void
    {
        $this->status_pay = $status_pay;
    }






    public function manageCustomerPayment(){
        try {
            return Application::$app->db->pdo->query("SELECT * FROM customer_payment INNER JOIN vehbooking ON customer_payment.booking_Id=vehbooking.booking_Id INNER JOIN customer ON vehbooking.cus_Id=customer.cus_Id")->fetchAll(\PDO::FETCH_ASSOC);
           
        } catch (\Throwable $th) {
            return $th;
        }
    }

   


    

    





}