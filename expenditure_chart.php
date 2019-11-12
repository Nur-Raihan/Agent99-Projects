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
$result = mysqli_query($conn, $sql); // This result is for the whole expenditure chart

$result1 = mysqli_query($conn, $sql); // This result1 is for only the expenditure 'total' chart 


//------------------------ For chart 1 ------------------------

$chart_data = '';
while($row = mysqli_fetch_array($result))
{

$chart_data .= "{ Year:'".$row["date"]."', Gas:".$row["gas"].", Electricity:".$row["electricity"].", Water:".$row["water"].", ElecricalApplience:".$row["electrical_applience"].", Food:".$row["food"].", Medic:".$row["medic"].", Newspaper:".$row["newspaper"].", Stationary:".$row["stationary"].",Telephone:".$row["telephone"]."}, ";

}

$chart_data = substr($chart_data, 0, -2);

//------------------------ For chart 2 ------------------------

$chart_data2 = '';
while($row1 = mysqli_fetch_array($result1))
{
 $chart_data2 .= "{ Year:'".$row1["date"]."', Total:".$row1["total"]."}, ";
}
$chart_data2 = substr($chart_data2, 0, -2);



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

          <a href="expenditure_details.php" class="btn btn" style="background-color: white">Go back</a>

<!-- User piority -->      
             <?php if(isset($_SESSION['user'])){
            if($_SESSION['user'] == 1 || $_SESSION['user'] == 3){ ?>

      	 <a href="expenditure_form.php" class="btn btn" style="background-color: white">Go to form</a>
        <?php }
      } ?>
<!-- piority End -->      
           
         <a href="Panel.php" class="btn btn" style="background-color: white">Back to homepage</a> Expenditure Chart
     	  </div><br/>
                                                                                                     
<!--******************************************** Expenditure Chart 1 Start******************************************** -->

        <div class="panel panel-default"><!-- put a ash color background -->
             <div class="panel-heading">
             <i style="color: #2980B9" class="glyphicon glyphicon-stats"></i> All Expenses    
             </div>
                   
          <div class="table-responsive">
           <div id="chart"></div> <!-- id="chart" call the chart -->
           <hr>
          </div>

        </div>
        <br>
                                                                                                             
<!--****************************************** Expenditure Chart 1 End ****************************************** -->

<!--******************************************** Expenditure Chart 2 Start******************************************** -->

        <div class="panel panel-default"><!-- put a ash color background -->
             <div class="panel-heading">
             <i style="color: #2980B9" class="glyphicon glyphicon-stats"></i> Total    
             </div>
                   
           <div class="table-responsive">
             <div id="chart2"></div> <!-- id="chart" call the chart -->
             <hr>
           </div>

        </div>

                                                                                                             
<!--****************************************** Expenditure Chart 2 End ****************************************** -->
   
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

<!-- Morris Chart -->
<script src="assets/morris/js/raphael-min.js"></script>
<script src="assets/morris/js/morris.min.js"></script>


<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Year',
 ykeys:['Gas','Electricity','Water','ElecricalApplience','Food', 'Medic', 'Newspaper', 'Stationary', 'Telephone'],
 labels:['Gas','Electricity','Water','ElecricalApplience','Food', 'Medic', 'Newspaper', 'Stationary', 'Telephone'],
 hideHover:'auto',
 //stacked:true
});
</script>

<script>
Morris.Line({
 element : 'chart2',
 data:[<?php echo $chart_data2; ?>],
 xkey:'Year',
 ykeys:['Total'],
 labels:['Total'],
 hideHover:'auto',
 //stacked:true
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