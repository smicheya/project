<?php
session_start();
require "autoload.php";

$db = require_once '../config.php';

$stmp = new \App\Database($db);

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$company_name = $_POST['company_name'];
$position = $_POST['position'];
$country_code = $_POST['country_code'];
$area_code = $_POST['area_code'];
$phone_number = $_POST['phone_number'];


$insert = $stmp -> query("INSERT INTO workers (first_name, last_name, email, company_name, position,
                     country_code, area_code, phone_number)
VALUES (:first_name, :last_name, :email, :company_name, :position, :country_code, :area_code, :phone_number)",
[
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'company_name' => $company_name,
        'position' => $position,
        'country_code' => $country_code,
        'area_code' => $area_code,
        'phone_number' => $phone_number ]);


if ($insert > 0)
{
    $_SESSION['message'] = 'Ползователь добавлен';

    header('Location: ../');
}