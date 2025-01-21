<?php

	session_id($_COOKIE['PHPSESSID']);
	session_start();

	require_once('db.php');
	require_once('sendQuery.php');
	require_once('fetchPosts.php');
	require_once('renderPosts.php');

	$sql = 'SELECT * FROM posts';

	$result = sendQuery($conn, $sql);
	$posts = fetchPosts($result);

	
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Russia Travel</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preload" href="js/app.min.js" as="script">
	<link rel="preload" href="css/app.min.css" as="style">

	<link rel="stylesheet" href="css/app.min.css">
	<script src="js/app.min.js" defer></script>

</head>

<body>
	
	<div class="wrapper">
		<div class="box">
			
			<div class="page">
		
				<header class="header">
					
					<div class="navbar">
						
						<a href="#" class="logo"></a>
						
						<nav class="header-menu">
							<a href="#post-1" class="header-menu__link">Куршская коса</a>
							<a href="#post-2" class="header-menu__link">Кольский</a>
							<a href="#post-3" class="header-menu__link">Алтай</a>
							<a href="#post-4" class="header-menu__link">Зимний Байкал</a>
							<a href="#post-5" class="header-menu__link">Карелия</a>		
						</nav>

						<div class="user"> 
							<?php 
								if($_SESSION['username']){
									echo $_SESSION['username'] ." | <a href=\"logoutUser.php\" class=\"user__link\">logout</a>";
								} else {
									echo "<a href=\"loginUser.php\" class=\"user__link\">login</a>";
								}
							?>
						</div>

						<div class="burger"></div>
					
					</div> <!-- /navbar -->

					<div class="navbar-admin <?php if($_SESSION['username'] === 'admin') echo "active";?>">

						<nav class="admin-menu">
							
							<?php 
								if($_SESSION['username'] === 'admin') {
									echo "<a href=\"registerUser.php\" class=\"admin-menu__link\">add user</a>";
									echo "<a href=\"addPost.php\" class=\"admin-menu__link\">add post</a>";
								}
							?>
						</nav>
						
					</div> <!-- /navbar-admin -->

					<div class="header-content">
						
						<h1 class="header__title"><span>Путешествия </span> по России</h1>

						<div class="header-image-box">
							
							<picture>
							  <source srcset="images/dest/header_mobile.jpg" media="(max-width: 576px)" />
							  <img src="images/dest/header.jpg" alt="" class="header-image">
							</picture>
						
						</div>

					</div> <!-- /header-content -->

				</header> <!-- /header -->


		<!-- //////////////////////////// -->


				<main class="main-content">
					
					<div class="intro">

						<h2 class="intro__title">Чего мы там не видели?</h2>

						<p class="intro__text">
							По опросам ВЦИОМ, 95% россиян мечтают куда-нибудь поехать, но только 36% планируют провести отпуск в родной стране. Мол, чего мы тут, дома, не видели? На самом деле, Россия — это целая вселенная с ласковым морем юга, густыми лесами Саян и суровыми льдами плато Путорана. А ещё увидеть все эти красоты можно без миллионов на счету, загранпаспорта и многочасовых перелетов. Как, например, Вера Башмакова — смелая молодая мама, которая взяла в охапку троих детей, усадила их в свою «Ладу» и проехала 20 тысяч километров по родной стране. Мы выбрали и описали некоторые интересные места, достойные вашего отпуска.
						</p>
					
					</div> <!-- /intro -->

					<section class="section s1">
						
						<div class="gallery">
							
							<a href="images/dest/gallery/1/3.jpg" class="gallery__item gallery-1" data-fancybox="gallery-1">
								<img src="images/dest/gallery/1/thumb/3.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/1/4.jpg" class="gallery__item gallery-1" data-fancybox="gallery-1">
								<img src="images/dest/gallery/1/thumb/4.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/1/2.jpg"  data-fancybox="gallery-1"></a>
							<a href="images/dest/gallery/1/5.jpg"  data-fancybox="gallery-1"></a>

		<!-- ///// -->

							<a href="images/dest/gallery/2/2.jpg" class="gallery__item gallery-2" data-fancybox="gallery-2">
								<img src="images/dest/gallery/2/thumb/2.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/2/3.jpg" class="gallery__item gallery-2" data-fancybox="gallery-2">
								<img src="images/dest/gallery/2/thumb/3.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/2/4.jpg" class="gallery__item gallery-2" data-fancybox="gallery-2">
								<img src="images/dest/gallery/2/thumb/4.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/2/5.jpg"  data-fancybox="gallery-2"></a>

		<!-- ///// -->

							<a href="images/dest/gallery/3/2.jpg" class="gallery__item gallery-3" data-fancybox="gallery-3">
								<img src="images/dest/gallery/3/thumb/2.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/3/4.jpg" class="gallery__item gallery-3" data-fancybox="gallery-3">
								<img src="images/dest/gallery/3/thumb/4.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/3/6.jpg" class="gallery__item gallery-3" data-fancybox="gallery-3">
								<img src="images/dest/gallery/3/thumb/6.jpg" alt="" class="gallery__image">
							</a>

							<a href="images/dest/gallery/3/3.jpg"  data-fancybox="gallery-3"></a>
							<a href="images/dest/gallery/3/5.jpg"  data-fancybox="gallery-3"></a>
							<a href="images/dest/gallery/3/7.jpg"  data-fancybox="gallery-3"></a>


		<!-- ///// -->

							<a href="images/dest/gallery/4/7.jpg" class="gallery__item gallery-4" data-fancybox="gallery-4">
								<img src="images/dest/gallery/4/thumb/7.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/4/9.jpg" class="gallery__item gallery-4" data-fancybox="gallery-4">
								<img src="images/dest/gallery/4/thumb/9.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/4/8.jpg" class="gallery__item gallery-4" data-fancybox="gallery-4">
								<img src="images/dest/gallery/4/thumb/8.jpg" alt="" class="gallery__image">
							</a>

							<a href="images/dest/gallery/4/2.jpg"  data-fancybox="gallery-4"></a>
							<a href="images/dest/gallery/4/3.jpg"  data-fancybox="gallery-4"></a>
							<a href="images/dest/gallery/4/4.jpg"  data-fancybox="gallery-4"></a>
							<a href="images/dest/gallery/4/5.jpg"  data-fancybox="gallery-4"></a>
							<a href="images/dest/gallery/4/6.jpg"  data-fancybox="gallery-4"></a>
					

		<!-- ///// -->


							<a href="images/dest/gallery/5/1.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/1.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/3.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/3.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/6.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/6.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/5.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/5.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/7.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/7.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/8.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/8.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/9.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/9.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/11.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/11.jpg" alt="" class="gallery__image">
							</a>
							<a href="images/dest/gallery/5/10.jpg" class="gallery__item gallery-5" data-fancybox="gallery-5">
								<img src="images/dest/gallery/5/thumb/10.jpg" alt="" class="gallery__image">
							</a>

							<a href="images/dest/gallery/5/2.jpg"  data-fancybox="gallery-5"></a>


						</div> <!-- /gallery -->

					</section> <!-- /s1 -->

		<!-- ///////////// -->

					<section class="section s2">
						
						<div class="posts">
							
							<?php renderPosts($posts); ?>

						</div> <!-- /posts -->

					</section> <!-- /s2 -->
					
		<!-- ///////////// -->

					<section class="section s3">
						
						<div class="travel">
							
							<div class="travel__content">
								
								<h2 class="travel__title">
									До Байкала<br> «на собаках»
								</h2>

								<div class="travel__text">
									По мотивам учебной темы о Транссибе — путешествие от столицы до Байкала на электричках.
								</div>
							
							</div>

						</div>

					</section> <!-- /s3 -->

				</main> <!-- /main-content -->



		<!-- //////////////////////////// -->


				<footer class="footer">
					<nav class="footer-nav">
						<a href="#" class="footer-nav__link">Карты</a>
						<a href="#" class="footer-nav__link">Погода</a>
						<a href="#" class="footer-nav__link">Расписание</a>
						<a href="#" class="footer-nav__link">Календарь</a>
					</nav>

					<div class="footer__copyright">©2024 Copyright</div>
				
				</footer> <!-- /footer -->

			</div> <!-- /page -->

		</div> <!-- /box -->
	</div> <!-- /wrapper --> <!-- .box .wrapper - ScrollSmoother -->

</body>
</html>
