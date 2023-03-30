<?php
$is_edit = 0;
if (isset($_POST['add_sales'])) {


    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;

    // Insert data into database
    $sql = "INSERT INTO sales (`product_id` , `price`, `quantity`, `total`)
    VALUES ('$product_id', '$price', '$quantity', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <div class="container alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Successfully</strong> Sales Added.
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Something went wrong
        </div>
        ';
    }


}
if (isset($_POST['update_sales'])) {


    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];
    $total = $price * $quantity;

    // Insert data into database
    $sql = "UPDATE sales SET product_id ='$product_id', price='$price', quantity='$quantity', total=$total  WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo '
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Successfully</strong> Sales Updated.
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Something went wrong
        </div>
        ';
    }


}
if (isset($_GET['edit'])) {
    $is_edit = 1;
    $sales_id = $_GET['id'];
    $sql = "SELECT * FROM sales WHERE id='$sales_id'";
    $result = mysqli_query($conn, $sql);
    $edit_sales = mysqli_fetch_assoc($result);

}
if (isset($_GET['delete'])) {

    $id = $_GET['id'];

// Insert data into database
    $sql = "Delete  from sales  WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo '
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Successfully</strong> Sales Deleted.
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Something went wrong
        </div>
        ';
    }

}



?>
<div class="container mt-5">
    <div class="row my-5">
        <!-- add sales form -->
        <div class="col-md-5">
            <h2>Add Sales</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <select class="form-control" name="product_id" id="product_id" required>
                        <option value="">Select Product</option>
                        <?php
                        // Fetch product data from the database
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);
                        // Generate HTML table rows from the fetched data
                        if (mysqli_num_rows($result) > 0) {
                            while ($products = mysqli_fetch_assoc($result)) {
                                ?>

                                <option value="<?php echo $products['id'] ?>"
                                    <?php
                                    if($is_edit == 1 && $products['id'] == $edit_sales['product_id']){

                                        echo 'selected';

                                    }
                                    ?>
                                    ><?php echo $products['name'] ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo ($is_edit == 1) ? $edit_sales['id'] : '' ?>">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" value="<?php echo ($is_edit == 1) ? $edit_sales['price'] : '' ?>"  id="price" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" class="form-control" name="quantity" value="<?php echo ($is_edit == 1) ? $edit_sales['quantity'] : '' ?>" id="quantity" required>
                    </div>
                    <button type="submit" name="<?php echo ($is_edit == 1) ? 'update_sales' : 'add_sales' ?>" class="btn btn-primary"><?php echo ($is_edit == 1) ? 'Update Sales' : 'Add Sales' ?></button>
                </form>
            </div>
            <!-- add sales form end -->

            <!-- Sales table  -->
            <div class="col-md-7">
                <h2 class="mb-4">Sales Product</h2>
                <table id= example class="table table-bordered table-hover">
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
                        <?php
                        $total = 0;
                        // Fetch product data from the database
                        $sql = "SELECT  products.name as product_name,products.id as product_id, sales.* FROM sales INNER JOIN products ON sales.product_id  = products.id;";
                        $result = mysqli_query($conn, $sql);
                        // Generate HTML table rows from the fetched data
                        if (mysqli_num_rows($result) > 0) {
                            while ($sales = mysqli_fetch_assoc($result)) {

                                ?>

                                <tr>
                                    <td><?php echo $sales['product_name'] ?></td>
                                    <td><?php echo $sales['price'] ?></td>
                                    <td><?php echo $sales['quantity'] ?></td>
                                    <td><?php echo $sales['total'] ?></td>
                                    <td>
                                        <a href="?id=<?php echo $sales['id'] ?>&edit=edit" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <a href="?id=<?php echo $sales['id'] ?>&delete=delete"  class="btn btn-danger btn-sm">
                                            Delete
                                        </a>

                                    </td>
                                </tr>

                                <?php
                                $total = $total + $sales['total'];
                            }
                        } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Sales table ends  -->
        </div>
    </div>
    <?php include 'inc/footer.php' ?>
