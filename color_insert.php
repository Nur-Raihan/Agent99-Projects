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
$primary_color = $_POST['primary_color'];
$color_pic = $_FILES['color_pic'];
$color_code = $_POST['color_code'];

$path = "upload/color/" . time().basename($color_pic['name']);
if (move_uploaded_file($color_pic['tmp_name'], $path)) {
    $color_pic = $path;
} else {
    $color_pic = '';
}





$conn = mysqli_connect('localhost', 'root', '','gms');

$found_color_name = "SELECT * FROM color WHERE primary_color = '$primary_color'";

$result_color_name = mysqli_query($conn, $found_color_name);

$found_color_code = "SELECT * FROM color WHERE color_code = '$color_code'";

$result_color_code = mysqli_query($conn, $found_color_code);

if(mysqli_num_rows($result_color_name) > 0) {
    
     $_SESSION['message_color_name'] = "";
    echo "<script>window.history.back()</script>";
    
} elseif (mysqli_num_rows($result_color_code) > 0) {
     $_SESSION['message_color_code'] = "";
    echo "<script>window.history.back()</script>";
} else {
    
    $sql = "INSERT INTO color VALUES (NULL, '$primary_color', '$color_pic', '$color_code');";



     if(mysqli_query($conn, $sql)){
            $_SESSION['message'] = "";
            header("Location: color_form.php");
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