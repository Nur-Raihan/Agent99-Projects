<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 8) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT cutting.cutting_id, cutting.date, cutting.order_id, cutting.target, cutting.complete, cutting.uncomplete, cutting.comment, export_order.quantity, export_order.p_name FROM cutting INNER JOIN export_order on cutting.order_id = export_order.order_id order by cutting_id desc";
 
 $result = mysqli_query($conn, $sql);


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head, any other head content must come after these tags -->
    <title>GMS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <!-- Jquery Datatables -->
    <link rel="stylesheet" href="assets/datatables/css/datatables.css">
    <link rel="stylesheet" href="assets/datatables/css/dataTables.bootstrap.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Main Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color: #f8f9f9">

<!--******************************************** Navigation bar ******************************************** -->
<?php
include "header.php";
?>
<!--****************************************** Navigation bar End ****************************************** -->

<div><!-- Everything is inside this div -->
 <div class="container-fluid"> <!-- This div class="container-fluid" Grab the whole body into a form  -->
   <div class="row content"> <!-- "row" this class has extra margin-top pixel which make an extra empty space on above -->

<!--******************************************** Side bar Start ******************************************** -->
<?php
include "sidebar.php";
?>
<!--********************************************* Side Bar End ********************************************* -->
    <br>
   </div>

<!--************************************************* Main Form Start ************************************************* -->
    <div class="col-sm-10"><!-- Form Size (For Dashboard, Details, Form etc)-->

      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
     	   <a href="cutting_form.php" class="btn btn" style="background-color: white">Go to form</a>
         <a href="panel.php" class="btn btn" style="background-color: white">Back to homepage</a> Garment Cutting List
      	</div><br>                                
                                                        
  <!-- ****************************************************************************************************************** -->
   
  <table id="example" class="table table-hover table-striped buttonsBlock" style="background-color:#ecf0f1" width="100%" cellspacing="0">
    <thead>
      <tr style="background-color:#ecf0f1; color:#212F3D">
	      <th scope="col">Cutting ID         </th>
        <th scope="col">Entry Date         </th>
	      <th scope="col">Order ID           </th>
        <th scope="col">Product            </th>
        <th scope="col">Quantity           </th>
        <th scope="col">Target Date        </th>
	      <th scope="col">Cutting Complete   </th>
	      <th scope="col">Cutting Uncomplete </th>
        <th scope="col">Comment            </th>  
	      <th scope="col">Operations         </th>
	    </tr>
	  </thead>
	  <tbody>

	  <?php 
      while ($row = mysqli_fetch_assoc($result)) {?> 
	    
	    <tr>
	      <td> <?php echo $row['cutting_id']   ?>  </td>
        <td> <?php echo $row['date']        ?>  </td>
	      <td> <?php echo $row['order_id']    ?>  </td>
        <td> <?php echo $row['p_name']      ?>  </td>
        <td> <?php echo $row['quantity']    ?>  </td>
        <td> <?php echo $row['target']      ?>  </td>
	      <td> <?php echo $row['complete']    ?>  </td>
	      <td> <?php echo $row['uncomplete']  ?>  </td>
        <td> <?php echo $row['comment']     ?>  </td>
	      

	      <td class="buttonsBlock">  
               <a class="btn" style="background-color: #58d68d"  href="cutting_single_view.php ?cutting_id=<?php echo $row['cutting_id']; ?> ">View </a>

               <a class="btn" style="background-color: #5dade2" href="cutting_edit.php ?cutting_id=<?php echo $row['cutting_id']; ?> ">Edit </a>

               <a class="btn" style="background-color: #FA8072"  href="cutting_delete.php ?cutting_id=<?php echo $row['cutting_id']; ?> ">Delete </a>
	      </td>

	    </tr>
      <?php } ?>    
	  </tbody>
	</table>

    </div>
    <!--************************************ Form End ************************************-->
  </div>
</div>

<!--******************************************** Footer ******************************************** -->
<?php
include "footer.php";
?>
<!--****************************************** Footer End ****************************************** -->


<!-- Jquery -->
<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>

<!-- Bootstarp js -->
<script src="assets/bootstrap/js/bootstrap.js"></script>

<!-- Jquery Datatables js -->
<script src="assets/datatables/js/datatables.js"></script>

<!-- nmp js -->
<script src="assets/bootstrap/js/npm.js"></script>

<!-- Sweetalert 2 js -->
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>


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