<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;
use app\core\Request;
use app\core\Response;
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;

    }
    public function render($view, $params = [])
    {
        // return $this->response->renderView($view, $params);
        return Application::$app->response->renderView($view, $params);
    }

    public function customerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

}