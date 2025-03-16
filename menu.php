<?php
try {
    session_start();
    include('config.php');
    $timezone = new DateTimeZone('Europe/Moscow');


$pdo = new PDO($dsn, $user, $password);
//user
    $sql = "select name, active from users;";
$stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // Создаем текущую дату и время с учетом часового пояса
        $currentDateTime = new DateTime();

        // Преобразуем время из базы данных в объект DateTime с учетом часового пояса
        $activeDateTime = new DateTime($row['active']);

        // Сравниваем время
        $resActive = ( $activeDateTime->format('Y-m-d H:i') ==  $currentDateTime->format('Y-m-d H:i')) ? 'on' : 'off';

        echo "
<section id=\"{$row['id']}\" class=\"cards\">
    <article style='background: aliceblue;' class=\"card card--1\">
        
        <div class=\"card__img\"></div>
        <a href=\"#\" class=\"card_link\">
            <div class=\"card__img--hover\"></div>
        </a>
        <div style='background: aliceblue;' class=\"card__info\">
            <span class=\"card__category\">{$row['name']}</span>
            <h3 class=\"card__title\">
                <table>
                    <tr id=\"active\"><td>active:  {$resActive}</td></tr>
                </table>
            </h3>
        </div>
    </article>
</section>
";
    }



// npc
$sql = "select * from npc;";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "
<section id=\"{$row['id']}\" class=\"cards\">
    <article class=\"card card--1\">
        
        <div class=\"card__img\"></div>
        <a href=\"#\" class=\"card_link\">
            <div class=\"card__img--hover\"></div>
        </a>
        <div class=\"card__info\">
            <span class=\"card__category\">{$row['name']}</span>
            <h3 class=\"card__title\">
                <table>
                    <tr id=\"hit\"><td>hit: {$row['hit']}</td></tr>
                    <tr id=\"health\"><td>xp: {$row['health']}</td></tr>
                    <tr id=\"energy\"><td>energy: {$row['energy']}</td></tr>
                </table>
            </h3>

        </div>
    </article>
</section>
";

}

} catch (PDOException $e) {

    echo "Ошибка: " . $e->getMessage();

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700');
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

        *{
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Roboto Slab', serif;
            margin: 0;
            width: 100%;
            height: 100%;
            padding: 0;
        }

        body {
            background-color: #D2DBDD;
            display: flex;
            display: -webkit-flex;
            -webkit-justify-content: center;
            -webkit-align-items: center;
            justify-content: center;
            align-items: center;
        }

        .cards {
            width: 100%;
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            -webkit-justify-content: center;
            max-width: 820px;
        }

        .card--1 .card__img, .card--1 .card__img--hover {
            background-image: url('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');
        }

        .card--2 .card__img, .card--2 .card__img--hover {
            background-image: url('https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');
        }

        .card__like {
            width: 18px;
        }

        .card__clock {
            width: 15px;
            vertical-align: middle;
            fill: #AD7D52;
        }
        .card__time {
            font-size: 12px;
            color: #AD7D52;
            vertical-align: middle;
            margin-left: 5px;
        }

        .card__clock-info {
            float: right;
        }

        .card__img {
            visibility: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 235px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;

        }

        .card__info-hover {
            position: absolute;
            padding: 16px;
            width: 100%;
            opacity: 0;
            top: 0;
        }

        .card__img--hover {
            transition: 0.2s all ease-out;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            position: absolute;
            height: 235px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            top: 0;

        }
        .card {
            margin-right: 25px;
            transition: all .4s cubic-bezier(0.175, 0.885, 0, 1);
            background-color: #fff;
            width: 100%;
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 13px 10px -7px rgba(0, 0, 0,0.1);
        }
        .card:hover {
            box-shadow: 0 30px 18px -8px rgba(0, 0, 0,0.1);
            transform: scale(1.10, 1.10);
        }

        .card__info {
            z-index: 2;
            background-color: #fff;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            padding: 16px 24px 24px 24px;
        }

        .card__category {
            font-family: 'Raleway', sans-serif;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 2px;
            font-weight: 500;
            color: #868686;
        }

        .card__title {
            margin-top: 5px;
            margin-bottom: 10px;
            font-family: 'Roboto Slab', serif;
        }

        .card__by {
            font-size: 12px;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
        }

        .card__author {
            font-weight: 600;
            text-decoration: none;
            color: #AD7D52;
        }

        .card:hover .card__img--hover {
            height: 100%;
            opacity: 0.3;
        }

        .card:hover .card__info {
            background-color: transparent;
            position: relative;
        }

        .card:hover .card__info-hover {
            opacity: 1;
        }

    </style>
</head>
<body>

</body>
<!-- update data-->
<script>
    function updateTime() {
        fetch('update_time.php')
            .then(response => response.json())
            .then(data => {
                // console.log(data); // Выводим ответ в консоль
                if (data.status === 'success') {
                    // console.log('Текущее время обновлено:', data.time);
                } else {
                    // console.error('Ошибка:', data.message);
                }
            })
            .catch(error => console.error('Ошибка сети:', error));
    }

    // Запускаем функцию каждую секунду
    setInterval(updateTime, 1000);
</script>
</html>
