<?php
$pagetitle='Магазин мобильной электроники "У Игоря"';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
require 'db_connect.php';
echo '<br>';
foreach ($_GET as $key => $value){
    if ($key == 'pmin') { $pmin = (int)$value; continue; }
    if ($key == 'pmax') { $pmax = (int)$value; continue; }
    $array_f[] = $key;
}
echo get_filter($array_f, $pmin, $pmax);
$temp = trim(htmlspecialchars($temp1, ENT_QUOTES, 'UTF-8'))
?>


<?php require_once '2.php' /* end of html */ ?>