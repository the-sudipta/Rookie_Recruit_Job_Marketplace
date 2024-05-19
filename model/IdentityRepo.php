<?php

require_once __DIR__ . '/../model/db_connect.php';

function createIdentity($file_name, $user_id) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `identity` (file_name, user_id) VALUES (?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('si', $file_name, $user_id);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted identity
        $identityId = $conn->insert_id;

        return $identityId;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error: " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


