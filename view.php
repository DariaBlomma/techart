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
    <title>Статья</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class='header'>
        <?php 
            $db->printArticleTitle();
        ?>   
    </header>
    <main class='main view-main'>
        <?php 
            $db->printArticleContent();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
        ?>
    </main>
    <footer class='footer'>
        <a href='news.php'>Все новости > ></a>
    </footer>
</body>
</html>