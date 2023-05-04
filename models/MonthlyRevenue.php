<?php

namespace app\models;

use app\core\Application;
use app\core\dbModel;

class MonthlyRevenue extends dbModel
{

    protected string $booking_Id;
    protected string $endDate;
    protected string $total_commision;
    protected int $paied_status;

    /**
     * @return string
     */
    public function getendDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $vehType
     */
    public function setVehType(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function gettotal_commision(): string
    {
        return $this->total_commision;
    }

    /**
     * @param string $minPrice
     */
    public function settotal_commision(string $total_commision): void
    {
        $this->total_commision = $total_commision;
    }

    /**
     * @return string
     */
    public function getpaied_status(): string
    {
        return $this->paied_status;
    }

    /**
     * @param string $maxPrice
     */
    public function setpaied_status(int $paied_status): void
    {
        $this->paied_status = $paied_status;
    }

    /**
     * @return string
     */
    public function getbooking_Id(): int
    {
        return $this->booking_Id;
    }

    /**
     * @param string $vr_Id
     */
    public function setVrId(int $booking_Id): void
    {
        $this->booking_Id = $booking_Id;
    }


    public static function tableName(): string
    {
        return 'booking_Id';
    }

    public function attributes(): array
    {
        return ['booking_Id','endDate','total_commision','paied_status'];
    }

    public static function primaryKey(): string
    {
        return 'booking_Id';
    }

    public function rules(): array
    {
        return [];
    }

    public function getMonthlyRevenue(){
        return Application::$app->db->pdo->query("SELECT YEAR(endDate) AS year, MONTH(endDate) AS month, SUM(total_commission) AS total
        FROM monthly_revenue
        WHERE paied_status = 1
        GROUP BY YEAR(endDate), MONTH(endDate)")->fetchAll(\PDO::FETCH_ASSOC);
    }
}