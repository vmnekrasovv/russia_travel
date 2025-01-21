<?php
	
	function sendQuery($conn, $sql){

		$result = mysqli_query($conn, $sql);

		if(!$result){
		     die("Query failed: " . mysqli_error($conn));
		}

		 return $result;
	}
?>