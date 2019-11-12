<?php session_start(); ?>
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 2 || $_SESSION['user'] == 5) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $order_id = $_GET['order_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM export_order WHERE order_id =$order_id";
  $result = mysqli_query($conn, $sql);
  $std = mysqli_fetch_assoc($result);


 $sql = "SELECT * FROM garment_buyer_company";
 $result1 = mysqli_query($conn, $sql);


 $sql = "SELECT * FROM product_type";
 $result2 = mysqli_query($conn, $sql);

 /*while ($row = mysqli_fetch_assoc($result2)) {
   if($row["p_name"] === $std["p_name"]){
    echo 'found'.'<br>';
   } else {
    echo 'not found'.'<br>';
   }
 }*/

 //echo $std['p_name'];


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
        <a href="export_order_details.php" class="btn btn" style="background-color: white">Go Back</a> Edit Details
        </div>
<!-- ****************************************************************************************************************** -->

        <form class="well form-horizontal" action="export_order_update.php?order_id=<?php echo $order_id ?>" method="post"> <!-- form class well form horizontal will protect form from being collaps and make all straigt in horizontal-->
            <fieldset> <!-- Create a border along with all input -->

             <!-- Text input-->

              <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Order Date</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <input type="date" name="order_date" class="form-control" placeholder="" required value="<?php echo $std['order_date']?>"><br>
                       </div>
                     </div>
              </div><br>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">Buyer</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <select type="text" class="form-control" name="buyer_id"  placeholder="" required>
                         
                         <option value=""></option>                  
                        <?php 
                    while ($row = mysqli_fetch_assoc($result1)) { ?>
                    
                                 <option value=" <?php echo $row['buyer_id']; ?>"  
                                  <?php if((int)$row['buyer_id']==(int)$std['buyer_id']) echo "selected";?>
                                   > 
                                   <?php 
                                   echo $row['buyer_id'];
                                   echo " - ";
                                   echo $row['com_name']; 
                                   ?> 
                                 </option>

                        <?php } ?>
                                 </select>
                   </div>
                  </div>
           </div><br>


           <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">Product Name</label> <!--without control-label text will go to the left side-->
                <div class="col-md-6"> <!-- controll the input space size -->
                   <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <select type="text" class="form-control" name="p_name"  placeholder="" required>
                         
                        <option value=""></option>                      
                        <?php 
                    while ($row = mysqli_fetch_assoc($result2)) { 
                        echo $row['p_name'];
                        if( $std['p_name'] === $row['p_name'] ) {
                      ?>
                         
                         <option value="<?php echo $row['p_name']; ?>" selected>
                          <?php 
                          echo $row['id']; 
                          echo " - "; 
                          echo $row['p_name']; 
                          ?>
                         </option>

                          <?php 
                          } else { ?>
                          <option value="<?php echo $row['p_name']; ?>">
                            <?php 
                            echo $row['id'];
                            echo " - "; 
                            echo $row['p_name'];  
                            ?>
                            </option>

                      <?php }
                      } ?>
                         </select>
                   </div>
                  </div>
           </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">X Small</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="xsmall" min="0" class="form-control" placeholder="" required value="<?php echo $std['xsmall']?>"> <br>
                     </div>
                   </div>
              </div><br>


              <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Small</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                       <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" name="small" min="0" class="form-control" placeholder="" required value="<?php echo $std['small']?>"> <br>
                       </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Medium</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                         <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="medium" min="0" class="form-control" placeholder="" required value="<?php echo $std['medium']?>"> <br>
                     </div>
                    </div>
              </div><br>


             <div class="form-group"> <!-- div form-group place the div in middle -->
                 <label class="col-md-3 control-label">Large</label> <!--without control-label text will go to the left side-->
                 <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon-"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                        <input type="number" name="large" min="0" class="form-control" placeholder="" required value="<?php echo $std['large']?>"> <br>
                     </div>
                 </div>
            </div><br>

                                
             <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">X Large</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                          <input type="number" name="xlarge" min="0" class="form-control" placeholder="" required value="<?php echo $std['xlarge']?>"> <br>
                    </div>
                   </div>
              </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">2X Large</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" name="xxlarge" min="0" class="form-control" placeholder="" required value="<?php echo $std['2xlarge']?>"> <br>
                       </div>
                  </div>
             </div><br>       


             <div class="form-group"> <!-- div form-group place the div in middle -->
                <label class="col-md-3 control-label">3X Large</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                      <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                           <input type="number" name="xxxlarge" min="0" class="form-control" placeholder="" required value="<?php echo $std['3xlarge']?>"> <br>
                       </div>
                  </div>
             </div><br>         


             <div class="form-group"> <!-- div form-group place the div in middle -->
                  <label class="col-md-3 control-label">Quantity</label> <!--without control-label text will go to the left side-->
                  <div class="col-md-6"> <!-- controll the input space size -->
                    <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                          <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="quantity" min="1" class="form-control" placeholder="" required value="<?php echo $std['quantity']?>"> <br>
                    </div>
                  </div>
             </div><br>


             <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Price of Single Product</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="rate" step="any" min="0" class="form-control" placeholder="" required value="<?php echo $std['rate']?>"> <br>
                      </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Total Price</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="total" step="any" min="1" class="form-control" placeholder="" required value="<?php echo $std['total']?>"> <br>
                      </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Payment Advance</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="advance" step="any" min="0" class="form-control" placeholder="" required value="<?php echo $std['advance']?>"> <br>
                      </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Payment Remain</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="number" name="remain" step="any" min="0" class="form-control" placeholder="" required value="<?php echo $std['remain']?>"> <br>
                      </div>
                   </div>
               </div><br>


               <div class="form-group"> <!-- div form-group place the div in middle -->
                   <label class="col-md-3 control-label">Delivery Date</label> <!--without control-label text will go to the left side-->
                   <div class="col-md-6"> <!-- controll the input space size -->
                     <div class="input-group"> <!--This div input-group let the upper div stay side by side  -->
                           <span class="input-group-addon"><i class="glyphicon glyphicon"></i></span> <!-- span input-group-addon let the glypicon stay with input in same line -->
                         <input type="date" name="delivery_date" class="form-control" placeholder="" required value="<?php echo $std['delivery_date']?>"> <br>
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