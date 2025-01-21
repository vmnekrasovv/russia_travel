<?php

	function fetchPosts($result){
		
		$posts = [];
		$i = 0;

		while($row = mysqli_fetch_assoc($result)){
		
		    foreach($row as $key => $value){

		        $posts[$i][$key] = $value;
		    }

		    $i++;
		}

		return $posts;
	}
?>