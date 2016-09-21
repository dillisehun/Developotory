
var app = angular.module('yapp', [
  'ngRoute'
]);

/**
 * Configure the Routes

 */
 
app.controller('FavLc',function($scope){
$scope.FavtLan = 'None';

$scope.paid = function(){
$scope.FavtLan = 'PHP';

}

$scope.free = function(){
$scope.FavtLan = 'JAVA';

}

$scope.rough = function(){
$scope.FavtLan = 'JAVASCRIPT';

}


});


 app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    // Home
    .when("/", {templateUrl: "partials/home.php", controller: "PageCtrl"})
	.when("/aboutus", {templateUrl: "partials/about.html", controller: "PageCtrl"})
	.when("/home", {templateUrl: "partials/home.php", controller: "PageCtrl"})
	
	.when("/login", {templateUrl: "partials/login.html", controller: "PageCtrl"})
    // Pages
	.when("/ftpd", {templateUrl: "partials/forgot_pwd.html", controller: "PageCtrl"})
    
    .when("/signup", {templateUrl: "partials/signup.html", controller: "PageCtrl"})
    // else 404
 .otherwise({
                redirectTo: '/home'
            });}]);

/**
 * Controls all other Pages
 */
