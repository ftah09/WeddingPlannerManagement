<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
if (strlen($_SESSION['customerID'] == 0)) {
    header('location:../logout.php');
} else {
    if ($_GET['delID']) {
		$did = $_GET['delID'];
		mysqli_query($con, "DELETE FROM appointment WHERE AptID ='$did'");
		echo "<script>alert('Data Deleted');</script>";
		echo "<script>window.location.href='appointment-pending.php'</script>";
	}
?>
<!doctype html>
<html lang="en">


<head>
    <title>Booking History</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="home">
    <?php include_once('includes/header.php'); ?>
    <section class="w3l-contact-info-main" style="padding-top: 20rem;" id="contact">
        <div class="contact-sec	">
            <div class="table-content table-responsive cart-table-content m-t-30">
                <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Weeding Booking History
                </h4>
                <table border="2" class="table table-hover  mx-auto text-align: center" style="width: 90%;">
                    <thead class="gray-bg">
                        <tr style="vertical-align: middle; text-align: center;">
                            <th>#</th>
                            <th>Booking Number</th>
                            <th>Catalogue Type</th>
                            <th>Price</th>
                            <th>Booking Date</th>
                            <th>Booking Status</th>
                            <th>Admin Message </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $userId = $_SESSION['customerID'];
                            $query = mysqli_query($con, "select * from weddingbook where UserID='$userId' ORDER BY `weddingbook`.`BookID` DESC");
                                $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) { 
                                $CategoriesID = $row['CategoriesID'];
                        ?>
                        <tr style="vertical-align: middle; text-align: center;">
                            <td style="vertical-align: middle; text-align: center;"><?php echo $cnt; ?></td>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $row['BookNumber']; ?>
                            </td>
                            <?php
                                                $query2 = mysqli_query($con, "SELECT * FROM categories where CategoriesID=  $CategoriesID");
                                                while ($row2 = mysqli_fetch_array($query2)) { ?>
                            <td><?php echo $row2['CategoriesType']; ?></td>
                            <td><?php echo $row2['Price']; ?></td>
                            <?php } ?>


                            <td>
                                <p> <?php echo $row['BookDate'] ?> </p>
                            </td>
                            <td><?php $status = $row['Status'];
                                                if ($status == '') {
                                                    echo "Waiting for confirmation";
                                                } else {
                                                    echo $status;
                                                }
                                                ?> </td>
                            <td>
                                <p> <?php echo $row['Remark'] ?> </p>
                            </td>
                            <td>

                                <a href="BookingDetail.php?bookID=<?php echo $row['BookID']; ?>"
                                    class="btn btn-primary">View</a>

                            </td>
                        </tr><?php $cnt = $cnt + 1;
                                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <?php include_once('../includes/footer.php'); ?>

    <style>
    /* Container for the section */
    .w3l-contact-info-main {
        padding: 50px 0;
        background-color: #f8f9fa;
    }

    /* Inner container */
    .contact-sec {
        margin: 0 auto;
        max-width: 1200px;
        padding: 0 15px;
    }

    /* Styling for the table wrapper */
    .table-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* Heading style */
    .table-content h4 {
        padding-bottom: 20px;
        text-align: center;
        color: blue;
        font-size: 24px;
        /* Adjust as needed */
    }



    /* Responsive table wrapper */
    .table-responsive {
        overflow-x: auto;
    }

    /* Main table styling */
    .table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    /* Table header and data cell styling */
    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 12px;
        font-size: 16px;
    }

    /* Gray background for table header */
    .gray-bg {
        background-color: #f8f9fa;
    }

    /* Button styling */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
    }

    /* Button hover effect */
    .btn:hover {
        background-color: #0056b3;
    }
    </style>
    <!-- <style>
    .w3l-contact-info-main {
        padding: 50px 0;
        background-color: #f8f9fa;
        /* You can change this to your desired background color */
    }

    .contact-sec {
        margin: 0 auto;
        max-width: 1200px;
        /* Adjust as needed */
        padding: 0 15px;
    }

    .table-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .table-content h4 {
        padding-bottom: 20px;
        text-align: center;
        color: blue;
        /* You can change this to your desired color */
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        /* You can adjust border styles */
        padding: 10px;
    }

    .gray-bg {
        background-color: #f8f9fa;
        /* You can adjust background color */
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        background-color: #007bff;
        /* You can adjust button color */
        color: #fff;
        /* You can adjust button text color */
    }

    .btn:hover {
        background-color: #0056b3;
        /* You can adjust button hover color */
    }
    </style> -->
    <!-- <style>
    .table-wrapper {
        overflow-x: auto;
    }

    .responsive-table {
        width: 100%;
        border-collapse: collapse;
    }

    .responsive-table th,
    .responsive-table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    @media only screen and (max-width: 600px) {

        .responsive-table th,
        .responsive-table td {
            white-space: nowrap;
        }

        .responsive-table thead {
            display: none;
        }

        .responsive-table tbody,
        .responsive-table tr,
        .responsive-table td {
            display: block;
            width: 100%;
        }

        .responsive-table td {
            text-align: left;
            border: none;
            border-bottom: 1px solid #ddd;
            position: relative;
            padding-left: 50%;
        }

        .responsive-table td:before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 8px;
            font-weight: bold;
        }
    }
    </style> -->
</body>

</html><?php } ?>