<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllHR(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `hr` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}

function findHRByUserID($id)
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `hr` WHERE `user_id` = ?';

    try {
        $stmt = $conn->prepare($selectQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind the parameter
        $stmt->bind_param('i', $id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the HR as an associative array
        $hr = $result->fetch_assoc();

        // Close the statement
        $stmt->close();

        return $hr ?: null;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return null
        echo "Error: " . $e->getMessage();
        return null;
    } finally {
        // Close the database connection
        $conn->close();
    }
}

function updateHR($data) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `hr` SET 
                    company_name = ?,
                    user_id = ?
                    WHERE id = ?";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('sii', $data['company_name'], $data['user_id'], $data['id']);

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



function createHR($companyName, $uid) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `hr` (company_name, user_id) VALUES (?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('si', $companyName, $uid);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        return $conn->insert_id;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error: " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}


