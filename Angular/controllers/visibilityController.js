dashboard.controller('visibilityController', function($scope, $http, toastr) 
{
	$scope.me = false;
        $http({
        method: 'GET',
        url: '../PMS_corephp/phpajx/dashboard.php'
         }).then(function successCallback(response) 
         {
            $scope.emp = response.data.emp_img;
            console.log($scope.emp);
         var dg = response.data.permission;
        if(dg == 1)
        {
        	$scope.me = true;
                toastr.info('Welcome' + " " + response.data.emp_name);
                $http({
                        method:'GET',
                        url:'../PMS_corephp/phpajx/dashboard.php'
                }).then(function success(res){

                },function error(res){
                        
                })
        }
        else
        {
        	$scope.me = false;
                toastr.info('Welcome' + " " + response.data.emp_name)
        }
        }, 
         function errorCallback(response) 
         {});
});