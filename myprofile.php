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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="login">Введите ваш логин:</label>
        <input type="text" name="login" value="<?php echo @$data['login'];?>">
        <label for="email">Введите ваш email:</label>
        <input type="text" name="email" value="<?php echo @$data['email'];?>">
        <label for="password">Введите ваш пароль:</label>
        <input type="password" name="password" value="<?php echo @$data['password'];?>">
        <label for="password">Введите пароль еще раз:</label>
        <input type="password" name="password2" value="<?php echo @$data['password2'];?>">
        <button type="submit" name="submit">Регистрация</button>
    </form>

</content>
<section>

</section>


<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>


