 <?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {
	if (isset($_POST['submit'])) {
		$did = $_GET['editID'];

		$name = $_POST['Name'];
		$Price = $_POST['Price'];
		$status = $_POST['Status'];
		$query = mysqli_query($con, "update categories set CategoriesType='$name',Price='$Price',Status='$status' where  CategoriesID='$did'");
		if ($query) {
			$msg = "Categories updated successfully...";
		} else {
			$msg = "Something Went Wrong. Please try again";
		}
	}
?>
 <!DOCTYPE HTML>
 <html>

 <head>
     <title> Edit Catalogue</title>
     <script type="application/x-javascript">
     addEventListener("load", function() {
         setTimeout(hideURLbar, 0);
     }, false);

     function hideURLbar() {
         window.scrollTo(0, 1);
     }
     </script>
     <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
     <link href="css/style.css" rel='stylesheet' type='text/css' />
     <link href="css/font-awesome.css" rel="stylesheet">
     <script src="js/jquery-1.11.1.min.js"></script>
     <script src="js/modernizr.custom.js"></script>
     <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
         rel='stylesheet' type='text/css'>
     <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
     <script src="js/wow.min.js"></script>
     <script>
     new WOW().init();
     </script>
     <script src="js/metisMenu.min.js"></script>
     <script src="js/custom.js"></script>
     <link href="css/custom.css" rel="stylesheet">
 </head>

 <body class="cbp-spmenu-push">
     <div class="main-content">
         <?php include_once('includes/sidebar.php'); ?>
         <?php include_once('includes/header.php'); ?>
         <div id="page-wrapper">
             <div class="main-page">
                 <div class="forms">
                     <h3 class="title1">Update Catalogue</h3>
                     <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                         <div class="form-body">
                             <form method="post">
                                 <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																								echo $msg;
																							}  ?> </p>
                                 <?php
									$pid = $_GET['editID'];
									$ret = mysqli_query($con, "select * from  categories where CategoriesID='$pid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
                                 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input
                                         type="text" class="form-control" name="Name" id="Name"
                                         value="<?php echo $row['CategoriesType']; ?>" required="true"> </div>
                                 <div class="form-group"> <label for="exampleInputEmail1">Price</label> <input
                                         type="text" class="form-control" name="Price" id="Price"
                                         value="<?php echo $row['Price']; ?>" required="true"> </div>
                                 <div class="form-group">
                                     <label>Status</label>
                                     <select class="form-control" id="Status" name="Status">
                                         <?php
        $statusValues = array("Active", "Inactive");
        foreach ($statusValues as $status) {
            
            $selected = ($status == $row['Status']) ? 'selected' : '';
            echo "<option value='$status' $selected>$status</option>";
        }
        ?>
                                     </select>
                                 </div>
                                 <?php } ?>
                                 <button type="submit" name="submit" class="btn btn-default">Update</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <?php include_once('includes/footer.php'); ?>
         </div>
         <script src="js/classie.js"></script>
         <script>
         var menuLeft = document.getElementById('cbp-spmenu-s1'),
             showLeftPush = document.getElementById('showLeftPush'),
             body = document.body;
         showLeftPush.onclick = function() {
             classie.toggle(this, 'active');
             classie.toggle(body, 'cbp-spmenu-push-toright');
             classie.toggle(menuLeft, 'cbp-spmenu-open');
             disableOther('showLeftPush');
         };

         function disableOther(button) {
             if (button !== 'showLeftPush') {
                 classie.toggle(showLeftPush, 'disabled');
             }
         }
         </script>
         <script src="js/jquery.nicescroll.js"></script>
         <script src="js/scripts.js"></script>
         <script src="js/bootstrap.js"> </script>
 </body>

 </html>
 <?php } ?>