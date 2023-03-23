<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Pak Lab</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?php if($active_page == 'home') echo 'active'; ?>">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item <?php if($active_page == 'products') echo 'active'; ?>">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item <?php if($active_page == 'profit') echo 'active'; ?>">
        <a class="nav-link" href="income.php">Income</a>
      </li>
    </ul>
  </div>
</nav>
