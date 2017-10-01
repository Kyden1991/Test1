<?php
require "db.php";
//require_once 'exit.php';

$data = $_POST;


if(isset($data['submit'])) {

    $errors = array();
    $user = R:: findOne('users', 'login = ?', array($data['username']));

    if ( $user ) {
    //логин существует

        if(md5($data['password'], $user->password)) {
            //если Серега поможет то логиним юзера
            $_SESSION['logged_user']=$user;
            echo '<div style="color: green;">Ура!</div><hr>';
            //кука

        }else {
            $errors[] = 'Неверный пороль!';
        }

    }else {
        $errors[] = 'Пользователь с таким именем не найден!';
    }
    if (!empty($errors)) {
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
    <div class="articles">
        <img src="images/2.jpg">
        <h2>Название статьи 1</h2>
        <p>Написание символов на сайтах и зла средневековый книгопечатник вырвал отдельные. Самым известным рыбным текстом является знаменитый lorem некоторые вопросы. Нечитабельность текста исключительно демонстрационная, то и т.д текстом является знаменитый lorem этот.</p>
        <a href="/">Читать полностью</a>
    </div>
    <div class="articles">
        <img src="images/2.jpg">
        <h2>Название статьи 2</h2>
        <p>Написание символов на сайтах и зла средневековый книгопечатник вырвал отдельные. Самым известным рыбным текстом является знаменитый lorem некоторые вопросы. Нечитабельность текста исключительно демонстрационная, то и т.д текстом является знаменитый lorem этот.</p>
        <a href="/">Читать полностью</a>
    </div>
    <div class="articles">
        <img src="images/2.jpg">
        <h2>Название статьи 3</h2>
        <p>Написание символов на сайтах и зла средневековый книгопечатник вырвал отдельные. Самым известным рыбным текстом является знаменитый lorem некоторые вопросы. Нечитабельность текста исключительно демонстрационная, то и т.д текстом является знаменитый lorem этот.</p>
        <a href="/">Читать полностью</a>
    </div>
    <div class="articles">
        <img src="images/2.jpg">
        <h2>Название статьи 4</h2>
        <p>Написание символов на сайтах и зла средневековый книгопечатник вырвал отдельные. Самым известным рыбным текстом является знаменитый lorem некоторые вопросы. Нечитабельность текста исключительно демонстрационная, то и т.д текстом является знаменитый lorem этот.</p>
        <a href="/">Читать полностью</a>
    </div>

</content>


<section>
<?php
    if (isset($_SESSION['logged_user'])) {
    echo 'Авторизован';
    ?>
    <p><a href="myprofile.php">Мой профиль</a></p>
    <p><a href="exit.php">Выйти</a></p>
    <?php
    }else {
    echo 'Авторизуйтесь';
?>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="username">Логин:</label>
            <input type="text" name="username">
            <label for="password">Пароль:</label>
            <input type="password" name="password">
            <button type="submit" name="submit"><a href="myprofile.php">Вход</a></button>
            <a href="signup.php">Регистрация</a>
        </form>
    <?php
    }
?>


</section>


<footer class="clear">
    <p>Все права защищены</p>
</footer>

</body>

</html>