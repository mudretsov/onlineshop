<?php
require 'check_db.php';
session_start();
require_once 'func.php';
require_once 'config.php';
check_login_userpresist();
$_SESSION['err_reg']=NULL;
$usermail = mb_strtolower($_POST['mail']);
if ( !isset($usermail)) { $_SESSION['err_reg']=TRUE; $_SESSION['err_mail']=TRUE; }
else {   if ( stristr($usermail, '@') and stristr($usermail, '.')) { } else { $_SESSION['err_reg']=TRUE; $_SESSION['err_mail']=TRUE; }   }
if ( empty($_POST['pass1'])) { $_SESSION['err_reg']=TRUE; $_SESSION['err_pass1']=TRUE; }
if ( empty($_POST['pass2'])) { $_SESSION['err_reg']=TRUE; $_SESSION['err_pass2']=TRUE; }
if ( ($_POST['pass1'])!=($_POST['pass2'])  ) { $_SESSION['err_reg']=TRUE; $_SESSION['err_pass2']=TRUE; $_SESSION['err_pass1']=TRUE; }
if ( $_POST['accept'] != on) { $_SESSION['err_reg']=TRUE; $_SESSION['err_accept']=TRUE; }
$sum=$_SESSION['num1']+$_SESSION['num2'];
if ( $_POST['captcha'] != $sum) { $_SESSION['err_reg']=TRUE; $_SESSION['err_captcha']=TRUE; }

mysql_connect($server, $user, $password);
mysql_select_db('$db');
$q1 = 'SELECT mail, pass FROM '.$db.'.users WHERE mail="'.$usermail.'"';
$check = mysql_query($q1);
while (false != ($q2 = mysql_fetch_array($check))) {
    if ($q2['mail'] == $usermail) { $_SESSION['err_reg']=TRUE; $_SESSION['err_mail']=TRUE; $_SESSION['user_e']=TRUE; }
    }

if ($_SESSION['err_reg']==TRUE) {
    $_SESSION['mail'] = $usermail;
    header ('location: /auth.php');
    die;}

$pagetitle='Регистрация нового пользователя';
require_once '1.php';
$menuitem='a';
?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <div style="text-align: center; margin: 50px;"><h1>Пользователь успешно создан.</h1><br>
    <span style="font-family: 'Roboto', sans-serif; font-size: large">Логин(email): <?php echo $_POST['mail']; ?> </span><br>
    <span style="font-family: 'Roboto', sans-serif; font-size: large">Пароль: <?php echo $_POST['pass1']; ?></span><br><br>
    <br></div>
<?php
echo $_SESSION['user_e'];
require 'config.php';
mysql_connect($server, $user, $password);
mysql_select_db('$db');
$query = 'INSERT INTO '.$db.'.users(mail, pass, ip, browser, time) VALUES ("'.$_POST['mail'].'", "'.$_POST['pass1'].'", "'.$_SERVER['REMOTE_ADDR'].'", "'.$_SERVER['HTTP_USER_AGENT'].'", '.time().')';
mysql_query($query);

require_once '2.php';
?>