<?php
    ob_start();
    require_once "lib.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>future</title>
</head>
<body>
    <header class="header_bg">
        <div class="wrapper flex padding between">
            <div class="header_left">
                <div class="">
                    <div class="bold">Телефон: (499) 340-94-71</div>
                    <div class="bold">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></div>
                </div>
                <div class="light">Комментарии</div>
            </div>
            <div class="header_right">
                <div class="logo"></div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="wrapper">
            <div class="answers">
                <?php
                $sql = "SELECT name, msg, UNIX_TIMESTAMP(time) as dt FROM test ORDER BY id DESC";
                if($res = mysqli_query($link,$sql)){
                    while($row = mysqli_fetch_assoc($res)){
                        $dt = date("H:i:s" , $row["dt"]). "&nbsp&nbsp&nbsp&nbsp". date('d.m.Y' , $row["dt"]);
                        echo "<b>{$row['name']}</b> &nbsp&nbsp&nbsp{$dt} <br><br>{$row['msg']} <br><br><br>";
                    }
                }
                mysqli_close($link);
                ?>
            </div>
            <div class="comment">Оставить комментарий</div>
            <form action="" method="post" class="ff">
                <p>Ваше имя</p>
                <input class="input_size input_border" placeholder="Введите имя" required type="text" name="name" />
                <p>Ваш комментарий</p>
                <textarea class="inherit_bg radius" name="msg"></textarea>
                <div class="right_pos"><button class="radius btn" type="submit">Отправить</button></div>
            </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="wrapper flex">
            <div class="footer_logo"></div>
            <div class="info_container">
                <div class="bold">Телефон: (499) 340-94-71</div>
                <div class="bold">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></div>
                <div class="bold">Адрес: <a href="https://www.google.com/maps/place/2-%D1%8F+%D1%83%D0%BB.+%D0%9C%D0%B0%D1%88%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%BE%D0%B5%D0%BD%D0%B8%D1%8F,+7+%D1%81%D1%82%D1%80%D0%BE%D0%B5%D0%BD%D0%B8%D0%B5+1,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F,+115088/@55.7121665,37.6785585,15.04z/data=!4m5!3m4!1s0x414ab4d2ddb4b433:0xf95bbc62e5557424!8m2!3d55.712374!4d37.6714821">115088 Москва, ул 2-я Машиностроения, д. 7 стр. 1</a></div>
                <div class="footer_copy">&copy 2010 - 2014 Future. Все права защищены</div>
            </div>
        </div>

    </footer>

</body>
</html>
