<?php
// Include the TCPDF library
require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';

require_once 'database.php';

$id = $_GET['id'] ?? null;

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where user_id = :application_id');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

// Data to be included in the PDF
$name = $row[0]["fullname"];
$studentId = $row[0]["student_id"];
$level = $row[0]["level"];
if ($row[0]["schedule"] == "AM") {
    $schedule = "8AM-12NN";
} else {
    $schedule = "1PM-5PM";
}
$dateEnrolled = date('M d, Y', strtotime($row[0]['date_enrolled']));

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
$pdf->SetFont('helvetica', '', 12);

// Add your logo to the top right corner
$pdf->Image($logoPath, 250, 10, 30, 30);

// Add content to the PDF
$content = "
    <h1><b><u>AEMPS</u></b></h1>
    <h3>Student Information</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Student ID:</strong> $studentId</p>
    <p><strong>Level:</strong> $level</p>
    <p><strong>Schedule:</strong> $schedule</p>
    <p><strong>Date Enrolled:</strong> $dateEnrolled</p>
";

$pdf->writeHTML($content, true, false, true, false, '');

// Output the PDF as a file (you can also use 'I' to output it directly to the browser)
$pdf->Output('student_information.pdf', 'D');
