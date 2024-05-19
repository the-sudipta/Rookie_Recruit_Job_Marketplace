<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllPayments()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `payment`';

    try {
        $result = $conn->query($selectQuery);

        // Check if the query was successful
        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        $rows = array();

        // Fetch rows one by one
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // Free the result set
        $result->free();

        // Check for an empty result set
        if (empty($rows)) {
            throw new Exception("No rows found in the 'payment' table.");
        }

        return $rows;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function findPaymentByPaymentID($id) {
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `payment` WHERE `id` = ?';

    try {
        // Prepare the statement
        $stmt = $conn->prepare($selectQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('i', $id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the payment as an associative array
        $payment = $result->fetch_assoc();

        // Close the statement
        $stmt->close();

        return $payment ?: null;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return null
        echo "Error: " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function updatePayment($amount, $id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE payment SET 
                    amount = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('si', $amount, $id);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


function deletePayment($id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `payment` SET 
                    status = :status
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);
        $data['status'] = "De-Activated";
        $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (PDOException $e) {
        // Handle the exception, you might want to log it or return false
        echo $e->getMessage();
        return false;
    }
}


function createPayment($amount, $user_id) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `payment` (amount, user_id) VALUES (?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('si', $amount, $user_id);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted payment
        $newPaymentId = $stmt->insert_id;

        // Close the statement
        $stmt->close();

        return $newPaymentId;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error: " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}




