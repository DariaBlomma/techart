<?php
    class ArticleView {
        private $article;
        private $article_row;
        private $title;
        private $content;

        public function __construct($article) {
            $this->article = $article;
        }

        public function printArticle() {
            include_once 'article_page.php';
        }
    }
?>