/// Controller for employees.html
dashboard.controller('employeesController', function($scope, $http, toastr){ 

$scope.demo='images/profile.jpg';
$scope.fdemo='images/fm.png';
$scope.recommends = [{'feedback':""}];  
$scope.addRecommend = function(recommend){
    $scope.recommends.push({'feedback':""});
} ;

$scope.removeRecommend=function($index){
     $scope.recommends.splice($index,1);
}


$scope.gaps = [{'feedback':""}];  


$scope.addgap = function(gap){
    $scope.gaps.push({'feedback':""});
} ;

$scope.removegap=function($index){
     $scope.gaps.splice($index,1);
}


$scope.achievements = [{'feedback':""}];  


$scope.addachievement = function(achieve){
    $scope.achievements.push({'feedback':""});
} ;

$scope.removeachievement=function($index){
     $scope.achievements.splice($index,1);
}
//Function get employees data through $http.get ajax.....
        $http({
                method: 'GET',
                url: '/EPMSxs/phpajx/employees.php'
             }).then(function successCallback(response) 
             {
               /* console.log(response);*/
                $scope.employees = response.data;
                //alert($scope.employees);
            // this callback will be called asynchronously
            // when the response is available
             }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
            //Function to get data by index using $scope to display detailed data of a particular row....   
               //$scope.xs = [];       
            $scope.targetEmp = function(x)
            {
            $scope.empDetails = this.x;
            $scope.empId = this.x.emp_no;
            var emp_no = $scope.empId;
            var data = {emp_no:this.x.emp_no};
            //$scope.xs.push(emp_no);
            var config = {
             params: data,
             headers : {'Accept' : 'application/json'}
            };
//alert(JSON.stringify($scope.xs));
          $http.get('/EPMSxs/phpajx/kpitrans.php', config).then(function(response) {
          $scope.rater = response.data.length;
            if($scope.rater){
              $scope.selfr = response.data[0].self_rating;
            }else{
              $scope.selfr = '';
            }
          //alert($scope.rater);  
          $scope.allper = response.data;
          $scope.scoreper =response.data;
   //console.log($scope.allper); 
          $scope.slider = {
                  value:1.25,
                  options: {
                  floor:1,
                  ceil:5,
                  step:0.25,
                  precision:2,
                    showSelectionBar: true,
                  getSelectionBarColor: function(value) {
                      if (value <= 1.75)
                          return 'red';
                      if (value <= 2.75)
                          return 'orange';
                      if (value <= 3.75)
                          return 'lightblue';
                      return '#2AE02A';
                  }
              }
          };
              
 }, function(response) {
});
                
    $scope.subScore=function(){
    $scope.all = [];
    angular.forEach($scope.scoreper,function(value){
        var a = Number(value.Rate || 0);
        var b = value.Rem;
        //var c = Number(value.emp_no || 0);
        var d = Number(value.trn_kpi_id || 0);
        var raw = {'Rate':a,'Rem':b,'trn':d};
        $scope.all.push(raw);
    })
    var data = {data:$scope.all,emp:$scope.empId};  
    alert(JSON.stringify(data));
    $http({
      method:'POST',
      url:'/EPMSxs/phpajx/appScore.php',
      data:data
    }).then(function success(res){
        toastr.success(res.data);
    },function error(res){
        toastr.error(res.data);
    })
  }


$scope.subRec=function(){
  var data = {dat:$scope.recommends,emp:$scope.empDetails.emp_no,type:2};
  alert(JSON.stringify(data));
  $http({
    method:'POST',
    url:'/EPMSxs/phpajx/addRecommend.php',
    data:data,
    headers:{'content-type':'application/json'}
  }).then(function success(res){
    toastr.success(res.data);
  },function error(res){
    toastr.error(res.data);
  })
}


$scope.subGap=function(){
  var data = {dat:$scope.gaps,emp:$scope.empDetails.emp_no,type:1};
  alert(JSON.stringify(data));
  $http({
    method:'POST',
    url:'/EPMSxs/phpajx/addGap.php',
    data:data,
    headers:{'content-type':'application/json'}
  }).then(function success(res){
    toastr.success(res.data);
  },function error(res){
    toastr.error(res.data);
  })
}

$scope.subAchieve=function(){
  var data = {dat:$scope.achievements,emp:$scope.empDetails.emp_no,type:0};
  alert(JSON.stringify(data));
  $http({
    method:'POST',
    url:'/EPMSxs/phpajx/addAchieve.php',
    data:data,
    headers:{'content-type':'application/json'}
  }).then(function success(res){
    toastr.success(res.data);
  },function error(res){
    toastr.error(res.data);
  })
}

            }
 var style = 
    {
            '1':{'background-color':'#d9534f'},
            '1.25':{'background-color':'#d9534f'},
            '1.5':{'background-color':'#d9534f'},
            '1.75':{'background-color':'#d9534f'},
            '2':{'background-color':'#d9534f'},
            '2.25':{'background-color':'#f0ad4e'},
            '2.5':{'background-color':'#f0ad4e'},
            '2.75':{'background-color':'#f0ad4e'},
            '3':{'background-color':'#f0ad4e'},
            '3.25': {'background-color':'#5bc0de'},
            '3.5':{'background-color':'#5bc0de'},
            '3.75':{'background-color':'#5bc0de'},
            '4':{'background-color':'#5bc0de'},
            '4.25': {'background-color':'#5cb85c'},
            '4.5': {'background-color':'#5cb85c'},
            '4.75': {'background-color':'#5cb85c'},
            '5': {'background-color':'#5cb85c'},
            'default': {'background-color':'#a7aaa4'}
    }
  $scope.applyStyle = function(srate) 
{
    //the status is the key to get the target style
    return srate ? style[srate]:style['default']; 
}; 

$scope.loadallKPI=function(){
        $http({
            method:'GET',
            url:'../EPMSxs/phpajx/allKpi.php'
        }).then(function(res){
            $scope.allkpis = res.data;
           
        },function(res){

        })
    }   


 $scope.assign = function() {

       $scope.optionsCSV = [];


       angular.forEach($scope.allkpis,function(x) {

        var a = Number(x.weight || 0);
       var b = Number(x.target || 0);
       if(x.value){
       var a = {'kpi_id': x.ID,'weight':a, 'target':b};
       $scope.optionsCSV.push(a);
    }
   })

       //alert($scope.weightage);
       //alert(JSON.stringify($scope.weightage));


       var data={
       kpis:$scope.optionsCSV,
       emp:$scope.empDetails.emp_no,
       //weightage:$scope.weightage
     }
     alert(JSON.stringify(data));
        $http({
             method:'POST',
             url:'../EPMSxs/phpajx/assignkpi.php',
             data:data,
             headers:{'content-type':'application/json'}
         }).then(function(res){
             //$scope.allkpis = res.data;
             //alert(JSON.stringify($scope.data));
              toastr.success('Successfuly assigned KPIs');
         },function(res){

         })

   }

   

   $scope.getTotal = function(){
     var total = 0;
     angular.forEach($scope.allkpis,function(value)
     {
       var a = Number(value.weight || 0);
       //$scope.weight.push(a);
       total= total+a;

     });
     return total;

   }
   
});

   
