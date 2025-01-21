<?php
	
	$conn = mysqli_connect("localhost", "root", "", "russia_travel");

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}

?>