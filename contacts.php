<?php
$pagetitle='Контакты';
$menuitem='4';
require_once '1.php'; /* begin html */
?>
<div class="div70">
    <h1>Контакты<sup><a href="#asd" style=" text-decoration: none">*</a></sup></h1>
    <ul>
        <li><p>Номера телефонов:</p></li>
            <ul>
                <li>+7 (495) 777-55-33 - Общий</li>
                <li>+7 (495) 777-55-34 - Склад</li>
            </ul>
        <li><p>Факс:</p></li>
            <ul>
                <li>+7 (495) 777-55-35</li>
            </ul>
        <li><p>Электронная почта:</p></li>
            <ul>
                <li>По общим вопросам - <a href="mailto:info@onlineshop.ru">info@onlineshop.ru</a></li>
                <li>По вопросам сотрудничества - <a href="mailto:coop@onlineshop.ru">coop@onlineshop.ru</a></li>
            </ul>
        <li><p>Адрес:</p></li>
        <ul>
            <li>Мы распологаемся недалеко от метро "Крылатское". <br>г. Москва, Осенний бульвар, д. 5, к.1. Вход со двора.</li>
        </ul>
    </ul><br>
    <div class="map">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=JXcH4fmCCCMdae2FW_JK9s_AxJ6QSgFo&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
    </div>
    <p><a name="asd">*</a> Естественно, так как это всего лишь пример интернет магазина, то все контакты недействительны, а все совпадения случайны.</p>
<?php require_once '2.php' /* end of html */ ?>