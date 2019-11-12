<?php session_start();

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
        <a href="division_details.php" class="btn" style="background-color: white">Go to List</a>
        <a href="panel.php" class="btn" style="background-color: white">Panel</a>
        </div>

              
        <form class="well form-horizontal" action="division_insert.php" method="post"> <!-- form class well form horizontal will protect form from being collaps and make all straigt in horizontal-->
            <fieldset> <!-- Create a border along with all input -->

                <!-- Form Name -->
             <div class="list-group-item active" align="center">Garment Division Information</div>
            <br><br>
             <!-- Text input-->

             <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Division Name</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <input type="text" name="division_name" class="form-control" placeholder="enter division name" required>
                       </div>
                     </div>
              </div><br>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">Division Head</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="division_head" class="form-control" placeholder="enter head name" required>
                       </div>
                  </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Division location</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="division_location" class="form-control" placeholder="enter divition location" required>
                     </div>
                   </div>
              </div><br>


              <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Division Details</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <textarea class="form-control" name="division_details" placeholder="enter details" required></textarea>
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
    
    if(isset($_SESSION['message_division_name'])) {
      echo "<script>
      swal(
      'Division already exists!',
      'Click on ok',
      'warning'
      )
      </script>";     
      unset($_SESSION['message_division_name']); }
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