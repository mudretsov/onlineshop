<?php
require 'func.php';
check_registered_only();
$pagetitle='Страница пользователя - Магазин мобильной электроники "У Игоря"';
$menuitem='a';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
require 'db_connect.php';
?>
<style>
    .admin_table {
        border: 2px solid blue;
        border-collapse: collapse;
        width: 95%;
        text-align: center;
    }
    TH {
        border: 2px solid blue;
    }
    TD.tab1 {
        border: 1px solid blue;
        text-align: left;
    }
    TR:nth-child(even) {
        background: lightblue;
    }
</style>
<div>
    <h1>Страница пользователя <?php echo $_COOKIE['login']; ?></h1><br>
    <?php 
    if (type_of_user($_COOKIE['login']) == 'admin') {
        echo'Вы являетесь администратором сайта. Для вас доступна возможность редактировать/создавать/удалять товары.<br>
        <a href="db_edit.php?add">Добавить товар</a><br>';
        echo '<table class="admin_table">
        <tr>
            <th>Фото</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Производитель</th>
            <th>ОС</th>
            <th width="10px"><img src="img/edit.png" alt="Редактировать" title="Редактировать" width="16px"></th>
            <th width="10px"><img src="img/del.png" alt="Удалить" title="Удалить" width="16px"></th>
        </tr>';
        echo get_all_goods();
        echo '</table>';
    } else {
        echo 'Пользователь зарегистрирован '.date("j-F-Y, H:i", date_of_reg($_COOKIE['login'])).' MSK (UTC+3)<br>';
        $lastbuy_temp = get_last_orders();
        $lastbuy_arr = string_to_array($lastbuy_temp);
        echo 'Предыдущие покупки:<br><br>';
        echo get_table_of_last_orders($lastbuy_arr);
    }
    ?>
</div>


<?php require_once '2.php'?>
