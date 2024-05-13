<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
error_reporting(0);
$customerID = $_SESSION['customerID'];
if (strlen($_SESSION['customerID'] == 0)) {
    header('location:../logout.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $query = mysqli_query($con, "insert into enquiry (Name,Mobile,Email,Message) value('$name','$phone','$email','$message')");
        if ($query) {
            echo "<script>alert('Your message was sent successfully...');</script>";
            echo "<script>window.location.href ='contact.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Contact us Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="home">
    <?php include_once('./includes/header.php'); ?>

    <section style="margin-top: 10rem;">
        <div class="box" style="font-size:2rem;">
            <h3>Contact Us</h3>
            <a href="#"><i class="fas fa-phone"></i> +880 2-8820865</a><br>
            <a href="#"><i class="fas fa-envelope"></i> info@aiubweddingplanner.com</a><br>
            <a href="#"><i class="fas fa-map"></i> 408/1 Kuratoli, Kuril, Dhaka-1229 Bangladesh</a><br>
        </div>
    </section>

    <?php include_once('../includes/footer.php'); ?>

</body>

</html>
<?php }