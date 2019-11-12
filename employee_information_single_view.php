<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 4) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $eminfo_id = $_GET['eminfo_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

 $sql = "SELECT employee_information.eminfo_id, employee_information.emp_pic, employee_information.fname, employee_information.lname, employee_information.division_id, division.division_name, employee_information.designation, employee_information.join_date, employee_information.birth_date, employee_information.gender, employee_information.nid, employee_information.address, employee_information.phone, employee_information.email, employee_information.password FROM employee_information INNER JOIN division on employee_information.division_id = division.division_id WHERE eminfo_id =$eminfo_id";

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
      	<a href="employee_information_details.php" class="btn btn" style="background-color: white">Go Back</a>
      	 Employee Details </div><br>

        <!-- Showing picture here   -->
        <div  style="width:332px; color: #5d6d7e;" class="col-sm-5">
           <div class="panel panel-default" ><!-- put a ash color background -->
             <div class="panel-heading" style="color: #5d6d7e">        

                  <div class="pull-right"><!-- pulling div in the right -->                   	

                    	<a href="<?php echo $std['emp_pic']?>"><i class="glyphicon glyphicon-fullscreen"></i></a>

                     	<a href="employee_image_edit.php ?eminfo_id=<?php echo $std['eminfo_id']; ?>"><i class="glyphicon glyphicon-edit"></i></a>

                  </div>

               Name: <?php echo $std['fname']; ?> <?php echo $std['lname']; ?>

             </div>        
              <img src="<?php echo $std['emp_pic']?>" style="border-radius:0px; width:300px; height:280px"><br>

           </div>
        </div>
       <!-- End of Showing picture-->


        <table class="table table-hover" style="background-color:#ecf0f1">
        <tr style="background-color: #e5e7e9 ; color: #5d6d7e">
	       <th scope="col">Field</th>
	       <td><b> Data </b></td>
	      </tr>

 <!-- ****************************************************************************************************************** -->

	     <tr>
	      <th scope="col">ID:</th>
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
	      <th scope="col">Division Name:</th>
	      <td> <?php echo $std['division_name']; ?> </td>
	     </tr>
	     
	    <tr>
	      <th scope="col">Division ID:</th>
	      <td> <?php echo $std['division_id']; ?> </td>
	     </tr>

	    <tr>
	      <th scope="col">Designation:</th>
	      <td> <?php echo $std['designation']; ?> </td>
	     </tr>
	     
	    <tr>
	      <th scope="col">Join Date:</th>
	      <td> <?php echo $std['join_date']; ?> </td>
	     </tr>
	     
	     <tr>
	      <th scope="col">Birth Date:</th>
	      <td> <?php echo $std['birth_date']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Gender:</th>
	      <td> <?php echo $std['gender']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">NID:</th>
	      <td> <?php echo $std['nid']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Address:</th>
	      <td> <?php echo $std['address']; ?> </td>
	     </tr>   

        <tr>
	      <th scope="col">Contact:</th>
	      <td> <?php echo $std['phone']; ?> </td>
	     </tr>

	     <tr>
	      <th scope="col">Email:</th>
	      <td> <?php echo $std['email']; ?> </td>
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

<?php
    
    if(isset($_SESSION['message'])) {
      echo "<script>
      swal(
      'Image successfully updated',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message']); }
?>

</body>

</html>

