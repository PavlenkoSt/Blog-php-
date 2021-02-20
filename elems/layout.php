<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css?v=6">
    <title><?= $title ?></title>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php 
                include 'elems/header.php'
            ?>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <?php 
                include 'elems/footer.php'
            ?>
        </footer>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>