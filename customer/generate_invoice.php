<?php
require_once('tcpdf/tcpdf.php');
require_once("../dboperation.php");

$obj = new dboperation();
$vehicle_id = $_GET['vehicle_id'];
$request_id = $_GET['requestid'];

// Start output buffering
ob_start();

// Fetch vehicle details directly from the database using a regular query
$sql = "SELECT *
        FROM tbl_vehicle v
        INNER JOIN tbl_model m ON m.model_id = v.model_id
        INNER JOIN tbl_companyreg c ON c.comp_id = v.comp_id
        INNER JOIN tbl_fuel f ON f.fuel_id = v.fuel_id
        INNER JOIN tbl_dis d ON d.dis_id = v.dis_id
        INNER JOIN tbl_loc l ON l.loc_id = v.loc_id
        LEFT JOIN tbl_payment p ON p.vehicle_id = v.vehicle_id
        WHERE v.vehicle_id = $vehicle_id";

$result = $obj->con->query($sql);

if ($result && $result->num_rows > 0) {
    $vehicleDetails = $result->fetch_assoc();

    // Fetch payment details from the database using a regular query
    $payment_sql = "SELECT * FROM tbl_payment WHERE pay_id = " . $vehicleDetails['pay_id'];
    $payment_result = $obj->con->query($payment_sql);

    if ($payment_result && $payment_result->num_rows > 0) {
        $payment_row = $payment_result->fetch_assoc();
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

        $pdf->SetCreator('Your Creator');
        $pdf->SetAuthor('Your Author');
        $pdf->SetTitle('Payment Receipt');
        $pdf->SetSubject('Payment Receipt');

        // Function to generate the PDF here
        function generatePaymentReceipt($pdf, $paymentDetails, $vehicleDetails) {
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 12);

            // Output the payment details
            $html = '
                <center><h1><b><u>Payment Receipt</u></b></h1></center>
                <h4>Payment Amount: ' . $paymentDetails['pay_amount'] . '</h4>
                <h4>Status: ' . $paymentDetails['pay_status'] . '</h4>
                <h4>From Account: Ac' . $paymentDetails['fromaccount'] . '</h4>
                <h4>To Account: Ac' . $paymentDetails['toaccount'] . '</h4>
                <h4>Payment Date: ' . $paymentDetails['pay_date'] . '</h4>
            ';

            // Write the payment details
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output the vehicle details
            $vehicleImage = '../upload/' . $vehicleDetails['img1'];
            $pdf->Text(10, $pdf->GetY() + 10, 'Car Name: ' . $vehicleDetails['ve_name']);
            $pdf->Text(10, $pdf->GetY() + 10, 'Model: ' . $vehicleDetails['model_name']);
            $pdf->Text(10, $pdf->GetY() + 10, 'Company: ' . $vehicleDetails['comp_name']);
            $pdf->Text(10, $pdf->GetY() + 10, 'Fuel Type: ' . $vehicleDetails['fuel_name']);
            $pdf->Text(10, $pdf->GetY() + 10, 'District: ' . $vehicleDetails['dis_name']);
            $pdf->Text(10, $pdf->GetY() + 10, 'Location: ' . $vehicleDetails['loc_name']);

            // Output the vehicle image on the right side
            $pdf->Image($vehicleImage, 110, $pdf->GetY() - 20, 90, 0);
        }

        // Call the function to generate the PDF
        generatePaymentReceipt($pdf, $payment_row, $vehicleDetails);

        $pdf->Output('payment_receipt.pdf', 'D'); // 'D' to force download
    } else {
        echo "Payment details not found.";
    }
} else {
    echo "Vehicle details not found.";
}

// End output buffering and send the content to the browser
ob_end_flush();
?>
