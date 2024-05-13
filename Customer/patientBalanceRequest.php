<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
error_reporting(0);
$customerID = $_SESSION['customerID'];
if (strlen($_SESSION['customerID'] == 0)) {
	header('location:../logout.php');
} else {
	if (isset($_POST['submit'])) {
		$balance = $_POST['newPassword'];
		$PatientID = $_SESSION['customerID'];
        $Status = "Pending";
		$ret = mysqli_query($con, "INSERT INTO `requestbalance` ( `UserID`, `Amount` ,`status`) VALUES ('" . $PatientID . "',' ". $balance ."', '" . $Status . "')");
		if ($ret) {
			// $msg = "Your Balance request successfully saved.";
            echo "<script>alert('Your Balance request successfully saved');</script>";
		    echo "<script>window.location.href='patientBalance.php'</script>";
		} else {
			$msg = "Something Went Wrong. Please try again.";
		}
       
		
	}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>DAS || Request Balance</title>
    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript">
    function checkPass() {
        if (document.changePassword.newPassword.value != document.changePassword.confirmPassword.value) {
            alert('New balance and Confirm balance field does not match');
            document.changePassword.confirmPassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body id="home">
    <?php include_once('../includes/header.php'); ?>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });
    </script>
    <section class="w3l-inner-banner-main">
        <div class="about-inner contact ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">
                        Request Balance </h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">
            </div>
        </div>
        </div>
    </section>
    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec	">
            <div class="container">
                <div class="d-grid contact-view">
                    <div class="cont-details">
                    </div>
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <form method="post" name="changePassword" onsubmit="return checkPass();" action="">
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																						echo $msg;
																					}  ?> </p>
                            <?php
							$ret = mysqli_query($con, "select * from users where UserID='$customerID'");
							$cnt = 1;
							while ($row = mysqli_fetch_array($ret)) {
							?>
                            <div class="form-group"> <label for="exampleInputPassword1">Request Balance</label> <input
                                    type="number" name="newPassword" class="form-control" value="" required="true">
                            </div>
                            <div class="form-group"> <label for="exampleInputPassword1">Confirm Request Balance</label>
                                <input type="number" name="confirmPassword" class="form-control" value=""
                                    required="true">
                            </div>
                            <button type="submit" class="btn btn-contact" name="submit">Submit</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once('../includes/footer.php'); ?>
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-long-arrow-up"></span>
    </button>
    <script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
</body>

</html>