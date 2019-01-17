<?php
session_start();
$conn = new mysqli("localhost","root","","project");
$id = $_SESSION['id'];
$email= $_POST['form_email'];
$gender = $_POST['form_gender'];
$hosteller = $_POST['form_hosteller'];
$batch = $_POST['form_batch'];
$address = $_POST['form_address'];
$groups = $_POST['form_groups'];
$phone = $_POST['form_phone'];
$sql = "UPDATE students SET batch='$batch',gender='$gender',address='$address',groups='$groups',phone = '$phone' WHERE id = '$id';";
$conn->query($sql);
echo "DONE";
?>
