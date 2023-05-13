<?php

namespace app\models;

use app\core\dbModel;

class voNotifications extends dbModel
{
    protected int $notification_id;

    protected int $user_id;
    protected string $title;
    protected string $message;
    protected ?string $link = null;
    protected string $status = 'unread';

    public function rules(): array
    {
        return [];
    }

    public static function tableName(): string
    {
        return 'vo_notifications';
    }

    public function attributes(): array
    {
        return ['user_id', 'title', 'message', 'link', 'status'];
    }

    public static function primaryKey(): string
    {
        return 'notification_Id';
    }

    //    Send a notification function
    public static function sendNotification($userId, $title, $message, $link = null): bool
    {
        $notification = new voNotifications();
        $notification->setUserId($userId);
        $notification->setTitle($title);
        $notification->setMessage($message);
        $notification->setLink($link);
        $notification->save();

        return true;
    }

    /**
     * @return int
     */
    public function getNotificationId(): int
    {
        return $this->notification_id;
    }

    /**
     * @param int $notification_Id
     */
    public function setNotificationId(int $notification_Id): void
    {
        $this->notification_id = $notification_Id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
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
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
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