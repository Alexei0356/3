<!--Подключение стилей CSS-->
<link rel="stylesheet" href="mystyle.css">

<?php
//Подключение БД
$mysql = new mysqli('localhost','root','11111111','learning-DB');
// Запросы на выборку
$resultC = $mysql->query('SELECT * FROM `Correct`');
$resultI = $mysql->query('SELECT * FROM `Incorrect`');

//Создание массивов из таблиц, хранящихся в БД
$C = mysqli_fetch_all($resultC, MYSQLI_ASSOC);
$I = mysqli_fetch_all($resultI, MYSQLI_ASSOC);
?>
<!--Создание блока 1-->

<button type="submit"  onClick="refreshPage()">Обновить</button>

<div id="block1">Выражения без ошибок при вводе:
    <pre>
        <?php
        print_r($C);
        ?>
    </pre>
</div>
<!--Создание блока 2-->
<div id="block2"> Выражения с ошибками при вводе:
    <pre>
        <?php
        print_r($I);
        ?>
    </pre>
</div>
<!--Скрипт обновления страницы-->
<script>
    function refreshPage(){
        window.location.reload();
    }
</script>
