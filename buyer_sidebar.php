
 <div class="col-sm-2 sidenav" style="background-color:#F7F9F9"> <!-- "col-sm-2 sidenav" define the size of side bar (FOR sidebar)-->      

 <!-- <div class="col-sm-2 sidenav" style="color:white ;background-color:#1c2833"--> <!-- "col-sm-2 sidenav" define the size of side bar (For sidebar)--> 

  <ul class="nav nav-pills nav-stacked"><!-- "nav nav-pills nav-stacked"  is the ul theme  -->


    <li class="active"><a href=""><i class="glyphicon glyphicon-option-vertical"></i> Category </a></li><br>

       <!--*********************************************(1. Garment Order))*********************************************-->

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_order_details.php"><i class="glyphicon glyphicon-shopping-cart"></i> Your Orders</a>
        </li>

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_invoice_details.php"><i class="glyphicon glyphicon-usd"></i> Invoices</a>
        </li>

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_export_infomation_details.php"><i class="glyphicon glyphicon-indent-left"></i> Import Informations</a>
        </li>

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_transaction_of_export_details.php"><i class="glyphicon glyphicon-export"></i> Payment Transactions</a>
        </li>

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_inspection_details.php"><i class="glyphicon glyphicon-retweet"></i> Products AQL</a>
        </li>

        <li>
        <a data-toggle="collapse" data-target="#demo" href="buyer_message.php"><i class="glyphicon glyphicon-envelope"></i> Message</a>
        </li>


        <li class="pointer">

        <a data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-cog"></i> Setting <small><small><i class="glyphicon glyphicon-chevron-down"></i></small></small></a>

        <div id="demo1" class="collapse" style="color:">

        <small><a href="buyer_profile_edit.php ?buyer_id=<?php echo $current_customer; ?>" class="list-group-item"><small><i class="glyphicon glyphicon-triangle-right"></i></small>Change profile info </a></small>
        
        <small><a href="buyer_profile_pic_edit.php ?buyer_id=<?php echo $current_customer; ?>" class="list-group-item"><small><i class="glyphicon glyphicon-triangle-right"></i></small>Change profile image </a></small>

        <small><a href="buyer_password_edit.php ?buyer_id=<?php echo $current_customer; ?>" class="list-group-item"><small><i class="glyphicon glyphicon-triangle-right"></i></small>Change password </a></small><br>

        </div>
        </li>



  </ul>
