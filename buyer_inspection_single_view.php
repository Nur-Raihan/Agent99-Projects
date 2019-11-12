<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


 $inspection_id = $_GET['inspection_id'];


 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT inspection.inspection_id, inspection.date, inspection.order_id, inspection.aql, export_order.quantity,export_order.buyer_id, export_order.order_id, export_order.p_name, merchandiser_analysis.sample_picture, merchandiser_analysis.order_id, merchandiser_analysis.fabric_type FROM inspection INNER JOIN export_order on inspection.order_id = export_order.order_id INNER JOIN merchandiser_analysis on export_order.order_id = merchandiser_analysis.order_id WHERE WHERE inspection.inspection_id =$inspection_id";

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
      	<a href="buyer_inspection_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Product AQL Details </div>

        <!-- Showing sample picture here   -->
        <div style="width:420px; color: #5d6d7e;" class="col-sm-5">
           <div class="panel panel-default" ><!-- put a ash color background -->
             <div class="panel-heading" style="color: #5d6d7e">        

                  <div class="pull-right"><!-- pulling div in the right -->
                    	<a href="<?php echo $std['sample_picture']?>" style="background-color: white"><i class="glyphicon glyphicon-fullscreen"></i></a>
                  </div>

               Product type: <?php echo $std['p_name']; ?>

             </div>        
              <img src="<?php echo $std['sample_picture']?>" style="width:388px; height:460px; right:100px">                   
           </div>
        </div>
       <!-- End of showing sample picture -->

    <table class="table table-hover" style="background-color:#F7F9F9">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	       <th scope="col">Field</th>
	       <td><b> Data </b></td>
	    </tr>

 <!-- ****************************************************************************************************************** -->

 	     <tr>
	      <th scope="col">Inspection ID:</th>
	      <td> <?php echo $std['inspection_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Order ID:</th>
	      <td> <?php echo $std['order_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Product Name:</th>
	      <td> <?php echo $std['p_name']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Fabric Type:</th>
	      <td> <?php echo $std['fabric_type']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Quantity:</th>
	      <td> <?php echo $std['quantity']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Test Date:</th>
	      <td> <?php echo $std['date']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">AQL Rate:</th>
	      <td> <?php echo $std['aql']; ?> </td>
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

