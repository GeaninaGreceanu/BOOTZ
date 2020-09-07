<?php

namespace app\core;

use app\controllers\AppController;

class Router {

    public Request $request;
    public AppController $appController;
    public Response $response;
    protected array $routes =[];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response =  $response;
        $this->appController = new AppController();
    }


    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            $this->response->setStatusCode(404);
            return $this->appController->renderView('_404');
        }
        if(is_string($callback)) {
            return $this->appController->renderView($callback);
        }
        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback);
    }

}