<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class veh_license extends dbModel
{
    /**
     * @return string
     */
    public function getLicFromDate(): string
    {
        return $this->lic_from_date;
    }

    /**
     * @param string $lic_from_date
     */
    public function setLicFromDate(string $lic_from_date): void
    {
        $this->lic_from_date = $lic_from_date;
    }

    /**
     * @return string
     */
    public function getLicExDate(): string
    {
        return $this->lic_ex_date;
    }

    /**
     * @param string $lic_ex_date
     */
    public function setLicExDate(string $lic_ex_date): void
    {
        $this->lic_ex_date = $lic_ex_date;
    }

    /**
     * @return string
     */
    public function getLicOwner(): string
    {
        return $this->lic_owner;
    }

    /**
     * @param string $lic_owner
     */
    public function setLicOwner(string $lic_owner): void
    {
        $this->lic_owner = $lic_owner;
    }

    /**
     * @return string
     */
    public function getLicScanCopy(): string
    {
        return $this->lic_scan_copy;
    }

    /**
     * @param string $lic_scan_copy
     */
    public function setLicScanCopy(string $lic_scan_copy): void
    {
        $this->lic_scan_copy = $lic_scan_copy;
    }
    protected string $veh_Id;
    protected string $license_No;
    protected string $lic_from_date;
    protected string $lic_ex_date;
    protected string $lic_owner;
    protected string $lic_scan_copy;
    protected string $admin_approved = '0';
    
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
        return ['veh_Id', 'license_No', 'lic_from_date', 'lic_ex_date', 'lic_owner', 'lic_scan_copy', 'admin_approved'];
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

    public function licenseExp(){
        return Application::$app->db->pdo->query("SELECT * FROM veh_license INNER JOIN vehicle ON vehicle.veh_Id=veh_license.veh_Id INNER JOIN vehicleowner ON vehicle.vo_Id=vehicleowner.vo_ID AND vehicle.admin_approved=1")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function updatelicense($body){
        $query1="UPDATE veh_license SET license_No=:lin_no, from_date=:from_date, ex_date=:ex_date WHERE veh_Id=:veh_id";
        $statement1= Application::$app->db->prepare($query1);
        $statement1->bindValue(":lin_no",$body['license_No']);
        $statement1->bindValue(":from_date",$body['from_date']);
        $statement1->bindValue(":ex_date",$body['ex_date']);
        $statement1->bindValue(":veh_id",$body['veh_Id']);
        $statement1->execute();
    }
    

    


    



}
