<?php

namespace app\models;

use app\core\dbModel;

class system_complaints extends dbModel
{
    protected string $cid;
    protected string $cus_id;
    protected string $complaint;
    protected string $status = 'Pending';
    protected ?string $image_1 = null;
    protected ?string $image_2 = null;
    protected ?string $image_3  = null;


    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'system_complaints';
    }

    public function attributes(): array
    {
        return ['cid','cus_id', 'complaint', 'status', 'image_1', 'image_2', 'image_3'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @return string
     */
    public function getCid(): string
    {
        return $this->cid;
    }

    /**
     * @param string $cid
     */
    public function setCid(string $cid): void
    {
        $this->cid = $cid;
    }

    /**
     * @return string
     */
    public function getCusId(): string
    {
        return $this->cus_id;
    }

    /**
     * @param string $cus_id
     */
    public function setCusId(string $cus_id): void
    {
        $this->cus_id = $cus_id;
    }

    /**
     * @return string
     */
    public function getComplaint(): string
    {
        return $this->complaint;
    }

    /**
     * @param string $complaint
     */
    public function setComplaint(string $complaint): void
    {
        $this->complaint = $complaint;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getImage1(): string
    {
        return $this->image_1;
    }

    /**
     * @param string $image_1
     */
    public function setImage1(string $image_1): void
    {
        $this->image_1 = $image_1;
    }

    /**
     * @return string
     */
    public function getImage2(): string
    {
        return $this->image_2;
    }

    /**
     * @param string $image_2
     */
    public function setImage2(string $image_2): void
    {
        $this->image_2 = $image_2;
    }

    /**
     * @return string
     */
    public function getImage3(): string
    {
        return $this->image_3;
    }

    /**
     * @param string $image_3
     */
    public function setImage3(string $image_3): void
    {
        $this->image_3 = $image_3;
    }


}