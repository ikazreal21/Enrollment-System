<?php
session_start();


require_once '../database.php';
require_once '../randomstring.php';


$errors = [];

$fullname = '';
$username = '';
$user_id = '';
$age = 0;
$birthdate = '';
$occupation = '';
$email = '';
$contactnum = '';
$faname = '';
$faoccu = '';
$maname = '';
$maoccu = '';
$spaname = '';
$spaoccu = '';
$tertiary = '';
$tergraduate = '';
$secondary = '';
$secgraduate = '';
$elementary = '';
$elemgraduate = '';
$level = '';
$certification = '';
$valid_id = '';
$picture = '';
$birthcert = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = ucwords($_POST['fullname']);
    $username = $_POST['username'];
    $user_id = $_POST['user_id'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];
    $faname = $_POST['faname'];
    $faoccu = $_POST['faoccu'];
    $maname = $_POST['maname'];
    $maoccu = $_POST['maoccu'];
    $spaname = $_POST['spaname'];
    $spaoccu = $_POST['spaoccu'];
    $tertiary = $_POST['tertiary'];
    $tergraduate = $_POST['tergraduate'];
    $secondary = $_POST['secondary'];
    $secgraduate = $_POST['secgraduate'];
    $elementary = $_POST['elementary'];
    $elemgraduate = $_POST['elemgraduate'];
    $level = $_POST['level'];


    if (!is_dir('../upload/img')) {
        mkdir('../inventory/img');
    }

    if (empty($errors)) {
        $certification = $_FILES['certificate'];
        $valid_id = $_FILES['valid_id'];
        $picture = $_FILES['picture'];
        $birthcert = $_FILES['birthcert'];
        $imagePath1 = '';
        $imagePath2 = ''; 
        $imagePath3 = '';
        $imagePath4 = '';

        if ($certification) {
            $imagePath1 = '../upload/certification/'.randomString(8, 1).'/'.$certification['name'];
            mkdir(dirname($imagePath1));
            move_uploaded_file($certification['tmp_name'], $imagePath1);
        }
        if ($valid_id) {
            $imagePath2 = '../upload/valid_id/'.randomString(8, 1).'/'.$valid_id['name'];
            mkdir(dirname($imagePath2));
            move_uploaded_file($valid_id['tmp_name'], $imagePath2);
        }
        if ($picture) {
            $imagePath3 = '../upload/picture/'.randomString(8, 1).'/'.$picture['name'];
            mkdir(dirname($imagePath3));
            move_uploaded_file($picture['tmp_name'], $imagePath3);
        }
        if ($birthcert) {
            $imagePath4 = '../upload/birthcert/'.randomString(8, 1).'/'.$birthcert['name'];
            mkdir(dirname($imagePath4));
            move_uploaded_file($birthcert['tmp_name'], $imagePath4);
        }

        $statement = $pdo->prepare("INSERT INTO tbl_applicationform (fullname, username, user_id, age, birthdate, occupation, email, contactnum, faname, faoccu, maname, maoccu, spaname, spaoccu, tertiary, tergraduate, secondary, secgraduate, elementary, elemgraduate, level, certification, valid_id, picture, birthcert, status)
                VALUES (:fullname, :username, :user_id, :age, :birthdate, :occupation, :email, :contactnum, :faname, :faoccu, :maname, :maoccu, :spaname, :spaoccu, :tertiary, :tergraduate, :secondary, :secgraduate, :elementary, :elemgraduate, :level, :certification, :valid_id, :picture, :birthcert, :status)"
        );

        $statement->bindValue(':fullname', $fullname);
        $statement->bindValue(':username', $_SESSION["username"]);
        $statement->bindValue(':user_id', $_SESSION["user_id"]);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':birthdate', $birthdate);
        $statement->bindValue(':occupation', $occupation);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':contactnum', $contactnum);
        $statement->bindValue(':faname', $faname);
        $statement->bindValue(':faoccu', $faoccu);
        $statement->bindValue(':maname', $maname);
        $statement->bindValue(':maoccu', $maoccu);
        $statement->bindValue(':spaname', $spaname);
        $statement->bindValue(':spaoccu', $spaoccu);
        $statement->bindValue(':tertiary', $tertiary);
        $statement->bindValue(':tergraduate', $tergraduate);
        $statement->bindValue(':secondary', $secondary);
        $statement->bindValue(':secgraduate', $secgraduate);
        $statement->bindValue(':elementary', $elementary);
        $statement->bindValue(':elemgraduate', $elemgraduate);
        $statement->bindValue(':level', $level);
        $statement->bindValue(':certification', $imagePath1);
        $statement->bindValue(':valid_id', $imagePath2);
        $statement->bindValue(':picture', $imagePath3);
        $statement->bindValue(':birthcert', $imagePath4);
        $statement->bindValue(':status', "pending");
        $statement->execute();
        header('Location: index.php');
    }
}


?>