<?php session_start();

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
        <a href="expenditure_details.php" class="btn btn" style="background-color: white">Back</a>

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

     	<a href="expenditure_form.php" class="btn btn" style="background-color: white">Go to form</a>
        <?php }
      } ?>
<!-- piority End -->      

        <a href="panel.php" class="btn btn" style="background-color: white">Go to homepage</a>

     	 Expenditure List </div>   

     	<div class="list-group-item list-group-item-success">
      <form action="expenditure_search.php" method="post">
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
      <th scope="col">Serial</th>
      <th scope="col">Date</th>
      <th scope="col">Gas Bill</th>
      <th scope="col">Electricity Bill</th>      
      <th scope="col">Water Bill</th>
      <th scope="col">Elecrical Applience</th>
      <th scope="col">Food Expense</th>
      <th scope="col">Medical Expense</th>
      <th scope="col">Newspaper Bill</th>
      <th scope="col">Stationary Expense</th>
      <th scope="col">Telephone Bill</th>
      <th scope="col">Total</th>
      <th scope="col">Operation</th>
      </tr>
	  </thead>
	  <tbody>

	  <?php 
            $conn =  mysqli_connect('localhost','root','','gms');
            $get=$_POST['search'];
            $show = "SELECT * FROM expenditure where date LIKE '%$get%' ";
            if($show){
            $result = mysqli_query($conn, $show);          
                       
                       
      while ($row = mysqli_fetch_array($result)) {?> 
	    
      <tr>
      <td> <?php echo $row['exp_id']                    ?>  </td> 
      <td> <?php echo $row['date']                  ?>  </td>    
      <td> <?php echo $row['gas']                   ?>  </td>   
      <td> <?php echo $row['electricity']           ?>  </td>
      <td> <?php echo $row['water']                 ?>  </td>
      <td> <?php echo $row['electrical_applience']  ?>  </td>
      <td> <?php echo $row['food']                  ?>  </td>
      <td> <?php echo $row['medic']                 ?>  </td>
      <td> <?php echo $row['newspaper']             ?>  </td>
      <td> <?php echo $row['stationary']            ?>  </td>
      <td> <?php echo $row['telephone']             ?>  </td>
      <td> <?php echo $row['total']                 ?>  </td>
	      

        <td class="buttonsBlock">   
               <a class="btn" style="background-color: #58d68d"  href="expenditure_single_view.php ?exp_id=<?php echo $row['exp_id']; ?> ">View </a>

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

               <a class="btn" style="background-color: #5dade2" href="expenditure_edit.php ?exp_id=<?php echo $row['exp_id']; ?> ">Edit </a>

        <?php }
      } ?>
<!-- piority End -->      

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

               <a class="btn" style="background-color: #FA8072"  href="expenditure_delete.php ?exp_id=<?php echo $row['exp_id']; ?> ">Delete </a>
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