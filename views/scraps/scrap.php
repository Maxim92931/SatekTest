<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scraps</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet">
</head>
<body>
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
                    <li><a href="/reg">Регистрация</a></li>
                    <li class="active"><a href="/scraps">Мои записки</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form class="form-horizontal" id="edit">
            <label for="inputTitle" class="col-sm-2 control-label">Заголовок</label>
            <input class="form-control" name="title" id="inputTitle" value="<?php echo $scrapOne['title'] ?>">

            <label for="inputText" class="col-sm-2 control-label">Текст</label>
            <textarea class="form-control" name="text" id="inputText" rows="5"><?php echo $scrapOne['text'] ?></textarea>
            <button class="btn btn-default">Сохранить</button>
            <button class="btn btn-default" type="button" id="deleteScrap" name="delete">Удалить</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/main.js"></script>

</body>
</html>