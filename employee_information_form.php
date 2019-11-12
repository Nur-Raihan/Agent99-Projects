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

 $sql = "SELECT * FROM division";
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

        <div class="list-group-item active" style="background-color:#3498DB; color:#ffffff;border-color:#3498DB">
        <a href="employee_information_details.php" class="btn btn" style="background-color: white">Go to List</a>
        <a href="panel.php" class="btn btn" style="background-color: white">Panel</a>
        </div>

              
        <form class="well form-horizontal" action="employee_information_insert.php" enctype="multipart/form-data" method="post"> <!-- form class well form horizontal will protect form from being collaps and make all straigt in horizontal-->
            <fieldset> <!-- Create a border along with all input -->

                <!-- Form Name -->
             <div class="list-group-item active" align="center">Employee Information</div>
            <br><br>
             <!-- Text input-->

               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Employee Image</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="file" id="fileUpload" name="emp_pic"  class="form-control" placeholder="enter employee image" required>
                     </div>

                         <div class="item" id="image-holder"></div>

                  </div>
               </div>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">First Name</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="fname" class="form-control" placeholder="enter first name" required>
                       </div>
                  </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Last Name</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="lname" class="form-control" placeholder="enter last name" required>
                     </div>
                   </div>
              </div><br>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">Division Name</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <select type="text" class="form-control" name="division_id" placeholder="enter division" required>
                      
                          <option value=""></option>
                          <?php                         
                              while ($row = mysqli_fetch_assoc($result)) {?>
                              <option value=" <?php echo $row['division_id']; ?> "> <?php echo $row['division_name']    ?></option>
                          <?php } ?>

                         </select>
                   </div>
                  </div>
           </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Designation</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="designation" class="form-control" placeholder="enter designation" required>
                     </div>
                    </div>
              </div><br>


             <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Join Date</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon-"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                        <input type="date" name="join_date" class="form-control" placeholder="enter join date" required>
                     </div>
                 </div>
            </div><br>

                                
             <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Birth Date</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <input type="date" name="birth_date" class="form-control" placeholder="enter birth date" required>
                    </div>
                   </div>
              </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Gender</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                        <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <select type="text" name="gender" class="form-control" placeholder="enter gender type" required><br>
                               <option value="Male">Male</option>                             
                               <option value="Female">Female</option>
                         </select><br>
                       </div>
                   </div>
             </div><br>      


             <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">NID</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" name="nid" min="0" class="form-control" placeholder="enter nid number" required>
                       </div>
                  </div>
             </div><br> 


              <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Address</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                        <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="address" class="form-control" placeholder="enter address" required><br>
                       </div>
                 </div>
             </div><br>           


             <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Contact</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="phone" min="0" class="form-control" placeholder="enter contact number" required><br>
                    </div>
                  </div>
             </div><br>


             <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Email</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="email" class="form-control" placeholder="enter email address" required><br>
                      </div>
                   </div>
               </div><br>


             <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Password</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="password" class="form-control" placeholder="enter password" required><br>
                      </div>
                   </div>
               </div><br>


                <!-- Button -->
              <div class="form-group">
                   <label class="col-md-3 control-label"></label> <!--without control-label text will go to the left side-->
                  <div class="col-md-4"> <!--Just place the button in right a little -->
                       <button  type="submit" class="btn btn-primary" name="form_submit"> Enter Data <span class="glyphicon glyphicon"></span></button>
                   </div>
                 </div>

            </fieldset>
        </form>
    </div><!-- /.container -->


<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-triangle-top"></span></a>


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
    
    if(isset($_SESSION['message_nid'])) {
      echo "<script>
      swal(
      'NID number already taken!',
      'Click on ok',
      'warning'
      )
      </script>";     
      unset($_SESSION['message_nid']); }
?>

<?php
    
    if(isset($_SESSION['message_contact'])) {
      echo "<script>
      swal(
      'Contact number already taken!',
      'Click on ok',
      'warning'
      )
      </script>";     
      unset($_SESSION['message_contact']); }
?>

<?php
    
    if(isset($_SESSION['message_email'])) {
      echo "<script>
      swal(
      'Email already taken!',
      'Click on ok',
      'warning'
      )
      </script>";     
      unset($_SESSION['message_email']); }
?>

<?php
    
    if(isset($_SESSION['message'])) {
      echo "<script>
      swal(
      'Data insered successfully',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message']); }
?>


<script type="text/javascript">
$("#fileUpload").on('change', function () {

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Please select only image");
    }
});
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