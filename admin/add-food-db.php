<?php
include("header.php");
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Food Uplode</title>
</head>

<body>
  <?php

  // Get the form data from the $_POST superglobal variable
  $title = $_POST["title"];
  $description = $_POST["description"];
  $img = $_FILES["img"];
  $price = $_POST["price"];

  // Validate the form data
  if (empty($title) || empty($description) || empty($img) || empty($price)) {
    die("All fields are required");
  }

  // Upload the image file
  $targetDir = "uploads/";
  $fileName = $img["name"];

  
  // Check if the file is an image
  if (!getimagesize($img["tmp_name"])) {
    die("Invalid image file");
  }
  
  move_uploaded_file($img["tmp_name"], $targetDir . $fileName);

  // Prepare the SQL query
  $sql = "INSERT INTO food_items (title, description, image, price) VALUES (?, ?, ?, ?)";

  // Bind the form data to the SQL query parameters
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $title);
  $stmt->bindParam(2, $description);
  $stmt->bindParam(3, $fileName);
  $stmt->bindParam(4, $price);

  // Execute the query
  $stmt->execute();

  // Echo a success message
  echo '
  <div class="container">
    <h2 class="text-center m-3">Food add status</h2>
    <div class="row">
      <div class="col col-12 col-sm-6 m-auto">
        <div class="alert alert-success m-2" role="alert">
          <p>Product Added succesfully !</p>
          <button type="button" class="btn btn-success d-block"><a href="add-food.php">Back</a></button>
        </div>
      </div>
    </div>
</div>
  ';

  ?>
</body>

</html>