<?php
session_start();
require_once 'connect.php';

$all_ids = $_POST['checking-id'];
$extract_id = implode(',', $all_ids);
echo $extract_id;

if (isset($_REQUEST['test']))
{
    $extract_id = implode(',', $_REQUEST['test']);
    echo $extract_id;
//    unset($_SESSION['message']);
}


//$sql = mysqli_query($connect, "DELETE FROM `workers` WHERE `id` IN ($extract_id)");
//
//if (!$sql)
//{
//    $_SESSION['message'] = 'Ошибка';
//    header('Location:../index.php');
//}
//else
//{
//    $_SESSION['message'] = 'Данные успешео удалены';
//    header('Location:../index.php');
//}

//if (isset($_POST['submit-delete__btn']))
//{
//
//}






