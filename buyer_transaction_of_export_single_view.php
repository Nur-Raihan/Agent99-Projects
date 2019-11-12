<?php session_start(); 


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


  $buyer_transaction_id = $_GET['buyer_transaction_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

   $sql = "SELECT transaction_of_export.buyer_transaction_id, transaction_of_export.order_id, transaction_of_export.transaction_date, transaction_of_export.transaction_type, transaction_of_export.transaction_amount, transaction_of_export.comment, export_order.buyer_id, export_order.p_name, garment_buyer_company.com_name, garment_buyer_company.buyer_id ,export_order.total FROM transaction_of_export INNER JOIN export_order on export_order.order_id = transaction_of_export.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id where transaction_of_export.buyer_transaction_id = $buyer_transaction_id";

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
      	<a href="buyer_transaction_of_export_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Payment Transaction Details </div>

    <table class="table table-hover" style="background-color:#F7F9F9">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
         <th scope="col">Field</th>
         <td><b> Data </b></td>
	    </tr>

 <!-- ****************************************************************************************************************** -->
	     <tr>
	      <th scope="col">Serial:</th>
	      <td> <?php echo $std['buyer_transaction_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Order ID:</th>
	      <td> <?php echo $std['order_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Name:</th>
	      <td> <?php echo $std['com_name']; ?> </td>
	     </tr>

       <tr>
        <th scope="col">Buyer ID:</th>
        <td> <?php echo $std['buyer_id']; ?> </td>
       </tr>

	    <tr>
	      <th scope="col">Deal Amount:</th>
	      <td> <?php echo $std['total']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">Transaction Date:</th>
	      <td> <?php echo $std['transaction_date']; ?> </td>
	     </tr>

      <tr>
        <th scope="col">Transaction Type:</th>
        <td> <?php echo $std['transaction_type']; ?> </td>
       </tr>
	     
	    <tr>
	      <th scope="col">Transaction Amount:</th>
	      <td> <?php echo $std['transaction_amount']; ?> </td>
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

