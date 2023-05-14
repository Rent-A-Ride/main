<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class vehicleownerinvoice extends dbModel
{

    protected int $vo_ID;
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
    public function getVoId(): int
    {
        return $this->vo_ID;
    }

    /**
     * @param string $vr_Id
     */
    public function setVoId(string $vo_ID): void
    {
        $this->vo_ID = $vo_ID;
    }


    public static function tableName(): string
    {
        return 'vehicleownerinvoice';
    }

    public function attributes(): array
    {
        return ['vo_ID','date','invoice','invstatus'];
    }

    public static function primaryKey(): string
    {
        return 'vo_ID';
    }

    public function rules(): array
    {
        return [];
    }

    public function getvoInvoice(){
        return Application::$app->db->pdo->query("SELECT vo_ID, DATE_FORMAT(date, '%M %Y') AS month_name, invoice, invstatus
        FROM vehicleownerinvoice;")->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function confirm_invoice($vo_id,$month,$invoice){
        
        $inv_status=1;
        $query1="UPDATE vehicleownerinvoice SET invstatus =:invstatus, invoice=:invoice WHERE MONTH(date) = MONTH('$month') AND YEAR(date) = YEAR('$month') AND vo_ID=$vo_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":invstatus",$inv_status);
        $statement1->bindValue(":invoice",$invoice);
        $statement1->execute();
    }

    public function getVownerinvoice($user_id){
        return Application::$app->db->pdo->query("SELECT * FROM vehicleownerinvoice  WHERE vo_ID=$user_id  ORDER BY `date` DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
}