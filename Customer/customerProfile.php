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
		$customerID = $_SESSION['customerID'];
		$name = $_POST['Name'];
		$email = $_POST['email'];
		$Blood = $_POST['Blood'];
		$Phone = $_POST['contactNumber'];
		$Address = $_POST['Address'];
		
		
		$query = mysqli_query($con, "update users set Name ='$name',UserEmail ='$email',Blood ='$Blood', Phone='$Phone', Address='$Address' where UserID='$customerID'");
		if ($query) {
			$msg = "Your profile has been updated.";
		} else {
			$msg = "Something Went Wrong. Please try again.";
		}
	}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Update Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="home">
    <?php include_once('includes/header.php'); ?>
    <section class="contact" id="contact">

        <h1 class="heading"> <span>Update Profile</span> </h1>
        <?php
						$ret2 = mysqli_query($con, "select * from users where UserID=$customerID ");
						while ($row = mysqli_fetch_array($ret2)) {
						?>
        <form method="post" name="dataValid" onsubmit="return validateForm()">
            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) { echo $msg;}  ?> </p>
            <div class="inputBox">
                <input type="text" placeholder="name" name="Name" value="<?php echo $row['Name']; ?>"
                    required="required">
                <input type="text" placeholder="UserName" name="UserName" value="<?php echo $row['UserName'];?>"
                    readonly>
            </div>
            <div class=" inputBox">
                <input type="email" placeholder="Email Address" name="UserEmail"
                    value="<?php echo $row['UserEmail'];?> " readonly required="required">
                <input type="number" placeholder="Phone Number" name="Phone" value="<?php echo $row['Phone'];?>"
                    required="required" readonly>
            </div>

            <div class="inputBox">
                <select id="Gender" name="Gender" required>
                    <option value="">Select your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select id="Blood" name="Blood" required>
                    <option value="">Select your blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="inputBox">
                <input type="text" placeholder="your address" name="Address" value="<?php echo $row['Address']; ?>"
                    required="required">

            </div>
            <button type="submit" name="submit" class="btn ">Update</button>

        </form>
        <?php } ?>
    </section>

    <?php include_once('includes/footer.php'); ?>


</body>

</html>