<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 3 || $_SESSION['user'] == 2) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $exp_id = $_GET['exp_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM expenditure WHERE exp_id =$exp_id";
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
include "header.php";
?>
<!--************************************************ Navigation bar End ************************************************ -->

	 
<div class="container">
<div class="card">

        <div class ="card-body"> 
      	<div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
      	<a href="expenditure_details.php" class="btn btn" style="background-color: white">Go Back</a> Expenditure Details
        </div>
        <table class="table table-hover" style="background-color:#ecf0f1">
        <tr style="background-color:#283747; color:white">
	      <th scope="col">Field</th>
	      <td> Data </td>
	    </tr>

 <!-- ****************************************************************************************************************** -->
	     <tr>
	      <th scope="col">Serial:</th>
	      <td> <?php echo $std['exp_id']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Date:</th>
	      <td> <?php echo $std['date']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Gas Bill:</th>
	      <td> <?php echo $std['gas']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Electricity Bill</th>
	      <td> <?php echo $std['electricity']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Water Bill</th>
	      <td> <?php echo $std['water']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Electrical Applience</th>
	      <td> <?php echo $std['electrical_applience']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Food Expense:</th>
	      <td> <?php echo $std['food']; ?> </td>
	      </tr>
 
	      <tr>
	      <th scope="col">Medical Expense:</th>
	      <td> <?php echo $std['medic']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Newspaper Bill:</th>
	      <td> <?php echo $std['newspaper']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Stationary expense:</th>
	      <td> <?php echo $std['stationary']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Telephone Bill:</th>
	      <td> <?php echo $std['telephone']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Total:</th>
	      <td> <?php echo $std['total']; ?> </td>
	      </tr>

	</table>

    </div> 
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

