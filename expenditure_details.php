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

 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT * FROM expenditure";
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

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

      	 <a href="expenditure_form.php" class="btn btn" style="background-color: white">Go to form</a>
        <?php }
      } ?>
<!-- piority End -->      

         <a href="Panel.php" class="btn btn" style="background-color: white">Back to homepage</a> 
         <a href="expenditure_chart.php" class="btn btn" style="background-color: white">Expenditure Chart</a>
         Expenditure List
     	  </div><br>

 <!--  
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
 -->                 
                                                        
  <!-- ****************************************************************************************************************** -->
   
  <table id="example" class="table table-hover table-striped buttonsBlock" style="background-color:#ecf0f1" width="100%" cellspacing="0">
    <thead>
      <tr style="background-color:#ecf0f1; color:#212F3D">
	    <th scope="col">Serial               </th>
      <th scope="col">Date                 </th>
      <th scope="col">Gas Bill             </th>
      <th scope="col">Electricity Bill     </th>      
      <th scope="col">Water Bill           </th>
      <th scope="col">Elecrical Applience  </th>
      <th scope="col">Food Expense         </th>
      <th scope="col">Medical Expense      </th>
      <th scope="col">Newspaper Bill       </th>
      <th scope="col">Stationary Expense   </th>
      <th scope="col">Telephone Bill       </th>
      <th scope="col">Total                </th>
      <th scope="col">Operation            </th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php 
      while ($row = mysqli_fetch_assoc($result)) {?> 
	    
	    <tr>
	    <td> <?php echo $row['exp_id']                ?>  </td> 
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