<?php
$pagetitle='Магазин мобильной электроники "У Игоря"';
$menuitem='1';
require 'db_connect.php';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
echo '<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Play" rel="stylesheet">';
?>
<div class="div_mobile">Мобильная версия пока ешё не создана.</div>
<script src="js/jquery.min.js"></script>

<a href="/goods.php?id=35" class="shop shop1" style="text-decoration: none">
    <div class="div80" style="background-image: url('img/iph-act.jpg'); background-position: 100% 100%; background-repeat: no-repeat;">
    <img src="act/iphone5s.jpg" width="114" height="233" style="float: left; margin: 5px; padding: 0 10px 5px 6px;">
    <p style="font-size: 26px; text-align: center; color: black; margin: 10px; text-shadow: 1px 0 1px black;"><b>Обменяй свой телефон на iPhone 5S*!</b></p><br>
    <p style="text-shadow: 1px 0px 0px black; font-size: 16px; text-align: justify; color: black; margin: 10px;">Apple iPhone 5S — стильный, удобный, высокопроизводительный смартфон.<br> Это универсальное устройство для общения, работы и развлечений.
    <br style="font-size: 16px; text-align: justify; color: black; margin: 10px;"> Обменяй свой телефон на iPhone 5S по программе "Trade-in"!</p>
    <p class="t81"><b>Спешите! Предложение ограничено!</b></p>
    <br> <p style="font-size: 10px; color: blue;">* Предоставляется скидка на покупку iPhone 5S в размере до 10% при сдаче своего старого телефона.<br>Изображение может различаться с реальным товаром.</p>
<hr class="sale_hr">&nbsp;</div></a>

<a href="/filter.php?Xiaomi" class="shop shop2" style="text-decoration: none;">
    <div class="div80" style="background-image: url('img/coop.jpg'); background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;">
    <img src="act/mi.png" width="114" style="float: left; margin: 5px; padding: 0 10px 5px 6px;">
    <p style="font-size: 26px; text-align: center; color: black; margin: 10px; text-shadow: 1px 1px 5px white;"><b>Мы - официальный партнер Xiaomi в России!</b></p><br>
    <p style="font-size: 16px; text-align: justify; color: black; margin: 8px; text-shadow: 1px 1px 5px white;">На нашем сайте реализуются только фирменные товары Xiaomi.
        Каждая модель является тщательно спроектированным продуктом, в котором разработчики продумали все детали,
        и обладает отметками, свидетельствующими об оригинальности.<br>
        Смартфоны, планшеты, камеры, телевизоры Xiaomi на русском имеют интуитивно понятный интерфейс и систему управления.
        Наш интернет магазин всегда в курсе последних новинок компании Xiaomi:
        Вы можете приобрести самые актуальные устройства по разумным ценам.<br>
        Приобрести оригинальный Xiaomi - значит купить современный гаджет для продвинутых пользователей, идущих в ногу с новейшими технологиями.
    </p>
<br><hr class="sale_hr">&nbsp;</div></a>

<div class="shop shop3">
        <div class="div80">
            <p style="font-size: 26px; text-align: center; color: black; margin: 10px;"><b>
                    <a href="/social.php" style="text-decoration-style: dashed; color: black;"> Следите за нами в социальных сетях!</a>
                </b></p><br>
            <p style="font-size: 16px; text-align: center; color: black; margin: 8px;">
                Дорогие покупатели, Вы можете следить за последними обновлениями и новостями нашего интернет-магазина в социальных сетях.
                Вы всегда будете узнавать о наших новостях самыми первыми, так же сможете связаться с нами любым удобным способом.<br>
                Мы стараемся быть ближе к своим клиентам!<br>
                <a href="https://www.facebook.com/someshop/" target="_blank"><img src="img/s_fb.jpg"></a>
                <a href="https://www.twitter.com/someshop/" target="_blank"><img src="img/s_tw.jpg"></a>
                <a href="https://www.instagram.com/someshop/" target="_blank"><img src="img/s_in.jpg"></a>
                <a href="https://vk.com/someshop/" target="_blank"><img src="img/s_vk.jpg"></a>
                <a href="https://t.me/someshop/" target="_blank"><img src="img/s_te.jpg"></a>
                <a href="viber://add?number=74957775533"><img src="img/s_vi.jpg"></a>
                <a href="whatsapp://send?abid=123456789&text=Hi+I'm+from+Y+Igorya"><img src="img/s_w.jpg"></a>
                <a href="https://www.youtube.com/someshop" target="_blank"><img src="img/s_yo.jpg"></a>
                <a href="skype:+74957775533?add"><img src="img/s_sk.jpg"></a>
                <a href="mailto:fake@onlineshop.ru"><img src="img/s_m.jpg"></a>
                <br>
            </p>
            <div style="text-align: center;">*Все ссылки ведут на ресурсы, никак не связанные с данным сайтом и создателем сайта.</div>
            <br>
<hr class="sale_hr">&nbsp;</div></div>

<script src="js/index.js"></script>
<hr class="hr_rand">
<div class="div90">Случайные товары</div>
<hr class="hr_rand">
<?php echo get_random_goods(4); ?>
<?php require_once '2.php'?>