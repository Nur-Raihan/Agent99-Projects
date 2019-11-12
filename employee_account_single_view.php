<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 4 || $_SESSION['user'] == 3) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $acc_id = $_GET['acc_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT employee_account.acc_id, employee_account.eminfo_id, employee_account.basic_salary, employee_account.conveyance_allowance, employee_account.medical_allowance, employee_account.house_allowance,employee_account.end_year_bonus, employee_account.total, employee_information.emp_pic, employee_information.fname, employee_information.lname, employee_information.division_id, employee_information.designation, division.division_name FROM employee_account INNER JOIN employee_information on employee_account.eminfo_id = employee_information.eminfo_id INNER JOIN division on employee_information.division_id = division.division_id where employee_account.acc_id = $acc_id";
  
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
      	<a href="employee_account_details.php" class="btn btn" style="background-color: white">Go Back</a> Employee Account Details
        </div>
        <table class="table table-hover" style="background-color:#ecf0f1">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	      <th scope="col">Field</th>
	      <td><b> Data <b></td>
	    </tr>

 <!-- ****************************************************************************************************************** -->


 	      <tr>
	      <th style="background-color: #F2F3F4 ; color: #5d6d7e" scope="col">Employee Image:</th>
	      <td style="background-color: #F2F3F4 ; color: #5d6d7e"><img src="<?php echo $std['emp_pic']?>" style="border-radius:100px; width:150px; height:146px"></td>
	      </tr>

	      <tr>
	      <th scope="col">Account Serial:</th>
	      <td> <?php echo $std['acc_id']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Employee ID:</th>
	      <td> <?php echo $std['eminfo_id']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">First Name:</th>
	      <td> <?php echo $std['fname']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Last Name:</th>
	      <td> <?php echo $std['lname']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Division:</th>
	      <td> <?php echo $std['division_name']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Designation:</th>
	      <td> <?php echo $std['designation']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Basic Salary:</th>
	      <td> <?php echo $std['basic_salary']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Conveyance Allowance</th>
	      <td> <?php echo $std['conveyance_allowance']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">Medical Allowance</th>
	      <td> <?php echo $std['medical_allowance']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">House Allowance</th>
	      <td> <?php echo $std['house_allowance']; ?> </td>
	      </tr>

	      <tr>
	      <th scope="col">End Year Bonus:</th>
	      <td> <?php echo $std['end_year_bonus']; ?> </td>
	      </tr>
 
	      <tr>
	      <th scope="col">Total Salary:</th>
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

