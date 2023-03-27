<?php $active_page = "home"; ?>
<?php include "inc/header.php"; ?>
<?php include "inc/navbar.php"; ?>
<?php
include 'config/db.php'
?>
<div class="container mt-4">
  <div class="row">
    <!-- cards  -->
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Sales</h5>
          <p class="card-text">$500</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Profit</h5>
          <p class="card-text">$100</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Products</h5>
          <p class="card-text">50</p>
        </div>
      </div>
    </div>
  </div>
  <!-- cards end -->
</div>

<div class="container mt-5">
  <div class="row">
    <!-- add sales form -->
    <div class="col-md-5">
      <h2>Add Sales</h2>
      <form>
        <div class="form-group">
          <label for="productName">Product Name:</label>
          <select class="form-control" id="productName">
            <option value="">Select Product</option>
              <?php // Replace this with PHP code to retrieve product names from database


              $products = ["Product 1", "Product 2", "Product 3"];
              foreach ($products as $product) {
                echo '<option value="' .
                $product .
                '">' .
                $product .
                "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity">
          </div>
          <button type="submit" class="btn btn-primary">Add Sales</button>
        </form>
      </div>
      <!-- add sales form end -->

      <!-- Sales table  -->
      <div class="col-md-7">
        <h2 class="mb-4">Sales Product</h2>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 1</td>
              <td>$10</td>
              <td>2</td>
              <td>$20</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">
                  Edit
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  Delete
                </button>
              </td>
            </tr>
            <tr>
              <td>Product 2</td>
              <td>$20</td>
              <td>1</td>
              <td>$20</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">
                  Edit
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  Delete
                </button>
              </td>
            </tr>
            <tr>
              <td>Product 3</td>
              <td>$15</td>
              <td>3</td>
              <td>$45</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">
                  Edit
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3">Total:</td>
              <td>$85</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- Sales table ends  -->
    </div>
  </div>
</div>
<?php include "inc/footer.php"; ?>
