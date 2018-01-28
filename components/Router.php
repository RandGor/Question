<?php
////////////// 3 ////////////////////

//запоминаем название контроллера и экшена
if (empty($_POST['controllerName']) && empty($_POST['actionName']))
{
    $controllerName = $_GET['controllerName'];
    $actionName = $_GET['actionName'];
}
else
{
    $controllerName = $_POST['controllerName'];
    $actionName = $_POST['actionName'];
}

//коннектимся
require_once("../components/connect.php");

class Router
{
    public $controllerName;
    public $actionName;

    public function run()
    {
        //генерим навзание подключаемого контроллера (в нашем случае это TableController.php)
        require_once('../controllers/'.$this->controllerName.'.php');

        //создаем объект с классом $controllerName (в нашем случае это TableController)
        $controllerObject = new $this->controllerName;
        //Выбираем экшен $actionName (в нашем случае, это actionYch)
        $actionName = $this->actionName;
        $result = $controllerObject->$actionName();
    }
}

//создаём объект класса Router и запускаем им всю остальную кашу
$router = new Router();
$router->controllerName = $controllerName;
$router->actionName = $actionName;
$router->run();

// переходим в файл controllers/TableController.php
?>