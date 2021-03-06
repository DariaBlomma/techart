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
        foreach ($this->news_row as $k => $v){
            echo "
            <article class='article'>
                <span class='date'>" . date('d.m.Y', $v['idate']) . "</span>
                <a class='title' href='view.php?id=" . $v['id'] . " '>" . $v['title'] . "</a>
                <p class='announce'>" . $v['announce'] . "</p>
            </article>";
        }
    ?>
</main>
<footer class='footer'>
    <h3 class='title-3'>Страницы :</h3>
    <div class='pages-btns'>
    <?php  
        // кол-во строк в таблице
        while ($btns_row = $this->btns->fetch()) {
            $btns_total = $btns_row[0];
            // кол-во страниц
            $pages_amount = ceil($btns_total / $this->per_page);
            for ($i = 1; $i <= $pages_amount; $i++) {
                // echo "<a href='news.php?page=".$i."' class='btn'>" . $i . "</a>";
                echo "<a href='index.php?page=".$i."' class='btn'>" . $i . "</a>";
            }
        }       
    ?>
    </div>
</footer>
</body>
<script src='script.js'></script>
</html>
    