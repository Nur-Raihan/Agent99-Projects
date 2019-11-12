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

$exp_id = $_GET['exp_id'];
$date = $_POST['date'];
$gas = $_POST['gas'];
$electricity = $_POST['electricity'];
$water = $_POST['water'];
$electrical_applience = $_POST['electrical_applience'];
$food = $_POST['food'];
$medic= $_POST['medic'];
$newspaper = $_POST['newspaper'];
$stationary = $_POST['stationary'];
$telephone = $_POST['telephone'];
$total = $_POST['total'];


$conn = mysqli_connect('localhost', 'root', '','gms');
$sql = "UPDATE expenditure SET date='$date', gas='$gas', electricity='$electricity', water='$water', electrical_applience='$electrical_applience', food='$food', medic='$medic', newspaper='$newspaper', stationary='$stationary', telephone='$telephone', total='$total' WHERE exp_id = $exp_id";

if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "";
        header("Location: expenditure_edit.php?exp_id=" . $exp_id);
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




