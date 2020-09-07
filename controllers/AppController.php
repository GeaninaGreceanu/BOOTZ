<?php

namespace app\controllers;

use app\core\Application;

class AppController {
    public static string $viewName;
    
    public function renderView($view) {
        self::$viewName = $view;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/mainLayout.php";
        $layoutContent = ob_get_clean();
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        $contentPage = ob_get_clean();
        return str_replace('{{content}}', $contentPage, $layoutContent);
    }
}