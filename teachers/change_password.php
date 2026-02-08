<?php
$conn = mysqli_connect("localhost" ,"root","Faisal311", "OEAMS");
	
if (!isset($_SESSION['TEACHER_ID'])) {
    die("Access denied");
}

$teacher_id =$_SESSION['TEACHER_ID'];

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
if ($new_password !== $confirm_password) {
    die("New passwords do not match.");
}

$stmt = $conn->prepare("SELECT PASSWORD FROM TEACHER WHERE TEACHER_ID=?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!password_verify($current_password, $row['PASSWORD'])) {
    die("Current password is incorrect.");
}
$stmt2 = $conn->prepare("UPDATE TEACHER SET PASSWORD=? WHERE TEACHER_ID=?");
$stmt2->bind_param("si", $new_password, $teacher_id);
if ($stmt2->execute()) {
    echo "Password changed successfully!";
} else {
    echo "Failed to change password.";
}


?>