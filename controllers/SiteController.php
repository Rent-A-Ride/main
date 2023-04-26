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
        return $this->render('contact',"");
    }
    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }

    public function uploadImage(Request  $request, Response $response)
    {
        $image=$_FILES['image'];
        $Customer=Customer::findOne(['cus_Id'=>Application::$app->user->cus_Id]);
        $image['name']='profile'.Application::$app->user->cus_Id.'.jpg';

        if (!empty($image)){
            move_uploaded_file($image['tmp_name'],Application::$ROOT_DIR.'/public/assets/img/uploads/userProfile/'.$image['name']);

        }
        $Customer->profile_pic=$image['name'];
        $Customer->update(Application::$app->user->cus_Id,['profile_pic']);
        Application::$app->session->setFlash('profileUpdate', 'Profile picture Updated Successfully!');
        Application::$app->response->redirect('/Customer/Profile');


        return json_encode(['status'=>true]);

    }

    public function uploadDocument($inputName, $uploadFolder) {
        if(isset($_FILES[$inputName])) {
            // Get the file name and tmp file location
            $fileName = $_FILES[$inputName]['name'];
            $fileTmp = $_FILES[$inputName]['tmp_name'];

            // Generate a unique file name
            $newFileName = uniqid() . "_" . $fileName;

            // Move the file to the upload folder
            if(move_uploaded_file($fileTmp, $uploadFolder . $newFileName)) {
                // File uploaded successfully
                return $uploadFolder . $newFileName;
            } else {
                // File upload failed
                return false;
            }
        } else {
            // No file uploaded
            return false;
        }
    }
}