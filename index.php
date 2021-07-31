<!-- заменил news.php в изначальном варианте-->
<?php 
    require_once 'news_controller.php';
    $controller = new NewsController();
    $controller->page = $controller->workUrl('page');
    $controller->callView();
?>