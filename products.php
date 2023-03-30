<?php $active_page = 'products';?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include 'config/db.php' ?>
<?php
// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
  $brand = $_POST['brand_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $cost = $_POST['cost'];
  $stock = $_POST['stock'];


  // Insert data into database
  $sql = "INSERT INTO products (name, brand_name, description, sales_price, cost, stock)
  VALUES ('$name', '$brand', '$description', '$price', '$cost', '$stock')";

  if ($conn->query($sql) === TRUE) {
   echo '
   <div class="alert alert-success alert-dismissible">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Successfully</strong> Inserted new Product.
   </div>
   ';
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>

<div class="container mt-5">
  <div class="row">
    <!-- Add product -->
    <!-- <div class="col-md-3">
      <h2>Add Product</h2>
      <p>Add a new product to the inventory:</p>
      <form class="mb-5">
        <div class="form-group">
          <label for="name">Name:</label>
          <input
          type="text"
          class="form-control"
          id="name"
          placeholder="Enter product name"
          required
          />
        </div>
        <div class="form-group input-group">
          <span class="input-group-text">Brand Name</span>
          <select class="form-select" aria-label="Brand Name">
            <option selected>Choose a brand</option>
            <option value="1">Brand A</option>
            <option value="2">Brand B</option>
            <option value="3">Brand C</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea
          class="form-control"
          id="description"
          placeholder="Enter product description"
          required
          ></textarea>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input
          type="number"
          class="form-control"
          id="price"
          placeholder="Enter product price"
          required
          />
        </div>
        <div class="form-group">
          <label for="cost">Cost:</label>
          <input
          type="number"
          class="form-control"
          id="cost"
          placeholder="Enter product cost"
          required
          />
        </div>
        <div class="form-group">
          <label for="stock">Stock:</label>
          <input
          type="number"
          class="form-control"
          id="stock"
          placeholder="Enter product stock"
          required
          />
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
    </div> -->

    <div class="col-md-3">
      <h2>Add Product</h2>
      <p>Add a new product to the inventory:</p>
      <form method="post" class="mb-5">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
        </div>
        <div class="form-group input-group">
          <span class="input-group-text">Brand Name</span>
          <select class="form-select" aria-label="Brand Name" id="brand" name="brand_name">
            <option selected>Choose a brand</option>
            <option value="oppo">oppo</option>
            <option value="vivo">vivo</option>
            <option value="samsung">samsung</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" id="description" name="description" placeholder="Enter product description"></textarea>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" required>
        </div>
        <div class="form-group">
          <label for="cost">Cost:</label>
          <input type="number" class="form-control" id="cost" name="cost" placeholder="Enter product cost" required>
        </div>
        <div class="form-group">
          <label for="stock">Stock:</label>
          <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
    </div>


    <!-- Add product ends-->

    <!-- product list -->
    <div class="col-md-9">
      <h2>Product List</h2>
      <p>View and manage products:</p>
      <table id="example" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Cost</th>
            <th>Stock</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // Fetch product data from the database
          $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);

      // Generate HTML table rows from the fetched data
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["brand_name"] . "</td>";
              echo "<td>" . $row["description"] . "</td>";
              echo "<td>" . $row["sales_price"] . "</td>";
              echo "<td>" . $row["cost"] . "</td>";
              echo "<td>" . $row["stock"] . "</td>";
              echo "<td>";
              echo "<a href='edit_product.php?id=" . $row["id"] . "' class=\"btn btn-primary btn-sm\">Edit</a> ";
              echo "<a href=\"delete_product.php?id=" . $row["id"] . "\" class=\"btn btn-danger btn-sm\">Delete</a>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan=\"7\">No products found.</td></tr>";
          }

      // Close the database connection
          mysqli_close($conn);

          ?>
        </tbody>
      </table>
    </div>
    <!-- product list -->
  </div>
</div>
<?php include 'inc/footer.php' ?>
