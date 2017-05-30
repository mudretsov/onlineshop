<?php

function get_error () {
    if (isset($_GET['404'])) { $r = '404.';}
    if (isset($_GET['403'])) { $r = '403.';}
    if (isset($_GET['500'])) { $r = '500.';}
    return $r;
}

$pagetitle='Ошибка '.get_error();
$menuitem='111';
require_once '1.php';
require_once '3.php';
?>
<div class="div404">
    <span style="font-size: 5em;">Ошибка
        <?php echo get_error() ?>
    </span>
    <img src="img/z1.png" class="z1"><img src="img/z2.png" class="z2">
</div>
<?php require_once '2.php'?>