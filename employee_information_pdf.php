
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

  $eminfo_id = $_GET['eminfo_id'];

  $conn = mysqli_connect('localhost', 'root', '', 'gms');

  $sql = "SELECT employee_information.eminfo_id, employee_information.emp_pic, employee_information.fname, employee_information.lname, employee_information.division_id, division.division_name, employee_information.designation, employee_information.join_date, employee_information.birth_date, employee_information.gender, employee_information.nid, employee_information.address, employee_information.phone, employee_information.email, employee_information.password FROM employee_information INNER JOIN division on employee_information.division_id = division.division_id WHERE eminfo_id =$eminfo_id";

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
$pdf->Cell(120);//empty cell
$pdf->Cell(59	,5,'Employee Report',0,1);

//Set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(120);//empty cell
$pdf->Cell(25	,5,'Employee ID',0,0);
$pdf->Cell(34	,5,$std['eminfo_id'],0,1,'R');

$pdf->Cell(120);//empty cell
$pdf->Cell(25	,5,'Contact Number',0,0);
$pdf->Cell(34	,5,$std['phone'],0,1,'R');

//Make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,25,'',0,1);//empty line

//----------------------------- End of Header Part -----------------------------



//----------------------------- Start of Middle Part -----------------------------

//Numbers are right-aligned so we give 'R' after new line parameter
$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'First Name',0,0);
$pdf->Cell(65	,5,$std['fname'], 0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50 ,5,'Last Name',0,0);
$pdf->Cell(65 ,5,$std['lname'], 0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50 ,5,'Join Date',0,0);
$pdf->Cell(65 ,5,$std['join_date'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'Division ID',0,0);
$pdf->Cell(65	,5,$std['division_id'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50 ,5,'Division Name',0,0);
$pdf->Cell(65 ,5,$std['division_name'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'Designation',0,0);
$pdf->Cell(65	,5,$std['designation'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'Birth Date',0,0);
$pdf->Cell(65	,5,$std['birth_date'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'Gender',0,0);
$pdf->Cell(65	,5,$std['gender'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'NID',0,0);
$pdf->Cell(65	,5,$std['nid'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50	,5,'Address',0,0);
$pdf->Cell(65	,5,$std['address'],0,1,'R');
$pdf->Cell(189  ,4,'',0,1);//empty line

$pdf->Cell(36);//empty cell
$pdf->Cell(50  ,5,'Email',0,0);
$pdf->Cell(65 ,5,$std['email'],0,1,'R');
$pdf->Cell(189  ,15,'',0,1);//empty line


//----------------------------- End of Middile Part -----------------------------



//----------------------------- Start of Footer -----------------------------

//Set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(59 ,5,'GMS',0,1);

//Set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(59 ,5,'[Bangladesh]',0,1);

$pdf->Cell(59 ,5,'[Chittagong, Bangladesh, 4217]',0,1);

$pdf->Cell(59 ,5,'[Phone [012-345-678]',0,1);

//Make a dummy empty cell as a vertical spacer
$pdf->Cell(189  ,5,'',0,1);//empty line

//----------------------------- End of Footer -----------------------------



$pdf->Output();
?>
