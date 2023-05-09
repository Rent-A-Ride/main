<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class driverInvoice extends dbModel
{

    protected int $driver_ID;
    protected string $date;
    protected string $invoice='';
    protected int $invstatus;

    /**
     * @return string
     */
    public function getdate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setdate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getinvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @param string $minPrice
     */
    public function setinvoice(string $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return string
     */
    public function getinvstatus(): int
    {
        return $this->invstatus;
    }

    /**
     * @param string $maxPrice
     */
    public function setinvstatus(string $invstatus): void
    {
        $this->invstatus = $invstatus;
    }

    /**
     * @return string
     */
    public function getDriverId(): int
    {
        return $this->driver_ID;
    }

    /**
     * @param string $vr_Id
     */
    public function setdriverId(string $driver_ID): void
    {
        $this->driver_ID = $driver_ID;
    }


    public static function tableName(): string
    {
        return 'driverinvoice';
    }

    public function attributes(): array
    {
        return ['driver_ID','date','invoice','invstatus'];
    }

    public static function primaryKey(): string
    {
        return 'driver_ID';
    }

    public function rules(): array
    {
        return [];
    }

    public function getvoInvoice(){
        return Application::$app->db->pdo->query("SELECT driver_ID, DATE_FORMAT(date, '%M %Y') AS month_name, invoice, invstatus
        FROM driverinvoice;")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function confirm_invoice($driver_id,$month,$invoice){
        $inv_status=1;
        $query1="UPDATE driverinvoice SET invstatus =:invstatus, invoice=:invoice WHERE MONTH(date) = MONTH('$month') AND YEAR(date) = YEAR('$month') AND driver_ID=$driver_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":invstatus",$inv_status);
        $statement1->bindValue(":invoice",$invoice);
        $statement1->execute();
    }


    public function getdriverinvoice($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM driverinvoice  WHERE driver_ID=$user_id  ORDER BY `date` DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
}