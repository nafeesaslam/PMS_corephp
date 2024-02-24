var dashboard = angular.module('epms', ['ui.router', 'ngRoute','ngAnimate','rzModule', 'toastr','ngFileUpload', 'ngImgCrop']);
dashboard.config(function($stateProvider, $urlRouterProvider, toastrConfig) 
{
    angular.extend(toastrConfig, {
    autoDismiss: true,
    containerId: 'toast-container',
    progressBar:true,
    maxOpened: 4,    
    newestOnTop: true,
    positionClass: 'toast-top-right',
    preventDuplicates: false,
    preventOpenDuplicates: false,
    target: 'body'
  });
        $urlRouterProvider.otherwise('/dashboard');
        $stateProvider        
        // HOME STATES AND NESTED VIEWS ========================================
       /* .state('login', {
            url: '/login',
            templateUrl: 'Login.php'
        })*/
        .state('dashboard', {
            url: '/dashboard',
            templateUrl: './views/dashboard.html'
        })
        .state('admin', {
            url: '/admin',
            templateUrl: './views/admin.html'
        })
        .state('kpimaster', {
            url: '/kpis',
            templateUrl: './views/kpimasters.html'
        })
        .state('department', {
            url: '/department',
            templateUrl: './views/department.html'
        })
 			.state('designation', {
            url: '/designation',
            templateUrl: './views/designation.html'
        })
        .state('employees', {
            url: '/employees',
            templateUrl: './views/employees.html'
        })        
        // nested list with custom controller
         .state('form', {
            url: '/form',
            templateUrl: './newEmp/form.html',
            controller: 'formController'
        })
        
        // nested states 
        // each of these sections will have their own view
        // url will be nested (/form/profile)
        .state('form.profile', {
            url: '/profile',
            templateUrl: './newEmp/form-profile.html'
        })
        
        // url will be /form/interests
        .state('form.interests', {
            url: '/interests',
            templateUrl: './newEmp/form-interests.html'
        })

        .state('form.employement', {
            url: '/employement',
            templateUrl: './newEmp/form-employement.html'
        })

        .state('form.upload', {
            url: '/Image-upload',
            templateUrl: './newEmp/form-upload.html'
        })
        
        // url will be /form/payment
        .state('form.payment', {
            url: '/payment',
            templateUrl: './newEmp/form-payment.html'
        });
        
        // nested list with just some random string data
        
        // ABOUT PAGE AND MULTIPLE NAMED VIEWS =================================
             
});

/*dashboard.controller('formController', function($scope,$http,$timeout,toastr,UploadService) {*/
    
  
    

    //Image Upload

    dashboard.controller('formController', function($scope,$location, fileReader,$http,$timeout,toastr) {
    $scope.formData = {};
    $scope.demo = 'images/profile.jpg';
    // function to process the form
    $scope.processForm = function() {
        var data=$scope.formData;
        //alert(JSON.stringify(data));
        $http({
            method:'POST',
            url:'/PMS_corephp/phpajx/addEmp.php',
            data:data,
            headers:{'content-type':'application/json'}
        }).then(function success(res){
            toastr.success('Added Succesfully !');
            $location.path('employees');
        },function error(res){
            toastr.warning('Something went wrong!');
        })  
    };
$scope.loadDepartment=function(){
          method:'GET',
           $http({
           url:'/PMS_corephp/phpajx/getDepartment.php'
        }).then(function(res){
            $scope.alldeps = res.data;
            //alert(JSON.stringify($scope.data));
           
        },function(res){

        })
    }
$scope.loadDesignation=function(){
          method:'GET',
           $http({
           url:'/PMS_corephp/phpajx/designationlist.php'
        }).then(function(res){
            $scope.alldes = res.data;
            //alert(JSON.stringify($scope.data));
           
        },function(res){

        })
    }
 $scope.loadBlood=function(){
          method:'GET',
           $http({
           url:'/PMS_corephp/phpajx/getBlood.php'
        }).then(function(res){
            $scope.allblds = res.data;
            //alert(JSON.stringify($scope.data));
           
        },function(res){

        })
    }
    $scope.Login=function(){
        

        var data=$scope.formData;
        //console.log(JSON.stringify(data));
        $http({
            method:'POST',
            url:'/PMS_corephp/phpajx/addLogin.php',
            data:data,
            headers:{'content-type':'application/json'}
        }).then(function success(response){
            //console.log(response.data);
        },function error(response){
            //console.log(response.data);
        });
    }
    $scope.imageSrc = "";
    
    $scope.$on("fileProgress", function(e, progress) {
      $scope.progress = progress.loaded / progress.total;
    });
  });




  dashboard.directive("ngFileSelect", function(fileReader, $timeout) {
    return {
      scope: {
        ngModel: '='
      },
      link: function($scope, el) {
        function getFile(file) {
          fileReader.readAsDataUrl(file, $scope)
            .then(function(result) {
              $timeout(function() {
                $scope.ngModel = result;
              });
            });
        }

        el.bind("change", function(e) {
          var file = (e.srcElement || e.target).files[0];
          getFile(file);
        });
      }
    };
  });

dashboard.factory("fileReader", function($q, $log) {
  var onLoad = function(reader, deferred, scope) {
    return function() {
      scope.$apply(function() {
        deferred.resolve(reader.result);
      });
    };
  };

  var onError = function(reader, deferred, scope) {
    return function() {
      scope.$apply(function() {
        deferred.reject(reader.result);
      });
    };
  };

  var onProgress = function(reader, scope) {
    return function(event) {
      scope.$broadcast("fileProgress", {
        total: event.total,
        loaded: event.loaded
      });
    };
  };

  var getReader = function(deferred, scope) {
    var reader = new FileReader();
    reader.onload = onLoad(reader, deferred, scope);
    reader.onerror = onError(reader, deferred, scope);
    reader.onprogress = onProgress(reader, scope);
    return reader;
  };

  var readAsDataURL = function(file, scope) {
    var deferred = $q.defer();

    var reader = getReader(deferred, scope);
    reader.readAsDataURL(file);

    return deferred.promise;
  };

  return {
    readAsDataUrl: readAsDataURL
  };
    // we will store all of our form data in this object
   
});



