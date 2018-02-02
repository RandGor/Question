<?php
class ErrorController
{
    //запускаем нужный экшен в зависимости от того, какой получил или сгенерил Router.php
    public function actionError()
    {
        require_once (ROOT.'/views/error/error.php');
        return true;
    }
}

?>