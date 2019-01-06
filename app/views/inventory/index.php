<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="jumbotron">
	  <h3 class="display-6"><i class="fa fa-clone"></i> <?php echo $data['title']; ?></h3>
	  <p class="lead">Following cars are available in the inventory</p>
	  <hr class="my-4">

	  <div id="inventory_output">
	  	
	  </div>

	  
	</div>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Developed by <a href="http://AhmadWKhan.com/">Ahmad W Khan</a></p>
    </div>
  </footer>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">

	function load_inventory() {

	    $.ajax({
	        url: '<?php echo URLROOT; ?>/Inventories/get',
	        method: 'POST',
	        dataType: 'json',
	        success: function (data) {
	            $('#inventory_output').html(data);
	        	}
	    	});
		}

	$(document).ready(function(){

	  load_inventory();	 

	   $("#inventory_table").DataTable(); 

	});

	
</script>