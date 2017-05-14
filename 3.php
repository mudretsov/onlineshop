<div class="div50">
    <form action="filter.php" method="get">
        <fieldset class="div_lmenu">
            <legend>Производитель</legend>
            <?php
            include 'config.php';
            function get_active_vendors () { /* Получить всех производителей, товары которых есть в базе */
                global $server, $user, $password, $db;
                mysql_connect($server, $user, $password);
                mysql_select_db($db);
                $query = mysql_query('SELECT DISTINCT vendor FROM ' . $db . '.goods ORDER BY vendor ASC');
                $ret=' ';
                while (false != ($res = mysql_fetch_array($query))) {
                    $ret=$ret.'<input type="checkbox" name="'.$res['vendor'].'"';
                    if (isset($_GET[$res['vendor']])) { $ret = $ret.' checked'; }
                    $ret=$ret.'>'.$res['vendor'].'<br>
            ';
                }
                return $ret;
            }

            echo get_active_vendors();
            ?>
        </fieldset><br>
        <fieldset class="div_lmenu">
            <legend>Цена</legend>

            <?php

            function get_min_and_max_price () { /* Получить все типы операционных систем, которые есть в базе */
                global $server, $user, $password, $db;
                mysql_connect($server, $user, $password);
                mysql_select_db($db);
                $query = mysql_query('SELECT price FROM ' . $db . '.goods ORDER BY price ASC LIMIT 1');
                $res = mysql_fetch_array($query);
                $ret['min'] = $res['price'];
                $query = mysql_query('SELECT price FROM ' . $db . '.goods ORDER BY price DESC LIMIT 1');
                $res = mysql_fetch_array($query);
                $ret['max'] = $res['price'];

                return $ret;
            }
            $price = get_min_and_max_price();
            ?>

            <div>От <br><input type="number" name="pmin" placeholder="<?php echo $price['min']; ?>" class="t51" <?php  if (!empty($_GET['pmin'])) { $pmin = (int)$_GET['pmin']; echo 'value="'.$pmin.'"'; } ?>></div>
            <div>До <br><input type="number" name="pmax" placeholder="<?php echo $price['max']; ?>" class="t51" <?php  if (!empty($_GET['pmax'])) { $pmax = (int)$_GET['pmax']; echo 'value="'.$pmax.'"'; } ?>><br></div>
        </fieldset><br>
        <fieldset class="div_lmenu">
            <legend>Операционная система</legend>

            <?php

            function get_active_os () { /* Получить все типы операционных систем, которые есть в базе */
                global $server, $user, $password, $db;
                mysql_connect($server, $user, $password);
                mysql_select_db($db);
                $query = mysql_query('SELECT DISTINCT os FROM ' . $db . '.goods ORDER BY os ASC');
                $ret='';
                while (false != ($res = mysql_fetch_array($query))) {
                    $os= mb_convert_encoding($res['os'], "UTF-8", mb_detect_encoding($res['os']));
                    $ret=$ret.'<input type="checkbox" 
                    name="'.$os.'"';
                    if (isset($_GET[$res['os']])) { $ret = $ret.' checked'; }
                    $ret=$ret.'>'.$res['os'].'<br>
            ';
                }
                return $ret;
            }
            echo get_active_os();
            ?>
        </fieldset><br>
        <input type="submit" value="Применить"> <input type="reset" value="Сбросить">
    </form>
</div>
<div class="div60"> <!-- next-content -->