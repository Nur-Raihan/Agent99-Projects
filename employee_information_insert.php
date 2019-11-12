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
$emp_pic = $_FILES['emp_pic'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$division_id = $_POST['division_id'];
$designation= $_POST['designation'];
$join_date = $_POST['join_date'];
$birth_date = $_POST['birth_date'];
$gender = $_POST['gender'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = md5($password); 


$path = "upload/employee/" . time().basename($emp_pic['name']);
if (move_uploaded_file($emp_pic['tmp_name'], $path)) {
    $emp_pic = $path;
} else {
    $emp_pic = '';
}


$conn = mysqli_connect('localhost', 'root', '','gms');

$found_nid = "SELECT * FROM employee_information WHERE nid = '$nid'";

$result_nid = mysqli_query($conn, $found_nid);

$found_phone = "SELECT * FROM employee_information WHERE phone = '$phone'";

$result_phone = mysqli_query($conn, $found_phone);

$found_email = "SELECT * FROM employee_information WHERE email = '$email'";

$result_email = mysqli_query($conn, $found_email);


if(mysqli_num_rows($result_nid) > 0) {
    
     $_SESSION['message_nid'] = "";
    echo "<script>window.history.back()</script>";
    
} elseif(mysqli_num_rows($result_phone) > 0) {
    
     $_SESSION['message_contact'] = "";
    echo "<script>window.history.back()</script>";
    
} elseif (mysqli_num_rows($result_email) > 0) {
     $_SESSION['message_email'] = "";
    echo "<script>window.history.back()</script>";
} else {


$conn = mysqli_connect('localhost', 'root', '','gms');
$sql = "INSERT INTO employee_information VALUES (NULL, '$emp_pic', '$fname', '$lname', '$division_id', '$designation', '$join_date', '$birth_date', '$gender', '$nid', '$address', '$phone', '$email', '$password');";




 if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "";
        header("Location: employee_information_form.php");
} else{
    echo "<a href=\"javascript:history.go(-1)\"><h3><center>Click here to go back</center></h3></a>";
}
}

?>





<script src="assets/bootstrap/js/jquery-3.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/npm.js"></script>
<script src="assets/bootstrap/js/sweetalert2.all.min.js"></script>

</body>
</html>