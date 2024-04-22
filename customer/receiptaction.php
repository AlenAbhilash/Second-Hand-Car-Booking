<?php 
session_start();
include("headervview.php");
require_once("../dboperation.php");

if (isset($_POST['print_invoice'])) {
    // Get the vehicle ID and request ID
    $vehicle_id = $_GET['vehicle_id'];
    $request_id = $_GET['requestid'];
    
    // Fetch the payment details for the given request ID
    $obj = new dboperation();
    $paymentSql = "SELECT * FROM tbl_payment WHERE req_id = $request_id";
    $paymentRes = $obj->query($paymentSql);
    $paymentDetails = mysqli_fetch_assoc($paymentRes);

    // Load TCPDF library
    require_once('tcpdf/tcpdf.php');

    // Create a new PDF document
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator('Your Company');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Payment Receipt');
    $pdf->SetSubject('Payment Receipt');

    // Add a page
    $pdf->AddPage();

    // Set the content for the PDF
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Payment Receipt', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Payment Amount: ₹' . $paymentDetails['pay_amount'], 0, 1);
    $pdf->Cell(0, 10, 'Status: ' . $paymentDetails['pay_status'], 0, 1);
    $pdf->Cell(0, 10, 'From Account: Ac' . $paymentDetails['fromaccount'], 0, 1);
    $pdf->Cell(0, 10, 'To Account: Ac' . $paymentDetails['toaccount'], 0, 1);
    $pdf->Cell(0, 10, 'Payment Date: ' . $paymentDetails['pay_date'], 0, 1);

    // Output the PDF as a download
    $pdf->Output('payment_receipt.pdf', 'D');
    exit(); 
}
?>

<!DOCTYPE html>
<!-- Rest of your HTML code -->

<!-- Your "Print Invoice" form -->
<form action="paymentreceipt.php?requestid=<?php echo $request_id ?>&vehicle_id=<?php echo $vehicle_id ?>" method="post">
    <button class="btn btn-success" name="print_invoice"><i class="fa fa-print"></i> Print Invoice</button>
</form>

<!-- Rest of your HTML code -->
