<?php
require "db.php"
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
        $sql = "SELECT * FROM signUp";
        $result = "$connect->query($sql)";

        if ($result-> num_rows >0) {
            while ($row = $result-> fetch_assoc());
            echo "<br> id:". $row["user_id"]. "<br> username:". $row["username"]. "<br> password:". $row["password"];
        };



        ?>
    </form>
</content>
<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>