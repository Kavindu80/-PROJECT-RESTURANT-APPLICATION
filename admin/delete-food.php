<?php

$id = $_GET['id'];
// Connect to the database.
$db = mysqli_connect('localhost', 'root', '', 'food');

// Create a SQL DELETE statement.
$sql = "DELETE FROM food_items WHERE id = $id";

// Prepare the SQL statement.
$stmt = mysqli_prepare($db, $sql);


// Execute the SQL statement.
mysqli_stmt_execute($stmt);

// Check the return value of the statement to determine if it was successful.
if (mysqli_stmt_affected_rows($stmt) > 0) {
    // The statement was successful.
    echo 'The row was deleted successfully. <a href="admin.php">Back</a>';
} else {
    // The statement failed.
    echo 'There was an error deleting the row.';
}

// Close the database connection.
mysqli_close($db);

?>