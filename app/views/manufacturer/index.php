<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="jumbotron">
	  <h3 class="display-6"><i class="fa fa-wrench"></i> <?php echo $data['title']; ?></h3>
	  <p class="lead">Type the manuufacturer name below and click Submit button to add it to the database.</p>
	  <hr class="my-4">

	  <form >
	    <div class="form-group">
	      <label for="exampleFormControlFile1">Car Manufacturer Name</label>
	      <input class="form-control form-control-lg" id="name" name="name" type="text" placeholder="Type Manufacturer Name...">
	    </div>
	    <div class="form-group">
	      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit"/>
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
	$('form').on('submit', function (e) {

          e.preventDefault();

          if($('#name').val() == '') {
          	alert("Please enter a manufacturer name");
          } else {

          	$.ajax({
            type: 'post',
            url: '<?php echo URLROOT; ?>/Manufacturers/add',
            data: $('form').serialize(),
            success: function (data) {
              if(data=='success') {
                alert('Car Manufacturer was added successfully!');
                window.location = "<?php echo URLROOT ?>/inventory";
              } else {
                alert(data);
              }
              
            }
          });
          		
          }          

        });
</script>