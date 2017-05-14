<?php
$goods_in_carts = $_COOKIE['goods_in_cart'];
require 'func.php';
require 'db_connect.php';
if (isset($_GET['add'])) { $goods_in_carts .= $_GET['add'].','; setcookie('goods_in_cart', $goods_in_carts, time()+86400); }
if (isset($_GET['del'])) {
    $arr = string_to_array($goods_in_carts);
    if (in_array($_GET['del'], $arr)) {
    unset($arr[array_search($_GET['del'],$arr)]);
    $goods_in_carts = array_to_string($arr);
    }
    setcookie('goods_in_cart', $goods_in_carts, time()+86400);
}
$pagetitle='Корзина';
require_once '1.php'; /* begin html */
?>
    <div class="div70">
<?php
if (!empty($goods_in_carts)) {
    echo 'Товаров в корзине<br>';
    $IDs = string_to_array($goods_in_carts);
    echo items_in_cart($IDs);
}
else {
    echo '<h1 style="text-align: center; margin-top: 4%;">В вашей корзине нет товаров</h1>';
    echo '
    <style> 
    .block { margin: auto; width: 525px; clear: both; }
    .square1, .square2, .square3 { position: relative; opacity: 0; width: 150px; height: 150px; margin: 10px; float: left; top: 20px;
     animation-name: icons_bottom; animation-fill-mode: forwards; animation-delay: 1s; animation-duration: .5s; animation-timing-function: ease; }
     .square2 { animation-delay: 1.5s; }
     .square3 { animation-delay: 2s; }
     .caption { display: none; }
    @keyframes icons_bottom {
        from { top: 100px; opacity: 0;  }
        to {top:20px; opacity: 1; }
    }
    @keyframes circle {
        30% { opacity: 0.7; border-radius: 50%; transform: scale(0.1, 0.1); }
        70% { opacity: 1; border-radius: 20%; transform: scale(1, 1); }
    }
    .img123 { opacity: 0.5; }
    .img123:hover { opacity: 1; }
    
    </style>
    <div class="block">
    
    ';
     $array_icons_input = [
         '<a href="/filter.php?Apple=on" title="Телефоны компании Apple"><img src="/cl/apple.jpg" class="img123"></a>',
         '<a href="/filter.php?Android=on" title="Телефоны на платформе Android"><img src="/cl/android.jpg" class="img123"></a>',
         '<a href="/filter.php?Microsoft=on" title="Телефоны компании Microsoft"><img src="/cl/microsoft.jpg" class="img123"></a>',
         '<a href="/filter.php?pmax=10000" title="Товары дешевле 10 тыс."><img src="/cl/money.jpg" class="img123"></a>',
         '<a href="/filter.php?Nokia=on" title="Телефоны Финской компании Nokia"><img src="/cl/nokia.jpg" class="img123"></a>',
         '<a href="/filter.php?Android=on&iOS=on" title="С сенсорным экраном"><img src="/cl/smart.jpg" class="img123"></a>',
         '<a href="/filter.php?Samsung=on" title="Телефоны компании Samsung"><img src="/cl/samsung.jpg" class="img123"></a>',
         '<a href="/filter.php?Xiaomi=on" title="Телефоны компании Xiaomi"><img src="/cl/mi.jpg" class="img123"></a>',
         '<a href="/filter.php?Asus=on" title="Телефоны компании ASUS"><img src="/cl/asus.jpg" class="img123"></a>',

     ];
    $array_icons_rnd = array_rand($array_icons_input, 3);
    $temp123 = (int)0;
    foreach ($array_icons_rnd as $value) {
        $temp123 ++;
        echo '<div class="square'.$temp123.'">'.$array_icons_input[$value].'</div>';
    }
        echo '</div>';
}
?>
<?php require_once '2.php' /* end of html */ ?>