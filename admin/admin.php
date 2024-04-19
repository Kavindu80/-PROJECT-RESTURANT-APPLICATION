<?php
include("header.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
</head>

<body>
  <nav class="navbar main-nav">
    <div class="container">
      <a class="navbar-brand logo" href="admin.php">Food Cabin</a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            Admin Panel
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container mb-5">
    <div class="row">
      <div class="col">
        <h2 class="text-center mt-3">Pages</h2>
        <p class="text-center mb-4">All Admin Pages and settings gose here</p>
        <div class="text-center">
          <button class="btn btn-primary"><a href="add-food.php" target="_blank"><i class="bi bi-gear"></i> Add Foods</a></button>
          <button class="btn btn-primary"><a href="../home.php" target="_blank"><i class="bi bi-eye"></i> Home</a></button>
          <button class="btn btn-primary"><a href="../shop.php" target="_blank"><i class="bi bi-eye"></i> Shop</a></button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="text-center m-3">All Products</h2>
        <table class="table table-success table-striped table-borderless table-responsive">
          <thead>
            <tr>
              <th scope="col" class="p-3">#</th>
              <th scope="col" class="p-3">Name</th>
              <th scope="col" class="p-3">Name</th>
              <th scope="col" class="p-3">Price</th>
              <th scope="col" class="p-3">Description</th>
              <th scope="col" class="p-3"></th>

            </tr>
          </thead>
          <tbody>

            <?php
            include("db/db.php");
            $results = $conn->query("SELECT * FROM food_items ORDER BY price ASC");

            // Loop through the results and display them on the web page
            foreach ($results as $row) {
              echo '<tr>';
              echo '<th class="p-3">' . $row["id"] . '</th>';
              echo "<td class='p-3'><img src='uploads/" . $row["image"] . "' alt='" . $row["title"] . "' width='100px' /></td>";
              echo '<td class="p-3">' . $row["title"] . '</td>';
              echo '<td class="p-3">' . $row["price"] . "</td>";
              echo '<td class="p-3">' . $row["description"] . "</td>";
              echo '<td class="p-3"><a href="delete-food.php?id=' . $row["id"] . '" class="btn btn-danger p-1"><i class="bi bi-trash3-fill"></i></a></td>';

              echo "</tr>";
            }
            // Close the connection
            $conn = null;

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>