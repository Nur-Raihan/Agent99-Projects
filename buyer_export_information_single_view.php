<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


  $exinfo_id = $_GET['exinfo_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT garment_export_information.exinfo_id, garment_export_information.order_id, garment_export_information.delivery_date, garment_export_information.shipping_cost, garment_export_information.tax, garment_export_information.receive_date,invoice.invoice_id, invoice.order_id, invoice.invoice_date, export_order.order_id, export_order.order_date, export_order.p_name, export_order.xsmall, export_order.small, export_order.medium, export_order.large, export_order.xlarge, export_order.2xlarge, export_order.3xlarge, export_order.quantity, export_order.rate, export_order.total, export_order.advance, export_order.remain, export_order.delivery_date,garment_buyer_company.com_name, garment_buyer_company.com_agent, garment_buyer_company.country, garment_buyer_company.buyer_id, garment_buyer_company.phone, garment_buyer_company.state, garment_buyer_company.address, garment_buyer_company.email FROM garment_export_information INNER JOIN invoice on garment_export_information.order_id = invoice.order_id INNER JOIN export_order on invoice.order_id = export_order.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id where garment_export_information.exinfo_id = $exinfo_id";

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
      	<a href="buyer_export_infomation_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Export Information Details </div>
    <table class="table table-hover" style="background-color:#F7F9F9">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	       <th scope="col">Field</th>
	       <td><b> Data </b></td>
	    </tr>

 <!-- ****************************************************************************************************************** -->
	     <tr>
	      <th scope="col">Serial:</th>
	      <td> <?php echo $std['exinfo_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Order ID</th>
	      <td> <?php echo $std['order_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Name</th>
	      <td> <?php echo $std['com_name']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Phone Number</th>
	      <td> <?php echo $std['phone']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Deal Amount</th>
	      <td> <?php echo $std['total']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">quantity</th>
	      <td> <?php echo $std['quantity']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Delivery Date</th>
	      <td> <?php echo $std['delivery_date']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Shipping Cost</th>
	      <td> <?php echo $std['shipping_cost']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Tax</th>  
	      <td> <?php echo $std['tax']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Receive Date</th>
	      <td> <?php echo $std['receive_date']; ?> </td>
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

