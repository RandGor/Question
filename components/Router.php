<?php
require_once(ROOT.'/components/connect.php');

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURL()
    {
        if (empty($_POST['qqq']))
        {
            if (!empty($_SERVER['REQUEST_URI']))
            {
                return trim($_SERVER['REQUEST_URI']);
            }
        }
        else
        {
            return $_POST['qqq'];
        }
    }

    public function run()
    {
        $uri = $this->getURL();

        foreach ($this->routes as $uriPattern => $path)
        {
            if(preg_match("|$uriPattern|", "$uri"))
            {
                $seg = explode('/', $path);

                $controllerName = array_shift($seg).'Controller';
                $actionName = 'action'.array_shift($seg);

                if (file_exists(ROOT.'/controllers/'.$controllerName.'.php'))
                {
                    require_once(ROOT.'/controllers/'.$controllerName.'.php');
                }
                else
                {
                    echo 'нет такого файла';
                }

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();

                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}

// переходим в файл controllers/TableController.php*/
?>