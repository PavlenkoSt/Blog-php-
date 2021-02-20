<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css?v=5">
    <title><?= $title ?></title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header-nav">
                <div class="header-flex">
                    <a href="/admin">Все статьи</a>
                    <a href="/admin/add.php">Добавить</a>
                </div>
            </div>
            <div class="header-logout">
                <a href="logout.php">Выйти</a>
            </div>
        </header>
        <main>
            <?php include 'elems/info.php'; ?>
            <?= $content ?>
        </main>
        <footer>
            <div class="footer-flex">
                <div class="copyright">
                    © 2021 by LPgenerator LLC. Все права защищены
                </div>
            </div>
        </footer>
    </div>
</body>
</html>