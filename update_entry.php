<?php
include "query.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update"])) {
        // Update stock entry
        $id = $_POST["id"];
        $name = $_POST["name"];
        $category = $_POST["category"];
        $quantity = $_POST["quantity"];
        $ratio = $_POST["ratio"];

        $query = new Query();
        $result = $query->updateStock($id, $name, $category, $quantity, $ratio);

        // Display success or failure message
        if ($result) {
            echo "<script>alert('Book updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update Book');</script>";
        }
    } elseif (isset($_POST["delete"])) {
        // Delete Book entry
        $id = $_POST["id"];
        $query = new Query();
        $result = $query->deleteStock($id);

        // Display success or failure message
        if ($result) {
            echo "<script>alert('Book deleted successfully');</script>";
            // Redirect to main_panel.php or any other page after deletion
            header("Location: main_panel.php");
            exit();
        } else {
            echo "<script>alert('Failed to delete book');</script>";
        }
    }
}

// Check if search keyword is provided
$searchKeyword = isset($_GET["search"]) ? $_GET["search"] : "";

// Search for stock entries
if ($searchKeyword) {
    $query = new Query();
    $searchResults = $query->searchStock($searchKeyword);
}

// Check if an ID is provided for updating
$entryId = isset($_GET["id"]) ? $_GET["id"] : null;

// If an ID is provided, retrieve the entry details
if ($entryId) {
    $query = new Query();
    $entry = $query->getStockEntryById($entryId);
    if ($entry) { // Entry found
        $name = $entry["name"];
        $category = $entry["category"];
        $quantity = $entry["quantity"];
        $ratio = $entry["ratio"];
    } else { // Entry not found
        echo "<script>alert('Invalid stock entry ID');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Books Management System - Update Book</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h4><i class="fa fa-edit"></i> Update Book</h2>

  <!-- Search form -->
  <form action="" method="GET">
    <div class="form-group">
      <label for="search">Search Book:</label>
      <input type="text" class="form-control" id="search" name="search" placeholder="Enter keyword" value="<?php echo htmlspecialchars($searchKeyword); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>

  <!-- Display search results -->
  <?php if ($searchKeyword && isset($searchResults)): ?>
    <h4>Search Results:</h4>
    <ul>
      <?php foreach ($searchResults as $result): ?>
        <li>
          <a href="update_entry.php?id=<?php echo $result['id']; ?>">
            <?php echo $result['name']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <!-- Update form -->
  <?php if ($entryId): ?>
    <form action="update_entry.php" method="POST">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($entryId); ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
      </div>
      <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($category); ?>">
      </div>
      <div class="form-group">
        <label for="quantity">Autor Name:</label>
        <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
      </div>
      <div class="form-group">
        <label for="ratio">Book Pages:</label>
        <input type="text" class="form-control" id="ratio" name="ratio" value="<?php echo htmlspecialchars($ratio); ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="update">Update</button>
      <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
    </form>
  <?php endif; ?>
</div>

</body>
</html>
