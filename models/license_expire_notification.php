<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;
use app\core\dbModel;

class license_expire_notification extends dbModel
{
    protected int $notification_id;
    protected string $vo_ID;
    protected string $veh_Id;
    protected string $plate_No;
    protected string $owner;
    protected string $owner_email;
    protected string $exp_date;
    protected string $no_of_date;
    protected string $message;
    protected string $type;
    private array $body;
    
    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'license_expire_notification';
    }

    public function attributes(): array
    {
       return ['vo_ID','veh_Id','plate_No','owner','owner_email','exp_date','no_of_date','message','type'];
    }

    public static function primaryKey(): string
    {
        return 'notification_id';
    }

    /**
     * @return string
     */
    public function getnotification_id(): string
    {
        return $this->notification_id;
    }

    /**
     * @param string $veh_Id
     */
    // public function setcom_ID(string $com_ID): void
    // {
    //     
    // }

    /**
     * @return string
     */
    public function getvo_ID(): string
    {
        return $this->vo_ID;
    }

    /**
     * @param string $plate_No
     */
    public function setvo_ID($vo_ID): void
    {
        $this->vo_ID = $vo_ID;
    }

    /**
     * @return string
     */
    public function getveh_Id(): string
    {
        return $this->veh_Id;
    }

    /**
     * @param string $veh_brand
     */
    public function setveh_Id(string $veh_Id): void
    {
        $this->veh_Id = $veh_Id;
    }

    /**
     * @return string
     */
    public function getvehicle_No(): string
    {
        return $this->plate_No;
    }

    /**
     * @param string $veh_model
     */
    public function setvehicle_No(string $vehicle_No): void
    {
        $this->plate_No = $vehicle_No;
    }

    /**
     * @return string
     */
    public function getowner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $veh_model
     */
    public function setowner(string $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getowner_email(): string
    {
        return $this->owner_email;
    }

    /**
     * @param string $veh_model
     */
    public function setowner_email(string $owner_email): void
    {
        $this->owner_email = $owner_email;
    }

    /**
     * @return string
     */
    public function getexp_date(): string
    {
        return $this->exp_date;
    }

    /**
     * @param string $veh_model
     */
    public function setexp_date(string $exp_date): void
    {
        $this->plate_No = $exp_date;
    }

    /**
     * @return string
     */
    public function getno_of_date(): string
    {
        return $this->no_of_date;
    }

    /**
     * @param string $veh_model
     */
    public function setno_of_date(string $no_of_date): void
    {
        $this->no_of_date = $no_of_date;
    }

    /**
     * @return string
     */
    public function getmessage(): string
    {
        return $this->message;
    }

    
    /**
     * @param string $veh_model
     */
    public function settype(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function gettype(): string
    {
        return $this->type;
    }

    /**
     * @param string $veh_type
     */
    public function setaction(string $message): void
    {
        $this->message = $message;
    }

    public function save():bool
    {
        return parent::save();
    }


    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


    }

    public function retreivedetails($user_id){
        
        return Application::$app->db->pdo->query("SELECT * FROM license_expire_notification Where vo_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }


    
    

    


    



}
