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
    protected string $from_date;
    protected string $ex_date;
    protected string $scan_copy;
    protected string $ins_com;
    protected string $ins_type;
    // protected string $admin_approved;
    
    private array $body;

    

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'veh_license';
    }

    public function attributes(): array
    {
       return ['veh_Id','ins_No','from_date','ex_date','scan_copy','ins_com','ins_type'];
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
    public function getins_No(): string
    {
        return $this->ins_No;
    }

    /**
     * @param string $plate_No
     */
    public function setins_No(string $license_No): void
    {
        $this->ins_No = $license_No;
    }

    /**
     * @return string
     */
    public function getfrom_date(): string
    {
        return $this->from_date;
    }

    /**
     * @param string $veh_brand
     */
    public function setfrom_date(string $from_date): void
    {
        $this->from_date = $from_date;
    }

    /**
     * @return string
     */
    public function getex_date(): string
    {
        return $this->ex_date;
    }

    /**
     * @param string $veh_model
     */
    public function setex_date(string $ex_date): void
    {
        $this->ex_date = $ex_date;
    }

    /**
     * @return string
     */
    public function getinsure_com(): string
    {
        return $this->ins_com;
    }

    /**
     * @param string $veh_type
     */
    public function setinsure_com(string $insure_com): void
    {
        $this->ins_com = $insure_com;
    }

    public function getinsure_type(): string
    {
        return $this->ins_type;
    }

    /**
     * @param string $veh_type
     */
    public function setinsure_type(string $insure_type): void
    {
        $this->ins_type = $insure_type;
    }

    public function getscan_copy(): string
    {
        return $this->scan_copy;
    }

    /**
     * @param string $veh_type
     */
    public function setscan_copy(string $scan_copy): void
    {
        $this->scan_copy = $scan_copy;
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

    


    



}
