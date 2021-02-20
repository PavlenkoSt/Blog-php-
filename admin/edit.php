<?php 
    include '../elems/connect.php';
    if(isset($_SESSION['auth'])){
        function editPage($link)
        {
            if(
                isset($_POST['title']) && 
                isset($_POST['subtitle']) && 
                isset($_POST['category']) && 
                isset($_POST['url']) && 
                isset($_POST['text']) &&
                isset($_POST['img']) && 
                isset($_POST['date'])
                ){
                if(
                    !empty($_POST['title']) && 
                    !empty($_POST['subtitle']) && 
                    !empty($_POST['category']) &&
                    !empty($_POST['url']) && 
                    !empty($_POST['text']) &&
                    !empty($_POST['img']) && 
                    !empty($_POST['date'])
                    ){
                        $titleForm = mysqli_real_escape_string($link, $_POST['title']);
                        $subtitle = mysqli_real_escape_string($link, $_POST['subtitle']);
                        $category = mysqli_real_escape_string($link, $_POST['category']);
                        $url = mysqli_real_escape_string($link, $_POST['url']);
                        $text = mysqli_real_escape_string($link, $_POST['text']);
                        $img = mysqli_real_escape_string($link, $_POST['img']);
                        $date = mysqli_real_escape_string($link, $_POST['date']);

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $getQuery = "SELECT * FROM pages WHERE id=$id";
                        $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
                        $result = mysqli_fetch_assoc($result);
                    }

                    if($url !== $result['url']){
                        if(pageExist($url,$link)){
                            $_SESSION['message'] = [
                                'text' => 'Страница с таким адресом уже существует!',
                                'status' => 'error'
                            ];
                            return;
                        }
                    }

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $updateQuery = "UPDATE pages SET title='$titleForm', subtitle='$subtitle', category='$category', url='$url', text='$text', img='$img', date='$date' WHERE id=$id";
                        mysqli_query($link, $updateQuery) or die(mysqli_error($link));
                        $_SESSION['message'] = [
                            'text' => 'Страница успешно отредактирована!',
                            'status' => 'succsess'
                        ];
                        header('Location: /admin'); die();
                    }
                }else{
                    $_SESSION['message'] = [
                        'text' => 'Ошибка, заполните все поля!',
                        'status' => 'error'
                    ];
                    return;
                }
            }
        }

        function pageExist($url,$link){
            $countQuery = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
            $result = mysqli_query($link, $countQuery) or die(mysqli_error($link));
            return  mysqli_fetch_assoc($result)['count'];
        }

        function getPages($link, $info=''){
            if(
                isset($_POST['title']) && 
                isset($_POST['subtitle']) && 
                isset($_POST['category']) && 
                isset($_POST['url']) && 
                isset($_POST['text']) &&
                isset($_POST['img']) && 
                isset($_POST['date'])
            ){
                $titleForm = mysqli_real_escape_string($link, $_POST['title']);
                $subtitle = mysqli_real_escape_string($link, $_POST['subtitle']);
                $category = mysqli_real_escape_string($link, $_POST['category']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text']);
                $img = mysqli_real_escape_string($link, $_POST['img']);
                $date = mysqli_real_escape_string($link, $_POST['date']);
            }else{
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $getQuery = "SELECT * FROM pages WHERE id=$id";
                    $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
                    $result = mysqli_fetch_assoc($result);

                    if(!$result){
                        echo 'Страница не найдена!';
                        return;
                    }
                    $titleForm = $result['title'];   
                    $subtitle = $result['subtitle'];
                    $category = $result['category'];
                    $url = $result['url'];
                    $text = $result['text'];
                    $img =  $result['img'];
                    $date =  $result['date'];
                }else{
                    echo 'Страница не найдена!';
                    return;
                }
            }
            $title = 'admin edit';
            include 'elems/form.php';
            include 'elems/layout.php';
        }
        $info = editPage($link);
        getPages($link, $info);
    }else{
        header('Location: login.php'); die();
    }
