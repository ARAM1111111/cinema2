<?php 
$conn = mysqli_connect('Localhost','root','','kino') or die(mysqli_connect_error());
$query = "SELECT chear FROM kino";
$res = mysqli_query($conn,$query) or die(mysqli_error());
$chears = mysqli_fetch_all($res,MYSQLI_ASSOC);
if($chears){
		foreach ($chears as  $c) {
		$chear[] = $c['chear'];
	}
}


 ?>