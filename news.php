<?php 
    //Устанавливаем доступы к базе данных:
    $host = '127.0.0.1';
    //  $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'root'; //пароль, по умолчанию пустой
    $db_name = 'news'; //имя базы данных

    // для хостинга спринтхост
    // $host = 'localhost'; 
    // $user = 'f0497458_root'; 
    // $password = 'root'; 
    // $db_name = 'f0497458_avengers'; 

    //Соединяемся с базой данных используя наши доступы:
    $mysqli = new mysqli($host, $user, $password, $db_name);
    // кол-во новостей на странице
    $per_page = 5;
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    } else $page = 1;
    $art = ($page * $per_page) - $per_page;
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
            $result = $mysqli->query("SELECT * FROM news ORDER BY idate DESC LIMIT $art,$per_page ");
            $row = $result->fetch_assoc();
            foreach ($result as $row) {
                echo "
                <article class='article'>
                    <span class='date'>" . date('d.m.Y', $row['idate']) . "</span>
                    <a class='title' href='view.php?id=" . $row['id'] . " '>" . $row['title'] . "</a>
                    <p class='announce'>" . $row['announce'] . "</p>
                </article>";
            }
        ?>
    </main>
    <footer class='footer'>
        <h3 class='title-3'>Страницы :</h3>
        <div class='pages-btns'>
            <?php             
                // кол-во строк в таблице
                $res = $mysqli->query("SELECT COUNT(*) FROM news");
                $row2 = $res->fetch_row();
                $total = $row2[0];
                // кол-во страниц
                $pages_amount = ceil($total / $per_page);
                for ($i = 1; $i <= $pages_amount; $i++) {
                    echo "<a href='news.php?page=".$i."' class='btn'>" . $i . "</a>";
                }
            ?>
        </div>
    </footer>
</body>
<script src='script.js'></script>
</html>