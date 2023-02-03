<?php

namespace app\core;

use app\core\Request;
use app\core\Response;
class Controller
{
    public string $layout = 'main';
   
    

    public function setLayout($layout)
    {
        $this->layout = $layout;

    }
    public function render($view, $params = [])
    {
        // return $this->response->renderView($view, $params);
        return Application::$app->response->renderView($view, $params);
    }

}