<?php $active_page = 'products';?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>

<div class="container mt-5">
  <div class="row">
    <!-- Add product -->
    <div class="col-md-5">
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
    </div>
    <!-- Add product ends-->

    <!-- product list -->
    <div class="col-md-7">
      <h2>Product List</h2>
      <p>View and manage products:</p>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Product 1</td>
            <td>Product 1 description</td>
            <td>$10.00</td>
            <td>50</td>
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
            <td>2</td>
            <td>Product 2</td>
            <td>Product 2 description</td>
            <td>$15.00</td>
            <td>25</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm">
                Edit
              </button>
              <button type="button" class="btn btn-danger btn-sm">
                Delete
              </button>
            </td>
          </tr>
          <!-- more product rows... -->
        </tbody>
      </table>
    </div>
    <!-- product list -->
  </div>
</div>
<?php include 'inc/footer.php' ?>
