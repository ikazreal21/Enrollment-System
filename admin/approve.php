<?php
session_start();

require_once '../database.php';

$id = $_GET['id'] ?? null;
$user_id = $_GET['user_id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}


$statement = $pdo->prepare("UPDATE tbl_applicationform set status = 'approve', payment = 'pending' WHERE application_id = :id");
$statement->bindValue(':id', $id);
$statement->execute();


$statement = $pdo->prepare("UPDATE tbl_login set status = 'active' WHERE user_id = :id");
$statement->bindValue(':id', $user_id);
$statement->execute();

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where application_id = :application_id');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("INSERT INTO tbl_approvedstudent (studentID, user_id, status, application_id)
                VALUES (:studentID, :user_id, :status, :application_id)"
        );

$statement->bindValue(':studentID', $row[0]["student_id"]);
$statement->bindValue(':user_id', $row[0]["user_id"]);
$statement->bindValue(':status', $row[0]["status"]);
$statement->bindValue(':application_id', $row[0]["application_id"]);
$statement->execute();

header('Location: index.php');

?>