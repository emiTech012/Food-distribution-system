
<?php
include "query.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $ratio = $_POST["ratio"];

    // Create Query object
    $query = new Query();

    // Add new stock entry
    $result = $query->addStock($name, $category, $quantity, $ratio);

    // Display success or failure message
    if ($result) {
        echo "<script>alert('Book added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add Book');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Books Management System - New Book Store </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container">
  <h4><i class="fa fa-book"> </i>Books Form</h4>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus"></i> Add New Book</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Book </h4>
        </div>
        <div class="modal-body">
          <p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="POST">
            <div class="form-group">
                <label for="" class="text">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Book Name">
            </div>
            <div class="form-group">
                <label for="" class="text">Category</label>
                <select name="category" class="custom-select form-control" required="true" autocomplete="off">
                    <option value="">Select Category</option>
                    <option value="Educational">Educational</option>
                    <option value="Stories">Stories</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="text">Autor</label>
                <input type="text" class="form-control" name="quantity" placeholder="Enter Autor name">
            </div>
            <div class="form-group">
                <label for="" class="text">Pages</label>
                <input type="text" class="form-control" name="ratio" placeholder="Enter Book pages">
            </div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="save">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>      
    </div>
  </div>  
  <!-- Search a stock record -->
  <hr class="text-primary">
  <h3 class="text-primary"><i class="fa fa-search"> | </i> Search Book </h3>
  <hr class="text-primary">
  <form action="">
    <label for=""><i class="fa fa-search"></i> Search:</label>
    <input type="text" class="form-inline" name="search" id="search" onkeyup="searchStockData();">
  </form>
   <hr class="text-primary">
   <p id="showData"> Result </p>
</div>

<script>
    function searchStockData() {
        var x = new XMLHttpRequest();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
                document.getElementById('showData').innerHTML = x.responseText;
            }
        }
        var s = document.getElementById('search').value;
        x.open("GET", "action.php?Key=" + s, true);
        x.send(null);
    }
</script>

</body>
</html>
