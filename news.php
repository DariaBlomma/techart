<?php 
    require_once 'news_controller.php';
    $controller = new NewsController();
    $controller->page = $controller->workUrl('page');
?>
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
    <?php
        $controller->callView();
    ?>
</body>
<script src='script.js'></script>
</html>