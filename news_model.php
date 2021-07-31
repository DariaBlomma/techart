<?php
    class NewsModel {
        public $host;
        public $db_name;
        public $user;
        public $password;    
        public $db;

        private $per_page = 5;
        private $art;
        private $news;
        private $news_row;
        private $btns;

        private $id;
        private $title;
        private $content;
        private $article;
        private $article_row;

        public function __construct($host, $db_name, $user, $password) {
            $this->host = $host;
            $this->db_name = $db_name;
            $this->user = $user;
            $this->password = $password;
        }

        public function connect() {
            try {
                $this->db = new PDO('mysql:host=' .$this->host .';dbname=' .$this->db_name , $this->user, $this->password);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                die();
            }
        }

        public function selectNews($page) {
            $this->art = ($page * $this->per_page) - $this->per_page;
            $this->news = $this->db->prepare("SELECT * FROM $this->db_name ORDER BY idate DESC LIMIT :art, :page ");
            $this->news->bindValue(':art', $this->art, PDO::PARAM_INT);
            $this->news->bindValue(':page', $this->per_page, PDO::PARAM_INT);
            $this->news->execute();
            $this->news_row = $this->news->fetchAll(PDO::FETCH_ASSOC);
            return $this->news_row;
        }

        public function selectBtnPages() {
            $this->btns = $this->db->query("SELECT COUNT(*) FROM $this->db_name");
            return $this->btns;
        }

        public function selectArticle($id) {
            $this->article = $this->db->prepare("SELECT title, content FROM $this->db_name WHERE id = ? ");
            $this->article->execute([$id]);
            return $this->article;
        }

        public function givePerPage() {
            return $this->per_page;
        }
    }
?>