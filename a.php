
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
// Если  HTTP-запрос типа POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Объявляем переменную для результата
    $result = null;
//  Проверка выражения на содержание лишних символов
    if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/", $expression)) {
//  Проверка выражения на совпадение скобок
        if (substr_count($_POST['data'], "(") != substr_count($_POST['data'], ")")) {
            $result = 'Скобки не совпадают';
        } else {
            // try - это начало блока, в котором выполняется код, который может произвести ошибку при выполнеии
            // catch - ошибка поймана в Exception $ex
            try {
                $evaluator = new Evaluator();
                $result = $evaluator->execute($expression);
            } catch (Exception $ex) {
//                print_r($ex);
                $result = $ex ->getMessage();
            }
        }
    } else {
        $result = "Выражение введено с ошибкой";
    }
    echo $result;
}
?>




