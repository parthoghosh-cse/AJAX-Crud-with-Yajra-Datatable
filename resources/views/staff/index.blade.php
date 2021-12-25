<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table" style="width:1400px;">
		<a id="staff_add_btn" class="btn btn-primary btn-sm" href="">Add new staff</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table id="staff-table" class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Education</th>
							<th>Gender</th>
							<th>Username</th>
							<th>Photo</th>
							<th style="width: 200px">Action</th>
						</tr>
					</thead>
					<tbody>
			

					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	{{-- staff add modal --}}

	<div id="staff_add_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<h2>Add new Staff</h2>
					<div class="msg"></div>
					<hr>

					<form id="staff_add_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input name="name" class="form-control" type="text" placeholder="name">
						</div>

						<div class="form-group">
							<input name="email" class="form-control" type="text" placeholder="email">
						</div>

						<div class="form-group">
							<input name="cell" class="form-control" type="text" placeholder="cell">
						</div>
						<div class="form-group">
							<label for="">Education</label>
							<select class="form-control" name="edu" id="">
								<option value="">-select-</option>
								<option value="PSC">PSC</option>
								<option value="JSC">JSC</option>
								<option value="SSC">SSC</option>
								<option value="HSC">HSC</option>
								<option value="BSC">BSC</option>
								
							</select>
						
						</div>
						<div class="form-group">
							
							<input type="radio" name="gender" value="Male" id="Male">
							<label for="Male">Male</label>

							<input type="radio" name="gender" value="Female" id="Female">
							<label for="Female">Female</label>
						
						</div>

						<div class="form-group">
							<input name="username" class="form-control" type="text" placeholder="username">
							<p class="username-msg"></p>
						</div>
						<div class="form-group">
							<input name="photo" class="" type="file" >
						</div>

						<div class="form-group">
							<input  class="btn btn-sm btn-primary" type="submit" value="Add">
						</div>
					
					</form>

				</div>
			</div>
		</div>
	</div>


	{{-- staff edit modal --}}

	<div id="staff_edit_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<h2>Edit Staff Data</h2>
					<div class="msg"></div>
					<hr>

					<form id="staff_edit_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input name="name" class="form-control" type="text" placeholder="name">
							<input name="update_id" class="form-control" type="hidden" >
						</div>

						<div class="form-group">
							<input name="email" class="form-control" type="text" placeholder="email">
						</div>

						<div class="form-group">
							<input name="cell" class="form-control" type="text" placeholder="cell">
						</div>
						<div class="form-group staff-edu">
							
						
						</div>
						<div class="form-group staff-gender">
							
						
						
						</div>

						<div class="form-group">
							<input name="username" class="form-control" type="text" placeholder="username">
							<p class="username-msg"></p>
						</div>
						<div class="form-group">
							<input name="photo" class="" type="file" >
						</div>

						<div class="form-group">
							<input  class="btn btn-sm btn-primary" type="submit" value="Update">
						</div>
					
					</form>

				</div>
			</div>
		</div>
	</div>







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>