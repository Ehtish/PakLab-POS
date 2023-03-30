<?php 
//optional
include 'config/db.php'; 
// Get the product ID from the AJAX request
$product_id = $_POST['product_id'];

// Query the database for the price of the selected product
$sql = "SELECT price FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $sql);

// Return the price as a JSON object
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['price' => $row['price']]);
} else {
    echo json_encode(['price' => '']);
}
?>






