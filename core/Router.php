<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback):void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->response->renderView('_404'); 
            
        }
        if (is_string($callback)) {
            return $this->response->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
//             Application::$app->controller = new $callback[0]();
//             $callback[0] = Application::$app->controller;

        }
        return call_user_func($callback, $this->request, $this->response );
    }

    


}
