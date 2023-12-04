
<?php

include "connect.php";

if (isset($_POST['update'])) {
    $customerCode = $_POST["customer_code"];
    $invoicedate = $_POST["invoice_date"];
    $chassisno = $_POST["chassis_no"];
    $vehiclemodel = $_POST["vehicle_model"];
    $customername = $_POST["customer_name"];
    $paymenttype = $_POST["payment_type"];
    $branchesdealers = $_POST["branches_dealers"];
    $filereceiveddate = $_POST["file_received_date"];
    $form20date = $_POST["form20_date"];
    $Form20Received = $_POST["Form20_Received"];
    $accountsconfirmation = $_POST["accounts_confirmation"];
    $registrationdate = $_POST["registration_date"];
    $registrationnumber = $_POST["registration_number"];
    $rc = $_POST["rc"];
    $rcrec = $_POST["rcrec"];
    $remarks = $_POST["remarks"];

    $sql = "UPDATE `project` 
            SET 
            INVOICEDATE='$invoicedate', 
                CHASSISNO='$chassisno', 
                VEHICLEMODEL='$vehiclemodel', 
                CUSTOMERNAME='$customername', 
                PAYMENTTYPE='$paymenttype', 
                BRANCHESDEALERS='$branchesdealers', 
                FILERECEIVEDDATE='$filereceiveddate', 
                FORM20DATE='$form20date', 
                FORM20RECEIVEDDATE='$Form20Received', 
                ACCOUNTSCONFIRMATION='$accountsconfirmation', 
                REGISTRATIONDATE='$registrationdate', 
                REGISTRATIONNUMBER='$registrationnumber', 
                RCSTATUS='$rc', 
                RCRECDATE='$rcrec', 
                REMARKS='$remarks'
            WHERE CUSTOMERCODE='$customerCode' AND CUSTOMERNAME='$customername'";

    if ($conn->query($sql) === TRUE) {
        header("Location: rtosave.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>