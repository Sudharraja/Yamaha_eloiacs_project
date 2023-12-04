<?php
include "connect.php";


// Function to generate Material Code
function generateMaterialCode($conn)
{
    // Get the maximum Material Code from the existing data
    $query = "SELECT MAX(CAST(SUBSTR(`Material Code`, 4) AS UNSIGNED)) AS max_code FROM product";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $maxCode = $row['max_code'];
 
        if ($maxCode !== null) {
            // Increment the numeric part
            $nextNumericPart = $maxCode + 1;
        } else {
            // If no existing Material Code, start from 1
            $nextNumericPart = 1;
        }
    } else {
        // Handle database query error if needed
        // For now, just start from 1 if there's an error
        $nextNumericPart = 1;
    }

    // Create the new Material Code
    $materialCode = "MAT" . str_pad($nextNumericPart, 3, '0', STR_PAD_LEFT);

    return $materialCode;
}
?>