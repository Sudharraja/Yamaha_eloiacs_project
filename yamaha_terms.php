<?php
    include "yamaha_conn.php";
?>
<?php
session_start(); // Resume the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit; // Terminate the script after redirection
}
if ($_SESSION['status'] !== 'Admin1') {
    // Display a message and redirect after 5 seconds
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">';
    echo '<p style="font-size: 18px;">You need permission to access this page. You will be redirected in 5 seconds.</p>';
    echo '</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 5000);</script>';
    exit; // Terminate the script
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <title>Document</title>
     <link rel="stylesheet" href="payslip.css">
</head>
<body>


    <div class="container">
<div class="terms">
    <div class="scroll">
        <h2 class="term_head">Terms & Conditions</h2>

    
    
<p>The terms and conditions of an MNC, or multinational corporation, are the rules and regulations that govern the company's operations. They typically cover a wide range of topics, including employment, intellectual property, and financial matters.</p>

<p>Here are some examples of terms and conditions that may be found in an MNC's contract:</p>

<p><span class="sub_head">Employment:</span> The terms and conditions of employment may include requirements for education and experience, salary and benefits, and termination procedures.</p>
<p><span class="sub_head">Intellectual property:</span> The terms and conditions of intellectual property may include ownership rights, licensing agreements, and confidentiality requirements.</p>
<p><span class="sub_head">Financial matters:</span> The terms and conditions of financial matters may include accounting practices, reporting requirements, and financial controls.</p>
<p>The terms and conditions of an MNC are an important part of the company's governance structure. They help to ensure that the company operates in a fair and transparent manner, and that its employees, customers, and partners are treated fairly.</p>

<p>Here are some additional examples of terms and conditions that may be found in an MNC's contract:</p>

<p><span class="sub_head1">Confidentiality:</span> The company may require its employees to keep confidential any information that they learn about the company's business or operations.</p>
<p><span class="sub_head1">Non-competition:</span> The company may require its employees to agree not to compete with the company for a certain period of time after they leave the company.</p>
<p><span class="sub_head1">Non-solicitation:</span> The company may require its employees to agree not to solicit the company's customers or employees for a certain period of time after they leave the company.</p>
<p>The terms and conditions of an MNC can be complex and lengthy. It is important for employees, customers, and partners to read and understand these terms before entering into any agreements with the company.</p>
</div>
</div>
</div>
</body>
</html>