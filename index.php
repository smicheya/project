<?php
session_start();

require_once 'vendor/autoload.php';


$db = require_once 'config.php';

$stmp = new \App\Database($db);

$start = 0;

$end = 5;

//calculating the nr of pages.


$query = $stmp->query('SELECT * FROM workers LIMIT :limit, :offset',
    ['limit' => $start, 'offset' => $end]);

//var_dump($query);
//

foreach ($query as $row):
    ?>
    <form method="post" action="db.php">
    <div class="list">
        <label>
            <input type="checkbox" name="checking-id[]" value="<?=$row['id'] ?>">
        </label>
        <?php
        foreach ($row as $value){
            if ($value != $row['id'])
            {
                echo $value . PHP_EOL;
            }
        }
        //            ?>
    </div>
<?php endforeach; ?>

    <!---->
    <div class="buttons">
        <button type="submit" name="submit-add__btn">Добавить</button>
        <button type="submit" name="submit-update__btn">Изменить</button>
        <button type="submit" name="submit-delete__btn">Удалить</button>
    </div>
    </form>


