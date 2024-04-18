<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $feedback_id = $_POST['id'];

        // Include your database connection file
        include("db_conn.php");

        // Sanitize the input to prevent SQL injection
        $feedback_id = mysqli_real_escape_string($conn, $feedback_id);

        // Query to delete feedback by ID
        $delete_query = "DELETE FROM feedback WHERE id = '$feedback_id'";

        if (mysqli_query($conn, $delete_query)) {
            // Feedback deleted successfully
            echo "Feedback with ID $feedback_id deleted successfully.";

            // Add JavaScript code to reload the page after a short delay
            
        } else {
            // Error deleting feedback
            echo "Error deleting feedback: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>
<script>
           setTimeout(function(){ location.reload(); }, 1000);</script>