<html ng-app="crudApp">  
<head>
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
-->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
</head>  
<body>             
<div ng-controller="crudCtrl">

<div ng-show="success">
    <a href="#" ng-click="feedBackMsg()">X</a>
    {{feedBack}}
</div>
<!--
    <form name="addform" ng-submit="createRow()">
-->    
    <form ng-submit="createRow()">

        
        <input type="text" ng-model="addField.name" placeholder="Enter Name" required>
        
        <textarea ng-model="addField.content"  placeholder="Enter Content" ng-required="true"></textarea>
        
        <input type="text" ng-model="addField.published"  placeholder="Enter Published" ng-required="true" />

        <button type="submit">Add</button>
        <!--
        <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="addform.$invalid">Add</button></td>
        -->
   
    </form>     
</div>  
</body>  
</html>

<script>
var app = angular.module('crudApp', []);

app.controller('crudCtrl', ["$scope", "$http", function($scope, $http){

    $scope.createRow = function(){
        $http({
            method:"POST",
            url:"create.php",
            data:$scope.addField,
        }).success(function(x){
            $scope.success = true;
            $scope.feedBack = x.feedBack;
            $scope.addField = {};           
    });

    $scope.feedBackMsg = function(){
        $scope.success = false;
    };

    }

}]);
</script>
