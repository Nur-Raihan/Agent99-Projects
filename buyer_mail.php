
<?php session_start();


  if (!isset($_SESSION['customer_id'])) {
    header("Location: buyer_login.php");
  }
  else{
    $current_cuntomer = $_SESSION['customer_id'];   
  }  

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT * FROM garment_buyer_company WHERE buyer_id =$current_cuntomer";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

?>


<?php
 require 'send_mail.php';
$buyer_name    =   $row['com_agent'];
$buyer_company =   $row['com_name'];
$buyer_id      =   $row['buyer_id'];
$email         =   $row['email'];
$phone         =   $row['phone'];
$state         =   $row['state'];
$country       =   $row['country'];
$heading       =   $_POST['heading'];
$message       =   $_POST['message'];
$subject       =   "Buyer Query";

$mailBody = "<div>
                  <p> Buyer Name   :   $com_agent  </p>
                  <p> Company Name :   $com_name   </p>
                  <p> Buyer ID     :   $buyer_id   </p>
                  <p> Buyer Email  :   $email      </p>
                  <p> Contact      :   $phone      </p>
                  <p> State        :   $state      </p>
                  <p> Country      :   $country    </p>
                  <big><b><p> Subject :</big></b>$heading</p>
                  <big><b><p> Message :</big></b>$message</p>
             </div>";


        $mail->addAddress("gmswhiteunicorn@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $mailBody;

        if ($mail->send()) {
             $_SESSION['send_success'] = "";
             header("Location: buyer_message.php");
        }
        else {
             $_SESSION['send_fail'] = "";
             header("Location: buyer_message.php");
        }


