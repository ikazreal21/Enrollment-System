<?php
// Include the TCPDF library
require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';

require_once 'database.php';

$id = $_GET['id'] ?? null;

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where user_id = :application_id');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT * FROM tbl_approvedstudent where user_id = :application_id');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row1 = $statement->fetchAll(PDO::FETCH_ASSOC);

// Data to be included in the PDF
$name = $row[0]["fullname"];
$studentId = $row[0]["student_id"];
$level = $row[0]["level"];
if ($level == "N4") {
    $date_terms = '6 Months';
} else {
    $date_terms = '3 Months';
}
if ($row[0]["schedule"] == "AM") {
    $schedule = "8AM-12NN";
} else {
    $schedule = "1PM-5PM";
}
$dateEnrolled = date('M d, Y', strtotime($row[0]['date_enrolled']));

if ($row1[0]["competency"] == "true") {
    $status = "Competent";
} elseif ($row1[0]["competency"] == "false"){
    $status = "Not Competent";
}

// Path to your logo image file
$logoPath = 'assets/img/logo.png';

// Create a new PDF document with landscape orientation
$pdf = new TCPDF('L');

// Set document information
$pdf->SetCreator('AEMPS');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Student Information PDF');
$pdf->SetSubject('Student Information');
$pdf->SetKeywords('PDF, Student, Information');

// Add a page to the PDF
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 14);

// Add your logo to the top right corner
$pdf->Image($logoPath, 250, 20, 30, 30);

// Add content to the PDF
$content = "
    <center><h1><b>AEMPS</b></h1></center>
    <h3><u>Student Information</u></h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Student ID:</strong> $studentId</p>
    <hr>
    <p><strong>Level:</strong> $level</p>
    <p><strong>Program Duration:</strong> $date_terms</p>
    <p><strong>Schedule:</strong> $schedule</p>
    <p><strong>Date Enrolled:</strong> $dateEnrolled</p>
    <hr>
    <h3><u>Remarks:</u></h3>
    <p><strong>Level:</strong> $level</p>
    <p><strong>Program Duration:</strong> $date_terms </p>
    <p><strong>Competency:</strong> $status</p>
";

$pdf->writeHTML($content, true, false, true, false, '');

// Output the PDF as a file (you can also use 'I' to output it directly to the browser)
$pdf->Output('student_information.pdf', 'I');

?>