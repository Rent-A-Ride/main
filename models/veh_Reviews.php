<?php

namespace app\models;

use app\core\dbModel;

class veh_Reviews extends dbModel
{
    protected int $id;
    protected int $veh_Id;
    protected int $cus_Id;
    protected float $rating;
    protected string $comments;
    protected string $created_at;


    public function rules(): array
    {
        return ['id' => [self::RULE_REQUIRED],
            'veh_Id' => [self::RULE_REQUIRED],
            'cus_Id' => [self::RULE_REQUIRED],
            'rating' => [self::RULE_REQUIRED]
        ];
    }

    public static function tableName(): string
    {
        return 'veh_reviews';
    }

    public function attributes(): array
    {
        return ['id', 'veh_Id', 'cus_Id', 'rating', 'comments', 'createdAt'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getVehId(): int
    {
        return $this->veh_Id;
    }

    /**
     * @param int $veh_Id
     */
    public function setVehId(int $veh_Id): void
    {
        $this->veh_Id = $veh_Id;
    }

    /**
     * @return int
     */
    public function getCusId(): int
    {
        return $this->cus_Id;
    }

    /**
     * @param int $cus_Id
     */
    public function setCusId(int $cus_Id): void
    {
        $this->cus_Id = $cus_Id;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }




}