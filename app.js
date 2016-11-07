(function(){
	var app = angular.module("impossible-app",[]);
	app.controller("tabController",function($scope){
		$scope.tab=1;
		$scope.selecttab=function(value){
			$scope.tab=value;
		};
		$scope.rvalue=function(){
			return $scope.tab;
		};
		
	});
})();