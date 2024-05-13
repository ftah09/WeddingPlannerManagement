<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
if (strlen($_SESSION['customerID'] == 0)) {
  header('location:../logout.php');
} else {
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <section class="plan" id="plan">
        <h1 class="heading"> Catalogue</h1>
        <div class="box-container">
            <?php
									$ret = mysqli_query($con, "select * from  categories where Status = 'Active'");
									
									while ($row = mysqli_fetch_array($ret)) {
                                        $CategoriesID = $row['CategoriesID'];
									?>
            <div class="box">
                <h3 class="title"><?php echo $row['CategoriesType']; ?></h3>
                <h3 class="price"><?php echo $row['Price']; ?><span>৳</span></h3>
                <?php
									$ret2 = mysqli_query($con, "select * from  features where CategoriesID =  $CategoriesID ");
									while ($row2 = mysqli_fetch_array($ret2)) {
									?>
                <ul>
                    <li><i class="fas fa-check"></i><?php echo $row2['Title']; ?></li>
                </ul>
                <?php } ?>
                <a href="bookWeeding.php?bookID=<?php echo $row['CategoriesID']; ?>"><button class="btn">Book
                        now</button></a>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="services" id="services">
        <h1 class="heading">our services</h1>
        <div class="box-container">
            <div class="box">
                <img src="../assets/Images/photography.jpg" alt="">
                <h3>Photography</h3>
                <p>Expert candid and traditional photography teams</p>
            </div>
            <div class="box">
                <img src="../assets/Images/Decoration.jpg" alt="">
                <h3>Decoration</h3>
                <p>Professionally designed decor at attractive prices</p>
            </div>
            <div class="box">
                <img src="../assets/Images/Venue&Hall.jpg" alt="">
                <h3>venue & Hall</h3>
                <p>finding the right place for you</p>
            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php'); ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../script.js"></script>

</body>

</html>





<?php } ?>