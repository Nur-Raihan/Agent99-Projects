<?php session_start(); ?>

<?php

  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }



  $order_id = $_GET['order_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM export_order WHERE order_id =$order_id";
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


<body style="background-color: #FDFEFE">

<!--************************************************** Navigation bar ************************************************** -->
<?php
include "buyer_header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->

	 
<div class="container">
<div class="card">

   <div class ="card-body"> 
      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
      	<a href="buyer_order_details.php" class="btn btn" style="background-color: white">Go Back</a> Order Details
        </div>
    <table class="table table-hover" style="background-color:#F7F9F9">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	       <th scope="col">Field</th>
	       <td><b> Data </b></td>
	    </tr>

 <!-- ****************************************************************************************************************** -->

	       <tr>
	      <th scope="col">Order ID:</th>
	      <td> <?php echo $std['order_id']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Order Date:</th>
	      <td> <?php echo $std['order_date']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Buyer ID:</th>
	      <td> <?php echo $std['buyer_id']; ?> </td>
	      </tr>


	      <tr>
	      <th scope="col">Product Name:</th>
	      <td> <?php echo $std['p_name']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">X Small</th>
	      <td> <?php echo $std['xsmall']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Smalll</th>
	      <td> <?php echo $std['small']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Medium</th>
	      <td> <?php echo $std['medium']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Large:</th>
	      <td> <?php echo $std['large']; ?> </td>
	      </tr>
 
	      <tr>
	      <th scope="col">X Large:</th>
	      <td> <?php echo $std['xlarge']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">2X Large:</th>
	      <td> <?php echo $std['2xlarge']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">3X Large:</th>
	      <td> <?php echo $std['3xlarge']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Quantity:</th>
	      <td> <?php echo $std['quantity']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Single Rate:</th>
	      <td> <?php echo $std['rate']; ?> </td>
	      </tr>
 
	      <tr>
	      <th scope="col">Total:</th>
	      <td> <?php echo $std['total']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Advance:</th>
	      <td> <?php echo $std['advance']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Remain:</th>
	      <td> <?php echo $std['remain']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Delivery Date:</th>
	      <td> <?php echo $std['delivery_date']; ?> </td>
	      </tr>

	</table>

    </div> 
   </div>         
</div>

<!--******************************************** Footer ******************************************** -->
<?php
include "footer_buyer.php";
?>
<!--****************************************** Footer End ****************************************** -->


<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

</body>

</html>

