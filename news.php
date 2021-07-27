<?php 
    // // get json
    $json = file_get_contents('php://input');
    // // data is object
    $data = json_decode($json);
    // кол-во новостей на странице
    // $per_page = 5;
    
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

    // $mysqli->query("CREATE TABLE IF NOT EXISTS number(
    //     id INT,
    //     num INT,
    //     PRIMARY KEY (id)
    //     )");
    // $mysqli->query("INSERT INTO number(id, num) VALUES (1, 5)");

    
    // if ($data !== null) {  
    //     echo $data->number;
    //     $num = $data->number;
    //     $mysqli->query("UPDATE number SET id = 1, num = '$num'");
    // }
    // $get_num = $mysqli->query("SELECT num FROM number");
    // $row_number = $get_num->fetch_row();
    // $per_page = $row_number[0];
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
    <main class='main'>
        <?php
            $result = $mysqli->query("SELECT * FROM news ORDER BY idate DESC LIMIT $art,$per_page ");
            $row = $result->fetch_assoc();
            foreach ($result as $row) {
                echo "
                <article class='article'>
                    <span class='date'>" . date('d.m.Y', $row['idate']) . "</span>
                    <a href='#' class='title'>" . $row['title'] . "</a>
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
                    // echo "<a href=lessons.php?page=".$i."> Страница ".$i." </a>";
                }
            ?>
        </div>
    </footer>
</body>
<script src='script.js'></script>
<!-- <script>
    const m = document.querySelector('main'),
        article = document.querySelector('article'),
        perPage = Math.floor(m.clientHeight / article.clientHeight);
    const sendPageInfo = () => {
        const showError = error => {
                console.error(error);
            };

        const postData = body =>  fetch('./news.php', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        });

        window.addEventListener('load', () => {
            const body = {
                'number': perPage,
            };
            console.log(body);

            postData(body)
                .then(response => {
                    if (response.status !== 200) {
                        throw new Error('network status is not 200');
                    }
                })
                .catch(showError);
        });
    };
    sendPageInfo();
</script> -->
</html>