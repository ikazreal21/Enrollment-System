<?php
session_start();


require_once '../database.php';
require_once '../randomstring.php';
require_once '../vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
    'cloud' => [
      'cloud_name' => 'dmagk9gck', 
      'api_key' => '964986345641993', 
      'api_secret' => 'sDSJ1IXtdVjMrMAkGxABuvS2wmo'],
    'url' => [
      'secure' => true]]);


$errors = [];

$schedule = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $schedule = $_POST['schedule'];

    if (!is_dir('../upload/img')) {
        mkdir('../upload/img');
    }

    if (empty($errors)) {
        $certification = $_FILES['picture'];
        $imagePath1 = '';

        if ($certification) {
            // $imagePath1 = '../upload/certification/'.randomString(8, 1).'/'.$certification['name'];
            // mkdir(dirname($imagePath1));
            // move_uploaded_file($certification['tmp_name'], $imagePath1);
            $imagePath1 = (new UploadApi())->upload($certification['tmp_name'], [
                'folder' => 'uploads/enrollment/']);
        }

        $statement = $pdo->prepare("UPDATE tbl_applicationform set payment_image = :payment_image, payment = :payment, schedule = :schedule WHERE user_id = :id");
        $statement->bindValue(':payment_image', $imagePath1['secure_url']);
        $statement->bindValue(':payment', "pending");
        $statement->bindValue(':schedule', $schedule);
        $statement->bindValue(':id', $_SESSION["user_id"]);
        $statement->execute();
        header('Location: index.php');
    }
}


?>