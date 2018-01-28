<?php
//подключается шапка сайта
require_once ('../template/header.php');
echo '<div style="height:60px;"></div>';

//собственно сама таблица
echo '<table id="tab">
        <tr>
            <th>Номер</th>
            <th>Класс</th>
            <th>Ф.И.О.</th>
            <th>Дотация</th>
            <th>День рождения</th>
        </tr>';

    foreach ($myTable as $arr)
    {
        echo '<tr class="tr">
                <td>'.$arr['id'].'</td>
                <td onclick="edit(this, \'class\', \''.$arr['id'].'\');">'.$arr['class'].'</td>
                <td onclick="edit(this, \'name\', \''.$arr['id'].'\');">'.$arr['name'].'</td>
                <td onclick="edit(this, \'money\', \''.$arr['id'].'\');">'.$arr['money'].'</td>
                <td onclick="edit(this, \'birthday\', \''.$arr['id'].'\');">'.$arr['birthday'].'</td>
              </tr>';
    }

echo '</table>';

    //далее форма

//ИДЁМ В views/table/index.js
?>

<form name="add_form" method="post" onsubmit="return add_ych();">
    <div id="forma">
        <div style="text-align:center; margin-top:15px;">Добавление ученика</div>

        <div class="part">
            Класс<br>
            <div id="err_class" class="err"></div>
            <select id="add_class" class="input">
                <option value="0"></option>
                <option value="1">1</option>
            </select>
        </div>

        <div class="part">
            Ф.И.О.<br>
            <div id="err_fio" class="err"></div>
            <input id="add_fio" name="add_fio" class="input" type="text"/>
        </div>

        <div class="part">
            Дотация<br>
            <div id="err_money" class="err"></div>
            <label>Да<input type="radio" value="1" name="money"/></label>
            <label>Нет<input type="radio" value="0" name="money"/></label>
        </div>

        <div class="part">
            День рождения<br>
            <div id="err_birthday" class="err"></div>
            <input id="add_birthday" class="input" type="text"/>
        </div>

        <div class="part">
            <input type="submit" value="Добавить"/>
        </div>
    </div>
</form>
