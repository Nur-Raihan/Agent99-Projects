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

 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT employee_information.eminfo_id, employee_information.emp_pic, employee_information.fname, employee_information.lname, employee_information.division_id, division.division_name, employee_information.designation, employee_information.join_date, employee_information.birth_date, employee_information.gender, employee_information.nid, employee_information.address, employee_information.phone, employee_information.email, employee_information.password FROM employee_information INNER JOIN division on employee_information.division_id = division.division_id ";
 
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
     	  <a href="employee_information_form.php" class="btn btn" style="background-color: white">Go to form</a>
        <a href="panel.php" class="btn btn" style="background-color: white">Back to homepage</a> Employee Details
     	</div><br>

 <!--  
     	<div class="list-group-item list-group-item-success">
      <form action="employee_information_search.php" method="post">
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
	      <th scope="col">Employee ID     </th>
        <th scope="col">Employee Image  </th>
	      <th scope="col">First Name      </th>
	      <th scope="col">Last Name       </th>
	      <th scope="col">Division        </th>
        <th scope="col">Division ID     </th>
	      <th scope="col">Designation     </th>
	      <th scope="col">Join Date       </th>
	      <th scope="col">Birth Date      </th>
	      <th scope="col">Gender          </th>
	      <th scope="col">NID             </th>
	      <th scope="col">Address         </th>
	      <th scope="col">Contact         </th>
	      <th scope="col">Email           </th>
        <th scope="col">Employee Report </th>
	      <th scope="col">Operations      </th> 
	    </tr>
	  </thead>
	  <tbody>

	  <?php 
      while ($row = mysqli_fetch_assoc($result)) {?> 
	    
	    <tr>
	      <td> <?php echo $row['eminfo_id']     ?>  </td>
        <td> <img src="<?php echo $row['emp_pic']   ?>" style="border-radius:100px; width:60px; height:60px"> </td>
	      <td> <?php echo $row['fname']         ?>  </td>
	      <td> <?php echo $row['lname']         ?>  </td>
	      <td> <?php echo $row['division_name'] ?>  </td>
        <td> <?php echo $row['division_id']   ?>  </td>
	      <td> <?php echo $row['designation']   ?>  </td>
	      <td> <?php echo $row['join_date']     ?>  </td>
	      <td> <?php echo $row['birth_date']    ?>  </td>
	      <td> <?php echo $row['gender']        ?>  </td>
	      <td> <?php echo $row['nid']           ?>  </td>
	      <td> <?php echo $row['address']       ?>  </td>
	      <td> <?php echo $row['phone']         ?>  </td>
	      <td> <?php echo $row['email']         ?>  </td>


      <td><h4><a href="employee_information_pdf.php ?eminfo_id=<?php echo $row['eminfo_id']; ?> "><span class="label label-default">Employee ID - <?php echo $row['eminfo_id']   ?></span></a></h4></td>

	      <td class="buttonsBlock"> 
              <a class="btn" style="background-color: #58d68d"  href="employee_information_single_view.php ?eminfo_id=<?php echo $row['eminfo_id']; ?> ">View </a>

              <a class="btn" style="background-color: #5dade2" href="employee_information_edit.php ?eminfo_id=<?php echo $row['eminfo_id']; ?> ">Edit </a>
              
              <a class="btn" style="background-color: #FA8072"  href="employee_information_delete.php ?eminfo_id=<?php echo $row['eminfo_id']; ?> ">Delete </a>
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