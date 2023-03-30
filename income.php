<?php $active_page = 'profit';?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include 'config/db.php' ?>

<div class="container mt-5">
  <h1>Profit/Loss Statement Report</h1>
  <div class="row mt-5">
    <!-- Report parameters form -->
    <div class="col-md-4 my-2">
      <h3>Report Parameters</h3>
      <form method="post">
        <div class="form-group">
          <label for="from-date">From Date:</label>
          <input type="date" class="form-control" id="from-date" name="from_date" />
        </div>
        <div class="form-group">
          <label for="to-date">To Date:</label>
          <input type="date" class="form-control" id="to-date" name="to_date" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
       <a href="income.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
    <!-- Report parameters form -->

    <!-- Report result  -->
    <div class="col-md-7 my-2">
      <h3>Report Results</h3>
      <table id="example" class="table table-hover">
        <thead>
          <tr>
            <th>Date</th>
            <th>Total Sales</th>
            <th>Total Costs</th>
            <th>Profit/Loss</th>
          </tr>
        </thead>
        <tbody>
          <?php
          function get_total_costs_for_date($conn, $date) {
            $sql_cost = "SELECT SUM(cost * quantity) AS total_costs FROM products INNER JOIN sales ON products.id = sales.product_id WHERE DATE(sales.sale_date) = '$date'";
            $result_cost = $conn->query($sql_cost);
            $row_cost = $result_cost->fetch_assoc();
            return $row_cost['total_costs'];
          }

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the submitted dates
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];

            // Retrieve the sales data grouped by date and filtered by the submitted dates
            $sql = "SELECT DATE(sale_date) AS date, SUM(total) AS total_sales FROM sales WHERE DATE(sale_date) BETWEEN '$from_date' AND '$to_date' GROUP BY DATE(sale_date)";
          } else {
            // Retrieve the sales data grouped by date
            $sql = "SELECT DATE(sale_date) AS date, SUM(total) AS total_sales FROM sales GROUP BY DATE(sale_date)";
          }

          $result = $conn->query($sql);

          if ($result === false) {
            // Query failed, display error message and exit
            echo "Error: " . $conn->error;
            exit;
          }

          // Loop through each date and calculate the total costs and profit/loss
          while ($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $total_sales = $row['total_sales'];

            // Retrieve the cost of goods sold for this date
            $total_costs = get_total_costs_for_date($conn, $date);

            // Calculate the profit/loss
            $profit_loss = $total_sales - $total_costs;

            // Display the data in the table
            echo "<tr>";
            echo "<td>" . $date . "</td>";
            echo "<td>" . number_format($total_sales) . "</td>";
            echo "<td>" . number_format($total_costs) . "</td>";
            echo "<td>" . number_format($profit_loss) . "</td>";
            echo "</tr>";
          }

          // Close the database connection
          $conn->close();
          ?>

        </tbody>
      </table>
    </div>

    <!-- Report result end -->
  </div>
</div>
<?php include 'inc/footer.php' ?>
