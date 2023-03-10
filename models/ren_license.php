<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class ren_license extends dbModel
{
    protected string $veh_Id;
    protected string $license_No;
    protected string $from_date;
    protected string $ex_date;
    protected string $owner;
    protected string $scan_copy;
    protected string $admin_approved;
    
    private array $body;

    

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'ren_license';
    }

    public function attributes(): array
    {
       return ['veh_Id','license_No','$from_date','$ex_date','$owner','scan_copy','$admin_approved'];
    }

    public static function primaryKey(): string
    {
        return 'license_No';
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
    public function getlicense_No(): string
    {
        return $this->license_No;
    }

    /**
     * @param string $plate_No
     */
    public function setlicense_No(string $license_No): void
    {
        $this->license_No = $license_No;
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
    public function getowner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $veh_type
     */
    public function setowner(string $owner): void
    {
        $this->owner = $owner;
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

    /**
     * @return string
     */
    public function getadmin_approved(): string
    {
        return $this->admin_approved;
    }

    /**
     * @param string $veh_location
     */
    public function setadmin_approved(string $admin_approved): void
    {
        $this->admin_approved = $admin_approved;
    }


    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


    }

    public function licenseren($vehicle_id){
        return Application::$app->db->pdo->query("SELECT * FROM ren_license INNER JOIN vehicle ON vehicle.veh_Id=$vehicle_id AND ren_license.veh_Id=$vehicle_id")->fetchAll(\PDO::FETCH_ASSOC);

    }
    

    


    



}
