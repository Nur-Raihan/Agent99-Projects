<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT inspection.inspection_id, inspection.date, inspection.order_id, inspection.aql, export_order.quantity,export_order.buyer_id, export_order.p_name, merchandiser_analysis.sample_picture FROM inspection INNER JOIN export_order on inspection.order_id = export_order.order_id INNER JOIN merchandiser_analysis on export_order.order_id = merchandiser_analysis.order_id WHERE export_order.buyer_id =$current_customer order by export_order.order_id desc";

 $result = mysqli_query($conn, $sql);

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

    <title>GMS</title>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Main Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color: #FDFEFE">

<!--******************************************** Navigation bar ******************************************** -->
<?php
include "buyer_header.php";
?>
<!--****************************************** Navigation bar End ****************************************** -->



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
       
         <h4 class="well">Products AQL</h4>

          <div class="row">
                                                        
  <!-- ****************************************************************************************************************** -->
  <?php 
  while ($row = mysqli_fetch_assoc($result)) {?>  
 
  <div class="col-lg-3 col-md-6">

<!--
  
  <a class="" style="background-color:" href="buyer_inspection_single_view.php ?inspection_id=<?php echo $row['inspection_id']; ?> "><h4>View </h4> </a>   

-->
  <div class="well">
  <img src="<?php echo $row['sample_picture'] ?>" style="border-radius:15px; width:65px; height:60px">
  Order ID: <?php echo $row['order_id'] ?><?php echo"<br>" ?><br>  
  Product: <?php echo $row['p_name']    ?><br>
  AQL    : <?php echo $row['aql']       ?><br>
  </div>

  </div>

  <?php } ?> 

    <!--************************************ Form End ************************************-->

  </div>
 </div>
</div>
</div>

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-triangle-top"></span></a>


<!--******************************************** Footer ******************************************** -->
<?php
include "footer_buyer.php";
?>
<!--****************************************** Footer End ****************************************** -->



<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>


<script>
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');

    });
</script>


</body>

</html>
