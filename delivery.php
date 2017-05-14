<?php
$pagetitle='Доставка';
$menuitem='2';
require_once '1.php'; /* begin html */
?>
<style>
    .del1 {
        padding: 10px;
        left: -1000px;
        position: absolute;
        top: 362px;
    }
    .del2 {
        animation-name: del2;
        animation-duration: 30s; /* animation duration */
        animation-delay: 5s; /* wait */
        animation-fill-mode: none;
        animation-timing-function: linear;
    }
    @keyframes del2 {
        from {  left: -100px; }
        to {  left: 100%; }
    }
</style>
    <div class="div70">
        <h1>Доставка</h1>
        <p>Доставка осуществляется в пределах МКАД. Стоимость доставки - 200 руб при покупке на сумму менее 5000 руб.
            При заказе свыше 5000 рублей доставка бесплатная.</p>
        <p>В регионы мы отправляем Почтой России, или сторонними компаниями по предоплате 100% 
            (<a href="http://www.emspost.ru/" target="_blank">EMS</a>,
            <a href="http://www.cse.ru/" target="_blank">Курьерская служба КСЭ</a>,
            <a href="http://www.rpochta.ru/" target="_blank">Русская экспресс почта</a>)</p>
        <div class="del1 del2 del3"><img src="img/delivery.gif"></div>

<?php require_once '2.php' /* end of html */ ?>