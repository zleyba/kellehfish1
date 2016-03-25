app.controller("AngularFormController", ["$http", "$scope", function($http, $scope) {
	/**
	 * State variable to store alerts generated from submit event
	 * @type {Array}
	 **/
	$scope.alerts = [];

	/**
	 * State variable that keeps track of data entered
	 * @type {Object}
	 **/
	$scope.formData = {product:null, name:null, email:null, phone: null, website:null, comment:null};

	/**
	 * Method to reset form data when submit and cancel buttons are pressed
	 **/
	$scope.reset = function() {
		$scope.formData = {product:null, name:null, email:null, phone: null, website:null, comment:null};
		$scope.quoteForm.$setUntouched();
		$scope.quoteForm.$setPristine();
	};

	/**
	 * Method to process action from submit button
	 *
	 * @param formData object containing submitted form data
	 * @param validated true if pressed validation, false if not
	 **/
	$scope.submit = function(formData, validated) {
		if(validated === true){
			$http.post("lib/mailer.php", formData)
				.then(function(reply) {
					$scope.alerts[0] = {
						type: "danger",
						msg: reply.data.message
					};
					if(reply.data.status === 200) {
						$scope.alerts[0].type = "success";
					}
				});
		} else {
			$scope.alerts[0] = {
				type: "danger",
				msg: "Please make sure you've entered everything correctly and try again."
			};
		}
		$scope.reset();
	};
}]);