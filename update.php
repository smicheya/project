<?php
require_once 'vendor/autoload.php';

$db = require_once 'config.php';
$stmp = new \App\Database($db);

$start = 0;

$end = 5;

$query = $stmp->query('SELECT * FROM workers WHERE ');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">

    <title>Авторизация</title>
</head>
<body>
<div class="container">
    <h1 class="title">Заполните форму</h1>
    <form action="vendor/adding.php" method="post" class="form">
        <input type="text" name="first_name" class="item">
        <input type="text" name="last_name"  class="item">
        <input type="email" name="email" class="item">
        <input type="text" name="company_name" class="item">
        <input type="text" name="position" class="item">
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
            <input type="text" name="area_code" class="item" style="width: 30%;">
            <input type="tel" name="phone_number" class="item" style="width: 50%;">
        </div>
        <button type="submit">Зарегестрироваться</button>
    </form>
</div>
</body>
</html>






