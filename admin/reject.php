<?php
session_start();

require_once '../database.php';

$id = $_GET['id'] ?? null;
$user_id = $_GET['user_id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}


$statement = $pdo->prepare("UPDATE tbl_applicationform set status = 'decline' WHERE application_id = :id");
$statement->bindValue(':id', $id);
$statement->execute();


header('Location: index.php');

?>