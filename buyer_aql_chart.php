
<?php

  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


$connect = mysqli_connect('localhost','root','','gms');
$query = "SELECT inspection.inspection_id, inspection.date, inspection.order_id, inspection.aql, export_order.quantity,export_order.buyer_id, export_order.p_name, merchandiser_analysis.sample_picture, merchandiser_analysis.fabric_type FROM inspection INNER JOIN export_order on inspection.order_id = export_order.order_id INNER JOIN merchandiser_analysis on export_order.order_id = merchandiser_analysis.order_id WHERE export_order.buyer_id =$current_customer order by export_order.order_id desc";

$result1 = mysqli_query($connect, $query);  // This is for the AQL chart

//------------------------ For chart 1 ------------------------

$chart_data = '';
while($row = mysqli_fetch_array($result1))
{
 $chart_data .= "{ Year:'".$row["date"]."', Orderid:".$row["order_id"].", AQL:".$row["aql"].", Quantity:".$row["quantity"]." }, ";
}
$chart_data = substr($chart_data, 0, -2);

//------------------------ For chart 2 ------------------------

?>