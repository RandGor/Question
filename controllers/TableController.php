<?php
//////////////////// 4 ////////////////////////

//подключаем модель
require_once('../models/Table.php');
//идём в файл models/Table.php

class TableController
{
    //запускаем нужный экшен в зависимости от того, какой получил или сгенерил Router.php
    public function actionYch()
    {
        $myTable = Table::getMyTable();

        //подключаем нужный view в зависимости от данных о размере экрана, полученных от Router.js
        require_once ('../views/table/'.$_GET['size'].'/index.php');
        //идём в файл view/big иди /small/index.php
    }

    public function actionAdd()
    {
        Table::addYch();
    }

    public function actionEdit()
    {
        Table::editYch();
    }
}


?>