<?php
$pagetitle='Магазин мобильной электроники "У Игоря"';
$menuitem='a';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
require 'db_connect.php';
?>
<style>
    .widget {
        display: inline-block;
    }

    .tooltip {
        display: block;
        position: absolute;
        background: #333;
        color: white;
        padding: 5px;
    }

    .tooltip {
        margin-top: 20px;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.3s, margin-top 0.3s, visibility 0s linear 0.3s;
        -moz-transition: opacity 0.3s, margin-top 0.3s, visibility 0s linear 0.3s;
        -o-transition: opacity 0.3s, margin-top 0.3s, visibility 0s linear 0.3s;
        transition: opacity 0.3s, margin-top 0.3s, visibility 0s linear 0.3s;
    }

    .widget:hover .tooltip {
        margin-top: 0;
        opacity: 0.9;
        visibility: visible;
        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        -o-transition-delay: 0s;
        transition-delay: 0s;
    }


</style>

<p style="font-size: 26px; text-align: center; color: black; margin: 10px;"><b>Следите за нами в социальных сетях!</b></p><br>
<p style="font-size: 16px; text-align: center; color: black; margin: 8px;">
    Дорогие покупатели, Вы можете следить за последними обновлениями и новостями нашего интернет-магазина в социальных сетях.
    Вы всегда будете узнавать о наших новостях самыми первыми, так же сможете связаться с нами любым удобным способом.<br>
    Мы стараемся быть ближе к своим клиентам!<br><br>
    <a href="https://www.facebook.com/someshop/" class="widget" target="_blank"><img src="img/s_fb.jpg"><span class="tooltip">Наша группа в Facebook, где мы активно выкладываем новинки магазина, акции и просто смешные и весёлые картинки.</span></a>
    <a href="https://www.twitter.com/someshop/" class="widget" target="_blank"><img src="img/s_tw.jpg"><span class="tooltip">Ведём Twitter, где активно выкладываем новинки магазина, акции и просто смешные и весёлые картинки.</span></a>
    <a href="https://www.instagram.com/someshop/" class="widget" target="_blank"><img src="img/s_in.jpg"><span class="tooltip">Наш магазин в Instagram, где Вы можете познкомиться с нашими продавцами, а так же с новинками магазина, акциями и увидить много чего интересного.</span></a>
    <a href="https://vk.com/someshop/" class="widget" target="_blank"><img src="img/s_vk.jpg"><span class="tooltip">Наша группа во Вконтакте, где мы активно выкладываем новинки магазина, акции и просто смешные и весёлые картинки.</span></a>
    <a href="https://t.me/someshop/" class="widget" target="_blank"><img src="img/s_te.jpg"><span class="tooltip">Наш бот в Telegram подскажет что купить и по чём.</span></a>
    <a href="viber://add?number=74957775533" class="widget"><img src="img/s_vi.jpg"><span class="tooltip">Наш Viber, который соединит с нашим отделом по продажам.</span></a>
    <a href="whatsapp://send?abid=123456789&text=Hi+I'm+from+Y+Igorya" class="widget"><img src="img/s_w.jpg"><span class="tooltip">Наш Whatsapp, через которого можно задать абсолютно любые вопросы.</span></a>
    <a href="https://www.youtube.com/someshop" class="widget" target="_blank"><img src="img/s_yo.jpg"><span class="tooltip">Свежие обзоры новинок магазина смотрите на нашем канале Youtube.</span></a>
    <a href="skype:+74957775533?add" class="widget"><img src="img/s_sk.jpg"><span class="tooltip">Наш Skype, соединяющий с отделом по продажам.</span></a>
    <a href="mailto:fake@onlineshop.ru" class="widget"><img src="img/s_m.jpg"><span class="tooltip">Наша почта (fake@onlineshop.ru) по которой можно обращаться в любой момент.</span></a>
    <br>
</p>
<div style="text-align: center;">* Все ссылки ведут на ресурсы, никак не связанные с данным сайтом и создателем сайта.</div>

<?php require_once '2.php' ?>
