<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scraps</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet">
</head>
<a>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Scraps</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Авторизация</a></li>
                    <li><a href="reg">Регистрация</a></li>
                    <li class="active"><a href="scraps">Мои записки</a></li>
                    <li><a href="logout">Выход</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="scraps/new"><button id="createScrap">Создать записку</button></a>

    <?php foreach ($scrapsAll as $scrap): ?>
        <div class="container">
            <a href="scraps/<?php echo $scrap['id']?>"><?php echo $scrap['title']?></a>
            <pre><?php echo $scrap['text']?></pre>
        </div>
    <?php endforeach;?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/main.js"></script>
</body>
</html>

