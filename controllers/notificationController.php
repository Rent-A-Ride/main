<?php


/** @var $notification Notification */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\Notification;

class notificationController extends Controller
{
    public function notification()
    {
        $user = Application::$app->user;
        $primarykey = $user->primaryKey();
        $user_Id = $user->{$primarykey};
        $notifications = Notification::retrieveAll(['user_Id' => $user_Id, 'status' => 'unread']);
        $output = '';

        foreach ($notifications as $notification) {
            $output .= '<li>
                            <a href="#">' .$notification->getTitle(). '</a>
                            <p>' .$notification->getMessage(). '</p>
                        </li>';
        }

        $data = [
            'output' => $output,
            'count' => count($notifications)
        ];


        if ($notifications === false) {
            // There was an error retrieving the notifications
            $error = [
                'error' => 'Unable to retrieve notifications'
            ];
            return json_encode($error);
        }

        header('Content-Type: application/json');
        echo json_encode($notifications);
    }

}