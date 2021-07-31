<?php
    require_once 'news_model.php';
    require_once 'news_view.php';
    require_once 'article_view.php';
    class NewsController {
        public $id;
        public $page;
        private $model;
        private $news_view;
        private $article_view;
        private $news_row;
        private $article;
        private $article_row;
        private $btns;
        private $per_page;
        private $variant;

        public function __construct() {
            // для хостинга спринтхост
            // $this->model = new NewsModel('localhost', 'f0497458_avengers', 'f0497458_root', 'root');
            $this->model = new NewsModel('127.0.0.1', 'news', 'root', 'root');
        }
        
        public function workUrl($param) {
            if (isset($_GET[$param])){
                $var = $_GET[$param];
            } else $var = 1;

            if ($param === 'page') {
                $this->page = $var;
            } else {
                $this->id = $var;
            }

            $this->variant = $param;
            $this->callModel();
            return $var;
        }

        public function getPage() {
            echo $this->page;
        }

        private function callModel() {
            $this->model->connect();
            if ($this->variant === 'page') {
                $this->news_row = $this->model->selectNews($this->page);
                $this->btns = $this->model->selectBtnPages();
                $this->per_page = $this->model->givePerPage();
            } else {
                $this->article = $this->model->selectArticle($this->id);
            }
        }

        public function callView() {
            if ($this->variant === 'page') {
                $this->news_view = new NewsView($this->news_row, $this->btns, $this->per_page);
                $this->news_view->printNews();
            } else {
                $this->article_view = new ArticleView($this->article);
                $this->article_view->printArticle();
            }
        }
    }
?>