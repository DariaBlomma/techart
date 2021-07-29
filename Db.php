<?php
    class Db {
        public $host;
        public $db_name;
        public $user;
        public $password;    
        public $per_page;
        public $db;
        private $page;
        private $art;
        private $news;
        private $news_row;
        private $btns;
        private $btns_total;
        private $pages_amount;
        private $id;
        private $title;
        private $content;
        private $article;
        private $article_row;

        public function __construct($host, $db_name, $user, $password, $per_page) {
            $this->host = $host;
            $this->db_name = $db_name;
            $this->user = $user;
            $this->password = $password;
            $this->per_page = $per_page;
        }

        public function connect() {
            $this->db = new PDO('mysql:host=' .$this->host .';dbname=' .$this->db_name , $this->user, $this->password);
        }

        private function workUrl($var, $param) {
            if (isset($_GET[$param])){
                $var = $_GET[$param];
            } else $var = 1;
            return $var;
        }

        private function preparePages() {
            $this->page = $this->workUrl($this->page, 'page');
            $this->art = ($this->page * $this->per_page) - $this->per_page;
        }

        private function selectNews() {
            $this->preparePages();
            $this->news = $this->db->prepare("SELECT * FROM $this->db_name ORDER BY idate DESC LIMIT :art, :page ");
            $this->news->bindValue(':art', $this->art, PDO::PARAM_INT);
            $this->news->bindValue(':page', $this->per_page, PDO::PARAM_INT);
            $this->news->execute();
            $this->news_row = $this->news->fetchAll(PDO::FETCH_ASSOC);
        }

        private function selectArticle() {
            $this->id = $this->workUrl($this->id, 'id');
            $this->article = $this->db->prepare("SELECT title, content FROM $this->db_name WHERE id = ? ");
            $this->article->execute([$this->id]);

            while ($this->article_row = $this->article->fetch(PDO::FETCH_LAZY)) {
                $this->title = $this->article_row->title;
                $this->content = $this->article_row->content;
            }
        }

        public function printArticleTitle() {
            $this->selectArticle();
            echo "<h1 class='primary-title'>" . $this->title . "</h1>";
        }

        public function printArticleContent() {
            $this->selectArticle();
            echo $this->content;
        }

        public function printNews() {
            $this->selectNews();
            foreach ($this->news_row as $k => $v){
                echo "
                <article class='article'>
                    <span class='date'>" . date('d.m.Y', $v['idate']) . "</span>
                    <a class='title' href='view.php?id=" . $v['id'] . " '>" . $v['title'] . "</a>
                    <p class='announce'>" . $v['announce'] . "</p>
                </article>";
            }
        }

        public function printBtnPages () {
            // кол-во строк в таблице
            // подставить переменную имени таблицы!
            $this->btns = $this->db->query("SELECT COUNT(*) FROM $this->db_name");
            while ($btns_row = $this->btns->fetch()) {
                $this->btns_total = $btns_row[0];
                // кол-во страниц
                $this->pages_amount = ceil($this->btns_total / $this->per_page);
                for ($i = 1; $i <= $this->pages_amount; $i++) {
                    echo "<a href='news.php?page=".$i."' class='btn'>" . $i . "</a>";
                }
            }
        }

    }
?>