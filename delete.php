<?php
include_once 'database.php'; // Include the database connection file

if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];

    // Update the "Deleted" value for the company in the CompanyPublic table
    $updateQuery = "UPDATE CompanyPublic SET Deleted = 1 WHERE CompanyPublic_id = $company_id";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Company deleted successfully.";
    } else {
        echo "Error deleting company: " . mysqli_error($conn);
    }
} else {
    echo "Invalid company public ID";
}

mysqli_close($conn); // Close the database connection
?>
