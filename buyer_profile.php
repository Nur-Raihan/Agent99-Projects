<?php session_start();


	if (!isset($_SESSION['customer_id'])) {
		header("Location: buyer_login.php");
	}
	else{
		$current_cuntomer = $_SESSION['customer_id'];		
	}  

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM garment_buyer_company WHERE buyer_id =$current_cuntomer";

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
include "buyer_header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->
	 
<div class="container">
<div class="card">

  <div class ="card-body"> 
      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">

      	<a href="buyer_panel.php" class="btn btn" style="background-color: white">homepage</a>
      	
      	 Profile </div>
        
       <!-- End of Showing picture-->
        <table class="table table-hover" style="background-color:#ecf0f1">
          <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	       <th scope="col">Field</th>
	       <td><b> Data </b></td>
	      </tr>

 <!-- ****************************************************************************************************************** -->
 
 	      <tr>
	      <th style="background-color: #F2F3F4 ; color: #5d6d7e" scope="col">Buyer Image:</th>
	      <td style="background-color: #F2F3F4 ; color: #5d6d7e">
	      <img src="<?php echo $std['buyer_pic']?>" style="width:200px; height:146px">
	      </td>
	      </tr>

	     <tr>
	      <th scope="col">Buyer ID:</th>
	      <td> <?php echo $std['buyer_id']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Name:</th>
	      <td> <?php echo $std['com_name']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Agent:</th>
	      <td> <?php echo $std['com_agent']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Country:</th>
	      <td> <?php echo $std['country']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer State:</th>
	      <td> <?php echo $std['state']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Address:</th>
	      <td> <?php echo $std['address']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Buyer Contact:</th>
	      <td> <?php echo $std['phone']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Buyer Email:</th>
	      <td> <?php echo $std['email']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Buyer Password:</th>
	      <td> <?php echo $std['password']; ?> </td>
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

<?php
    
    if(isset($_SESSION['message1'])) {
      echo "<script>
      swal(
      'Image successfully updated',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message1']); }
?>

<?php
    
    if(isset($_SESSION['message'])) {
      echo "<script>
      swal(
      'Data successfully updated',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message']); }
?>

</body>

</html>


