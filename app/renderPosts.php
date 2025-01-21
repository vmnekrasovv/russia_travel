<?php

	function renderPosts($posts){

		for($i=0; $i< count($posts); $i++){

			$position = $posts[$i]['gallery'];
			$image_path = "images/dest/gallery/{$position}/{$posts[$i]['image']}";

			echo "<div class='post' id=\"post-{$position}\">";

				echo "<h2 class='post__title'>" . $posts[$i]['title'] . "</h2>";

				echo "<div class='post__images'>";
					echo "<a href=\"{$image_path}\" data-fancybox=\"gallery-{$position}\">";
						echo "<img src=\"{$image_path}\" alt='' class='post__image'>";
					echo "</a>";
				echo "</div>"; // post__images

				echo "<div class='post__text'>";
					echo $posts[$i]['text'];
				echo "</div>";

			echo "</div>"; // post
		}
	}

?>