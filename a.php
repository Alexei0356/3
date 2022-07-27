<!--создаём html-форму для ввода и отправки строки-->
<form action="?do=calc" method="post">
    <input type="text"  name="data" placeholder="Введите выражение" value ="<?=$_POST['data'] ?>" />
    <input type="submit" value="Рассчитать" />
</form>
</form>

<?php
//Включение файлов
require __DIR__ . '/vendor/autoload.php';

///Проверка выражения на содержание лишних символов
//Внутри цикла условие, в котором производится проверка на совпадение скобок.Если они совпали, то производится вычисление и выводится результат, если нет- сообщение об ошибке

if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/",$_POST['data'])) {
    if(substr_count($_POST['data'], "(") != substr_count($_POST['data'], ")")) {
        echo 'Скобки не совпадают';
    } else {
        $evaluator = new \Matex\Evaluator();
        echo $evaluator->execute($_POST['data']);
    }
} else{
    echo "Выражение введено с ошибкой";
}

?>