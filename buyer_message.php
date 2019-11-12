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


<body style="background-color: #FDFEFE">

<!--************************************************** Navigation bar ************************************************** -->
<?php
include "buyer_header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->
	 
<div><!-- Everything is inside this div -->
 <div class="container-fluid"> <!-- This div class="container-fluid" Grab the whole body into a form  -->
   <div class="row content"> <!-- "row" this class has extra margin-top pixel which make an extra empty space on above -->

<!--******************************************** Side bar Start ******************************************** -->
<?php
include "buyer_sidebar.php";
?>
<!--********************************************* Side Bar End ********************************************* -->
  
   </div>

<!--************************************************* Main Form Start ************************************************* -->
    <div class="col-sm-10"><!-- Form Size (For Dashboard, Details, Form etc)-->
        
         <h4 class="well">Message Box</h4>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid" style="background-color: #f6f6f6">
  <h2 class="text-center"; style="color: #616A6B"><i class="glyphicon glyphicon-envelope"></i> Message</h2>

  <div class="row">

<!--
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chittagong, BANGLADESH</p>
      <p><span class="glyphicon glyphicon-phone"></span> +880 18294445559</p>
      <p><span class="glyphicon glyphicon-envelope"></span> www.gmswhiteunicorn@gmail.com</p>
    </div>
-->

    <div class="col-sm-6 col-md-8 col-md-offset-2" style="">
      
      <div class="row">
      <form action="buyer_mail.php" method="post">

        <div class="col-sm-12 form-group">
          <input class="form-control" name="heading" placeholder="Subject" type="text" required>
        </div>
      </div>

      <textarea class="form-control" name="message" placeholder="Message" rows="5" required></textarea><br>

      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>

     </form>
    </div>
  </div>
</div>




    </div>
    <!--************************************ Form End ************************************-->
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
    
    if(isset($_SESSION['send_success'])) {
      echo "<script>
      swal({
      type: 'success',
      title: 'Thank you!<br>Your message has been sent successfully ',
      showConfirmButton: false,
      timer: 4000
      })
      </script>";     
      unset($_SESSION['send_success']); }
?>

<?php
    
    if(isset($_SESSION['send_fail'])) {
      echo "<script>
      swal({
      type: 'warning',
      title: 'Sorry!<br>Unable to send message.',
      showConfirmButton: false,
      timer: 4000
      })
      </script>";     
      unset($_SESSION['send_fail']); }
?>

</body>

</html>


