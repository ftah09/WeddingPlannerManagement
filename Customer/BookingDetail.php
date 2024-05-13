<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
if (strlen($_SESSION['customerID'] == 0)) {
  header('location:../logout.php');
} else {
?>
<!doctype html>
<html lang="en">

<head>
    <title>Booking History</title>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">


</head>

<body id="home">
    <?php include_once('includes/header.php'); ?>

    <section style="padding:10rem; align-items: center;">
        <h4 style="padding-bottom: 20px;text-align: center;color: blue; font-size:3rem;">Booking Details</h4>
        <?php
                $bid = $_GET['bookID'];
                $ret = mysqli_query($con, "select * from weddingbook where BookID='$bid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                  $BookNumber = $row['BookNumber'];
                  $CategoriesID = $row['CategoriesID'];
                  $UserID = $row['UserID'];
                  $BookDate = $row['BookDate'];
                  $UserMessage = $row['UserMessage'];
                  $Remark = $row['Remark'];
                  $Status = $row['Status'];
                  $Remark = $row['Remark'];
                  $Status = $row['Status'];
                  $BookingDate = $row['BookingDate'];
                  $RemarkDate = $row['RemarkDate'];


                  $query2 = mysqli_query($con, "SELECT * FROM `users` where UserID=  $UserID");
                  while ($row2 = mysqli_fetch_array($query2)) {
                    $Name = $row2['Name'];
                    $UserEmail = $row2['UserEmail'];
                    $Phone = $row2['Phone'];
                    $Address = $row2['Address'];
                  }
                  $query3 = mysqli_query($con, "SELECT * FROM `categories` where CategoriesID=  $CategoriesID");
                  while ($row3 = mysqli_fetch_array($query3)) {
                    $CategoriesType = $row3['CategoriesType'];
                    $Price = $row3['Price'];
                    
                  }
                 
                ?>
        <table style="font-size:2rem">
            <tbody>
                <tr>
                    <th style="width: 20%;">Book Number</th>
                    <td style="width: 30%;"><?php echo $BookNumber; ?></td>
                    <th style="width: 20%;">User Name</th>
                    <td style="width: 30%;"><?php echo $Name?></td>
                </tr>
                <tr>
                    <th style="width: 20%;">Categories </th>
                    <td><?php echo $CategoriesType; ?> Plan</td>
                    <th style="width: 20%;">User Email</th>
                    <td><?php echo  $UserEmail ?></td>
                </tr>
                <tr>
                    <th style="width: 20%;">Booking Date </th>
                    <td><?php echo $BookDate; ?> </td>
                    <th style="width: 20%;">User Phone</th>
                    <td><?php echo $Phone; ?></td>
                </tr>
                <tr>
                    <th style="width: 20%;">Booking Fee</th>
                    <td><?php echo $Price; ?> taka</td>
                    <th style="width: 20%;">User Address </th>
                    <td><?php echo $Address ?></td>
                </tr>
                <tr>
                    <th style="width: 20%;">Book Status</th>
                    <td><?php echo $Status; ?></td>

                    <th style="width: 20%;">User Message </th>
                    <td><?php echo $UserMessage ?></td>
                </tr>
                <tr>

                    <th style="width: 20%;">Apply Date</th>
                    <td><?php echo $row['BookingDate']; ?></td>
                    <th style="width: 20%;">Admin Message</th>
                    <td><?php echo $Remark; ?></td>
                </tr>



            </tbody>
        </table>
        <?php } ?>



    </section>





    <?php include_once('includes/footer.php'); ?>






</body>

</html><?php } ?>