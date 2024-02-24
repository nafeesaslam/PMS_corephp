dashboard.controller('departmentController', function($scope, $http,$filter, toastr) 
{
	$scope.loadDepartment=function(){
        $http({
            method:'GET',
            url:'../PMS_corephp/phpajx/departmentlist.php'
        }).then(function(res){
            $scope.alldeps = res.data;
            //alert(JSON.stringify($scope.data));
           
        },function(res){

        })
    }

	$scope.addDep=function(){
        
            var depData={
                name:$scope.department,
                status:$scope.status

            }   
              
            $http({
                method:'POST',
                url:'/PMS_corephp/phpajx/createdepartment.php',
                data: depData,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Department successfully Created!');
                return $scope.loadDepartment();
        
            },function error(res) {
                
               
            })


           }
           $http({
            method:'GET',
            url:'../PMS_corephp/phpajx/getDepartment.php'
        }).then(function(res){
            $scope.allDep = res.data;
          //alert(JSON.stringify($scope.allDep));
        },function(res){

        });


        //Get Status for Kpi
          $http({
            method:'GET',
            url:'../PMS_corephp/phpajx/getKpiStatus.php'
        }).then(function(res){
            $scope.allStatus = res.data;
            //alert(JSON.stringify($scope.allTypes));
        },function(res){

        })
            $scope.restoreVal = function(a){
                 $scope.id = this.a.id;
                 $scope.department = this.a.dept_name;
                 $scope.status=this.a.status;
            }
              $scope.clear= function()
            {

                $scope.department="";
              
                $scope.status="";
            }

            $scope.editDepartment = function(){
               var data = {
                id:$scope.id,
				name:$scope.department,
                status:$scope.status
               }
              // alert(JSON.stringify(data));
            $http({
                method:'POST',
                url:'../PMS_corephp/phpajx/editDepartment.php',
                data: data,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Revised..!');
                return $scope.loadDepartment();
            })
        } 
        $scope.removeDep = function(a){

                $scope.epno=this.a.id;
                var dat={'id':$scope.epno};
                 //alert(dat);
                //alert($scope.epno);
                $http({
                method:'POST',
                url:'/PMS_corephp/phpajx/deleteDepartment.php',
                data: dat,
                headers:{'content-type':'application/json'}

            }).then(function successCallback(res){
                toastr.warning('Moved to Trash..!');
                return $scope.loadDepartment();
            })} 


});