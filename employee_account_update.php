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
$acc_id = $_GET['acc_id'];
$eminfo_id = $_POST['eminfo_id'];
$basic_salary = $_POST['basic_salary'];
$conveyance_allowance = $_POST['conveyance_allowance'];
$medical_allowance = $_POST['medical_allowance'];
$house_allowance = $_POST['house_allowance'];
$end_year_bonus = $_POST['end_year_bonus'];
$total = $_POST['total'];


$conn = mysqli_connect('localhost', 'root', '','gms');
$sql = "UPDATE employee_account SET eminfo_id='$eminfo_id', basic_salary='$basic_salary', conveyance_allowance='$conveyance_allowance', medical_allowance='$medical_allowance', house_allowance='$house_allowance', end_year_bonus='$end_year_bonus', total='$total' WHERE acc_id = $acc_id";

if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "";
        header("Location: employee_account_edit.php?acc_id=" . $acc_id);
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




