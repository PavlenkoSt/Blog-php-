<?php
    session_start();
        
    error_reporting(E_ALL);
    ini_set('display-errors', 'on');

    ob_start();
    include 'elems/password.php';
    $password = ob_get_clean();

    if((isset($_POST['password']) && md5($_POST['password']) == $password) || isset($_SESSION['auth'])){
        $_SESSION['auth'] = true;

        $_SESSION['message'] = [
            'text' => 'Вход успешен!',
            'status' => 'succsess'
        ];
        header('Location: /admin'); die();
    }else{
?>
    <h2>Вход в админ-панель</h2>
    <p>Введите пароль:</p>
    <form method="POST">
        <input type="password" name="password">
        <input type="submit" value="Отправить">
    </form>
<?php
    }
?>