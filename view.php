<?php
    require_once 'news_controller.php';
    $controller = new NewsController();
    $controller->id = $controller->workUrl('id');
    $controller->callView();
?>

