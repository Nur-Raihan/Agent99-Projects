<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT transaction_of_export.buyer_transaction_id, transaction_of_export.order_id, transaction_of_export.transaction_date, transaction_of_export.transaction_type, transaction_of_export.transaction_amount, transaction_of_export.comment, export_order.buyer_id, export_order.p_name, garment_buyer_company.com_name, garment_buyer_company.buyer_id ,export_order.total FROM transaction_of_export INNER JOIN export_order on export_order.order_id = transaction_of_export.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id WHERE garment_buyer_company.buyer_id =$current_customer order by transaction_of_export.buyer_transaction_id desc";

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
        
         <h4 class="well">Payment Transactions</h4>
 <!--
     	<div class="">
      <form action="buyer_banking_info_of_export.php" method="post">
     	  <div class="row">
         <div class="col-md-3">
         <input style="background-color: " type="text" name="search" class="form-control" placeholder="Search here"><br>
         </div>
           <div class="col-md-3">
           <button type="submit" class="btn btn-primary" name="form_submit" value="Search"> Search </button>  
           </div>
        </div>
      </form>
      </div>                                           
  -->             
                                                        
  <!-- ****************************************************************************************************************** -->
  <?php 
  while ($row = mysqli_fetch_assoc($result)) {?>  
 
    <a class="" style="background-color:" href="buyer_transaction_of_export_single_view.php ?buyer_transaction_id=<?php echo $row['buyer_transaction_id']; ?> "><h4>View </h4>
    </a><br>
  
  <div class="panel-footer"><br>
  <big class="well">Order ID: <?php echo $row['order_id'] ?></big> <?php echo"<br>" ?><br>  

  <b style="color:#2980B9">Product Name:        </b>  <?php echo  $row['p_name'] ?><br>
  <b style="color:#2980B9">Transaction Date:    </b>  <?php echo  $row['transaction_date'] ?><br>
  <b style="color:#5d6d7e">Transaction Ammount: </b>  <?php echo  $row['transaction_amount'] ?><br><br>  

  </div>

  <div style="overflow-x:auto;">
  <table id="example" class="table table-hover table-striped buttonsBlock" style="background-color:#ecf0f1" width="100%" cellspacing="0">
	  <thead>
	    <tr style="background-color:; color: #5d6d7e">
        <th scope="col">Deal Amount</th> <!--from "export_order" table of 'total'-->
        <th scope="col">Transaction Date</th>
        <th scope="col">Transaction Type</th>
        <th scope="col">Transaction Amount</th>
        <th scope="col">Comment</th>  
	    </tr>
	  </thead>
	  <tbody>
	    
	  <tr>
        <td> <?php echo $row['total']              ?>  </td>
        <td> <?php echo $row['transaction_date']   ?>  </td>
        <td> <?php echo $row['transaction_type']   ?>  </td>
        <td> <?php echo $row['transaction_amount'] ?>  </td>
        <td> <?php echo $row['comment']            ?>  </td>
	  </tr>
        
	  </tbody>
	</table></div><hr>

        <?php } ?> 
    </div>
    <!--************************************ Form End ************************************-->
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
