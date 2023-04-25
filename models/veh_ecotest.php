<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class veh_ecotest extends dbModel
{
    protected string $veh_Id;
    protected string $eco_scan_copy;



    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'veh_ecotest';
    }

    public function attributes(): array
    {
        return ['veh_Id','eco_scan_copy'];
    }

    public static function primaryKey(): string
    {
        return 'veh_Id';
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

//    public function updateinsuarance($body){
//
//        $query1="UPDATE veh_insuarance SET ins_No=:ins_no, from_date=:from_date, ex_date=:ex_date, scan_copy=:scan_copy, insure_com=:ins_com, insure_type=:ins_type WHERE veh_Id=:veh_id";
//        $statement1= Application::$app->db->prepare($query1);
//
//        $statement1->bindValue(":scan_copy",$body['scan_copy']);
//
//        $statement1->execute();
//    }








}
