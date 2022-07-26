
<form action="?do=calc" method="post">
    <input type="text" name="data" />

    <input type="submit" value="Рассчитать" />
</form>

<?php

require __DIR__ . '/vendor/autoload.php';


//Проверка выражения на содержание лишних символов
preg_match("/^[\+\-\*\/\%\d\(\)]+$/",$_POST['data']) ;

//Условие, в котором производится проверка на совпадение скобок.Если они совпали, то производится вычисление и выводится результат, если нет- сообщение об ошибке
if(substr_count($_POST['data'], "(") != substr_count($_POST['data'], ")")) {
    echo 'Скобки не совпадают';
} else {
    $evaluator = new \Matex\Evaluator();
    echo $evaluator->execute($_POST['data']);

}
?>