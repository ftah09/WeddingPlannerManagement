<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
$AppointmentNumber = $_GET['BookNumber'];
if (strlen($_SESSION['customerID'] == 0)) {
  header('location:../logout.php');
} else {



?>
<!doctype html>
<html lang="en">

<head>
    <title> Thank You page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="home">
    <?php include_once('./includes/header.php'); ?>

    <h1 style="padding: 20rem;">Thank you for applying. Your weeding Booking No. is
        <?php echo $AppointmentNumber ?> </h1>
    <?php include_once('./includes/footer.php'); ?>

</body>

</html><?php } ?>