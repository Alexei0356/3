
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
// Подключение  MySQL к калькулятору
$mysql = new mysqli('localhost','root','11111111','ExpressionDB');


// Если  HTTP-запрос типа POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Объявляем переменную для результата
    $result = null;
//  Проверка выражения на содержание лишних символов
    if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/", $expression)) {
//  Проверка выражения на совпадение скобок
        if (substr_count($_POST['data'], "(") != substr_count($_POST['data'], ")")) {
//Отправка строки в БД при несовпадении скобок
            $mysql-> query("INSERT INTO `Incorrect` (`Incorrect`) VALUES ('$expression') ");
            $result = 'Скобки не совпадают';
        } else {
            // try - это начало блока, в котором выполняется код, который может произвести ошибку при выполнеии
            // catch - ошибка поймана в Exception $ex
            try {
                //Отправка строки в БД при коректном вводе выражения
                $mysql-> query("INSERT INTO `Correct` (`Correct`) VALUES ('$expression') ");
                $evaluator = new Evaluator();
                $result = $evaluator->execute($expression);
            } catch (Exception $ex) {
//                print_r($ex);
                //Отправка строки в БД при некорректном вводе строки (две пустые скобки)
                $mysql-> query("INSERT INTO `Incorrect` (`Incorrect`) VALUES ('$expression') ");
                $result = $ex ->getMessage();
            }
        }
    } else {
        //Отправка строки в БД при ошибке в вводе выражения (введены буквы)
        $mysql-> query("INSERT INTO `Incorrect` (`Incorrect`) VALUES ('$expression') ");
        $result = "Выражение введено с ошибкой";
    }
    echo $result;
}
//Закрытие соединения с БД
$mysql-> close();
?>




