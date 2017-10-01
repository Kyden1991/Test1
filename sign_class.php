<?php


class sign_class

{
    public static function registered()
    {
        require "db.php";
        $data = $_POST;

        if (isset($data['submit']))
        {

            //тут регистрация
            $errors = array();
            if (trim($data['login']) == '') {
                $errors[] = 'Введите логин!';
            }
            if (trim($data['email']) == '') {
                $errors[] = 'Введите email!';
            }
            if ($data['password'] == '') {
                $errors[] = 'Введите пароль!';
            }
            if ($data['password2'] != $data['password']) {
                $errors[] = 'Повторный пароль введен не верно!';
            }
            if (R:: count('users', "login = ?", array($data['login'])) > 0) {
                $errors[] = 'Такой логин уже существует!';
            }
            if (R:: count('users', "email = ?", array($data['email'])) > 0) {
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
                $email = "Kyden184@gmail.com";
                $subject = "Пробное письмо авторизации";
                $message = "Подтвердите что это вы! ";
                mail($email, $subject, $message);
                echo '<div style="color: green;">Ура!</div><hr>';

            } else
            {
                echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
            }


        }
    }
}

?>
