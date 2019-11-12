<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 4) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $division_id = $_GET['division_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM division WHERE division_id =$division_id";
  $result = mysqli_query($conn, $sql);

  $std = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head, any other head content must come after these tags -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <title>GMS</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Main Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>


<body style="background-color: #f8f9f9">

<!--************************************************** Navigation bar ************************************************** -->
<?php
include "header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->

	 
<div class="container">
<div class="card">

        <div class ="card-body"> 
      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
      	<a href="division_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Division Details </div>
        <table class="table table-hover" style="background-color:#ecf0f1">
        <tr style="background-color:#283747; color:white">
	      <th scope="col">Field</th>
	      <td> Data </td>
	    </tr>

 <!-- ****************************************************************************************************************** -->
	     <tr>
	      <th scope="col">Division ID:</th>
	      <td> <?php echo $std['division_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Division Name:</th>
	      <td> <?php echo $std['division_name']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Division Head:</th>
	      <td> <?php echo $std['division_head']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">Division Location:</th>
	      <td> <?php echo $std['division_location']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">Division Details:</th>
	      <td> <?php echo $std['division_details']; ?> </td>
	     </tr>
	     
	</table>

    </div> 
   </div>         
</div>

<!--******************************************** Footer ******************************************** -->
<?php
include "footer.php";
?>
<!--****************************************** Footer End ****************************************** -->


<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

</body>

</html>

