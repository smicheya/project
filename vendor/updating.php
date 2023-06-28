<?php
session_start();
require "autoload.php";

$db = require_once '../config.php';
$stmp = new \App\Database($db);

$id = $_POST['id'];
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$company_name = $_POST['company_name'];
$position = $_POST['position'];
$country_code = $_POST['country_code'];
$area_code = $_POST['area_code'];
$phone_number = $_POST['phone_number'];



$update = $stmp -> query ('UPDATE workers 
SET first_name =:first_name,
 last_name=:last_name,email=:email,company_name=:company_name,
 position=:position,country_code=:country_code,
 area_code=:area_code,phone_number=:phone_number WHERE id=:id',
[
    'id' => $id,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'company_name' => $company_name,
    'position' => $position,
    'country_code' => $country_code,
    'area_code' => $area_code,
    'phone_number' => $phone_number ]);


if (!$update)
{
    echo 'Ошибка';
}
else
{
    echo 'Ползователь изменен';
    header('Location: ../');
}