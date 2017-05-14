<?php
require 'func.php';
check_registered_only();
require 'db_connect.php';
$type_usr = type_of_user($_COOKIE['login']);
check_admin($type_usr);
$pagetitle='Редактирование товара';
$menuitem='a';
require_once '1.php'; /* begin html */
require_once '3.php'; /* left-menu */
 ?>
    <style>
        .err { border: 2px dashed red; }
    </style>

<?php if (isset($_GET['add'])): ?>

    <form action="/check.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" style="margin: 10px;">
        <?php if ( ($_SESSION['ai_name']==TRUE) or
        ($_SESSION['ai_description']==TRUE) or
        ($_SESSION['ai_price']==TRUE) or
        ($_SESSION['ai_vendor']==TRUE) or
        ($_SESSION['ai_photo']==TRUE) or
        ($_SESSION['ai_os']==TRUE)) { echo '<p>Проверьте правильность ввода</p>';} ?>

        <input type="text" name="name" style="width: 380px;" placeholder="Название товара" <?php if ($_SESSION['ai_name'] == TRUE) { echo 'class="err"'; unset($_SESSION['ai_name']);} else { echo 'value="'.$_SESSION['ai1_name'].'"'; unset($_SESSION['ai1_name']); } ?>><br>
        <textarea rows="10" cols="45" name="description" placeholder="Описание товара" <?php if ($_SESSION['ai_description'] == TRUE) { echo 'class="err">'; unset($_SESSION['ai_description']);} else { echo '>'.$_SESSION['ai1_description']; unset($_SESSION['ai1_description']); } ?></textarea><br>
        Цена <input type="number" name="price" placeholder="Цена" <?php if ($_SESSION['ai_price'] == TRUE) { echo 'class="err"'; unset($_SESSION['ai_price']);} else { echo 'value="'.$_SESSION['ai1_price'].'"'; unset($_SESSION['ai1_price']); } ?>><br>
        Производитель <select name="vendor" <?php if ($_SESSION['ai_vendor'] == TRUE) { echo 'class="err"'; unset($_SESSION['ai_vendor']);} ?>>
            <?php
            $phones = [0=>NULL, 'Alcatel', 'Apple', 'Ericsson', 'Sony', 'Explay', 'Fly', 'HTC', 'Huawei', 'Lenovo', 'LG', 'Meizu', 'Microsoft', 'Motorola', 'Nokia', 'OnePlus', 'Panasonic', 'Philips', 'Sanyo', 'Vertu', 'Xiaomi', 'ZTE', 'Acer', 'ASUS', 'BlackBerry', 'DELL', 'Samsung', 'Ericsson', 'Highscreen', 'HP', 'Sagem', 'OnePlus'];
            asort($phones);
            foreach ($phones as $option) {
                if ($option == $_SESSION['ai1_vendor']){ echo '<option value="'.$option.'" selected>'.$option.'</option>'; unset($_SESSION['ai1_vendor']); } else { echo '<option value="'.$option.'">'.$option.'</option>'; }
            }
            ?>
        </select><br>
        Операционная система <select name="os" <?php if ($_SESSION['ai_os'] == TRUE) { echo 'class="err"'; unset($_SESSION['ai_os']);} ?>>
            <?php
            $os = [0=>NULL, 'iOS', 'Android', 'Другая', 'Windows Phone', 'BlackBerry', 'Symbian‎', 'Windows CE‎',];
            asort($os);
            foreach ($os as $option) {
                if ($option == $_SESSION['ai1_os']){ echo '<option value="'.$option.'" selected>'.$option.'</option>'; unset($_SESSION['ai1_os']); }
                else { echo '<option value="'.$option.'">'.$option.'</option>'; }
            }
            ?>
        </select>
        <br>
        Фото (только *.JPG)
        <input type="file" name="photo" accept="image/jpeg"<?php if ($_SESSION['ai_photo'] == TRUE) { echo ' class="err"'; unset($_SESSION['ai_photo']);} ?>>

        <input type="checkbox" name="add_item" checked hidden>
        <br><br><input type="submit" value="Отправить"> <input type="reset" value="Сброс">
    </form>
