<?php 
if (isset($_POST['chearid']) && isset($_POST['name'])) {
	$chear = $_POST['chearid'];
	$name = $_POST['name'];
	$query = "INSERT INTO kino(chear,name) VALUES('$chear','$name')";
}
if(isset($_POST['action'])){
	$query = "TRUNCATE TABLE kino";
}


$conn = mysqli_connect('Localhost','root','','kino') or die(mysqli_connect_error());
$res = mysqli_query($conn,$query) or die(mysqli_error());



?>