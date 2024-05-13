<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
$UserID = $_SESSION['customerID'];
$CategoriesID = $_GET['bookID'];
if (strlen($_SESSION['customerID'] == 0)) {
    header('location:../logout.php');
} else {
    if (isset($_POST['submit'])) {
        $bookNumber = mt_rand(100000000, 999999999);

        $CategoriesID = $_GET['bookID'];
        $UserID = $_SESSION['customerID'];

        $BookDate = $_POST['AppointmentDate'];
        $Message = $_POST['Reason'];
        $Status = "Pending";
   
    
        $query = mysqli_query($con, "INSERT INTO weddingbook (BookNumber,CategoriesID,UserID,BookDate,UserMessage,Status) VALUES ('$bookNumber', '$CategoriesID', '$UserID', '$BookDate', '$Message', '$Status')");
        if ($query) {
          
            echo "<script>window.location.href='thank-you.php?BookNumber=$bookNumber'</script>";
        } else {
            $error_message = mysqli_error($con);
            echo "<script>alert('Error: Please try again.')</script>";
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Book weeding</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body id="home">
    <?php include_once('./includes/header.php'); ?>


    <!-- contact section starts  -->
    <section class="contact" id="contact">
        <h1 class="heading"> <span>Book weeding</span> </h1>

        <?php
        if (isset($_GET['error'])) {
            echo "<div class='alert alert-danger'> $error_message</div> ";
        }
        ?>

        <?php
                                    $ret = mysqli_query($con, "SELECT * from users where UserID=$UserID");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
        <form method="post">

            <div class="inputBox">
                <input type="text" placeholder="name" id="PatientName" name="PatientName"
                    value="<?php echo $row['Name'];  ?>">
                <input type="email" placeholder="email" id="UserEmail" name="UserEmail"
                    value="<?php echo $row['UserEmail'];  ?> ">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="number" id="Phone" name="Phone" value="<?php echo $row['Phone'];  ?> ">
                <input type="text" placeholder="your address" id="address" name="Address"
                    value="<?php echo $row['Address'];  ?> ">
            </div>
            <?php
                                    $ret2 = mysqli_query($con, "SELECT * from categories where CategoriesID=$CategoriesID ");
                                    while ($row2 = mysqli_fetch_array($ret2)) {
                                    ?>
            <div class="inputBox">
                <input type="text" placeholder="plan" id="plan" name="plan"
                    value="<?php echo $row2['CategoriesType'];  ?> Plan">
                <input type=" text" placeholder="Price" id="Price" name="Price" value="<?php echo $row2['Price'];  ?>">
                <h1 style=" padding-top:2rem" ;>Booking Data</h1>
            </div>
            <div class="inputBox">
                <input type="date" name="AppointmentDate" id="AppointmentDate" required="true"
                    min="<?= date('Y-m-d', strtotime('+1 day')); ?>">
                <input type="Message" placeholder="Message" id="Reason" name="Reason">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="planID" name="planID" style="display: none;">
            </div>


            <button type="submit" class="btn" name="submit">Make an Booking</button>
            <?php
                                        }    }
                                    ?>
        </form>
    </section>


    <?php include_once('includes/footer.php'); ?>




</body>

</html><?php } ?>