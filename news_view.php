<?php
    class NewsView {
        private $news_row;
        private $btns;
        private $per_page;

        public function __construct($news_row, $btns, $per_page) {
            $this->news_row = $news_row;
            $this->btns = $btns;
            $this->per_page = $per_page;
        }

        public function printNews() {
            include_once 'news_page.php';
        }
    }
?>