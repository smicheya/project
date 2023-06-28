<?php

require_once 'vendor/autoload.php';

$db = require_once 'config.php';
$stmp = new \App\Database($db);

if (isset($_POST['submit-add__btn'])) {
    header('Location: add.php');
}
elseif (isset($_POST['submit-delete__btn'])) {
    $all_ids = $_POST['checking-id'];
    $ids = implode(',', $all_ids);

    foreach ($all_ids as $value) {
        $delete = $stmp->query('DELETE FROM workers WHERE id=:id',
            [
                'id' => $value]);

        if ($delete > 0) {
            continue;
        } else if ($delete == 0) {
            $_SESSION['message'] = 'Пользователи успешно удалены';
            header('Location: ../');
        }
    }
}

elseif (isset($_POST['submit-update__btn'])) {
    $all_ids = $_POST['checking-id'];
    $ids = implode(',', $all_ids);

    foreach ($all_ids as $value):
        $select = $stmp->query('SELECT * FROM workers WHERE id=:id',
            [
                'id' => $value]);
       foreach ($select as $row):
    ?>

    <form action="vendor/updating.php" method="post" class="form">
        <input type="hidden" name="id" value="<?=$row['id']; ?>">
        <input type="text" name="first_name" class="item" value="<?=$row['first_name']; ?>">
        <input type="text" name="last_name"  class="item" value="<?=$row['last_name']; ?>">
        <input type="email" name="email" class="item" value="<?=$row['email']; ?>">
        <input type="text" name="company_name" class="item" value="<?=$row['company_name']; ?>">
        <input type="text" name="position" class="item" value="<?=$row['position']; ?>">
        <div class="phone">
            <select name="country_code" class="item" style="width: 20%;">
                <?php
                $country_array = array(
                    'Russia' => '+7',
                    'Kazakhstan' => '+7',
                    'China' => '+86',
                    'Australia' => '+61',
                    'Canada' => '+1'
                );
                foreach ($country_array as $key => $value):?>
                    <option value="<?=$value ?>">
                        <?=$key.' '.$value ?>
                    </option>
                <?php endforeach;?>
            </select>
            <input type="text" name="area_code" class="item" style="width: 30%;" value="<?=$row['area_code']; ?>">
            <input type="tel" name="phone_number" class="item" style="width: 50%;" value="<?=$row['phone_number']; ?>">
        </div>
        <button type="submit">Изменить</button>
    </form>
<?php
endforeach;
    endforeach;
}
    ?>

