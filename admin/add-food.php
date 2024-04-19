<?php
include("header.php")
?>
<?php

// Start a new session.
session_start();

// Check if the user is logged in.
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
  // The user is not logged in.
  // Redirect the user to the login page.
  header('Location: ../login.php');
  exit;
}

// The user is logged in.
// Display the admin page.

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Products</title>
</head>

<body>
  <div class="container">
    <h2 class="text-center my-3">Add Products</h2>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="add-food-db.php" method="post" enctype="multipart/form-data">

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Food Title</span>
            <input name="title" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>

          <div class="input-group mb-3">
            <textarea name="description" class="form-control" aria-label="With textarea" style="height: 150px" required></textarea>
            <span class="input-group-text">Description</span>
          </div>

          <div class="input-group mb-3">
            <input name="img" type="file" class="form-control" id="inputGroupFile01" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Price RS:</span>
            <input name="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" required>
            <span class="input-group-text">.00</span>
          </div>

          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>