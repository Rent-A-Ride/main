<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Customer;

class SiteController extends Controller
{
    public function home(Request $req,Response $res)
    {
        return $res->render('Home','home');
        
    }
    public function contact(): string
    {
        return $this->render('contact');
    }
    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }

    public function uploadImage(Request  $request, Response $response)
    {
        $image=$_FILES['image'];
        $Customer=Customer::findOne(['cus_Id'=>Application::$app->customer->cus_Id]);
        $image['name']='profile'.Application::$app->customer->cus_Id.'.jpg';

        if (!empty($image)){
            move_uploaded_file($image['tmp_name'],Application::$ROOT_DIR.'/public/assets/img/uploads/userProfile/'.$image['name']);

        }
        $Customer->profile_pic='assets/img/uploads/userProfile/'.$image['name'];
        $Customer->update(Application::$app->customer->cus_Id,['profile_pic']);
        Application::$app->session->setFlash('profileUpdate', 'Profile picture Updated Successfully!');
        Application::$app->response->redirect('/profile');


        return json_encode(['status'=>true]);

    }
}