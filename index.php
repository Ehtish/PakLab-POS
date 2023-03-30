<?php $active_page = "home"; ?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include 'config/db.php' ?>
<?php

function get_sales($conn){

 $sql = "SELECT sum(total) as price FROM sales";
 $result = mysqli_query($conn, $sql);
 $row =  mysqli_fetch_assoc($result);
 return $row['price'];
}
function get_count($conn,$entity){

 $sql = "SELECT count(*) as count FROM $entity";
 $result = mysqli_query($conn, $sql);
 $row =  mysqli_fetch_assoc($result);
 return $row['count'];
}
function get_profit($conn){

 $total = 0;
  // Fetch product data from the database
 $sql = "SELECT  products.cost as product_cost,products.id as product_id, sales.* FROM sales INNER JOIN products ON sales.product_id  = products.id;";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
  while ($sales = mysqli_fetch_assoc($result)) {

    $price = $sales['price'] - $sales['product_cost'];
    $ml = $price * $sales['quantity'];
    $total = $total + $ml;


  }

}
return $total;
}

?>

<?php include "inc/header.php"; ?>

<div class="container mt-4">
  <div class="row">
    <!-- cards  -->
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Sales</h5>
          <p class="card-text"><?php echo  get_sales($conn); ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Profit</h5>
          <p class="card-text"><?php echo  get_profit($conn); ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Total Products</h5>
          <p class="card-text"><?php echo  get_count($conn,'products'); ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- cards end -->
</div>


<?php include "sales.php"; ?>
<?php include "inc/footer.php"; ?>
