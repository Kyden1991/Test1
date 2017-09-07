<?php
require "db.php";

$data = $_POST;
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
        R::getAll( 'SELECT * FROM Test2' );




        ?>
    </form>
</content>
<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>