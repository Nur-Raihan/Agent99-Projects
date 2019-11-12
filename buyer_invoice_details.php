<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


 $conn =  mysqli_connect('localhost','root','','gms');

  $sql = "SELECT  invoice.invoice_id, invoice.order_id, invoice.invoice_date, export_order.order_id, export_order.order_date, export_order.p_name, export_order.xsmall, export_order.small, export_order.medium, export_order.large, export_order.xlarge, export_order.2xlarge, export_order.3xlarge, export_order.quantity, export_order.rate, export_order.total, export_order.advance, export_order.remain, export_order.delivery_date,garment_buyer_company.com_name, garment_buyer_company.com_agent, garment_buyer_company.country, garment_buyer_company.buyer_id, garment_buyer_company.phone, garment_buyer_company.state, garment_buyer_company.address, garment_buyer_company.email FROM invoice INNER JOIN export_order on invoice.order_id = export_order.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id WHERE garment_buyer_company.buyer_id =$current_customer order by invoice.invoice_id desc";

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
  
    <h4 class="well">Invoices List</h4>

<!--
      <div class="list-group-item list-group-item-success">
        <form action="buyer_search.php" method="post">
      <div class="row">
        <div class="col-md-3">
        <input style="background-color: #ced4d7" type="text" name="search" class="form-control" placeholder="Search here">
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
   
      <pre> <big>Order ID: <?php echo $row['order_id'] ?> </big>
       Invoice ID: <?php echo $row['invoice_id']     ?> 
       Invoice Date: <?php echo $row['invoice_date'] ?>
       </pre>

        <div class="well">  
          <a class="btn" style="background-color: #f8c471"  href="invoice_pdf.php ?invoice_id=<?php echo $row['invoice_id']; ?> ">Print </a>

           <a class="btn" style="background-color: #58d68d"  href="buyer_invoice_single_view.php ?invoice_id=<?php echo $row['invoice_id']; ?> ">View </a>
        </div>
        </td><br><br>

  <?php } ?>  
        </div>
    </div>
    <!--************************************ Form End ************************************-->
</div>


<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-triangle-top"></span></a>


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