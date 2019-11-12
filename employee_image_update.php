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

$eminfo_id = $_GET['eminfo_id'];
$emp_pic = $_FILES['emp_pic'];

if($emp_pic['name'] != '' && $emp_pic['size'] != 0) {
    $path = "upload/employee/" . time().basename($emp_pic['name']);
    if (move_uploaded_file($emp_pic['tmp_name'], $path)) {
        $emp_pic = $path;
        unlink($_POST['old_image']);
    } else {
        $emp_pic = '';
    }
} else {
    $emp_pic = $_POST['old_image'];
}


$conn = mysqli_connect('localhost', 'root', '','gms');
$sql = "UPDATE employee_information SET emp_pic='$emp_pic' WHERE eminfo_id = $eminfo_id";

if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "";
	    header("Location: employee_information_single_view.php?eminfo_id=" . $eminfo_id);
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




