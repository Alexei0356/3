<form action="?do=calc" method="post">
    <input type="text" name="data" />

    <input type="submit" value="Рассчитать" />
</form>

<?php

require __DIR__ . '/vendor/autoload.php';


//echo $evaluator->execute($_POST['data']);

if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/",$_POST['data'])) {
//    $evaluator = new \Matex\Evaluator();
//    echo $evaluator->execute($_POST['data']);


//    echo substr_count($_POST['data'], '(' | ')');
}
//} else {
//    echo "Выражение введено с ошибкой";
//};
//if(substr_count($_POST['data'], '(' | ')')) {
////    $evaluator = new \Matex\Evaluator();
////
////    echo $evaluator->execute($_POST['data']);
//
//} else {
//    echo "<br>" ."Выражение введено без скобок";
//}
function isCorrect($string)
{
    # Массив скобок
    $brackets = array(
        array('{', '}'),
        array('(', ')')
    );

    # Обходим массив скобок
    foreach ($brackets as $bracket) {
        # Считаем количество
        if (substr_count($string, $bracket[0]) != substr_count($string, $bracket[1]))
            # Если количество не совпадает - ошибка
            return false;
    }

    # По умолчанию
    return true;
}

if (isCorrect($_POST['data'])){
    $evaluator = new \Matex\Evaluator();
    echo $evaluator->execute($_POST['data']);
    echo "<br>" .'Строка верна';
} else
    echo "<br>" .'Строка не верна';
?>