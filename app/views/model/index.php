<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="jumbotron">
	  <h3 class="display-6"><i class="fa fa-cab"></i> <?php echo $data['title']; ?></h3>
	  <p class="lead">Type the car model name below and click Submit button to add it to the database.</p>
	  <hr class="my-4">

	  <form class="form-inline">
	    <div class="form-group">
	      <label for="exampleFormControlFile1">Car Model Name</label>
	      <input class="form-control mb-2 mr-sm-2" name="name" type="text" placeholder="Type Model Name...">
	    </div>
	    <div id="manufacturer_output">
	    	
	    </div>
	    <div class="form-group">
	      <input type="submit" class="btn btn-success btn-lg mb-2 mr-sm-2" name="submit" value="Submit"/>
	    </div>

	  </form>


	</div>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Developed by <a href="http://AhmadWKhan.com/">Ahmad W Khan</a></p>
    </div>
  </footer>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">

	function loadManufacturers() {

	    $.ajax({
	        url: '<?php echo URLROOT; ?>/Models/load_manufacturers',
	        method: 'POST',
	        dataType: 'json',
	        success: function (data) {
	            $('#manufacturer_output').html(data);
	            console.log(data);
	        	}
	    	});
		}

	$(document).ready(function(){

	  loadManufacturers();	  

	  $('form').on('submit', function (e) {

          e.preventDefault();

          if($('#name').val() == '') {
          	alert("Please enter a car model name");
          } else {

          	$.ajax({
            type: 'post',
            url: '<?php echo URLROOT; ?>/Models/add',
            data: $('form').serialize(),
            success: function (data) {
              if(data=='success') {
              	alert('Car model was submitted successfully!');
              	window.location = "<?php echo URLROOT ?>/inventory";	
              } else {
              	alert(data);
              }
              
            }
          });
          		
          }          

        });

	});

	
</script>

