dashboard.controller('WasController', function($scope, $http) 
{

        $scope.contextClass = 'progress-bar progress-bar-info progress-bar-striped active';{}



        $http({
        method: 'GET',
        url: '../PMS_corephp/phpajx/reports.php'
         }).then(function successCallback(response) 
         {
              
        $scope.logRep = response.data;

        var dat1 = response.data[0].self_rating;
        var dat2 = response.data[1].self_rating;
        var dat3 = response.data[2].self_rating;
        /*var dat4 = response.data[3].self_rating;
        var dat4 = response.data[4].self_rating;
        var dat6 = response.data[5].self_rating;
        var dat7 = response.data[6].self_rating;
        var dat8 = response.data[7].self_rating;
        var dat9 = response.data[8].self_rating;
        var dat10 = response.data[9].self_rating;*/
        var cD = response.data.length;
        /*alert(cD);*/
       // $scope.mCP = ['contextClass1','contextClass2','contextClass3','contextClass4','contextClass5','contextClass6'];
        var mPA = ['progress-bar progress-bar-danger progress-bar-striped active','progress-bar progress-bar-warning progress-bar-striped active','progress-bar progress-bar-success progress-bar-striped active','progress-bar progress-bar-primary progress-bar-striped active'];
       /* alert(mPA.length);*/
        if(cD > 0){
                
        
                for (var i = 0; i < cD; i++) {
                    
                   
                    
                    /*if(dat1 < 1.5){
                $scope.contextClass0 = 'progress-bar progress-bar-danger progress-bar-striped active';
        }else if(dat1 > 1.5  && dat1 < 2.5){
                $scope.contextClass0 = 'progress-bar progress-bar-warning progress-bar-striped active';
        }else if(dat1 > 2.5 && dat1 < 3.5){
                $scope.contextClass0 = 'progress-bar progress-bar-primary progress-bar-striped active';
        }else if(dat1 > 3.5){
                $scope.contextClass0 = 'progress-bar progress-bar-success progress-bar-striped active';
        }else{
                $scope.contextClass0 = 'progress-bar progress-bar-info progress-bar-striped active';
        }

        if(dat2 < 1.5){
                $scope.contextClass1 = 'progress-bar progress-bar-danger progress-bar-striped active';
        }else if(dat2 > 1.5  && dat2 < 2.5){
                $scope.contextClass1 = 'progress-bar progress-bar-warning progress-bar-striped active';
        }else if(dat2 > 2.5 && dat2 < 3.5){
                $scope.contextClass1 = 'progress-bar progress-bar-primary progress-bar-striped active';
        }else if(dat2 > 3.5){
                $scope.contextClass1 = 'progress-bar progress-bar-success progress-bar-striped active';
        }else{
                $scope.contextClass1 = 'progress-bar progress-bar-info progress-bar-striped active';
        }

        if(dat3 < 1.5){
                $scope.contextClass2 = 'progress-bar progress-bar-danger progress-bar-striped active';
        }else if(dat3 > 1.5  && dat3 < 2.5){
                $scope.contextClass2 = 'progress-bar progress-bar-warning progress-bar-striped active';
        }else if(dat3 > 2.5 && dat3 < 3.5){
                $scope.contextClass2 = 'progress-bar progress-bar-primary progress-bar-striped active';
        }else if(dat3 > 3.5){
                $scope.contextClass2 = 'progress-bar progress-bar-success progress-bar-striped active';
        }else{
                $scope.contextClass2 = 'progress-bar progress-bar-info progress-bar-striped active';
        }*/
                }
        //alert(anArray);
               /* $scope.myContext = anArray;
                alert(anArray[0]);*/
        }
        
        



         }, 
         function errorCallback(response) 
         {});
});