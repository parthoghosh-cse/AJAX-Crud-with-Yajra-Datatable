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
	
	

	<div class="wrap-table shadow">
		<a id="staff_add_btn" class="btn btn-primary btn-sm" href="">Add new staff</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table id="staff-table" class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			

					</tbody>
				</table>
			</div>
		</div>
	</div>
	


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
							<input name="username" class="form-control" type="text" placeholder="username">
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







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>