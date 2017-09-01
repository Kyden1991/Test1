<?php
$dbc = mysqli_connect('localhost', 'root', '', 'Test2');

if($dbc) {
    echo "подключился";
}
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
        <li><a href="/">Главная</a></li>
        <li><a href="/">Новости</a></li>
        <li><a href="/">Музыка</a></li>
        <li><a href="/">Обратная связь</a></li>
    </ul>
</header>
<content>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php

       $select = mysqli_query("SELECT * FROM Test2");
       if($select) {
           echo "sdsdsd";
       }

       while($result = mysqli_fetch_array($select)) {
           echo "
           user_id: $result[user_id];
           username: $result[username];
           
           ";
       }
        ?>
    </form>
</content>
<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>