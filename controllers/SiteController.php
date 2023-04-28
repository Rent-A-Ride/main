<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Customer;
use Dompdf\Dompdf;


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

    public function generatePDF(Request $req, Response $res,$data)
    {
        // Create a new PDF document
        $dompdf = new Dompdf();

        // Render HTML content as PDF
        $html = '';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Save PDF to local storage
        $pdfData = $dompdf->output();
        $filePath = 'path/to/save/pdf.pdf';
        file_put_contents($filePath, $pdfData);

        // Download PDF to user's device
        $res->download($filePath);
    }


}