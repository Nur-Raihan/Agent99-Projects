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


<?php

 $conn =  mysqli_connect('localhost','root','','gms');

if(isset($_POST['login_submit'])){
    $buyer_id=$_POST['buyer_id'];
    $password=$_POST['password'];

    $password = md5($password); 


  $sql = "SELECT * FROM garment_buyer_company where buyer_id='$buyer_id' and password='$password'";
  $result = mysqli_query($conn, $sql);
   
   if(mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
      
        $_SESSION['customer_id'] = $row['buyer_id'];
        $_SESSION['customer'] = $row['type'];
     

    header("location: buyer_panel.php");
   }
   else
   {
    $_SESSION['login_failed'] = "";
    echo "<script>window.history.back()</script>";
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
