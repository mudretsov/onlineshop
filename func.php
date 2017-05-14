<?php
session_start();
/* Если не залогинен и пытается зайти на страницу, которая доступна только зарегистрированным */
function check_registered_only() {
    if ( !isset($_COOKIE['login']) ) { $_SESSION['message'] = 'Для данного действия необходимо зарегистрироваться или войти.'; header ('location: /auth.php');  die; }
}
/* Если куки есть, то перебрасывать на главную */
function check_login_userpresist() {
    if ( isset($_COOKIE['login']) ) { header ('location: /'); die; }
}
/* Пользователь админ? */
function check_admin($user){
    if ($user != 'admin') { header ('location: /'); die; }
}
/*возвращает количество товаорв в корзине */
function cart_counter() {
    if (isset($_COOKIE['cart_items'])) { $a = $_COOKIE['cart_items']; }
    else {$a = 0;}
    return $a;
}
/* Конвертирует массив в строку; array [0]=> "id"  */
function array_to_string($array) {
    $string = implode (',', $array);
    return $string;
}
/* Конвертирует строку в массив */
function string_to_array($string) {
    $array = explode (',', $string);
    return $array;
}

?>