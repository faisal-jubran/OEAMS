<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Course </title>
	<?php include('../utilities/utilities.php'); ?>
</head>
<body>
<?php

	if (!isset($_GET['id'])) die("You Must Specify A Course");

		$id = $_GET['id'];

		$sql_select_class = $conn->prepare("SELECT * FROM CLASS natural join COURSE natural join TEACHER natural join TERM where CLASS");
		$sql_select_class->execute();
		$classes = $sql_select_class->get_result();
		echo "<form  class='pop-up-form' id='addClassForm' method='POST' action='classes.php?id=$id'>
			<label for='course_id'>Choose The Course Name</label>
			<select class='form-select' name='course_id' id='course_id'> ";

				while ($class = $classes->fetch_assoc()){
					$class_id = $class["CLASS_ID"];
					$class_teacher = $class["TEACHER_ID"];
					$class_course = $class["COURSE_ID"];
					$class_term = $class["TERM_ID"];
					var_dump($class);
					if($id == $class['CLASS_ID']){
						echo " <option>$class[COURSE_NAME]</option>";
					}
					else{
						echo " <option>$class[COURSE_NAME]</option>";
					}
				}
			echo "
				</select>
				<label for='term_id'>Choose The Term</label>
				<select class='form-select' name='term_id' id='term_id'>
			";

				$sql_select_class->execute();
				$classes = $sql_select_class->get_result();
				while ($class = $classes->fetch_assoc()){
					if($id == $class['CLASS_ID']){
						echo " <option selected>$class[TERM_ID]</option>";
					}
					else{
						echo " <option>$class[TERM_ID]</option>";
					}
				}

			echo "
				</select>
				<label for='teacher_id'>Choose The Teacher</label>
				<select class='form-select' name='teacher_id' id='teacher_id'>
			";

				$sql_select_class->execute();
				$classes = $sql_select_class->get_result();
				while ($class = $classes->fetch_assoc()){
					if($id == $class['CLASS_ID']){
						echo " <option selected>$class[LAST_NAME]</option>";
					}
					else{
						echo " <option>$class[FIRST_NAME]</option>";
					}
				}

			echo "<select/>";
		echo "</form>";
			
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$new_course_name =  $_POST["course_name"];
		$new_course_book =  $_POST["course_book"];
		echo "<script>alert($new_course_book)</script>";

		$sql_update_student = $conn->prepare('update COURSE set COURSE_NAME = ?, COURSE_BOOK = ? where COURSE_ID = ?');
		$sql_update_student->bind_param("ssi", $new_course_name, $new_course_book, $id);
		$sql_update_student->execute();
		header('Location: courses.php');
	}
?>
</body>
</html>