<?php 
    require_once 'Db.php';
    $db = new Db('127.0.0.1', 'news', 'root', 'root', 5);

    // для хостинга спринтхост
    // $db = new Db('localhost', 'f0497458_avengers', 'f0497458_root', 'root', 5);
    try {
        $db->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class='header'>
        <h1 class='primary-title'>Новости</h1>
    </header>
    <main class='main stretched'>
        <?php
            $db->printNews();
        ?>
    </main>
    <footer class='footer'>
        <h3 class='title-3'>Страницы :</h3>
        <div class='pages-btns'>
            <?php             
                    $db->printBtnPages();
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage();
                    die();
                }
            ?>
        </div>
    </footer>
</body>
<script src='script.js'></script>
</html>