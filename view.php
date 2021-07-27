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
            if (isset($_GET['id'])){
                $id = $_GET['id'];
            } else $id = 1;
            $result = $mysqli->query("SELECT title, content FROM news WHERE id = '$id' ");
            $row = $result->fetch_row();
            $title = $row[0];
            $content = $row[1];
            echo "<h1 class='primary-title'>" . $title . "</h1>";
        ?>   
    </header>
    <main class='main view-main'>
        <?php 
            echo $content;
        ?>
    </main>
    <footer class='footer'>
        <a href='news.php'>Все новости > ></a>
    </footer>
</body>
</html>