<?php
session_start();

require_once '../database.php';
include "../randomstring.php";

$id = $_GET['id'] ?? null;
$user_id = $_GET['user_id'] ?? null;
$student_id = randomString(8, 2);
$date = date('Y-m-d');

// echo '<pre>';
// var_dump($date);
// echo '<pre>';

if (!$id) {
    header('Location: index.php');
    exit;
}



$statement = $pdo->prepare("UPDATE tbl_applicationform set student_id = :student_id, payment = 'paid', date_enrolled = :date WHERE application_id = :id");
$statement->bindValue(':student_id', $student_id);
$statement->bindValue(':date', $date);
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: payment_verification.php');

?>