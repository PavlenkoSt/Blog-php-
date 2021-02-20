<?php
    $content = '<form method="POST">
    Заголовок:
        <input type="text" value="' . $titleForm . '" name="title"><br><br>
    Подзаголовок:
        <input type="text" value="' . $subtitle . '" name="subtitle"><br><br>
    Категория:
        <input type="text" value="' . $category . '" name="category"><br><br>
    Адрес:
        <input type="text" value="' . $url . '"  name="url"><br><br>
    Содержимое:
        <textarea name="text">' . $text . '</textarea><br><br>
    Картинка:
        <input type="text" value="' . $img . '" name="img"><br><br>
    Дата:
        <input type="date" value="' . $date . '" name="date"><br><br>
        <input type="submit" value="Отправить">
    </form>';
?>