
dashboard.controller('designationController', function($scope, $http,$filter, toastr) {
	 $scope.clear= function()
            {

                $scope.department="";
              
                $scope.status="";
            }
	
	$scope.loadDesignation=function(){
          method:'GET',
           $http({
           url:'../EPMSxs/phpajx/designationlist.php'
        }).then(function(res){
            $scope.alldeps = res.data;
            //alert(JSON.stringify($scope.data));
           
        },function(res){

        })
    }

	$scope.addDes=function(){
        
            var depData={
                designation:$scope.desig,
                status:$scope.status

            }   
              
            $http({
                method:'POST',
                url:'/EPMSxs/phpajx/createDesignation.php',
                data: depData,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Designation successfully Created!');
                return $scope.loadDesignation();
        
            },function error(res) {
                
               
            })


           }
           $http({
            method:'GET',
            url:'../EPMSxs/phpajx/getDesignation.php'
        }).then(function(res){
            $scope.allDep = res.data;
          //alert(JSON.stringify($scope.allDep));
        },function(res){

        });


        //Get Status for Kpi
          $http({
            method:'GET',
            url:'../EPMSxs/phpajx/getKpiStatus.php'
        }).then(function(res){
            $scope.allStatus = res.data;
            //alert(JSON.stringify($scope.allTypes));
        },function(res){

        })
            $scope.restoreVal = function(a){
				 $scope.id = this.a.designation_id;
                 $scope.designation = this.a.designation_name;
                 $scope.status=this.a.status;
            }
             

            $scope.editDesignation = function(){
               var data = {
                id:$scope.id,
                name:$scope.designation,
                status:$scope.status
               }
              // alert(JSON.stringify(data));
            $http({
                method:'POST',
                url:'../EPMSxs/phpajx/editDesignation.php',
                data: data,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Revised..!');
                return $scope.loadDesignation();
            })
        } 
        $scope.removeDep = function(a){

                $scope.epno=this.a.designation_id;
                var dat={'id':$scope.epno};
                 //alert(dat);
                //alert($scope.epno);
                $http({
                method:'POST',
                url:'/EPMSxs/phpajx/deleteDesignation.php',
                data: dat,
                headers:{'content-type':'application/json'}

            }).then(function successCallback(res){
                toastr.warning('Moved to Trash..!');
                return $scope.loadDesignation();
            })} 


});