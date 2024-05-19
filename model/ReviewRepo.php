<?php

require_once __DIR__ . '/../model/db_connect.php';


function createReview($rating, $comment, $blog_id)
{
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `review` (rating, comment, blog_id) VALUES (?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Check if the prepare statement was successful
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param('ssi', $rating, $comment, $blog_id);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted review
        $newReviewId = $stmt->insert_id;

        // Close the statement
        $stmt->close();

        return $newReviewId;
    } catch (Exception $e) {
        // Handle the exception, you might want to log it or return false
        echo "Error: " . $e->getMessage();
        return -1;
    } finally {
        // Close the database connection
        $conn->close();
    }
}
