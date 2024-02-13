<?php
// Include your database connection file or establish the PDO connection here

// Assuming you have a PDO connection named $pdo

// Check if empcode is set and not empty
if (isset($_POST['empcode']) && !empty($_POST['empcode'])) {
    $empcode = $_POST['empcode'];

    try {
        // Prepare a SQL statement to check the availability of empcode
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM `tblvisitors` WHERE cardNo = :empcode");
        $stmt->bindParam(':empcode', $empcode, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check the count
        $availability = ($result['count'] > 0) ? "Not Available" : "Available";

        // Output the availability status
        echo $availability;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle case where empcode is not set or empty
    echo "Invalid empcode";
}
?>