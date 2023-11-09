<?php
session_start();

require_once '../database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}


$statement = $pdo->prepare("DELETE FROM tbl_applicationform WHERE application_id = :id");
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');

?>