<?php endif; 
if (isset($_GET['delete'])) {
    echo '<h1>';
    echo delete_item_by_id($_GET['delete']);
    echo '</h1>';
}
if (isset($_GET['edit'])):
    $data = edit_by_id($_GET['edit']);
    if (!isset($_SESSION['ei_error'])){
    $_SESSION['ei1_name'] = $data['name'];
    $_SESSION['ei1_description'] = $data['description'];
    $_SESSION['ei1_price'] = $data['price'];
    $_SESSION['ei1_vendor'] = $data['vendor'];
    $_SESSION['ei1_os'] = $data['os'];
    }
    ?>
    <table style="border: 0; margin: 10px;"><tr><td>
<img src="/goods/<?php echo $data['photo']; ?>" width="220px;"></td><td>
    <form action="/check.php" method="post" enctype="multipart/form-data" style="margin: 10px;">
        <?php if ( ($_SESSION['ei_name']==TRUE) or
            ($_SESSION['ei_description']==TRUE) or
            ($_SESSION['ei_price']==TRUE) or
            ($_SESSION['ei_vendor']==TRUE) or
            ($_SESSION['ei_os']==TRUE)) { echo '<p>Проверьте правильность ввода</p>';} ?>

        <input type="text" name="name" style="width: 380px;" placeholder="Название товара" <?php if ($_SESSION['ei_name'] == TRUE) { echo 'class="err"'; unset($_SESSION['ei_name']);} else { echo 'value="'.$_SESSION['ei1_name'].'"'; unset($_SESSION['ei1_name']); } ?>><br>
        <textarea rows="10" cols="45" name="description" placeholder="Описание товара" <?php if ($_SESSION['ei_description'] == TRUE) { echo 'class="err">'; unset($_SESSION['ei_description']);} else { echo '>'.$_SESSION['ei1_description']; unset($_SESSION['ei1_description']); } ?></textarea><br>
        Цена <input type="number" name="price" placeholder="Цена" <?php if ($_SESSION['ei_price'] == TRUE) { echo 'class="err"'; unset($_SESSION['ei_price']);} else { echo 'value="'.$_SESSION['ei1_price'].'"'; unset($_SESSION['ei1_price']); } ?>><br>
        Производитель <select name="vendor" <?php if ($_SESSION['ei_vendor'] == TRUE) { echo 'class="err"'; unset($_SESSION['ei_vendor']);} ?>>
            <?php
            $phones = [0=>NULL, 'Alcatel', 'Apple', 'Ericsson', 'Sony', 'Explay', 'Fly', 'HTC', 'Huawei', 'Lenovo', 'LG', 'Meizu', 'Microsoft', 'Motorola', 'Nokia', 'OnePlus', 'Panasonic', 'Philips', 'Sanyo', 'Vertu', 'Xiaomi', 'ZTE', 'Acer', 'ASUS', 'BlackBerry', 'DELL', 'Samsung', 'Ericsson', 'Highscreen', 'HP', 'Sagem', 'OnePlus'];
            asort($phones);
            foreach ($phones as $option) {
                if ($option == $_SESSION['ei1_vendor']){ echo '<option value="'.$option.'" selected>'.$option.'</option>'; unset($_SESSION['ei1_vendor']); } else { echo '<option value="'.$option.'">'.$option.'</option>'; }
            }
            ?>
        </select><br>
        Операционная система <select name="os" <?php if ($_SESSION['ei_os'] == TRUE) { echo 'class="err"'; unset($_SESSION['ei_os']);} ?>>
            <?php
            $os = [0=>NULL, 'iOS', 'Android', 'Другая', 'Windows Phone', 'BlackBerry‎', 'Symbian‎', 'Windows CE‎',];
            asort($os);
            foreach ($os as $option) {
                if ($option == $_SESSION['ei1_os']){ echo '<option value="'.$option.'" selected>'.$option.'</option>'; unset($_SESSION['ei1_os']); } else { echo '<option value="'.$option.'">'.$option.'</option>'; }
            }
            ?>
        </select>
        <br>
        <input type="number" name="edit_item" checked hidden value="<?php echo $_GET['edit']; ?>">
        <br><br><input type="submit" value="Отправить"> <input type="reset" value="Сброс"> <input type="button" value="Отмена" onClick='location.href="/goods.php?id=<?php echo $_GET['edit']; ?>"'>
    </form>
            </td></tr></table>

<?php unset($_SESSION['ei_error']); endif;?>
<?php require_once '2.php'?>