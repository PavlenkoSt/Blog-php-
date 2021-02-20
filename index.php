<?php
    include 'elems/connect.php';
    $uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');
    if(empty($uri)){
        $getQuery = "SELECT * FROM pages";
        $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $title = 'Главная';
        ob_start();
        include 'elems/main.php';
        $content = ob_get_clean();
    }else{
        $getQuery = "SELECT * FROM pages WHERE url='$uri'";
        $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
        $result = mysqli_fetch_assoc($result);
        if($result){
            $title = $result['title'];
            $content = '<section class="article"><div class="board"><div class="board-text">' . $result['title'] . '</div><img src="' . $result['img'] . '"></div><div class="container sm">';
            $content .= $result['text'];
            $content .= '</div></section>';
        }else{
            $title = 'Страница не найдена';
            $content = '<section class="404"><img class="cen" src="https://eldiscovery.ru/wp-content/uploads/2019/11/13.jpg"></section>';
        }
    }

    include 'elems/layout.php';
?>