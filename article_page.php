<?php
    while ($this->article_row = $this->article->fetch(PDO::FETCH_LAZY)) {
        $this->title = $this->article_row->title;
        $this->content = $this->article_row->content;
    }
?>
<header class='header'>
    <h1 class='primary-title'><?php echo $this->title ?></h1>
</header>
<main class='main view-main'>
    <?php echo $this->content ?>
</main>
<footer class='footer'>
        <a href='news.php'>Все новости > ></a>
</footer>