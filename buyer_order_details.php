<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT * FROM export_order WHERE buyer_id =$current_customer order by order_id desc";

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
        
         <h4 class="well">All Orders</h4>
 <!--
     	<div class="">
      <form action="buyer_order_search.php" method="post">
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
                                                        
  <!-- ***************************************************************************************************************** -->
  <?php 
  while ($row = mysqli_fetch_assoc($result)) {?>  
 
    <div class="">   
    <a class="" style="background-color:" href="buyer_order_single_view.php ?order_id=<?php echo $row['order_id']; ?> "><h4>View </h4> </a>     
    </div><br>

  <big class="well">Order ID: <?php echo $row['order_id'] ?></big> <?php echo"<br>" ?><br>  

  <mark>Product: <?php echo $row['p_name']        ?><br></mark>
  Order Date: <?php echo  $row['order_date']      ?> |
  Delivery Date: <?php echo $row['delivery_date'] ?><br>

  <b style="color:#2980B9">Total:   </b>  <?php echo $row['total']   ?> |
  <b style="color:#2980B9">Advance: </b>  <?php echo $row['advance'] ?> |
  <b style="color:#2980B9">Remain:  </b>  <?php echo $row['remain']  ?>


  <br><br>
  <div style="overflow-x:auto;">
  <table id="example" class="table table-hover table-striped buttonsBlock" style="background-color:#ecf0f1" width="100%" cellspacing="0">
	  <thead>
	    <tr style="background-color:; color: #5d6d7e">
      <th scope="col">Product Name   </th>      
      <th scope="col">X Small        </th>
      <th scope="col">Small          </th>
      <th scope="col">Medium         </th>
      <th scope="col">Large          </th>
      <th scope="col">X Large        </th>
      <th scope="col">2X Large       </th>
      <th scope="col">3X Large       </th>
      <th scope="col">Quantity       </th>
      <th scope="col">Single Rate    </th>
	    </tr>
	  </thead>
	  <tbody>
	    
	  <tr>
      <td> <?php echo $row['p_name']       ?>  </td>   
      <td> <?php echo $row['xsmall']       ?>  </td>
      <td> <?php echo $row['small']        ?>  </td>
      <td> <?php echo $row['medium']       ?>  </td>
      <td> <?php echo $row['large']        ?>  </td>
      <td> <?php echo $row['xlarge']       ?>  </td>
      <td> <?php echo $row['2xlarge']      ?>  </td>
      <td> <?php echo $row['3xlarge']      ?>  </td>
      <td> <?php echo $row['quantity']     ?>  </td>
      <td> <?php echo $row['rate']         ?>  </td>  
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
