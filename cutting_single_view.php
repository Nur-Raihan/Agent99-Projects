<?php session_start(); 

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 8) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

?>
<?php

  $cutting_id = $_GET['cutting_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT cutting.cutting_id, cutting.date, cutting.order_id, cutting.target, cutting.complete, cutting.uncomplete, cutting.comment, export_order.quantity, export_order.p_name FROM cutting INNER JOIN export_order on cutting.order_id = export_order.order_id WHERE cutting_id =$cutting_id";
  
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
      	<a href="cutting_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Garment Cutting Details </div>
        <table class="table table-hover" style="background-color:#ecf0f1">
        <tr style="background-color:#283747; color:white">
	      <th scope="col">Field</th>
	      <td> Data </td>
	    </tr>

 <!-- ****************************************************************************************************************** -->
	     <tr>
	      <th scope="col">Garment Cutting ID:</th>
	      <td> <?php echo $std['cutting_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Entry Date:</th>
	      <td> <?php echo $std['date']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Order ID:</th>
	      <td> <?php echo $std['order_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Product:</th>
	      <td> <?php echo $std['p_name']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Quantity:</th>
	      <td> <?php echo $std['quantity']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Target Date:</th>
	      <td> <?php echo $std['target']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Cutting Complete:</th>
	      <td> <?php echo $std['complete']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Cutting Uncomplete :</th>
	      <td> <?php echo $std['uncomplete']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">Comment:</th>
	      <td> <?php echo $std['comment']; ?> </td>
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

