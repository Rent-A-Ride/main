<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

class SiteController extends Controller
{
    public function home(Request $req,Response $res)
    {
        // $params = [
        //     'name' => "Rent A Ride"
        // ];

        // return $this->render('home', $params);
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
}