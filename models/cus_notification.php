<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class cus_notification extends dbModel
{
    protected int $cus_Id;
    protected string $msg;

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'custmer_payment';
    }

    public function attributes(): array
    {
        return ['cus_Id','msg'];
    }

    public static function primaryKey(): string
    {
        return 'cus_Id';
    }

    

    /**
     * @return string
     */
    public function getCusId(): int
    {
        return $this->cus_Id;
    }

    /**
     * @param string $booking_Id
     */
    public function setBookingId(int $cus_Id): void
    {
        $this->cus_Id = $cus_Id;
    }

    

    /**
     * @return string
     */
    public function getmsg(): int
    {
        return $this->msg;
    }

    /**
     * @param string $vo_Id
     */
    public function settotal_rent(string $msg): void
    {
        $this->msg = $msg;
    }

    


    public function insertmsg($body){
        
        try {
            
            $cus_Id=$body['cus_Id'];
            $query = "INSERT INTO cus_notification VALUES(:cus_id,:msg)";
            $statement= Application::$app->db->prepare($query);
            $statement->bindValue(":cus_id",intval($cus_Id));
            $statement->bindValue(":msg",$body['msg']);
            $statement->execute();
           
        } catch (\Throwable $th) {
            return $th;
        }
    }

   


    

    





}