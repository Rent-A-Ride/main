<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class driver_complaint_resolve_notification extends dbModel
{
    protected string $com_ID;
    protected string $cus_ID;
    protected string $cus_Name;
    protected string $driver_ID;
    protected string $driver_Name;
    protected string $action;
    private array $body;
    
    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'driver_complaint_resolve_notification';
    }

    public function attributes(): array
    {
       return ['com_ID','cus_ID','cus_Name','driver_ID','driver_Name','action'];
    }

    public static function primaryKey(): string
    {
        return 'com_ID';
    }

    /**
     * @return string
     */
    public function getcom_ID(): string
    {
        return $this->com_ID;
    }

    /**
     * @param string $veh_Id
     */
    public function setcom_ID(string $com_ID): void
    {
        $this->com_ID = $com_ID;
    }

    /**
     * @return string
     */
    public function getcus_ID(): string
    {
        return $this->cus_ID;
    }

    /**
     * @param string $plate_No
     */
    public function setcus_ID(string $cus_ID): void
    {
        $this->cus_ID = $cus_ID;
    }

    /**
     * @return string
     */
    public function getcus_Name(): string
    {
        return $this->cus_Name;
    }

    /**
     * @param string $veh_brand
     */
    public function setcus_Name(string $cus_Name): void
    {
        $this->cus_Name = $cus_Name;
    }

    /**
     * @return string
     */
    public function getdriver_ID(): string
    {
        return $this->driver_ID;
    }

    /**
     * @param string $veh_model
     */
    public function setvehicle_No(string $driver_ID): void
    {
        $this->driver_ID = $driver_ID;
    }

    /**
     * @return string
     */
    public function getdriver_Name(): string
    {
        return $this->driver_Name;
    }

    /**
     * @param string $veh_model
     */
    public function setvehicle_Name(string $driver_Name): void
    {
        $this->driver_Name = $driver_Name;
    }

    /**
     * @return string
     */
    public function getaction(): string
    {
        return $this->action;
    }

    /**
     * @param string $veh_type
     */
    public function setaction(string $action): void
    {
        $this->action = $action;
    }

    public function save():bool
    {
        return parent::save();
    }


    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


    }


    
    

    


    



}
