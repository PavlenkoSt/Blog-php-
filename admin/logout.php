<?php
    session_start();
    if(isset($_SESSION['auth'])){
    session_destroy();
?>
<p>Вы вышли из админ-панели</p>
<div><a href="/">Перейти на сайт</a></div>
<div><a href="/admin">Войти в админ-панель</a></div>
<?php
    }else{
        header('Location: /admin'); die();
    }
?>