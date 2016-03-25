<?php
/**
 * sets an XSRF cookie, generating one if necessary
 *
 * @param string $cookiePath path the cookie is relevant to, blank by default
 * @throws RuntimeException if the session is not active
 **/
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
require_once ("../lib/xsrf.php");
setXsrfCookie();
?>

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

		<!-- Angular -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-messages.js"></script>
		<script src="../angular/app.js"></script>
		<script src="../angular/controller.js"></script>


		<!-- loads gallery support files-->
		<link rel="stylesheet" href="/css/swipebox.css">
		<script src="../lib/jquery-2.1.0.min.js"></script>
		<script src="../js/jquery.swipebox.js"></script>

		<script type="text/javascript">
			;( function( $ ) {

				$( '.swipebox' ).swipebox();

			} )( jQuery );
		</script>
		<!--end gallery support-->

		<!--Nav bar Scripts-->

		<!--Navbar Transformation script-->
		<script type="text/javascript" src="../js/navtransform.js"></script>




		<!--main style sheet-->
		<link rel="stylesheet" href="../css/style.css" />

		<title>The Personal Website of Illustrator Kelly Williams</title>

	</head>
	<body class="sfooter">
		<div class="sfooter-content">

			<?php require_once("../include-header.php"); ?>


			<main>

				<div class="container" id="box-container">

					<div class="row quoteRow row-eq-height"><!--Quote Row-->
						<div class="col-md-8">
							<a name="quote"></a><h2 class="text-center"><span class="textBackgroundBlack">Get Started</span></h2>
							<form name="quoteForm" id="quoteForm" ng-controller="AngularFormController" ng-submit="submit(formData, quoteForm.$valid);" novalidate>
								<div class="form-group" ng-class="{ 'has-error':quoteForm.product.$touched && quoteForm.product.$invalid }">
									<label>Product: </label>
									<div class="radio-inline">
										<label>
											<input type="radio" name="product" id="productBasic" value="basic" ng-model="formData.product" ng-required="true">
											Basic
										</label>
									</div>
									<div class="radio-inline">
										<label>
											<input type="radio" name="product" id="productPopular" value="popular" ng-model="formData.product" ng-required="true">
											Popular
										</label>
									</div>
									<div class="radio-inline">
										<label>
											<input type="radio" name="product" id="productPremium" value="premium" ng-model="formData.product" ng-required="true">
											Premium
										</label>
									</div>
									<div class="radio-inline">
										<label>
											<input type="radio" name="product" id="productCustom" value="custom" ng-model="formData.product" ng-required="true">
											Custom
										</label>
									</div>
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.product.$error" ng-if="quoteForm.product.$touched" ng-hide="quoteForm.product.$valid">
										<p ng-message="required">Product is required</p>
									</div>
								</div>
								<div class="form-group" ng-class=" { 'has-error':quoteForm.name.$touched && quoteForm.name.$invalid } ">
									<label for="name" class="textBackgroundBlack">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" ng-model="formData.name" ng-minlength="2" ng-maxlength="32" ng-required="true">
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.name.$error" ng-if="quoteForm.name.$touched" ng-hide="quoteForm.name.$valid">
										<p ng-message="minlength">Name is too short</p>
										<p ng-message="maxlength">Name is too long</p>
										<p ng-message="required">Name is required</p>
									</div>
								</div>
								<div class="form-group" ng-class=" { 'has-error':quoteForm.email.$touched && quoteForm.email.$invalid }">
									<label for="email" class="textBackgroundBlack">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" ng-model="formData.email" ng-minlength="6" ng-maxlength="200" required="true">
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.email.$error" ng-if="quoteForm.email.$touched" ng-hide="quoteForm.email.$valid">
										<p ng-message="minlength">Email is too short</p>
										<p ng-message="maxlength">Email is too long</p>
										<p ng-message="required">Email is required</p>
										<p ng-message="email">Email is invalid</p>
									</div>
								</div>
								<div class="form-group" ng-class=" { 'has-error':quoteForm.phone.$touched && quoteForm.phone.$invalid } ">
									<label for="phone" class="textBackgroundBlack">Phone Number</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" ng-model="formData.phone" ng-minlength="10" ng-maxlength="32" ng-required="true">
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.phone.$error" ng-if="quoteForm.phone.$touched" ng-hide="quoteForm.phone.$valid">
										<p ng-message="minlength">Phone number is too short; remember to include your area code</p>
										<p ng-message="maxlength">Phone number is too long</p>
										<p ng-message="required">Phone number is required</p>
									</div>
								</div>
								<div class="form-group" ng-class="{ 'has-error':quoteForm.website.$touched && quoteForm.website.$invalid }">
									<label for="website" class="textBackgroundBlack">Current Website</label>
									<input type="text" class="form-control" name="website" id="website" placeholder="Current Website" ng-model="formData.website" ng-minlength="5" ng-maxlength="50">
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.website.$error" ng-if="quoteForm.website.$touched" ng-hide="quoteForm.website.$valid">
										<p ng-message="minlength">Website is too short</p>
										<p ng-message="maxlength">Website is too long</p>
									</div>
								</div>
								<div class="form-group" ng-class="{ 'has-error':quoteForm.comment.$touched && quoteForm.comment.$invalid }">
									<label for="comment" class="textBackgroundBlack">How Can I Help You?</label>
									<textarea class="form-control" name="comment" id="comment" placeholder="I need a website and a web app built." rows="3" ng-model="formData.comment" ng-minlength="10" ng-maxlength="500" ng-required="true"></textarea>
									<div class="alert alert-danger" role="alert" ng-messages="quoteForm.comment.$error" ng-if="quoteForm.comment.$touched" ng-hide="quoteForm.comment.$valid">
										<p ng-message="minlength">Message is too short; try to be a bit more specific</p>
										<p ng-message="maxlength">Message is too long</p>
										<p ng-message="required">Message is required</p>
									</div>
								</div>
								<button type="submit" name="submit" id="submit" class="btn btn-primary">Send</button>
								<button type="reset" name="reset" id="reset" class="btn btn-warning" ng-click="reset();">Reset</button>
								<!--						<p ng-show="quoteForm.$valid">Valid</p>-->
								<!--						<p ng-hide="quoteForm.$valid">Invalid</p>-->
								<!--						<pre>{{formData | json}}</pre>-->
								<p><uib-alert ng-repeat="alert in alerts" type="{{alert.type}}" close="alerts.length = 0;">{{alert.msg}}</uib-alert></p>
							</form>
						</div>


			</main>
		</div>



		<?php include_once("../include-footer.php"); ?>


	</body>

</html>


