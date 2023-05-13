<?php


/** @var $notification Notification */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Notification;
use app\models\voNotifications;

class notificationController extends Controller
{
    public function notification()
    {
        $user = Application::$app->user;
        $primaryKey = $user->primaryKey();
        $userId = $user->{$primaryKey};
        $notifications = Notification::retrieveAll(['user_id' => $userId, 'status' => 'unread']);

        if ($notifications === false) {
            // There was an error retrieving the notifications
            $error = [
                'error' => 'Unable to retrieve notifications'
            ];
            return json_encode($error);
        }

        $output = '';

        foreach ($notifications as $notification) {
            $output .= '<li><a href="'.$notification->getLink().'" onclick="markAsRead('.$notification->getNotificationId().')">' . $notification->getTitle() . '</a><p>' . $notification->getMessage() . '</p></li>';
        }

        $params = [
            'output' => $output,
            'count' => count($notifications)
        ];

        $data[] = $params;


        return json_encode($data);
    }

    public function updateNotificationStatus(Request $request, Response $response)
    {
        // Get the notification ID from the post request
        $notificationId = $request->getBody()['notificationId'];

        // Update the notification status to "read" in the database
        $notification = Notification::findOne(['notification_Id' => $notificationId]);
        if ($notification) {
            $notification->setStatus('read');
            $notification->update($notificationId);
            return json_encode(['notification' => "Removed notification with ID: $notificationId"]);
        } else {
            return json_encode(['error' => 'Notification not found']);
        }
    }






}