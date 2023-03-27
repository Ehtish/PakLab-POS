<?php $active_page = 'products';?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include 'config/db.php' ?>
<?php
// Get the product ID from the URL parameter
$id = $_GET['id'];


// Retrieve the product information from the database
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the updated values from the form
  $name = $_POST['name'];
  $brand_name = $_POST['brand_name'];
  $description = $_POST['description'];
  $sales_price = $_POST['sales_price'];
  $cost = $_POST['cost'];
  $stock = $_POST['stock'];

  // Update the product information in the database
  $sql = "UPDATE products SET name='$name', brand_name='$brand_name', description='$description', sales_price=$sales_price, cost=$cost, stock=$stock WHERE id=$id";
  mysqli_query($conn, $sql);

  // Redirect to the product list page
  header("Location: products.php");
  exit();
}
?>

<!-- Display the edit product form -->
<div class="col-md-9">
  <h2>Edit Product</h2>
  <form method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="form-group">
      <label for="brand_name">Brand Name:</label>
      <input type="text" class="form-control" name="brand_name" value="<?php echo $row['brand_name']; ?>" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="sales_price">Price:</label>
      <input type="number" class="form-control" name="sales_price" value="<?php echo $row['sales_price']; ?>" required>
    </div>
    <div class="form-group">
      <label for="cost">Cost:</label>
      <input type="number" class="form-control" name="cost" value="<?php echo $row['cost']; ?>" required>
    </div>
    <div class="form-group">
      <label for="stock">Stock:</label>
      <input type="number" class="form-control" name="stock" value="<?php echo $row['stock']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="products.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
