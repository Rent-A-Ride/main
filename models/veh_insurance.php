<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class veh_insurance extends dbModel
{
    protected string $veh_Id;
    protected string $ins_No;
    protected string $ins_from_date;
    protected string $ins_ex_date;
    protected string $ins_scan_copy;
    protected string $insure_com;

    protected string $insure_type;
    
    private array $body;

    

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'veh_insuarance';
    }

    public function attributes(): array
    {
       return ['veh_Id','ins_No','ins_from_date','ins_ex_date','ins_scan_copy','insure_com','insure_type'];
    }

    public static function primaryKey(): string
    {
        return 'ins_No';
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
    public function getInsNo(): string
    {
        return $this->ins_No;
    }

    /**
     * @param string $ins_No
     */
    public function setInsNo(string $ins_No): void
    {
        $this->ins_No = $ins_No;
    }

    /**
     * @return string
     */
    public function getInsFromDate(): string
    {
        return $this->ins_from_date;
    }

    /**
     * @param string $ins_from_date
     */
    public function setInsFromDate(string $ins_from_date): void
    {
        $this->ins_from_date = $ins_from_date;
    }

    /**
     * @return string
     */
    public function getInsExDate(): string
    {
        return $this->ins_ex_date;
    }

    /**
     * @param string $ins_ex_date
     */
    public function setInsExDate(string $ins_ex_date): void
    {
        $this->ins_ex_date = $ins_ex_date;
    }

    /**
     * @return string
     */
    public function getInsScanCopy(): string
    {
        return $this->ins_scan_copy;
    }

    /**
     * @param string $ins_scan_copy
     */
    public function setInsScanCopy(string $ins_scan_copy): void
    {
        $this->ins_scan_copy = $ins_scan_copy;
    }

    /**
     * @return string
     */
    public function getInsureCom(): string
    {
        return $this->insure_com;
    }

    /**
     * @param string $insure_com
     */
    public function setInsureCom(string $insure_com): void
    {
        $this->insure_com = $insure_com;
    }

    /**
     * @return string
     */
    public function getInsureType(): string
    {
        return $this->insure_type;
    }

    /**
     * @param string $insure_type
     */
    public function setInsureType(string $insure_type): void
    {
        $this->insure_type = $insure_type;
    }


    public function __construct(array $registerBody=[])
    {

        $this->body= $registerBody;


    }
   
    public function updateinsuarance($body){
        
        $query1="UPDATE veh_insuarance SET ins_No=:ins_no, from_date=:from_date, ex_date=:ex_date, scan_copy=:scan_copy, insure_com=:ins_com, insure_type=:ins_type WHERE veh_Id=:veh_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":ins_no",$body['ins_No']);
        $statement1->bindValue(":from_date",$body['from_date']);
        $statement1->bindValue(":ex_date",$body['ex_date']);
        $statement1->bindValue(":scan_copy",$body['scan_copy']);
        $statement1->bindValue(":ins_com",$body['ins_com']);
        $statement1->bindValue(":ins_type",$body['ins_type']);
        $statement1->bindValue(":veh_id",$body['veh_Id']);
        $statement1->execute();
    }


    public function insExp(){
        return Application::$app->db->pdo->query("SELECT * FROM veh_insuarance INNER JOIN vehicle ON vehicle.veh_Id=veh_insuarance.veh_Id INNER JOIN vehicleowner ON vehicle.vo_Id=vehicleowner.vo_ID AND vehicle.admin_approved=1")->fetchAll(\PDO::FETCH_ASSOC);

    }

    


    



}
