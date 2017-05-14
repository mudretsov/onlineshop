<?php
require 'config.php';
$connect = mysql_connect($server, $user, $password);
if ($connect) {
    /* Возвращает короткое описание для товаров по ID !!! доделать !!! */
    function get_short_goods_from_db_by_id($id1) { 
        $id = (int) $id1;
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods WHERE id=' . $id);
        $res = mysql_fetch_array($query);

        $ret = '<table border="0"><tr><td style="min-width: 200px;"><img src="' . $res['photo'] . '" style="float: left; width: 180px; height: 350px;"></td><td style="min-width: 200px;">' . $res['name'] . '<br>Цена:' . $res['price'] . '</td></tr></table>';
        return $ret;
    }
    /* Возвращает таблицу случайных товаров по количеству на главной */
    function get_random_goods($count) { 
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods ORDER BY RAND() LIMIT ' . $count);
        $ret = '';
        while (false != ($res = mysql_fetch_array($query))) {
            $fff = mb_substr($res['description'], 0, 230, 'UTF-8');
            $ret = $ret.'
            <div class="div91">
            <a href="/goods.php?id='.$res['id'].'" class="main_links">
            <table><tr><td>
            <img src="/goods/' . $res['photo'] . '" style="float: left; width: 180px; max-height: 380px;">
            </td><td><span class="div92">' . $res['name'] . '</span><br><br>
            <span class="div93">'.$fff.'...</span><br><br>
            <span class="div94">Цена: ' . $res['price'] . ' руб</span></td></tr>
            </table></a></div>
            ';
        }
            return $ret;
    }
    /* Возвращает тип пользователя (admin/no) */
    function type_of_user ($mail) { 
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT type FROM ' . $db . '.users WHERE mail="'.$mail.'"');
        $res = mysql_fetch_array($query);
        return $res['type'];
    }
    /* Возвращает дату регистрации пользователя */
    function date_of_reg ($mail) { 
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT time FROM '.$db.'.users WHERE mail="'.$mail.'"');
        $res = mysql_fetch_array($query);
        return $res['time'];
    }
    /* Возвращает список всех товаров в таблице с возможностью ред/удал */
    function get_all_goods () { 
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods');
        $ret=' ';
        while (false != ($res = mysql_fetch_array($query))) {
            $ret=$ret.' <tr>
                <td class="tab1"><a href="/goods/'.$res['photo'].'" target="_balnk"><img src="/goods/'.$res['photo'].'" height="150px"></a></td>
                <td class="tab1">'.$res['name'].'</td>
                <td class="tab1">'.$res['description'].'</td>
                <td class="tab1">'.$res['price'].'</td>
                <td class="tab1">'.$res['vendor'].'</td>
                <td class="tab1">'.$res['os'].'</td>
                <td class="tab1"><a href="/db_edit.php?edit='.$res['id'].'"><img src="img/edit.png" alt="Редактировать" title="Редактировать" width="16px"></a></td>
                <td class="tab1"><a href="/db_edit.php?delete='.$res['id'].'" onclick="return confirm( \'Удалить '.$res['name'].'?\' )"><img src="img/del.png" alt="Удалить" title="Удалить" width="16px"></a></td>';
        }
        return $ret;
    }
    /* Возвращает карточку одного товара по id */
    function goods_by_id ($id1) { 
        $id = (int) $id1;
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods WHERE id=' . $id);
        $res = mysql_fetch_array($query);
        if (!empty($res['photo'])) {
        $ret['a'] = '<div style="margin: 10px;">
            <img src="/goods/' . $res['photo'] . '" style="float: left; max-width: 250px; max-height: 350px; margin: 20px;">
            <h1 style="padding: 10px; margin: 10px; text-align: center;">'. $res['name'] . '</h1>
            <p>'. $res['description'] . '</p>
            <p>Операционная система: <a href="filter.php?'.$res['os'].'=on">'. $res['os'] . '</a></p>
            <p>Производитель: <a href="filter.php?'.$res['vendor'].'=on">'. $res['vendor'] . '</a></p>
            <br><span style="text-align: right; font-size: 56px; font-family: \'Play\', cursive;">Стоимость: ' . $res['price'] . ' руб.</span><br>
            <div class="div110"><a href="cart.php?add='.$res['id'].'" style="margin: 20px;">В корзину
            <img src="img/atc1.png" class="cart">
            <img src="img/atc2.png" class="arr">
             </a></div>
            </div>';
            $ret['b'] = $res['name'];
        }
        else {
            $ret['a'] = '<h1>Товара с ID '.$id.' нет.</h1>';
            $ret['b'] = 'Товара с ID '.$id.' нет.';
        }
        return $ret;
    }
    /* Возвращает в массиве значения одного товара по id, для редактирования. */
    function edit_by_id ($id1) { 
        $id = (int) $id1;
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods WHERE id=' . $id);
        $res = mysql_fetch_array($query);
        $ret = array (name => $res['name'], description => $res['description'], price => $res['price'], vendor => $res['vendor'], os => $res['os'], photo => $res['photo']);
        return $ret;
    }
    /* Добавляет товар */
    function add_item ($name, $description1, $price, $vendor, $os, $photo) { 
        $description = mysql_real_escape_string(trim(htmlspecialchars($description1, ENT_QUOTES, 'UTF-8')));
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        mysql_query('INSERT INTO '.$db.'.goods (name, description, price, vendor, os, photo) VALUES ("'.$name.'", "'.$description.'", "'.$price.'", "'.$vendor.'", "'.$os.'", "'.$photo.'")');
        $query = mysql_query('SELECT id FROM '.$db.'.goods WHERE photo="'.$photo.'"');
        $id = mysql_fetch_array($query);
        return $id['id'];
    }
    /* Удаляет товар */
    function delete_item_by_id($id1) { 
        $id = (int) $id1;
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $res = mysql_query ('SELECT name, photo FROM '.$db.'.goods WHERE id="'.$id.'"');
        $name = mysql_fetch_array($res);
        unlink(__DIR__.DIRECTORY_SEPARATOR.'goods'.DIRECTORY_SEPARATOR.$name['photo']);
        $a = mysql_query ('DELETE FROM '.$db.'.goods WHERE id="'.$id.'"');
        if ($a) {$res = 'Товар '.$name['name'].' с id='.$id.' был полностью удалён.'; }
        else { $res = 'Ошибка при удалении товара '.$name['name'].' с id='.$id; }
        return $res;
    }
    /* Запись значения отредактированного товара */
    function edit_item ($name, $description1, $price, $vendor, $os, $id){
        $description = mysql_real_escape_string(trim(htmlspecialchars($description1, ENT_QUOTES, 'UTF-8')));
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        mysql_query ('UPDATE '.$db.'.goods SET name="'.$name.'", description="'.$description.'", price="'.$price.'", vendor="'.$vendor.'", os="'.$os.'" WHERE id='.$id);
        return $id;
    }
    /* Возвращает таблицу товаров, подходящих по поисковому запросу */
    function search_items($q1) { 
        $q = mysql_real_escape_string(trim(htmlspecialchars($q1, ENT_QUOTES, 'UTF-8')));
        if (!empty($q)) {
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT * FROM ' . $db . '.goods WHERE name LIKE "%'.$q.'%" OR description LIKE "%'.$q.'%" OR price LIKE "%'.$q.'%" OR vendor LIKE "%'.$q.'%" OR os LIKE "%'.$q.'%"');
        $ret='<h2>Поиск по фразе "'.$q.'"</h2>';
        while (false != ($res = mysql_fetch_array($query))) {
            $ret=$ret.' <br>
            <a href="/goods.php?id='.$res['id'].'" style="text-decoration: none;">
            <div class="div_search_result">
                <img src="/goods/'.$res['photo'].'" style="height: 150px; float: left; margin: 15px;">
                <p><b style="color: black;">'.$res['name'].'</b></p>
                <p style="color: #4c4c4c;">'.mb_substr($res['description'], 0, 350, 'UTF-8').'...</p>
                <p style="color: #4c4c4c;">Цена: '.$res['price'].' руб</p>
            </div></a>            
            ';
        }} else { $ret='<h1><p>Введён пустой поисковый запрос</p></h1>'; }
        if ($ret == '<h2>Вашей поисковой фразе соответствуют:</h2>') { $ret = '<h1><p>Товаров по фразе "'.$q.'" не нашлось.</p></h1>'; }
        return $ret;
    }
    /* Возвращает таблицу с товарами и суммой покупки */
    function items_in_cart ($IDs) {
        $full_price = 0;
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $ret = '<table width="100%" border="1px"><tr><td>Название товара</td><td>Стоимость</td><td></td></tr>';
        foreach ($IDs as $value) {
            $id = (int)$value;
        $query = mysql_query('SELECT * FROM ' . $db . '.goods WHERE id=' . $id);
        $res = mysql_fetch_array($query);
        if (!empty($res['photo'])) {
            $ret .= '
            <tr><td>'.$res['name'].'</td><td>'.$res['price'].'</td><td><a href="cart.php?del='.$id.'">Удалить</a></td></tr>
        ';
            $full_price += $res['price'];
        }
        }
        $ret .= '<tr><td>Итого</td><td>'.$full_price.'</td><td><a href="/buy.php">Купить всё</a></td></tr></table>';
        return $ret;
    }
    /* Заносит строку с id покупок в БД */
    function buy_items ($string) {
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $orders = (string)$string;
        $query1 = mysql_query('SELECT orders FROM ' . $db . '.users WHERE mail="'.$_COOKIE['login'].'"');
        $res1 = mysql_fetch_array($query1);
        $orders  .= $res1['orders'];
        mysql_query ('UPDATE '.$db.'.users SET orders="'.$orders.'" WHERE mail="'.$_COOKIE['login'].'"');
        return 'ok';
    }
    /* Получить предыдущие покупки пользователя */
    function get_last_orders() {
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $query = mysql_query('SELECT orders FROM ' . $db . '.users WHERE mail="'.$_COOKIE['login'].'"');
        $res = mysql_fetch_array($query);
        return $res['orders'];
    }
    /* Список предыдушщих покупок */
    function get_table_of_last_orders ($array) {
        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $ret = '';
        foreach ($array as $value) {
        $query = mysql_query('SELECT name FROM ' . $db . '.goods WHERE id="'.$value.'"');
        $res = mysql_fetch_array($query);
            $ret .= '<a href="/goods.php?id='.$value.'">'.$res['name'].'</a><br>';
        }
        return $ret;
    }
    /* Получить таблицу фильтра */
    function get_filter ($array, $pmin, $pmax) {
        if (empty($pmin)) {$pmin =0;}
        if (empty($pmax)) {$pmax =999999999;}

        global $server, $user, $password, $db;
        mysql_connect($server, $user, $password);
        mysql_select_db($db);
        $ret = '';
        if (isset($array)){
        foreach ($array as $value1) {
            $value = mysql_real_escape_string(trim(htmlspecialchars($value1, ENT_QUOTES, 'UTF-8')));
            $query = 'SELECT * FROM ' . $db . '.goods 
            WHERE (price >= '.$pmin.') AND ((price <= '.$pmax.') 
            AND ((name LIKE "%' . $value . '%") OR ((os LIKE "%' . $value . '%") OR (vendor LIKE "%' . $value . '%"))))';
            $q1 = mysql_query($query);
            while (false !=($res = mysql_fetch_array($q1))) {
                $c = '
            <a href="/goods.php?id='.$res['id'].'" style="text-decoration: none;">
            <div class="div_search_result">
                <img src="/goods/'.$res['photo'].'" style="height: 150px; float: left; margin: 15px;">
                <p><b style="color: black;">'.$res['name'].'</b></p>
                <p style="color: #4c4c4c;">'.mb_substr($res['description'], 0, 350, 'UTF-8').'...</p>
                <p style="color: #4c4c4c;">Цена: '.$res['price'].' руб</p>
            </div></a> <br>            
            ';
                $d = stripos($ret, $c);
                if ($d !== false) { continue; } else {
                $ret=$ret.'
            <a href="/goods.php?id='.$res['id'].'" style="text-decoration: none;">
            <div class="div_search_result">
                <img src="/goods/'.$res['photo'].'" style="height: 150px; float: left; margin: 15px;">
                <p><b style="color: black;">'.$res['name'].'</b></p>
                <p style="color: #4c4c4c;">'.mb_substr($res['description'], 0, 350, 'UTF-8').'...</p>
                <p style="color: #4c4c4c;">Цена: '.$res['price'].' руб</p>
            </div></a> <br>            
            ';}

            }
        }}
        else {
            $query = 'SELECT * FROM ' . $db . '.goods WHERE (price >= '.$pmin.') AND (price <= '.$pmax.')';
            $q1 = mysql_query($query);
            while (false !=($res = mysql_fetch_array($q1))) {
                $ret=$ret.'
            <a href="/goods.php?id='.$res['id'].'" style="text-decoration: none;">
            <div class="div_search_result">
                <img src="/goods/'.$res['photo'].'" style="height: 150px; float: left; margin: 15px;">
                <p><b style="color: black;">'.$res['name'].'</b></p>
                <p style="color: #4c4c4c;">'.mb_substr($res['description'], 0, 350, 'UTF-8').'...</p>
                <p style="color: #4c4c4c;">Цена: '.$res['price'].' руб</p>
            </div></a> <br>            
            ';
            }
        }

        if ($ret == '') {$ret = '<h1>Похоже, по вашему фильтру ничего не найдено.</h1>';}

        return $ret;
        
    }

} else {
    echo 'Соединение с базой данных не удалось.';
}
?>