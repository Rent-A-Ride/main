<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;
use app\core\Model;

class vehiclereview extends dbModel
{

    protected int $booking_id;
    protected int $veh_id;
    protected string $comment;
    protected int $rates;



    public static function tableName(): string
    {
        return 'vehiclereviews';
    }

    public static function primaryKey():string
    {
        return 'booking_id';
    }

    public function save(): bool
    {
        return parent::save();
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['booking_id', 'veh_id', 'comment', 'rates'];
    }

    public function getbooking_id(){
        return $this->booking_id;
    }


    /**
     * @param int booking_id
     */
    public function setbooking_id(int $booking_id)
    {
        $this->booking_id = $booking_id;
    }

    /**
     * @return string
     */
    public function getveh_id(): int
    {
        return $this->veh_id;
    }

    /**
     * @param string $firstname
     */
    public function setveh_id(int $veh_id)
    {
        $this->veh_id = $veh_id;
    }

    /**
     * @return string
     */
    public function getcomment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $lastname
     */
    public function setcomment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getrates(): int
    {
        return $this->rates;
    }

    /**
     * @param string $email
     */
    public function setrates(string $rates): void
    {
        $this->rates = $rates;
    }

    public function getReviews($veh_id){
        return Application::$app->db->pdo->query("SELECT * FROM veh_reviews WHERE veh_id=$veh_id")->fetchAll(\PDO::FETCH_ASSOC);
    }


}