<?php session_start(); ?>
<?php

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 8) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $cutting_id = $_GET['cutting_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM cutting WHERE cutting_id =$cutting_id";
  $result = mysqli_query($conn, $sql);
  $std = mysqli_fetch_assoc($result);


  $sql = "SELECT * FROM export_order";
  $result1 = mysqli_query($conn, $sql);

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
        <a href="cutting_details.php" class="btn btn" style="background-color: white">Go Back</a> Edit Details
        </div>

        <form class="well form-horizontal" action="cutting_update.php?cutting_id=<?php echo $cutting_id ?>" method="post"> <!-- form class well form horizontal will protect form from being collaps and make all straigt in horizontal-->
            <fieldset> <!-- Create a border along with all input -->

             <!-- Text input-->

               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Entry Date</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="date" name="date" class="form-control" placeholder="" required value="<?php echo $std['date']?>">
                     </div>
                   </div>
              </div><br>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">Order ID</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <select type="text" class="form-control" name="order_id"  placeholder="" required>
                         
                          <option value=""></option>                     
                        <?php 
                    while ($row = mysqli_fetch_assoc($result1)) { ?>
                    
                                 <option value=" <?php echo $row['order_id']; ?>"  
                                  <?php if((int)$row['order_id']==(int)$std['order_id']) echo "selected";?>
                                   > <?php echo $row['order_id']  ?> </option>
                        <?php } ?>
                                 </select>
                   </div>
                  </div>
           </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Target Date</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="date" name="target" class="form-control" placeholder="" required value="<?php echo $std['target']?>">
                     </div>
                   </div>
              </div><br>


              <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Cutting Complete</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" min="0" name="complete" class="form-control" placeholder="" required value="<?php echo $std['complete']?>">
                       </div>
                   </div>
               </div><br>


              <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Cutting Uncomplete</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" min="0" name="uncomplete" class="form-control" placeholder="" required value="<?php echo $std['uncomplete']?>">
                       </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Comment</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="text" name="comment" class="form-control" placeholder="" required value="<?php echo $std['comment']?>">
                     </div>
                    </div>
              </div><br>


                <!-- Button -->
              <div class="form-group">
                   <label class="col-md-3 control-label"></label> <!--without control-label text will go to the left side-->
                  <div class="col-md-4"> <!--Just place the button in right a little -->
                       <button type="submit" class="btn btn-primary" name="form_submit" >Enter Data <span class="glyphicon glyphicon"></span></button>
                   </div>
                 </div>

            </fieldset>
        </form>
    </div><!-- /.container -->

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
      'Data successfully updated',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message']); }
?>


</body>

</html>