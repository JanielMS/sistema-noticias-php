<?php

require_once './Router.php';

$router = new Router();

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';

$router->dispatch($url);
