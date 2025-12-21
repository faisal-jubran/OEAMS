<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Students</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Students</h1>
	<button class="btn btn-primary mx-2">Add Student</button>
	<form class="pop-up-form" id="addStudentForm" method="POST">
		<input class="form-control" type="text" name="first_name" placeholder="First Name">
		<input class="form-control" type="text" name="middle_names" placeholder="Middle Names">
		<input class="form-control" type="text" name="last_name" placeholder="Last Name">
		<input class="form-control" type="text" name="phone_number" placeholder="Phone Number">
		<div class="buttons">
			<button class="btn btn-success" type="submit">Add</button>
			<button class="btn btn-danger">Cancel</button>
		</div>
	</form>
	<?php
	?>
<script src="bootstrap.js"></script>
</body>
</html>