<?php
session_start();

require_once '../database.php';

$id = $_GET['id'] ?? null;
$user_id = $_GET['user_id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where application_id = :application_id ');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($row[0]["level"] == "N4") {
    $level = "N5";
} else {
    $level = "N4";
}

$statement = $pdo->prepare("UPDATE tbl_applicationform set level = :level WHERE application_id = :id");
$statement->bindValue(':level', $level);
$statement->bindValue(':id', $id);
$statement->execute();


header('Location: remarks.php?id='.$id);

?>