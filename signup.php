<?php
require "db.php";

$data = $_POST;
if(isset($data['submit'])) {

    //тут регистрация
    $errors = array();
    if( trim($data['login']) == '') {
        $errors[] = 'Введите логин!';
    }
    if( trim($data['email']) == '') {
        $errors[] = 'Введите email!';
    }
    if( $data['password'] == '') {
        $errors[] = 'Введите пароль!';
    }
    if( $data['password2'] != $data['password'] ) {
        $errors[] = 'Повторный пароль введен не верно!';
    }
    if( R:: count('users', "login = ?", array($data['login'])) >0 ) {
        $errors[] = 'Такой логин уже существует!';
    }
    if( R:: count('users', "email = ?", array($data['email'])) >0 ) {
        $errors[] = 'Такой email уже существует!';
    }

    if (empty($errors)) {
        // все хорошо можно регестрировать
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->join_date = time();
        R::store($user);
        echo '<div style="color: green;">Ура!</div><hr>';

    } else{
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
    
    
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
<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>