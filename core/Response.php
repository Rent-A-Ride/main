<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: '.$url);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
//          $layoutContent= $this->getLayout();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

    public function render(string $view, string $layout, array $pageParams = [], array $layoutParams = []): string
    {
        $layoutContent = $this->getLayout($layout, $layoutParams);
        $viewContent = $this->renderOnlyView($view, $pageParams);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    private function getLayout(string $layout, array $params = []): string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR. "/views/layouts/$layout.php";
        return ob_get_clean();
    }

}