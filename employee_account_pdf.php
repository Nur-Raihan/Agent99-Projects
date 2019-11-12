
<?php

//User piority (Cancelling enter page for other)------------------------

if(isset($_SESSION['user'])) {

  if($_SESSION['user'] == 1 || $_SESSION['user'] == 4) {
    //header("Location: ");
    echo null;
  } else {
    header("Location: panel.php");
  }
}
//------------------------------------

  $acc_id = $_GET['acc_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT employee_account.acc_id, employee_account.eminfo_id, employee_account.basic_salary, employee_account.conveyance_allowance, employee_account.medical_allowance, employee_account.house_allowance,employee_account.end_year_bonus, employee_account.total, employee_information.emp_pic, employee_information.fname, employee_information.lname, employee_information.division_id, employee_information.designation,employee_information.phone,employee_information.email, division.division_name FROM employee_account INNER JOIN employee_information on employee_account.eminfo_id = employee_information.eminfo_id INNER JOIN division on employee_information.division_id = division.division_id WHERE acc_id =$acc_id";

  $result = mysqli_query($conn, $sql);

  $std = mysqli_fetch_assoc($result);

?>

<?php
require('fpdf/fpdf.php');

//A4 width : 219mm
//Default margin : 10mm each side
//Writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();


//----------------------------- Start of Header Part -----------------------------

$pdf->Image($std['emp_pic'],10,6,30);

//Set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(100);//empty cell
$pdf->Cell(59,5,'Account Report',0,1);

//Set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(100);//empty cell
$pdf->Cell(50,5,'Employee ID',0,0);
$pdf->Cell(34,5,$std['eminfo_id'],0,1,'R');

$pdf->Cell(100);//empty cell
$pdf->Cell(50,5,'Contact Number',0,0);
$pdf->Cell(34,5,$std['phone'],0,1,'R');

$pdf->Cell(100);//empty cell
$pdf->Cell(50,5,'Email Address',0,0);
$pdf->Cell(34,5,$std['email'],0,1,'R');

//Make a dummy empty cell as a vertical spacer
$pdf->Cell(189,25,'',0,1);//empty line

//----------------------------- End of Header Part -----------------------------



//----------------------------- Start of Middle Part -----------------------------

//Numbers are right-aligned so we give 'R' after new line parameter
$pdf->Cell(36);//empty cell
$pdf->Cell(50,5,'First Name',0,0);
$pdf->Cell(65,5,$std['fname'], 0,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,5,'Last Name',0,0);
$pdf->Cell(65,5,$std['lname'], 0,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,5,'Division ID',0,0);
$pdf->Cell(65,5,$std['division_id'],0,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,5,'Division Name',0,0);
$pdf->Cell(65,5,$std['division_name'],0,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,5,'Designation',0,0);
$pdf->Cell(65,5,$std['designation'],0,1,'R');
$pdf->Cell(189,15,'',0,1);//empty line


$pdf->Cell(36);//empty cell
$pdf->Cell(50,10,'Basic Salary',1,0);
$pdf->Cell(65,10,$std['basic_salary'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,10,'Conveyance Allowance',1,0);
$pdf->Cell(65,10,$std['conveyance_allowance'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,10,'Medical Allowance',1,0);
$pdf->Cell(65,10,$std['medical_allowance'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,10,'House Allowance',1,0);
$pdf->Cell(65,10,$std['house_allowance'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50,10,'End Year Bonus',1,0);
$pdf->Cell(65,10,$std['end_year_bonus'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line

$pdf->Cell(66);//empty cell
$pdf->Cell(20,10,'Total',1,0);
$pdf->Cell(65,10,$std['total'],1,1,'R');
$pdf->Cell(189,4,'',0,1);//empty line


//----------------------------- End of Middile Part -----------------------------



//----------------------------- Start of Footer -----------------------------

//Set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(59,5,'GMS',0,1);

//Set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(59,5,'[Bangladesh]',0,1);

$pdf->Cell(59,5,'[Chittagong, Bangladesh, 4217]',0,1);

$pdf->Cell(59,5,'[Phone [012-345-678]',0,1);

//Make a dummy empty cell as a vertical spacer
$pdf->Cell(189,5,'',0,1);//empty line

//----------------------------- End of Footer -----------------------------



$pdf->Output();
?>
