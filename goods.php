<?php
require 'check_db.php';
if ($_GET['id'] == NULL) { header ('location: /'); die; }
require 'db_connect.php';
$id = (int) $_GET['id'];
$temp1 = goods_by_id($id);
$pagetitle= $temp1['b'].' - Магазин мобильной электроники "У Игоря"';
$menuitem='a';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
echo '<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Play" rel="stylesheet">';
echo $temp1['a'];
if (type_of_user($_COOKIE['login']) == 'admin') {
    echo '<br><br><br><br>
    <a href="db_edit.php?edit='.$id.'" style="font-size: 35px;">Редактировать</a>
    ';
}
require_once '2.php'?>