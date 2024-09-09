<?php

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            '/' => 'LoginController@login',
            'login' => 'LoginController@login',
            'logout' => 'LoginController@logout',
            'usuarios' => 'UsuarioController@criar',
            'usuarios/listar' => 'UsuarioController@listar',
            'usuarios/desativar' => 'UsuarioController@desativar',
            'usuarios/desativados' => 'UsuarioController@desativados',
            'usuarios/reativar' => 'UsuarioController@reativar',
            'usuarios/editar' => 'UsuarioController@editar',
            'usuarios/atualizar' => 'UsuarioController@atualizar',
            'usuarios/visualizar' => 'UsuarioController@visualizar'
        ];
    }

    public function dispatch($url)
    {
        if (array_key_exists($url, $this->routes)) {
            $this->callControllerAction($this->routes[$url]);
        } else {
            http_response_code(404);
            echo "Página não encontrada.";
        }
    }

    private function callControllerAction($action)
    {
        list($controllerName, $methodName) = explode('@', $action);

        $controllerFile = __DIR__ . "/src/controllers/{$controllerName}.php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo "Método não encontrado.";
            }
        } else {
            echo "Controlador não encontrado.";
        }
    }
}
