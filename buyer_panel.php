
<?php
//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['customer'])) {

  if($_SESSION['customer'] == 100) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: buyer_panel.php");
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

    <!-- Morris Chart -->
    <link rel="stylesheet" href="assets/morris/css/morris.css">

    <title>GMS</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Main Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color: #FDFEFE">
<!--<body style="background-color: #2c3e50"> -->

<!--******************************************** Navigation bar ******************************************** -->
<?php
include "buyer_header.php";
?>
<!--****************************************** Navigation bar End ****************************************** -->
<br><br>
<div><!-- Everything is inside this div -->
 <div class="container-fluid"> <!-- This div class="container-fluid" Grab the whole body into a form  -->
   <div class="row content"> <!-- "row" this class has extra margin-top pixel which make an extra empty space on above -->

<!--******************************************** Side bar Start ******************************************** -->
<?php
include "buyer_sidebar.php";
?>
<!--********************************************* Side Bar End ********************************************* -->

   </div>

<!--************************************************* Main Form Start ************************************************* -->
    <div class="col-sm-10"><!-- Form Size (For Dashboard, Details, Form etc)-->

      <div class="row">

    <div class="col-lg-12 col-sm-12">
      <div class="primary">
        <h4 class="well">Dashboard</h4>
      </div>
    </div>


<!--********************************************** Panel Options Start ********************************************** -->

<?php
include "buyer_panel_option.php";
?>

<!--*********************************************** Panel Options End *********************************************** -->
           

      </div>

<!--******************************************** AQL Chart Start ******************************************** -->

<?php

  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


$connect = mysqli_connect('localhost','root','','gms');
$query = "SELECT inspection.inspection_id, inspection.date, inspection.order_id, inspection.aql, export_order.quantity,export_order.buyer_id, export_order.p_name, merchandiser_analysis.sample_picture FROM inspection INNER JOIN export_order on inspection.order_id = export_order.order_id INNER JOIN merchandiser_analysis on export_order.order_id = merchandiser_analysis.order_id WHERE export_order.buyer_id =$current_customer order by export_order.order_id desc";

$result1 = mysqli_query($connect, $query);  // This is for the AQL chart

//------------------------ Main Chart Element Start------------------------

$chart_data = '';
while($row = mysqli_fetch_array($result1))
{
 $chart_data .= "{Orderid:".$row["order_id"].", AQL:".$row["aql"].", Quantity:".$row["quantity"]." }, ";
}
$chart_data = substr($chart_data, 0, -2);

//------------------------ Main Chart Element End ------------------------

?>

<!--*********************** Showing AQL Chart Here Now *********************** -->

     <br> 
     <div class="table-responsive">
      <div class="col-sm-13">
        <div class="panel panel-default" ><!-- put a ash color background -->
           
             <div class="panel-heading">
             <i style="color: #2980B9" class="glyphicon glyphicon-stats"></i> AQL Rate    
            
             </div>               
          <div id="chart"></div> <!-- id="chart" call the chart -->
        </div>
      </div>
     </div>

<!--*********************** Showing AQL Chart End *********************** -->
                                                                                                             
<!--********************************************* AQL Chart  End ********************************************* -->
                                                                                                              
    </div>
    <!--*************************************************** Form End ***************************************************-->
 </div>
</div>


<!--******************************************** Footer ******************************************** -->
<?php
include "footer_buyer.php";
?>
<!--****************************************** Footer End ****************************************** -->


<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

<!-- Morris Chart -->
<script src="assets/morris/js/raphael-min.js"></script>
<script src="assets/morris/js/morris.min.js"></script>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Orderid',
 ykeys:['AQL'],
 labels:['AQL'],
 hideHover:'auto',
 stacked:true
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


<?php
    
    if(isset($_SESSION['message3'])) {
      echo "<script>
      swal(
      'Password successfully updated',
      'Click on ok',
      'success'
      )
      </script>";     
      unset($_SESSION['message3']); }
?>


</body>

</html>
