/////////////////// 2 ///////////////////

function router(href)
{
    // смотрим ссылку, разбираем её, если переменная href пустая
    if (href == null)
    {
        href = window.location.pathname.split('/')[1];
        if (href == '')
        {
            href = 'table';
        }
    }

    //получили href

    //отправляем json на config/routes.php за массивом прописанных зарание роутов
    $.getJSON({
        url:'config/routes.php',
        success: function (path) {

            //смотрим совпадения
            if (path.hasOwnProperty(href))
            {
                //если есть, то определяем как будут называться будущие контроллер и экшен
                controllerName = path[href].split('/')[0] + 'Controller';
                actionName = 'action' + path[href].split('/')[1];
            }
            else
            {
                controllerName = 'er404';
                actionName = 'er404';
                console.log('error404');
                return;
            }

            //определяем размер экрана
            if (document.body.clientWidth >= 600) size='big';
            else size='small';

            //посылаем аякс, дабы запустить всю кашу MVC, которую я очень пытался сохранить
            //не знал как правильно впихать проверку на ширину экрана.. решил сделать это в самом начале, из за чего переписал половину роутера на JS
            //идём в components/Router.php, смотрим что дальше делается
            $.ajax({
                url: 'components/Router.php',
                method: 'GET',
                data:{controllerName:controllerName, actionName:actionName, size:size},
                success: function (data) {
                    //выгружаем данные
                    document.getElementById('content').innerHTML=data;
                }
            });
        }
    })
}

// функция по окончанию загрузки дума
// так как index.php практически ни чего не имеет в себе, это происходит моментально и запускается MVC.. вроде как)
window.onload = (function()
{
    router();
});