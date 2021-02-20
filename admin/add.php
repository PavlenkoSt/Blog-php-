<?php 
    include '../elems/connect.php';
    if(isset($_SESSION['auth'])){
        function addPage($link)
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
                    if(pageExist($url,$link)){
                        $_SESSION['message'] = [
                            'text' => 'Страница с таким адресом уже существует!',
                            'status' => 'error'
                        ];
                        return;
                    }

                    $setQuery = "INSERT INTO pages (title, subtitle, category, url, text, img, date) VALUES ('$titleForm', '$subtitle', '$category', '$url', '$text', '$img', '$date')";
                    mysqli_query($link, $setQuery) or die(mysqli_error($link));
                    $_SESSION['message'] = [
                        'text' => 'Страница успешно добавлена!',
                        'status' => 'succsess'
                    ];
                    header('Location: /admin'); die();
                    
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

        function setAddPage($link,$info=''){
            if(isset($_POST['title']) 
            && isset($_POST['url']) 
            && isset($_POST['text'])
            && !empty($_POST['title']) 
            && !empty($_POST['url']) 
            && !empty($_POST['text'])){
                $titleForm = mysqli_real_escape_string($link, $_POST['title']);
                $subtitle = mysqli_real_escape_string($link, $_POST['subtitle']);
                $category = mysqli_real_escape_string($link, $_POST['category']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text']);
                $img = mysqli_real_escape_string($link, $_POST['img']);
                $date = mysqli_real_escape_string($link, $_POST['date']);
            }else{
                $titleForm = '';
                $subtitle = '';
                $category = '';
                $url = '';
                $text = '';
                $img = '';
                $date = '';
            }

            $title = 'admin add';
            include 'elems/form.php';
            include 'elems/layout.php';
        }
        addPage($link);
        setAddPage($link);
    }else{
        header('Location: login.php'); die();
    }

