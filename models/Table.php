<?php
//////////////////// 5 ////////////////////////

class Table
{
    //экшены с запросами к бд, которые связанны соответсвенно только с Таблицей
    public static function getMyTable()
    {
        DB::getInstance();

        $result=DB::query("SELECT * FROM `ych`");

        while($obj=DB::fetch_assoc($result)){
            $arr[] = $obj;
        }
        return $arr;
    }

    public static function addYch()
    {
        DB::getInstance();

        //$result=DB::query("INSERT INTO `ych` SET `class`='{$_POST['add_class']}', `name`='{$_POST['add_fio']}', `money`='{$_POST['add_money']}', `birthday`='{$_POST['add_birthday']}'");
    }

    public static function editYch()
    {
        DB::getInstance();

        $result=DB::query("UPDATE `ych` SET `{$_POST['func']}`='{$_POST['new_data']}' WHERE `id`='{$_POST['id']}'");
    }
}
?>