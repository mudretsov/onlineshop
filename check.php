<?php
session_start();

switch (TRUE) {
    /* Existent user */
    case $_POST['existent_user']:
        $login = mb_strtolower($_POST['login']);
        $pass = $_POST['pass'];
        if ( empty($_POST['login']) AND empty($_POST['pass'])) { $_SESSION['err_l']=TRUE; $_SESSION['err_p']=TRUE; header ('location: /auth.php');  die; }
        if ( empty($_POST['login'])) { $_SESSION['err_l']=TRUE; header ('location: /auth.php');  die; }
        if ( empty($_POST['pass'])) { $_SESSION['err_p']=TRUE; $_SESSION['mailr']=$login; header ('location: /auth.php');  die; }
        require 'config.php';
        $connect = mysql_connect($server, $user, $password);
        if ($connect) {
            mysql_connect($server, $user, $password);
            mysql_select_db($db);
            $query = mysql_query('SELECT mail, pass FROM ' . $db . '.users WHERE mail="' . $login . '"');
            $res = mysql_fetch_array($query);
            if ($res['mail']) {
                if ($res['pass'] === $pass) {
                    setcookie('login', $login, time() + 86400);
                    header('location: /');
                    die;
                } else {
                    $_SESSION['err_l'] = TRUE;
                    $_SESSION['err_p'] = TRUE;
                    $_SESSION['mailr']=$login;
                    header('location: /auth.php');
                    die;
                }
            } else {
                $_SESSION['err_l'] = TRUE;
                $_SESSION['err_p'] = TRUE;
                $_SESSION['mailr']=$login;
                header('location: /auth.php');
                die;
            }
        }else {
            echo 'Соединение с базой данных не удалось.';
        }
        break;

    /* Add item */
    case $_POST['add_item']:
        if (empty($_POST['name'])) { $_SESSION['ai_name']=TRUE; }
        if (empty($_POST['description'])) { $_SESSION['ai_description']=TRUE; }
        if (empty($_POST['price']) or $_POST['price']<=10 ) { $_SESSION['ai_price']=TRUE; }
        if (empty($_POST['vendor'])) { $_SESSION['ai_vendor']=TRUE; }
        if (empty($_POST['os'])) { $_SESSION['ai_os']=TRUE; }
        if (!is_uploaded_file($_FILES['photo']['tmp_name'])) { $_SESSION['ai_photo']=TRUE; }

        if ( ($_SESSION['ai_name']==TRUE) or
            ($_SESSION['ai_description']==TRUE) or
            ($_SESSION['ai_price']==TRUE) or
            ($_SESSION['ai_vendor']==TRUE) or
            ($_SESSION['ai_os']==TRUE) or
            ($_SESSION['ai_photo']==TRUE)) {
            
            $_SESSION['ai1_name'] = $_POST['name'];
            $_SESSION['ai1_description'] = $_POST['description'];
            $_SESSION['ai1_price'] = $_POST['price'];
            $_SESSION['ai1_vendor'] = $_POST['vendor'];
            $_SESSION['ai1_os'] = $_POST['os'];
            header ('location: /db_edit.php?add');  die;

        } else {

            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/goods/'; /* Куда кидать файлы */
            $newName = $uploadDir . basename($_FILES['photo']['name']); /* Оригинальное имя файла на компьютере+папка куда кидать */
            while (file_exists($newName))
            {
                $randomnum = (string)substr(md5(rand()),rand(0,26),7);
                $newName = $uploadDir.$randomnum.'.jpg';
                $_SESSION['picrename'] = $randomnum.'.jpg';
                $_SESSION['picname'] = $randomnum.'.jpg';
            }
            $res = move_uploaded_file( $_FILES['photo']['tmp_name'], $newName );
            if (isset($randomnum)) { $photo = $randomnum.'.jpg'; } else { $photo = basename($_FILES['photo']['name']); }
            /* add info to db */
            require 'db_connect.php';
            $id=add_item($_POST['name'], $_POST['description'], $_POST['price'], $_POST['vendor'], $_POST['os'], $photo);
            header('location: /goods.php?id='.$id);
            die;
        }
        break;

    /* Edit item */
    case $_POST['edit_item']:
        if (empty($_POST['name'])) { $_SESSION['ei_name']=TRUE; }
        if (empty($_POST['description'])) { $_SESSION['ei_description']=TRUE; }
        if (empty($_POST['price']) or $_POST['price']<=10 ) { $_SESSION['ei_price']=TRUE; }
        if (empty($_POST['vendor'])) { $_SESSION['ei_vendor']=TRUE; }
        if (empty($_POST['os'])) { $_SESSION['ei_os']=TRUE; }

        if ( ($_SESSION['ei_name']==TRUE) or
            ($_SESSION['ei_description']==TRUE) or
            ($_SESSION['ei_price']==TRUE) or
            ($_SESSION['ei_vendor']==TRUE) or
            ($_SESSION['ei_os']==TRUE)) {

            $_SESSION['ei1_name'] = $_POST['name'];
            $_SESSION['ei1_description'] = $_POST['description'];
            $_SESSION['ei1_price'] = $_POST['price'];
            $_SESSION['ei1_vendor'] = $_POST['vendor'];
            $_SESSION['ei1_os'] = $_POST['os'];
            $_SESSION['ei_error'] = TRUE;
            header ('location: /db_edit.php?edit='.$_POST['edit_item']);  die;

        } else {
            require 'db_connect.php';
            $id=edit_item($_POST['name'], $_POST['description'], $_POST['price'], $_POST['vendor'], $_POST['os'], $_POST['edit_item']);
            header('location: /goods.php?id='.$id);
            die;
        }
        break;

    /* No POST options */
    default:
        header ('location: /');
        break;
}


?>