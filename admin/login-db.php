<?php

// Connect to the database.
$db = new PDO('mysql:host=localhost;dbname=food', 'root', '');

// Get the username and password from the input fields.
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the SQL statement to check the user's login credentials.
$sql = 'SELECT * FROM users WHERE username = :username AND password = :password';

// Bind the username and password to the prepared statement.
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Execute the prepared statement.
$stmt->execute();

// Get the results of the prepared statement.
$results = $stmt->fetchAll();

// Check if the user's login credentials are valid.
if (count($results) === 1) {
  // The user's login credentials are valid.
  // Start a new session.
  session_start();

  // Set the session variable to store the user's login status.
  $_SESSION['isLoggedIn'] = true;

  // Redirect the user to the admin page.
  header('Location: admin.php');
  exit;
} else {
  // The user's login credentials are not valid.
  // Display an error message.
  echo 'Invalid username or password.<a href="../login.php">Back</a>';
}

// Close the database connection.
$db = null;

?>
