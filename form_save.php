<?php
include "connect.php";

if (isset($_POST['save'])) {
    $date = $_POST["date"];
    $types = $_POST["types"];
    $otherType = $_POST["other_type"];
    $customername = $_POST["customer_name"];
    $customercode = $_POST["customer_code"];
    $phonenumber = $_POST["phone_number"];
    $receipt = $_POST["receipt"];
    $vehiclename = $_POST["vehicle_name"];
    $exchange = $_POST["exchange"];
    $service = $_POST["service"];
    $mode = $_POST["mode"];
    // $exchangeOption = isset($_POST['exchangeOption']) ? $_POST['exchangeOption'] : '';
    $reference = $_POST["reference"];
    $credit = floatval($_POST["credit"]); // Convert credit to a float
    $debit = floatval($_POST["debit"]);   // Convert debit to a float
    $particular = $_POST["particular"];
    $voucher = $_POST["voucher"];
   
    $directExchange = $exchange === 'Exchange' ? 'EXCHANGE' : 'DIRECT'; // Set the value of DIRECT/EXCHANGE
   

    
    // Check if the selected type is "Others"
    if ($types === "Others" && !empty($otherType)) {    
        // Sanitize the "Other Type" input
        $otherType = mysqli_real_escape_string($conn, $otherType);
    } else {
        // If the selected type is not "Others," use the selected type as the value for TYPES
        $otherType = $types;
    }

    // Initialize variables to store credit amounts for different modes
    $hdfccaCredit = 0;
    $hdrccCredit = 0;
    $invCredit = 0;
    $hdfcCredit = 0;
    $idfcCredit = 0;
    $ibcCredit = 0;

    // Check the selected mode and set credit amounts accordingly
    if ($mode === 'Neft') {
        $neftOption = isset($_POST['neftOption']) ? $_POST['neftOption'] : ''; // Get the selected Neft option

        // Check the reference (selected Neft option)
        if ($neftOption === 'HDFCCA') {
            $hdfccaCredit = $credit;
        } elseif ($neftOption === 'HDRCC') {
            $hdrccCredit = $credit;
        } elseif ($neftOption === 'INV') {
            $invCredit = $credit;
        }

        // Set the creditAmount and debitAmount to 0 when Neft is selected
        $credit = 0.00;
        $debit = 0.00;
    } elseif ($mode === 'G Pay' || $mode === 'DD / Check') {
        $gpayOption = isset($_POST['gpayOption']) ? $_POST['gpayOption'] : ''; // Get the selected G Pay option

        // Check the reference (selected G Pay option)
        if ($gpayOption === 'HDFCCA') {
            $hdfccaCredit = $credit;
        } elseif ($gpayOption === 'HDRCC') {
            $hdrccCredit = $credit;
        } elseif ($gpayOption === 'INV') {
            $invCredit = $credit;
        }

        // Set the creditAmount and debitAmount to 0 when G Pay or DD / Check is selected
        $credit = 0.00;
        $debit = 0.00;
    } elseif ($mode === 'Finance') {
        $financeOption = isset($_POST['financeOption']) ? $_POST['financeOption'] : ''; // Get the selected Finance option

        // Check the reference (selected Finance option)
        if ($financeOption === 'HDFC') {
            $hdfcCredit = $credit;
        } elseif ($financeOption === 'IDFC') {
            $idfcCredit = $credit;
        } elseif ($financeOption === 'IBC') {
            $ibcCredit = $credit;
        }

        // Set the creditAmount and debitAmount to 0 when Finance is selected
        $credit = 0.00;
        $debit = 0.00;
    }

    $sql = "SELECT CLOSINGBALANCE FROM daybook ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastclosingBalance = $row["CLOSINGBALANCE"];
    } else {
        $lastclosingBalance = 0;
    }

    // Ensure the user has entered valid numeric values for credit and debit
    if (!is_numeric($credit) || !is_numeric($debit)) {
        echo "Credit and Debit values must be numeric.";
    } else {
        // Calculate the new closing balance
        $closingBalance = $lastclosingBalance + $credit - $debit;

        // Check if the debit amount is higher than the closing balance
        if ($debit > $lastclosingBalance) {
            echo '<script>alert("Debit amount cannot be higher than the available balance.");</script>';
        } else {
            // Insert a new record with the appropriate credit and debit amounts
            $insertRecordQuery = "INSERT INTO `daybook` (DATE, TYPES, CUSTOMERNAME, CUSTOMERCODE, PHONENUMBER, RECEIPT, VEHICLENAME, SERVICE, MODE, REFERENCE, CREDIT, DEBIT, CLOSINGBALANCE, FINANCEOPTION, NEFTOPTION, HDFCCA, HDRCC, INV, HDFC, IDFC, IBC, PARTICULAR, VOUCHER, `DIRECT/EX`)
                VALUES ('$date', '$otherType', '$customername', '$customercode', '$phonenumber', '$receipt', '$vehiclename', '$service', '$mode', '$reference', '$credit', '$debit', '$closingBalance', '$financeOption', '$neftOption', '$hdfccaCredit', '$hdrccCredit', '$invCredit', '$hdfcCredit', '$idfcCredit', '$ibcCredit','$particular', '$voucher', '$directExchange')";

            if ($conn->query($insertRecordQuery) === TRUE) {
                echo '<script>alert("Record inserted successfully.");</script>';
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
    }

    header("Location: daybook_save.php");
}

$conn->close();
?>
