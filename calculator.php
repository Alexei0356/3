
<?php
use Matex\Evaluator;

//Включение файлов
require __DIR__ . '/vendor/autoload.php';
// Создание переменной
$expression = isset($_POST['data']) ? $_POST['data'] : "";
// Убираем пробелы из выражения
$expression = preg_replace('/\s/', "",$expression );
// Выводим значения переменных
var_dump($_POST,$expression);
//print_r($expression);
?>

<!--создаём html-форму для ввода и отправки строки-->
<form action="?do=calc" method="post">
    <input type="text"  name="data" placeholder="Введите выражение" value ="<?=$expression ?>" />
    <input type="submit" value="Рассчитать" />
</form>

<?php
//функция для отправки данных в БД
function INSERT($tableName, $expression) {
    // Подключение  MySQL к калькулятору
    $mysql = new mysqli('localhost','root','11111111','learning-DB');
    $mysql-> query("INSERT INTO `$tableName` (`expression`) VALUES ('$expression') ");
    //Закрытие соединения с БД
    $mysql-> close();
}


// Если  HTTP-запрос типа POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Объявляем переменную для результата
    $result = null;
//  Проверка выражения на содержание лишних символов
    if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/", $expression)) {
//  Проверка выражения на совпадение скобок
        if (substr_count($expression, "(") === substr_count($expression, ")")) {
            // try - это начало блока, в котором выполняется код, который может произвести ошибку при выполнеии
            // catch - ошибка поймана в Exception $ex
            try {
                $evaluator = new Evaluator();
                $result = $evaluator->execute($expression);
                //Отправка строки в БД при коректном вводе выражения
                $mysql = new mysqli('localhost','root','11111111','learning-DB');
                $mysql-> query("INSERT INTO `correct` (`result`,`expression`) VALUES ('$result','$expression') ");
//    Закрытие соединения с БД
                $mysql-> close();
            } catch (Exception $ex) {
//                print_r($ex);
                $result = $ex ->getMessage();
            }
        } else {
            //Отправка строки в БД при несовпадении скобок
            INSERT('incorrect',$expression);
            $result = 'Скобки не совпадают';
        }
    } else {
        //Отправка строки в БД при ошибке в вводе выражения (введены буквы)
        INSERT('incorrect',$expression);
        $result = "Выражение введено с ошибкой";
    }
    echo $result;
}
?>




