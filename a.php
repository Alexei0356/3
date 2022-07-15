<form action="?do=calc" method="post">
    <input type="text" name="data" />
    <input type="submit" value="Рассчитать" />
</form>
<?php
require __DIR__ . '/vendor/autoload.php';
$evaluator = new \Matex\Evaluator();
echo $evaluator->execute($_POST['data']);

