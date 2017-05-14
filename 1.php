<?php
session_start();
$items = $_COOKIE['goods_in_cart'];
$cart_counter = (int)count(explode (',', $items)) - 1;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
    <link href="css/style.css" rel="stylesheet">
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<div class="page1">
    <a href="/"><div class="div10" title='Магазин мобильной электроники "У Игоря"'><img src="img/logo.png" width="300" height="75"></div></a>
    <div class="div20"><img src="img/phone.png" class="t21" width="75" height="75"><span class="t22">Позвоните нам<br>8 (495) 777-55-33<br><span class="t23">Мы ответим на все ваши вопросы.</span></span> </div>
    <table class="div25">
        <tr>
            <td class="col1"></td>
            <td class="col2"><?php if ( !isset($_COOKIE['login']) ) { echo '<a href="auth.php">Вход/Регистрация</a></td>'; } else { echo '<a href="userpage.php">Вы зашли как '.$_COOKIE['login'].'</a> | <a href="auth.php?log=out">Выход</a>'; } ?>
                <?php if ($cart_counter == 0) { $message='Корзина пустая'; } else { $message='В корзине что-то есть'; } ?>
            <td class="col3"><a href="cart.php" title="<?php echo $message; ?>"><img src="<?php if($cart_counter == '0') {echo 'img/cart_empty.png';} else {echo 'img/cart_full.png';} ?>" width="16" height="16" title="<?php echo $message; ?>"><span>(<?php echo $cart_counter; ?>)</span></a></td>
        </tr>
    </table>
<div class="div30">
        <a href="/"><div <?php if($menuitem=='1') { echo 'class=div33'; } else { echo 'class=div32'; } ?>>Главная</div></a>
        <a href="delivery.php"><div <?php if($menuitem=='2') { echo 'class=div33'; } else { echo 'class=div32'; } ?>>Доставка</div></a>
        <a href="payment.php"><div <?php if($menuitem=='3') { echo 'class=div33'; } else { echo 'class=div32'; } ?>>Оплата</div></a>
        <a href="contacts.php"><div <?php if($menuitem=='4') { echo 'class=div33'; } else { echo 'class=div32'; } ?>>Контакты</div></a>
        <a href="vacancy.php"><div <?php if($menuitem=='5') { echo 'class=div33'; } else { echo 'class=div32'; } ?>>Вакансии</div></a>
        <form action="search.php" method="get" class="search">
            <input type="search" name="search" placeholder="Поиск по товарам" <?php if(isset($_GET['search'])) { echo 'value="'.$_GET['search'].'"'; } ?>>
            <input type="submit" value="Поиск">
        </form>
</div>