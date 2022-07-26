<form action="?do=calc" method="post">
    <input type="text" name="data" />

    <input type="submit" value="Рассчитать" />
</form>

<?php

require __DIR__ . '/vendor/autoload.php';


//echo $evaluator->execute($_POST['data']);

if (preg_match("/^[\+\-\*\/\%\d\(\)]+$/",$_POST['data'])) {
    $evaluator = new \Matex\Evaluator();
    echo $evaluator->execute($_POST['data']);
//    echo substr_count($_POST['data'], '(' | ')');
    }
//} else {
//    echo "Выражение введено с ошибкой";
//};
if(substr_count($_POST['data'], '(' | ')')) {
//    $evaluator = new \Matex\Evaluator();

    //echo $evaluator->execute($_POST['data']);

} else {
    echo "<br>" ."Выражение введено без скобок";
}
?>





