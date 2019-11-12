<?php session_start(); 

//User piority------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 3 || $_SESSION['user'] == 2) {
  
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
        <a href="banking_info_of_export_details.php" class="btn btn" style="background-color: white">Back</a>

<!-- User piority -->      
        <?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>
      	
        <a href="banking_info_of_export_form.php" class="btn btn" style="background-color: white">Go to form</a>

         <?php }
        } ?>
<!-- piority End -->      

        <a href="panel.php" class="btn btn" style="background-color: white">Go to homepage</a>

     	 Buyer Banking Transaction Details </div>   

     	<div class="list-group-item list-group-item-success">
      <form action="banking_info_of_export_search.php" method="post">
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
        <th scope="col">Banking Transaction of Buyer</th>
        <th scope="col">Order ID</th>
        <th scope="col">Buyer Name</th> <!-- from "export_order" table of 'com_name'--> 
        <th scope="col">Buyer ID</th> <!-- from "export_order" table of 'state'--> 
        <th scope="col">Deal Amount</th> <!--from "export_order" table of 'total'-->
        <th scope="col">Transaction Date</th>
        <th scope="col">Transaction Amount</th>
        <th scope="col">Buyer Bank</th>
        <th scope="col">Buyer Bank ID</th>
        <th scope="col">Garment Bank</th>
        <th scope="col">Garment Bank ID</th> 
        <th scope="col">Comment</th>  
        <th scope="col">Operations</th>
	    </tr>
	  </thead>
	  <tbody>

	  <?php 
            $conn =  mysqli_connect('localhost','root','','gms');
            $get=$_POST['search'];
            
            $show = "SELECT banking_info_of_export.bank_exinfo_id, banking_info_of_export.order_id, banking_info_of_export.transaction_date, banking_info_of_export.transaction_amount, banking_info_of_export.bank_from, banking_info_of_export.sender_id, banking_info_of_export.bank_to, banking_info_of_export.receiver_id, banking_info_of_export.comment, export_order.buyer_id, garment_buyer_company.com_name, garment_buyer_company.buyer_id ,export_order.total FROM banking_info_of_export INNER JOIN export_order on export_order.order_id = banking_info_of_export.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id where banking_info_of_export.order_id Like '%$get%' or garment_buyer_company.com_name Like '%$get%' or garment_buyer_company.buyer_id Like '%$get%' or banking_info_of_export.sender_id Like '%$get%' ";

            if($show){
            $result = mysqli_query($conn, $show);          
                       
                       
      while ($row = mysqli_fetch_array($result)) {?> 
	    
	    <tr>
        <td> <?php echo $row['bank_exinfo_id']    ?>  </td>
        <td> <?php echo $row['order_id']          ?>  </td>
        <td> <?php echo $row['com_name']          ?>  </td>
        <td> <?php echo $row['buyer_id']          ?>  </td>
        <td> <?php echo $row['total']             ?>  </td>
        <td> <?php echo $row['transaction_date']  ?>  </td>
        <td> <?php echo $row['transaction_amount']?>  </td>
        <td> <?php echo $row['bank_from']         ?>  </td>
        <td> <?php echo $row['sender_id']         ?>  </td>
        <td> <?php echo $row['bank_to']           ?>  </td>
        <td> <?php echo $row['receiver_id']       ?>  </td>
        <td> <?php echo $row['comment']           ?>  </td>
	      

	      <td class="buttonsBlock"> 
               <a class="btn" style="background-color: #58d68d"  href="banking_info_of_export_single_view.php ?bank_exinfo_id=<?php echo $row['bank_exinfo_id']; ?> ">View </a>

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

               <a class="btn" style="background-color: #5dade2" href="banking_info_of_export_edit.php ?bank_exinfo_id=<?php echo $row['bank_exinfo_id']; ?> ">Edit </a>
        <?php }
      } ?>
<!-- piority End -->   

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>
               <a class="btn" style="background-color: #FA8072"  href="banking_info_of_export_delete.php ?bank_exinfo_id=<?php echo $row['bank_exinfo_id']; ?> ">Delete </a>
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