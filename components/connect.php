<?
define('HOST', 'localhost'); //сервер
define('USER', 'z99677jo_kaktus'); //пользователь
define('PASSWORD', 'Kaktus3000'); //пароль
define('NAME_BD', 'z99677jo_kaktus');//база

class DB {

    protected static $_instance;  //экземпляр объекта

    public static function getInstance() { // получить экземпляр данного класса
        if (self::$_instance === null) { // если экземпляр данного класса  не создан
            self::$_instance = new self;  // создаем экземпляр данного класса
        }
        return self::$_instance; // возвращаем экземпляр данного класса
    }

    private  function __construct() { // конструктор отрабатывает один раз при вызове DB::getInstance();
        $this->connect = mysqli_connect(HOST, USER, PASSWORD) or die("Невозможно установить соединение".mysqli_error($this->connect));// выбираем таблицу
        mysqli_select_db($this->connect,NAME_BD) or die ("Невозможно выбрать указанную базу".mysqli_error($this->connect));
        $this->query('SET names "utf8"');

    }

    private function __clone() { //запрещаем клонирование объекта модификатором private
    }

    private function __wakeup() {//запрещаем клонирование объекта модификатором private
    }

    public static function query($sql) {

        $obj=self::$_instance;

        if(isset($obj->connect)){
            $result=mysqli_query($obj->connect, $sql)or die("<br/><span style='color:red'>Ошибка в SQL запросе:</span> ".mysqli_error($obj->connect));

            return $result;
        }
        return false;
    }

    //возвращает запись в виде объекта
    public static function fetch_assoc($object)
    {
        return @mysqli_fetch_assoc($object);
    }
}