<?php
header('Content-Type: application/json'); // Ensure the content type is set to JSON

error_reporting(E_ALL);
ini_set('display_errors', '0'); // Turn off error displaying
ini_set('log_errors', '1'); // Turn on error logging
ini_set('error_log', '/path/to/your/error_log.log'); // Set the path to your error log file

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

$response = ['success' => false, 'message' => ''];

if (isset($_GET['id'])) {
    $scheduleId = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM class_schedules WHERE id = ?");
    $stmt->bind_param("i", $scheduleId);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Schedule deleted successfully';
    } else {
        $response['message'] = 'Error deleting schedule: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Schedule ID not specified';
}

$conn->close();
echo json_encode($response);
?>
