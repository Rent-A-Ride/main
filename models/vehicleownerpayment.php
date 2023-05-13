<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class vehicleownerpayment extends dbModel
{
    protected int $booking_Id;
    protected int $vo_Id;
    protected int $veh_Id;
    protected string $startDate;
    protected string $endDate;
    protected float $rental_price = 0;
    protected int $pay_status;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vehicleownerpayment';
    }

    public function attributes(): array
    {
        return ['booking_Id','vo_Id','veh_Id','startDate','endDate','rental_price','driverReq','pay_status'];
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
    public function getVoId(): int
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
    public function getVehId(): int
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
    

    

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->pay_status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->pay_status = $status;
    }

    public function getpayment_currentMonth(){
        
        
        return Application::$app->db->pdo->query("SELECT vo_Id, SUM(Total) AS total,`month`
        FROM vehicleownerpayment 
        WHERE `month` >= DATE_FORMAT(NOW(), '%Y-%m-01') AND `month` < DATE_FORMAT(NOW() + INTERVAL 1 MONTH, '%Y-%m-01') AND pay_status=0
        GROUP BY vo_Id; ")->fetchAll(\PDO::FETCH_ASSOC);
            
        
    }

    public function getpayment(){
        
        return Application::$app->db->pdo->query("SELECT vo_Id, DATE_FORMAT(`month`, '%M %Y') AS month_name, SUM(Total) AS total_rent,SUM(pay_status)AS pay_status,`month`
        FROM vehicleownerpayment
        GROUP BY vo_Id, DATE_FORMAT(`month`, '%M %Y'),pay_status; ")->fetchAll(\PDO::FETCH_ASSOC);
            
        
    }


    public function confirm_payment($vo_id,$month,$img_name){
        $pay_status=1;
        $query1="UPDATE vehicleownerpayment SET pay_status =:paystatus, Payment_slip=:img WHERE MONTH(month) = MONTH('$month') AND YEAR(month) = YEAR('$month') AND vo_Id=$vo_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":paystatus",$pay_status);
        $statement1->bindValue(":img",$img_name);
        $statement1->execute();
    }


    public function getvownerPayments($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleownerpayment  WHERE vo_Id=$user_id  ORDER BY `month` DESC")->fetchAll(\PDO::FETCH_ASSOC);
}

    





}