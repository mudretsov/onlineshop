<?php
$pagetitle='Поиск: '.$_GET['search'].' - Магазин мобильной электроники "У Игоря"';
$menuitem='1';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
require 'db_connect.php';

echo search_items($_GET['search'])['0'];
echo search_items($_GET['search'])['2'];
echo search_items($_GET['search'])['1'];
?>


<?php require_once '2.php' ?>
