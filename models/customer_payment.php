<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class customer_payment extends dbModel
{
    protected int $booking_Id;
    protected float $total_rent;
    protected float $payment_amount;
    protected float $remaining_amount;
    protected string $status;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'custmer_payment';
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
     * @return string
     */
    public function getBookingId(): int
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
    public function gettotal_rent(): int
    {
        return $this->total_rent;
    }

    /**
     * @param string $vo_Id
     */
    public function settotal_rent(int $rent): void
    {
        $this->total_rent = $rent;
    }

    /**
     * @return string
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param string $veh_Id
     */
    public function setstatus(string $status): void
    {
        $this->status = $status;
    }


    public function manageCustomerPayment(){
        try {
            return Application::$app->db->pdo->query("SELECT * FROM customer_payment INNER JOIN vehbooking ON customer_payment.booking_Id=vehbooking.booking_Id INNER JOIN customer ON vehbooking.cus_Id=customer.cus_Id")->fetchAll(\PDO::FETCH_ASSOC);
           
        } catch (\Throwable $th) {
            return $th;
        }
    }

   


    

    





}