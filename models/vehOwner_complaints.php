<?php

namespace app\models;

use app\core\dbModel;

class vehOwner_complaints extends dbModel
{

    protected string $cid;
    protected int $cus_ID;
    protected int $vo_ID;
    protected string $complaint = '';
    protected string $status = 'unsolved';
    protected ?string $image_1 = null;
    protected ?string $image_2 = null;
    protected ?string $image_3 = null;


    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vehOwner_complaints';
    }

    public function attributes(): array
    {
        return ['cid', 'cus_ID','vo_ID','complaint','status', 'image_1', 'image_2', 'image_3'];
    }

    public static function primaryKey(): string
    {
        return 'cid';
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
     * @return int
     */
    public function getVoID(): int
    {
        return $this->vo_ID;
    }

    /**
     * @param int $vo_ID
     */
    public function setVoID(int $vo_ID): void
    {
        $this->vo_ID = $vo_ID;
    }

    /**
     * @return string
     */
    public function getComplaint(): string
    {
        return $this->complaint;
    }

    /**
     * @param string $complain
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
     * @return int
     */
    public function getCusID(): int
    {
        return $this->cus_ID;
    }

    /**
     * @param int $cus_ID
     */
    public function setCusID(int $cus_ID): void
    {
        $this->cus_ID = $cus_ID;
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