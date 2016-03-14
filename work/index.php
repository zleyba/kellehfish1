<!DOCTYPE HTML>
<!--
 * Created by PhpStorm.
 * User: zleyba
* Date: 2/2/16
* Time: 10:24 AM
-->
<html>
	<head>
		<meta charset="UTF-8">
		<?php require_once("../include-headtags.php"); ?>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Didot' rel='stylesheet' type='text/css'>

		<!-- loads gallery support files-->
		<link rel="stylesheet" href="/css/swipebox.css">
		<script src="/lib/jquery-2.1.0.min.js"></script>
		<script src="/js/jquery.swipebox.js"></script>

		<script type="text/javascript">
			;( function( $ ) {

				$( '.swipebox' ).swipebox();

			} )( jQuery );
		</script>
		<!--end gallery support-->

		<!--Nav bar Scripts-->

		<!--Navbar Transformation script-->
		<script type="text/javascript" src="/js/navtransform.js"></script>




		<!--main style sheet-->
		<link rel="stylesheet" href="/css/style.css" />

		<title>The Personal Website of Illustrator Kelly Williams</title>

	</head>
	<body class="sfooter">
		<div class="sfooter-content">

			<?php require_once("../include-header.php"); ?>


			<main>

				<div class="container-fluid" id="box-container">

					<div class="row">

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
						<a href="/img/img-1.jpg" class="swipebox" title="My Caption">
							<img src="/img/img-1.jpg" alt="image">
						</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-2.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-2.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-3.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-3.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-4.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-4.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-5.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-5.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-6.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-6.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-7.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-7.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-8.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-8.jpg" alt="image">
							</a>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 gallery">
							<a href="/img/img-9.jpg" class="swipebox" title="My Caption">
								<img src="/img/img-9.jpg" alt="image">
							</a>
						</div>



					</div>


			</main>
		</div>



		<?php include_once("../include-footer.php"); ?>


	</body>

</html>