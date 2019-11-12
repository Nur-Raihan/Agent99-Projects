<?php session_start(); ?>
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

<div class="jumbotron" style="background:url('assets/img/wrong.jpg') no-repeat; background-size:cover; height:500px;"></div>

<?php
$order_date = $_POST['order_date'];
$buyer_id = $_POST['buyer_id'];
$p_name = $_POST['p_name'];
$xsmall = $_POST['xsmall'];
$small = $_POST['small'];
$medium = $_POST['medium'];
$large = $_POST['large'];
$xlarge = $_POST['xlarge'];
$xxlarge = $_POST['xxlarge'];
$xxxlarge = $_POST['xxxlarge'];
$quantity = $_POST['quantity'];
$rate = $_POST['rate'];
$total = $_POST['total'];
$advance = $_POST['advance'];
$remain = $_POST['remain'];
$delivery_date = $_POST['delivery_date'];


$conn = mysqli_connect('localhost', 'root', '','gms');
$sql = "INSERT INTO export_order VALUES (NULL,'$order_date','$buyer_id', '$p_name', '$xsmall','$small','$medium','$large','$xlarge','$xxlarge','$xxxlarge','$quantity','$rate', '$total', '$advance','$remain','$delivery_date');";

if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "";
        header("Location: export_order_form.php");
} else{
    echo "<a href=\"javascript:history.go(-1)\"><h3><center>Click here to go back</center></h3></a>";
}

?>



<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

</body>
</html>