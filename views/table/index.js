function edit(e, func, id)
{
    //при клике на какую либо строчку срабатывает onclick, который запускает эту функцию
    //где e = это сам объект на который ткнули
    //func = для того, что бы определить, что это за поле
    //id = для того, что бы понять, какому ученику менять данные

    //запоминаем данные которые были до клика
    last_data = e.innerHTML;

    //стираем всё внутри объекта
    e.innerHTML='';

    //убираем onclick, что бы не срабатывала функция снова и снова
    e.removeAttribute('onclick');

    //в зависимости от того, какая колонка, продолжаем выполнять функцию
    if (func == 'class')
    {
        //создаем объект
        edit_e = document.createElement('select');
        //заносим в него евенты
        edit_e.setAttribute('onBlur', 'onchan (this, \'' + func + '\', \'' + id + '\');');
        edit_e.setAttribute('onchange', 'sel_blur(this)');
        //добавляем новый объект как дочерний в тот, по которому был сделан клик
        e.appendChild(edit_e);

        //проходим в цикле и создаем option'ы в новосозданном selecte
        for (i=0; i<11; i++)
        {
            edit_e.options[i] = new Option(i+1, i+1);
        }

        //делаем фокус на select
        edit_e.focus();
        //делаем какой то option уже выбранный в зависимости от того, что было написанно до этого
        edit_e.options[last_data-1].selected='selected';
    }
    //дальше всё по аналогии

    if (func == 'name')
    {
        edit_e = document.createElement('input');
        edit_e.type='text';
        edit_e.setAttribute('onBlur', 'onfoc (this, \'' + func + '\', \'' + id + '\');');
        e.appendChild(edit_e);

        edit_e.focus();
        edit_e.value=last_data;
    }

    if (func == 'money')
    {
        edit_e = document.createElement('select');
        edit_e.setAttribute('onBlur', 'onchan (this, \'' + func + '\', \'' + id + '\');');
        edit_e.setAttribute('onchange', 'sel_blur(this)');
        e.appendChild(edit_e);

        for (i=0; i<2; i++)
        {
            edit_e.options[i] = new Option(i, i);
        }
        edit_e.focus();
        edit_e.options[last_data].selected='selected';
    }

    if (func == 'birthday')
    {
        edit_e = document.createElement('input');
        edit_e.type='text';
        edit_e.setAttribute('onBlur', 'onfoc (this, \'' + func + '\', \'' + id + '\');');
        e.appendChild(edit_e);

        edit_e.focus();
        edit_e.value=last_data;
    }
}

function onfoc(e, func, id)
{
    //берём новые данные, запооминаем их
    new_data = e.value;
    //пока не забыли дочерний объект, определяем родительский
    e.parentNode.setAttribute('onclick', 'edit(this, \'' + func + '\', \'' + id + '\');');
    //что бы занести в него новые данные, тем самым удалив и всё уже ненужное
    e.parentNode.innerHTML=new_data;

    //отправляем ajax на роутер, что бы цикл MVC снова прошёл и вышел на модели для нужных запросов к БД
    $.ajax({
        url:'components/Router.php',
        method: 'POST',
        data:{controllerName:'TableController', actionName:'actionEdit', id:id, func:func, new_data:new_data},
    })
}

function onchan(e, func, id)
{
    new_data = e.options [e.selectedIndex].value;
    e.parentNode.setAttribute('onclick', 'edit(this, \'' + func + '\', \'' + id + '\');');
    e.parentNode.innerHTML = new_data;

    $.ajax({
        url:'components/Router.php',
        method: 'POST',
        data:{controllerName:'TableController', actionName:'actionEdit', id:id, func:func, new_data:new_data},
    })
}
function sel_blur(e)
{
    e.blur();
}

//функцимя, которая запускается при нажатии на кнопку "Добавить" в форме
function add_ych()
{
    //проверка валидностей заполненных полей
    //valid = true;

    /*
    if (document.add_form.add_class.options[document.add_form.add_class.selectedIndex].value=='0')
    {
        document.getElementById('err_class').innerHTML = 'Не выбран класс';
        valid = false;
    }
    else
    {
        document.getElementById('err_class').innerHTML = '';
        add_class = document.add_form.add_class.options[document.add_form.add_class.selectedIndex].value;
    }

    if (document.add_form.add_fio.value == "" )
    {
        document.getElementById('err_fio').innerHTML = 'Поле Ф.И.О. пустое';
        valid = false;
    }
    else
    {
        document.getElementById('err_fio').innerHTML = '';
        add_fio = document.add_form.add_fio.value;
    }

    for (i=0; i<document.add_form.money.length; i++)
    {
        if (document.add_form.money[i].checked == false)
        {
            document.getElementById('err_money').innerHTML = 'Не выбрана дотация';
            valid_M = false;
        }
        else
        {
            document.getElementById('err_money').innerHTML = '';
            add_money = document.add_form.money[i].value;
            valid_M = true;
            break;
        }
    }
    if(valid_M == false)
    {
        valid = false;
    }

    if (document.add_form.add_birthday.value == "")
    {
        document.getElementById('err_birthday').innerHTML = 'Не введён день рождения';
        valid = false;
    }
    else
    {
        if (!/(\d{4})\-(0\d|1[012])\-([0-2]\d|3[01])/.test(document.add_form.add_birthday.value))
        {
            document.getElementById('err_birthday').innerHTML = 'Формат даты: YYYY-MM-DD';
            valid = false;
        }
        else
        {
            document.getElementById('err_birthday').innerHTML = '';
            add_birthday = document.add_form.add_birthday.value;

        }
    }*/

    //if (valid == true)
    //{
        //если всё ок, отправялем ajax, с целью занесения новых данных в БД
        $.ajax({
            url:'index.php',
            method: 'POST',
            data:{qqq:'tableAdd', add_class:add_class, add_fio:add_fio, add_money:add_money, add_birthday:add_birthday},
            success: function (data)
            {
                alert(data);
            }
        })
    //}
    //return valid;


}