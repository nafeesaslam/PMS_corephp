dashboard.controller('kpimasterController', function($scope, $http,$filter, toastr) 
{
    //$scope.kpi;
    
    /*$scope.loadType=function(){*/
        
         $scope.clear= function()
            {

                $scope.name="";
				$scope.kkra = "";
                $scope.type=""; 
                $scope.department="";
                $scope.status="";
            }

        //Get KPI Types
        $http({
            method:'GET',
            url:'../PMS_corephp/phpajx/getKpiType.php'
        }).then(function(res){
            $scope.allTypes = res.data;
            //alert(JSON.stringify($scope.allTypes));
        },function(res){

        })



        //Get Department Types
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



  
    $scope.loadName=function(){
        $http({
            method:'GET',
            url:'../PMS_corephp/phpajx/loadEmpName.php'
        }).then(function(res){
            $scope.allnames = res.data;
           
        },function(res){

        })
    }
    $scope.getName=function(a){
        $scope.kpiName=this.a.Name;
    }

    $scope.loadData = function(){
        $http({
        method: 'GET',
        url: '../PMS_corephp/phpajx/kpilist.php'
         }).then(function successCallback(response) 
         {
             var obj = response.data[0];
                                $scope.columnsKpi =  Object.keys(obj).filter(function(key) {
                          if (obj.hasOwnProperty(key) && typeof key == 'string') {
                            return key;
                          }
                        });
                        //alert($scope.columns);
                        $scope.format = function(str) {
                            return str.replace('_',' '); //do the rest of the formatting here. 
                        }
                                //var chck = response.data;
                    // alert($scope.columnsKpi);
                                //alert(chck);
               // $scope.kpilist = response.data;
                        
                        /*var srVal = [];
                        for (var i = 0; i < chck.length; i++) {
                        var t = {value: (Number(response.data[i].Rating || 0))}
                        srVal.push(t);
                         }*/

        $scope.data=response.data;
       // alert($scope.kpi);
       $scope.$watch("searching", function(query){
        $scope.kpi = $filter("filter")($scope.data, query);
      });
        }, 
         function errorCallback(response) 
         {});
    }
	 

         $scope.addKpi=function(){
      
            var kpiData={
                name:$scope.name,
				kra:$scope.kkra,
                type:$scope.type,
                dep:$scope.department,
                status:$scope.status
				}   
            alert(JSON.stringify(kpiData));  
            $http({
                method:'POST',
                url:'/PMS_corephp/phpajx/createKpiList.php',
                data: kpiData,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Kpi successfully Created!');
                return $scope.loadData();
              

                /*$http({
                    method:'GET',
                    url:'/PMS_corephp/phpajx/createKpiList.php'
                }).then(function success(){
                    $scope.kpi=response.data;
                },function error(){

                })*/
            },function error(res) {
                $error='';
                if ($scope.name== null)
                 {
                    toastr.warning('Regret! Unable to create kpi');
                 } 
               
            })


           }


          /* $scope.dis = false;
           $scope.enable= function(){
            if ($scope.dis == false) {
                $scope.dis = true;

            }
           }*/$scope.page=function($scope){
           $scope.list = $scope.$parent.personList
            $scope.config = {
            itemsPerPage: 5,
            fillLastPage: true
            }
        }
           $scope.viewKpiDetails = function(a)
            {
            $scope.kpiDetails = this.a;
            //alert(JSON.stringify($scope.kpiDetails));
                
            };
            $scope.removeKpi = function(a){

                $scope.epno=this.a.ID;
                var dat={'id':$scope.epno};
                 //alert(dat);
                //alert($scope.epno);
                $http({
                method:'POST',
                url:'/PMS_corephp/phpajx/deleteKpi.php',
                data: dat,
                headers:{'content-type':'application/json'}

            }).then(function successCallback(res){
                toastr.warning('Moved to Trash..!');
                return $scope.loadData();
            })}
          

            $scope.restoreVal = function(a){
                $scope.id = this.a.ID;
                 $scope.name = this.a.Name;
				          $scope.kra = this.a.KRA;
                 $scope.type = this.a.Type;
                 $scope.department = this.a.Department;
                 $scope.status=this.a.Status;
            }
             $scope.editKpiDetails = function(){
               var data = {
                id:$scope.id,
                name:$scope.name,
				        kra:$scope.kra,
                type:$scope.type,
                department:$scope.department,
                status:$scope.status
               }
              alert(JSON.stringify(data));
            $http({
                method:'POST',
                url:'../PMS_corephp/phpajx/editKpiList.php',
                data: data,
                headers:{'content-type':'application/json'}
            }).then(function successCallback(res){
                toastr.success('Revised..!');
                return $scope.loadData();
            })
        }   
           
         $scope.name = "New KPI";     

  $scope.exportData = function () {
        var blob = new Blob([document.getElementById('kpitable').innerHTML], {
            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
        });
        saveAs(blob, "KpiMasters.xls");
    };
});


 