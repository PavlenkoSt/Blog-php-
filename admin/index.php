<?php
    include 'elems/connect.php';
    if(isset($_SESSION['auth'])){
        function getPagesTable($link)
        {
            $getQuery = "SELECT * FROM pages" ;
            $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

            $content = '<div class="container big"><table border="1">
                <tr>
                    <th>Заголовок</th>
                    <th>Подзаголовок</th>
                    <th>Категория</th>
                    <th>Адрес</th>
                    <th>Содержимое</th>
                    <th>Картинка</th>
                    <th>Дата</th>
                </tr>';
                foreach($data as $page){
                    $text = $page['text'];
                    $text = htmlspecialchars($text);
                    $content .= "<tr>
                        <td><div>{$page['title']}</div></td>
                        <td><div>{$page['subtitle']}</div></td>
                        <td><div>{$page['category']}</div></td>
                        <td><div>{$page['url']}</div></td>
                        <td><div class=\"text\">{$text}</div></td>
                        <td><div>{$page['img']}</div></td>
                        <td><div>{$page['date']}</div></td>
                        <td><div><a href=\"edit.php?id={$page['id']}\">Редактировать</a></div></td>
                        <td><div><a href=\"?delete={$page['id']}\">Удалить</a></div></td>
                    </tr>";
                }
            $content .= '</table></div>';
            
            $title = 'admin main';
            include 'elems/layout.php';
        }
        function deletePage($link)
            {
                if(isset($_GET['delete'])){
                    $id = $_GET['delete'];
                    $removeQuery = "DELETE FROM pages WHERE id = $id" ;
                    mysqli_query($link, $removeQuery) or die(mysqli_error($link));
                    $_SESSION['message'] = [
                        'text' => 'Страница успешно удалена!',
                        'status' => 'succsess'
                    ];
                    header('Location: /admin'); die();
                }
            }
        deletePage($link);
        getPagesTable($link);
    }else{
        header('Location: login.php'); die();
    }
?>
