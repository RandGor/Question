<?php

echo '<table id="tab">';

foreach ($myTable as $arr)
{
    echo '<tr class="tr">
                <td>Номер ученика: '.$arr['id'].'<br>
                Класс: <span onclick="edit(this, \'class\', \''.$arr['id'].'\');">'.$arr['class'].'</span><br>
                Ф.И.О.: <span onclick="edit(this, \'name\', \''.$arr['id'].'\');">'.$arr['name'].'</span><br>
                Дотация: <span onclick="edit(this, \'money\', \''.$arr['id'].'\');">'.$arr['money'].'</span><br>
                День рождения: <span onclick="edit(this, \'birthday\', \''.$arr['id'].'\');">'.$arr['birthday'].'</span>
                </td>
              </tr>';
}

echo '</table>';
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