<?php include 'config/db.php' ?>
<?php 

// Check if the product ID parameter is present
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Execute a DELETE query to remove the product from the database
    $sql = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the product list page
header("Location: products.php");
exit();

?>