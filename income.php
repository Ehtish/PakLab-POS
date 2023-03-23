<?php $active_page = 'profit';?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<div class="container mt-5">
  <h1>Profit/Loss Statement Report</h1>
  <div class="row mt-5">
    <!-- Report parameters form -->
    <div class="col-md-4 my-2">
      <h3>Report Parameters</h3>
      <form>
        <div class="form-group">
          <label for="start-date">From Date:</label>
          <input type="date" class="form-control" id="start-date" />
        </div>
        <div class="form-group">
          <label for="end-date">To Date:</label>
          <input type="date" class="form-control" id="end-date" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-primary">
          Generate Report
        </button>
      </form>
    </div>
    <!-- Report parameters form -->

    <!-- Report result  -->
    <div class="col-md-7 my-2">
      <h3>Report Results</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Date</th>
            <th>Total Sales</th>
            <th>Total Costs</th>
            <th>Profit/Loss</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2023-03-01</td>
            <td>$500</td>
            <td>$200</td>
            <td>$300</td>
          </tr>
          <tr>
            <td>2023-03-02</td>
            <td>$750</td>
            <td>$300</td>
            <td>$450</td>
          </tr>
          <tr>
            <td>2023-03-03</td>
            <td>$1,000</td>
            <td>$400</td>
            <td>$600</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Report result end -->
  </div>
</div>
<?php include 'inc/footer.php' ?>
