<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="jumbotron">
	  <h1 class="display-4"><i class="fa fa-automobile"></i> <?php echo $data['title']; ?></h1>
	  <p class="lead">This is a simple inventory app developed by <a href="http://AhmadWKhan.com">Ahmad W Khan</a> as an assignment.</p>
	  <hr class="my-4">
	  <a class="btn btn-primary btn-lg" href="Manufacturers" role="button"><i class="fa fa-wrench"></i> Add Manufacturer</a>
	  <a class="btn btn-success btn-lg" href="models" role="button"><i class="fa fa-cab"></i> Add Model</a>
	  <a class="btn btn-warning btn-lg" href="inventories" role="button"><i class="fa fa-clone"></i> View Inventory</a>
	</div>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Developed by <a href="http://AhmadWKhan.com/">Ahmad W Khan</a></p>
    </div>
  </footer>
<?php require APPROOT . '/views/inc/footer.php'; ?>
