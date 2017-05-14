<?php
session_start();
if ($_GET['log'] == 'out') { /* Для выхода */
    unset($_GET['log']);
    setcookie('login', null, -1);
    unset($_COOKIE['login']);
    header ('location: /');
    die;
}
require_once 'func.php';
check_login_userpresist();
$pagetitle='Вход / Регистрация';
require_once '1.php';
$menuitem='a';

?>
<style>
    input.text{	width: 300px; }
    .err { border: 2px dashed red; }
    .err1 {color: red; font-style: italic;}
</style>
<table border="0" class="t90">
    <?php if (!empty($_SESSION['message'])): ?>
    <tr>
        <td colspan="2" style="text-align: center; color: red; font-style: oblique; font-size: large;"><?php echo ($_SESSION['message']); ?></td>
    </tr>
    <?php unset($_SESSION['message']); endif; ?>
    <tr>
        <td style="height: 200px;">
            <fieldset style="height: 250px;"><legend>Вход</legend>
            <form action="check.php" method="post">
                <?php if (($_SESSION['err_l'] == TRUE) OR ($_SESSION['err_p'] == TRUE)) { echo '<h4>Проверьте правильность ввода</h4>'; } ?>
                <input type="text" name="login" class="text <?php if ($_SESSION['err_l'] == TRUE) { echo 'err'; unset($_SESSION['err_l']);} ?>" placeholder="Логин" <?php if($_SESSION['mailr']) {echo ' value="'.$_SESSION['mailr'].'"'; unset($_SESSION['mailr']);}?>><br>
                <input type="password" name="pass" class="text <?php if ($_SESSION['err_p'] == TRUE) { echo 'err'; unset($_SESSION['err_p']);} ?>" placeholder="Пароль"><br>
                <input type="submit" value="Войти">
                <input type="checkbox" name="existent_user" checked hidden>
                <hr align="center" width="300" size="1" color="grey">
                На сайте есть пользователи:
                <ul>
                <li>Admin - Password</li>
                <li>Ivan - Pass1</li>
                <li>Lena - Pass2</li>
                </ul>
            </form>
            </fieldset>
        </td>
        <td width="200px">
            <fieldset style="height: 250px;"><legend>Регистрация</legend>
                Все поля обязательны
                <form action="newuser.php" method="post">
                    <?php if ($_SESSION['err_reg'] == TRUE) { echo '<h4>Проверьте правильность ввода</h4>'; $_SESSION['err_reg'] = NULL;
                        if($_SESSION['user_e']==TRUE) {echo 'Такой пользователь уже существует.'; $_SESSION['user_e']=NULL; }
                    } ?>
                    <input type="email" name="mail" class="text <?php if ($_SESSION['err_mail'] == TRUE) { echo 'err'; unset($_SESSION['err_mail']);} ?>" placeholder="Электронная почта"<?php if($_SESSION['mail']) {echo ' value="'.$_SESSION['mail'].'"'; unset($_SESSION['mail']);}?>><br>
                    <input type="password" name="pass1" class="text <?php  if ($_SESSION['err_pass1'] == TRUE) { echo 'err'; unset($_SESSION['err_pass1']);} ?>" placeholder="Пароль"><br>
                    <input type="password" name="pass2" class="text <?php if ($_SESSION['err_pass2'] == TRUE) { echo 'err'; unset($_SESSION['err_pass2']);} ?>" placeholder="Пароль ещё раз"><br>
                    <input type="checkbox" name="accept"><span<?php if ($_SESSION['err_accept'] == TRUE) { echo ' class="err1"'; unset($_SESSION['err_accept']);} ?>>Я принимаю условия</span><br>
                    Простая проверка.<span>
                    <?php
                    $_SESSION['num1'] = $num1 = rand(0, 99);
                    $_SESSION['num2'] = $num2 = rand(0, 99);
                    echo $num1.' + '.$num2.' = ';
                    ?>
                    <input style="width: 50px;" type="number" name="captcha" <?php if ($_SESSION['err_captcha'] == 1) { echo 'class="err"'; unset($_SESSION['err_captcha']);} ?>></span>
                    <br>
                    
                    <input type="submit" name="reg_button" value="Зарегистрироваться">
                </form>
            </fieldset>
        </td>
    </tr>
</table>




<?php require_once '2.php' ?>
