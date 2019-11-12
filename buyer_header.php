
<!--************************************************* Navigation bar************************************************* -->
<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_customer = $_SESSION['customer_id'];   
  }


  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql5 = "SELECT * FROM garment_buyer_company WHERE buyer_id =$current_customer";

  $result5 = mysqli_query($conn, $sql5);
  $std5 = mysqli_fetch_assoc($result5);


 ?>

<nav class="navbar navbar-fixed-top" style="background-color:#f2f3f4">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><small><i class="glyphicon glyphicon-unchecked"></i></small> GMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="buyer_panel.php">Panel</a></li>

      <li><a href=""> <?php echo $std5['com_name']; ?></a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
          <li><a href="buyer_profile.php"><img src="<?php echo $std5['buyer_pic']?>" style="border-radius: 50px; width:20px; height:20px"> <?php echo $std5['com_agent']; ?></a></li>

          <li><a href="buyer_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>  
  </div>
</nav>
<br>

<!--************************************************ End ************************************************ -->