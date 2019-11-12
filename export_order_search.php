<?php session_start();

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 2 || $_SESSION['user'] == 5 || $_SESSION['user'] == 3) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

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
include "header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->

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

<div class="col-md-10">

      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
        <a href="export_order_details.php" class="btn btn" style="background-color: white">Back</a>
        
<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 2 || $_SESSION['user'] == 5){ ?>

     	<a href="export_order_form.php" class="btn btn" style="background-color: white">Go to form</a>
        <?php }
      } ?>
<!-- piority End --> 

        <a href="panel.php" class="btn btn" style="background-color: white">Go to homepage</a>

     	 Buyer Order Details </div>   

     	<div class="list-group-item list-group-item-success">
      <form action="export_order_search.php" method="post">
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
                                
                                                        
  <!-- ****************************************************************************************************************** -->
   
  <div style="overflow-x:auto;">
	<table class="table table-hover" style="background-color:#ecf0f1">
	  <thead>
	    <tr style="background-color:#283747; color:white">
      <th scope="col">Order ID</th>
      <th scope="col">Order Date</th>
      <th scope="col">Buyer ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">X Small</th>
      <th scope="col">Small</th>
      <th scope="col">Medium</th>
      <th scope="col">Large</th>
      <th scope="col">X Large</th>
      <th scope="col">2X Large</th>
      <th scope="col">3X Large</th>
      <th scope="col">Quantity</th>
      <th scope="col">Single Rate</th>
      <th scope="col">Total</th>
      <th scope="col">Advance</th>
      <th scope="col">Remain</th>
      <th scope="col">Delivery Date</th>
      <th scope="col">Operation</th>
	    </tr>
	  </thead>
	  <tbody>

	  <?php 
            $conn =  mysqli_connect('localhost','root','','gms');
            $get=$_POST['search'];

            
            $show = "SELECT * FROM export_order where order_id Like '%$get%' OR buyer_id Like '%$get%' OR p_name Like '%$get%'  ";
            if($show){
            $result = mysqli_query($conn, $show);          

                       
      while ($row = mysqli_fetch_array($result)) {?> 
      
	    <tr>
      <td> <?php echo $row['order_id']     ?>  </td>
      <td> <?php echo $row['order_date']   ?>  </td>  
      <td> <?php echo $row['buyer_id']     ?>  </td>   
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
      <td> <?php echo $row['total']        ?>  </td>
      <td> <?php echo $row['advance']      ?>  </td>
      <td> <?php echo $row['remain']       ?>  </td>
      <td> <?php echo $row['delivery_date']?>  </td>
	      

        <td class="buttonsBlock">   
               <a class="btn" style="background-color: #58d68d"  href="export_order_single_view.php ?order_id=<?php echo $row['order_id']; ?> ">View </a>

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 2 || $_SESSION['user'] == 5){ ?>

               <a class="btn" style="background-color: #5dade2" href="export_order_edit.php ?order_id=<?php echo $row['order_id']; ?> ">Edit </a>
        <?php }
      } ?>
<!-- piority End -->      

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 2 || $_SESSION['user'] == 5){ ?>

               <a class="btn" style="background-color: #FA8072"  href="export_order_delete.php ?order_id=<?php echo $row['order_id']; ?> ">Delete </a>
        <?php }
      } ?>
<!-- piority End --> 

        </td>

	    </tr>

      <?php }}  

      ?>   


	  </tbody>
	</table>

       </div>
    </div>
    <!--************************************ Form End ************************************-->
  </div>
</div>

<!--******************************************** Footer ******************************************** -->
<?php
include "footer.php";
?>
<!--****************************************** Footer End ****************************************** -->


<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

</body>

</html>