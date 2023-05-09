<?php

namespace app\models;

use app\core\dbModel;

class Notification extends dbModel
{
    protected int $notification_Id;

    protected int $user_id;
    protected string $title;
    protected string $message;
    protected string $status = 'unread';



    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'notifications';
    }

    public function attributes(): array
    {
        return ['user_id', 'title', 'message', 'status'];
    }

    public static function primaryKey(): string
    {
        return 'notification_Id';
    }

    /**
     * @return int
     */
    public function getNotificationId(): int
    {
        return $this->notification_Id;
    }

    /**
     * @param int $notification_Id
     */
    public function setNotificationId(int $notification_Id): void
    {
        $this->notification_Id = $notification_Id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_Id
     */
    public function setUserId(int $user_Id): void
    {
        $this->user_id = $user_Id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
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


}