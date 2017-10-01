<?php
require "db.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
<header>
    <ul>
        <li><a href="Index.php">Главная</a></li>
        <li><a href="Table.php">Таблица</a></li>
        <li><a href="/">Музыка</a></li>
        <li><a href="/">Обратная связь</a></li>
    </ul>
</header>
<content>
        <?php

        //$table = R::getAll( 'SELECT * FROM Test2' );
// надо вывести echo
        

        ?>
<?php

    $hostname = 'localhost';
    $username = 'root';
    $passwordname = '';
    $basename = 'Test2';
    $conn = new mysqli($hostname, $username, $passwordname, $basename) or die       ('Невозможно открыть базу');

$sql = "SELECT * FROM `users`";

//$result - ассоциированный массив, т.е. таблички, у которой есть названия столбцов


//вывод на страничку в виде таблицы
echo "<table border=1> 
<tr><th>login</th><th>email</th></tr>";


$result = $conn->query($sql);
// В цикле перебираем все записи таблицы и выводим их
while ($row = $result->fetch_assoc())
{
    echo
    "<tr><td>",'Логин: '.$row['login'],
    "</td><td>",'Мыло: '.$row['email'],

    "</td></tr>";
    echo "</table>";
}




?>
    </form>
</content>
<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>