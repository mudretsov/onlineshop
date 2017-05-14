<?php
$pagetitle='Магазин мобильной электроники "У Игоря"';
$menuitem='a';
require 'func.php';
check_registered_only();
$goods_to_buy = $_COOKIE['goods_in_cart'];
setcookie('goods_in_cart', '', time()-86400*100);
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
require 'db_connect.php';
$res = buy_items($goods_to_buy);
if ($res == 'ok') :
?>

<h2>Вы успешно купили товары.</h2>

<?php
endif;
require_once '2.php' ?>