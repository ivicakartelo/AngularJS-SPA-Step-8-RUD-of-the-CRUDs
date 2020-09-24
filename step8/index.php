
Result Size: 945 x 771
<!DOCTYPE html>
<html lang="en" ng-app="myFoo">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="//code.angularjs.org/1.3.0-rc.1/angular.min.js"></script>
  <script src="//code.angularjs.org/1.3.0-rc.1/angular-route.min.js"></script>

  <script>
  var myFoo = angular.module('myFoo', ['ngRoute']);

  myFoo.config(function ($routeProvider) {
    
    $routeProvider
    
    .when('/', {
        templateUrl: 'a.php',
        controller: 'mainController'
    })
    .when('/second/:num', {
    
        templateUrl: 'b.php',
        controller: 'secondController'
    })   
});

myFoo.controller('mainController', ['$scope', '$log', '$http', function($scope, $log, $http) {
    
    $http.get("control/select_control.php")
   .then(function (response) {$scope.json = response.data.records});
    
}]);

myFoo.controller('secondController', ['$scope', '$log', '$http', '$routeParams', 
function($scope, $log, $http, $routeParams) {
    
    $scope.num = $routeParams.num;
    $http.get("control/select_onerow_control_for_post_view.php?menu_id=" + $scope.num)
   .then(function (response) {$scope.json = response.data.records});
   
}]);
</script>

  <style>
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
  </style>
</head>
<body>
​
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
​
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Home</a>
  </div>  
</nav>
​
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h3><?php
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "cmsoop");

    $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT menu_id, name,
				CONCAT(LEFT(content,400))
				AS content, published
			  	FROM menu ORDER BY menu_id DESC";
    $result = mysqli_query($link, $sql);
    print '<ul>';

    While ($row = mysqli_fetch_assoc($result))
    {
    print '<li>';
    print "<a href='#/second/" . $row["menu_id"] . "'>" . $row["name"] . "</a>";
    print "</li>";
    }
    print "</ul>";
?></h3>
</div>
    <div class="col-sm-8" ng-view>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
