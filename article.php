<?php
    while ($this->article_row = $this->article->fetch(PDO::FETCH_LAZY)) {
        $this->title = $this->article_row->title;
        $this->content = $this->article_row->content;
    }
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
        <h1 class='primary-title'><?php echo $this->title ?></h1>
    </header>
    <main class='main view-main'>
        <?php echo $this->content ?>
    </main>
    <footer class='footer'>
            <!-- <a href='news.php'>Все новости > ></a> -->
        <a class='return' href='index.php'>Все новости > ></a>
    </footer> 
</body>
<script>
    // перенаправить на страницу, откуда переходили на эту статью
    const redirect = () => {
        const link = document.querySelector('.return'),
        pageNumber = localStorage.getItem('pageNumber');

        if (pageNumber) {
            link.href = `index.php?page=${pageNumber}`;
        }  
    };
    redirect();
</script>
</html>