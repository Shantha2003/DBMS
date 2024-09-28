<div class="container-fluid">
	<form action="" id="manage-book">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
		<input type="hidden" name="venue_id" value="<?php echo isset($_GET['venue_id']) ? $_GET['venue_id'] :'' ?>">
		<br><br><br>
		<div class="form-group">
			<label for="" class="control-label"style="color: red;">Full Name</label>
			<input type="text" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label" style="color: red;">Address</label>
			<textarea cols="10" rows = "2" required="" name="address" class="form-control"><?php echo isset($address) ? $address :'' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label" style="color: red;">Email</label>
			<input type="email" class="form-control" name="email"  value="<?php echo isset($email) ? $email :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label"style="color: red;">Contact #</label>
			<input type="text" class="form-control" name="contact"  value="<?php echo isset($contact) ? $contact :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label" style="color: red;">Duration</label>
			<input type="text" class="form-control" name="duration"  value="<?php echo isset($duration) ? $duration :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label" style="color: red;">Desired Event Schedule</label>
			<input type="text" class="form-control datetimepicker" name="schedule"  value="<?php echo isset($schedule) ? $schedule :'' ?>" required>
		</div>

	</form>
</div>
<script>
	 $('.datetimepicker').datetimepicker({
	      format:'Y/m/d H:i',
	      startDate: '+3d'
	  })
	$('#manage-book').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'admin/ajax.php?action=save_book',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("book Request Sent.",'success')
						end_load()
						uni_modal("","book_msg.php")

				}
			}
		})
	})
</script>