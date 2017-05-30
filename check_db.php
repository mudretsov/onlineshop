<?php
require 'config.php';
$connection_ok = new mysqli($server, $user, $password);
if ($connection_ok->connect_error): ?>
<!----------------------------------------------------------------->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ошибка - Магазин мобильной электроники "У Игоря"</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <style type="text/css">
        * { margin: 0; padding: 0; }
        .middle {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            margin: 30px;
        }
    </style>
</head>
<body>
<div class="middle">
    <h1>Ошибка подключения к Базе Данных.</h1>
    <h3>Попробуйте зайти чуть позже, или <a href="/">обновить</a> страницу.</h3>
    <img src="img/db_error.png">
</div>
</body>
</html>
<!----------------------------------------------------------------->
<?php
die;
endif;
$connection_ok->close(); ?>
