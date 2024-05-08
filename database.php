<?php 
// mysql://phv67n20wj80i496:hhr0mb91hhj1q095@bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/j54l9dfhzgmej5az
// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=db_enrollment', 'root', '');
$pdo = new PDO('mysql:host=bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=j54l9dfhzgmej5az', 'phv67n20wj80i496', 'hhr0mb91hhj1q095');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!$pdo){
    die("Fatal Error: Connection Failed!");
}
?>