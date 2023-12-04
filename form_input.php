<?php 
include "connect.php";

  if (isset($_GET['branch'])) {
  $selectedBranch = $_GET['branch'];
  }



  if (isset($_POST['save'])) {

  $invoicedate = $_POST["invoice_date"];
  $chassisno = $_POST["chassis_no"];
  $vehiclemodel = $_POST["vehicle_model"];
  $customername = $_POST["customer_name"];
  $paymenttype = $_POST["payment_type"];
  $branchesdealers = $_POST["branches_dealers"];
  $exchange = $_POST["exchange"];
  $vehiclecost = $_POST["vehicle_cost"];
  $roadsideassistance= $_POST["road_side_assistance"];
  $ipreceivable=$_POST["ip_receivable"];
  $ipreceived = $_POST["ip_received"];
  $cashoutstanding = $_POST["cash_outstanding"];
  $financereceivable=$_POST["finance_receivable"];
  $financereceiveddate = $_POST["finance_received_date"];
  $financereceived = $_POST["finance_received"];
  $totalamountreceived=$_POST["total_amount_received"];
  $folderclosingdate = $_POST["folder_closing_date"];
  $status = $_POST["status"];
  $extrafitting = $_POST["extra_fitting"];
  $basicextra=$_POST["basic_extra"];
  $extendedwarranty = $_POST["extended_warranty"];
  $cashdiscount = $_POST["cash_discount"];
  $petrol = $_POST["petrol"];
  $vehiclecover=$_POST["vehicle_cover"];
  $totalprice = $_POST["total_price"];
  $mechaniccommission = $_POST["mechanic_commission"];
  $customersideinsurance = $_POST["customer_side_insurance"];
  $discount=$_POST["discount"];

  // Check if the chassis number already exists in the 'project' table
  $checkQuery = "SELECT ID FROM `project` WHERE CHASSISNO = '$chassisno'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
      // Chassis number found in 'project' table, update the existing record
      $updateQuery = "UPDATE `project` SET
          INVOICEDATE = '$invoicedate',
          VEHICLEMODEL = '$vehiclemodel',
          CUSTOMERNAME = '$customername',
          PAYMENTTYPE = '$paymenttype',
          BRANCHESDEALERS = '$branchesdealers',
          EXCHANGE = '$exchange',
          VEHICLECOST = '$vehiclecost',
          ROADSIDEASSISTANCE = '$roadsideassistance',
          IPRECEIVABLE = '$ipreceivable',
          IPRECEIVED = '$ipreceived',
          CASH = '$cashoutstanding',
          FINANCERECEIVABLE = '$financereceivable',
          FINANCERECEIVEDDATE = '$financereceiveddate',
          FINANCERECEIVED = '$financereceived',
          TOTALAMOUNTRECIEVED = '$totalamountreceived',
          FOLDERCLOSINGDATE = '$folderclosingdate',
          STATUS = '$status',
          EXTRAFITTING = '$extrafitting',
          BASICEXTRA = '$basicextra',
          EXTENDEDWARRANTY = '$extendedwarranty',
          CASHDISCOUNT = '$cashdiscount',
          PETROL = '$petrol',
          VEHICLECOVER = '$vehiclecover',
          TOTALPRICE = '$totalprice',
          MECHANICCOMMISSION = '$mechaniccommission',
          CUSTOMERSIDEINSURANCE = '$customersideinsurance',
          DISCOUNT = '$discount'
          WHERE CHASSISNO = '$chassisno'";

      if ($conn->query($updateQuery) === TRUE) {
          header("Location: save.php");
          exit;
      } else {
          echo "Error updating record: " . $conn->error;
      }
  } else {
    $sql = "INSERT INTO `project` (INVOICEDATE, CHASSISNO, VEHICLEMODEL, CUSTOMERNAME, PAYMENTTYPE, BRANCHESDEALERS, EXCHANGE,
  VEHICLECOST,  ROADSIDEASSISTANCE, IPRECEIVABLE, IPRECEIVED, CASH,
  FINANCERECEIVABLE, FINANCERECEIVEDDATE, FINANCERECEIVED, TOTALAMOUNTRECIEVED,
  FOLDERCLOSINGDATE, STATUS, EXTRAFITTING, BASICEXTRA, EXTENDEDWARRANTY,
  CASHDISCOUNT, PETROL, VEHICLECOVER, TOTALPRICE, MECHANICCOMMISSION,
  CUSTOMERSIDEINSURANCE, DISCOUNT)
  VALUES ('$invoicedate', '$chassisno', '$vehiclemodel', '$customername', '$paymenttype', '$branchesdealers', '$exchange', '$vehiclecost',  '$roadsideassistance', '$ipreceivable', '$ipreceived', '$cashoutstanding', '$financereceivable', '$financereceiveddate', '$financereceived', '$totalamountreceived', '$folderclosingdate', '$status', '$extrafitting', '$basicextra', '$extendedwarranty', '$cashdiscount', '$petrol', '$vehiclecover', '$totalprice', '$mechaniccommission', '$customersideinsurance', '$discount')";

  if ($conn->query($sql) === TRUE) {
  header("Location: save.php");
  exit;
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
  }



    
  ?>
