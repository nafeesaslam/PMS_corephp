dashboard.controller('dashboardController', function($scope, $http,toastr) 
{       
        $scope.demo='images/profile.jpg';
         $scope.myIcCollapse1 = 'fa fa-angle-down';
         $scope.myIcCollapse2 = 'fa fa-angle-down';
         $scope.myIcCollapse3= 'fa fa-angle-down';
         $scope.myIcCollapse4='fa fa-angle-down';
         $scope.transformation1 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
        $scope.transformation2 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
        $scope.transformation3 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
        $scope.transformation4 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
       $scope.trans1 = function(){
            if($scope.transformation1 == '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all'){
                $scope.transformation1 = '-webkit-transform: rotate(180deg);-webkit-transition: 300ms ease all';
                            }else{
                                $scope.transformation1 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
                            }}
                             $scope.trans2 = function(){
            if($scope.transformation2 == '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all'){
                $scope.transformation2 = '-webkit-transform: rotate(180deg);-webkit-transition: 300ms ease all';
                            }else{
                                $scope.transformation2 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
                            }}
        
        $scope.trans3 = function(){
            if($scope.transformation3 == '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all'){
                $scope.transformation3 = '-webkit-transform: rotate(180deg);-webkit-transition: 300ms ease all';
                            }else{
                                $scope.transformation3 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
                            }}
                            $scope.trans4 = function(){
            if($scope.transformation4 == '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all'){
                $scope.transformation4 = '-webkit-transform: rotate(180deg);-webkit-transition: 300ms ease all';
                            }else{
                                $scope.transformation4 = '-webkit-transform: rotate(0deg);-webkit-transition: 300ms ease all';
                            }}

        $scope.contextBackground = '#3D63A0;';        
        $scope.myCol = '#fff';
        //for employee personal details///       


        /*Tag 1*/$http({
        method: 'GET',
        url: '../EPMSxs/phpajx/dashboard.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
        $scope.logEmp = response.data;
        // this callback will be called asynchronously
        // when the response is available
        //console.log($scope.logEmp);
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });


         //for kpi transactional details//

        $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/getkpiDetails.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
        $scope.tranDetails = response.data[0];
        //$scope.repDetails = response.data;
        //console.log($scope.tranDetails);
        // this callback will be called asynchronously
        // when the response is available
        //alert($scope.tranDetails);
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });  

        $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/getSelfRateDetails.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/

        // Context for Self Rating in Overall Performance
       
        var datalen=response.data.length;
        var slf = [];
        var app1=[];
        var app2=[];
        var was = 0;
        var App1was=0;
        var App2was=0;

        /*Loop to get all self rating values into an array slf[1,2,3..]*/
            for (var i = 0; i < datalen; i++) {
                 var t  = Number(response.data[i].Rating /100  || 0);
                 slf.push(t);  
            };      
            //alert(slf);

            /*Loop to calculate WAS*/
            for(var k=0; k < datalen; k++)
            {
            var a = Number(((response.data[k].Weightage) * slf[k])  || 0);
            var was = was + a;
            }
            $scope.WAS = was;
                        
                    
           
            if($scope.WAS < 1.5){
                $scope.contextBackgroundOne = 'maroon';
                 $scope.myColOne = '#fff';
            }else if($scope.WAS > 1.5 && $scope.WAS < 2.5){
                $scope.contextBackgroundOne = 'orange';
            }else if($scope.WAS > 2.5 && $scope.WAS < 3.5){
                $scope.contextBackgroundOne = 'lightblue';
            }else if($scope.WAS >3.5 && $scope.WAS <5){
                $scope.contextBackgroundOne = '#96c96e';
                $scope.myColOne = '#101010';
            }else{
              $scope.contextBackgroundOne = '#00cc7a';
              $scope.myColOne = '#fff';
            }

            //Context for App1 in Overall Performance

            




            var obj = response.data[0];
            $scope.columnSelf =  Object.keys(obj).filter(function(key) {
            if (obj.hasOwnProperty(key) && typeof key == 'string') {
                      return key;
                    }
                });
                      //alert($scope.columns);
                $scope.format = function(str) {
                     return str.replace('_',' '); //do the rest of the formatting here. 
                }
        
                                                                               
        $scope.selfTranDetails = response.data;
      
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
       
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });


        $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/appOneRatingDetails.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
            var datalen=response.data.length;
            var app1=[];
            var App1was=0;
            for (var i = 0; i < datalen; i++) 
            {
             var ap=Number(response.data[i].Rating /100  || 0);
             app1.push(ap);
            };

            /*Loop calc Appraiser1 WAS*/
            for(var k=0; k < datalen; k++)
            {
            var a = Number(((response.data[k].Weightage)*app1[k])  || 0);
            var App1was = App1was + a;
            }
            $scope.App1was = App1was;

           if($scope.App1was < 1.5){
                $scope.contextBackgroundTwo = 'maroon';
                 $scope.myColTwo = '#fff';
            }else if($scope.App1was > 1.5 && $scope.App1was < 2.5){
                $scope.contextBackgroundTwo = 'orange';
            }else if($scope.App1was > 2.5 && $scope.App1was < 3.5){
                $scope.contextBackgroundTwo = 'lightblue';
            }else if($scope.App1was >3.5 && $scope.App1was <5){
                $scope.contextBackgroundTwo = '#96c96e';
                $scope.myColTwo = '#101010';
            }else{
              $scope.contextBackgroundTwo = '#00cc7a';
              $scope.myColTwo = '#fff';
            }

              var obj = response.data[0];
                                $scope.columnAppOne =  Object.keys(obj).filter(function(key) {
                          if (obj.hasOwnProperty(key) && typeof key == 'string') {
                            return key;
                          }
                        });
                        //alert($scope.columns);
                        $scope.format = function(str) {
                            return str.replace('_',' '); //do the rest of the formatting here. 
                        }
                                var chck = response.data;
                                //alert(chck);
               // $scope.kpilist = response.data;
                        
                        var srVal = [];
                        for (var i = 0; i < chck.length; i++) {
                        var t = {value: (Number(response.data[i].Rating || 0))}
                        srVal.push(t);
                         }
         $scope.appOne = response.data;
      
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
        // this callback will be called asynchronously
        // when the response is available
        
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });



        $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/appTwoRatingDetails.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
       
           var datalen=response.data.length;
           var app2=[];
           var App2was=0;
            for (var i = 0; i < datalen; i++) 
            {
             var ap=Number(response.data[i].Rating /100  || 0);
             app2.push(ap);
            };

            /*Loop calc Appraiser1 WAS*/
            for(var k=0; k < datalen; k++)
            {
            var a = Number(((response.data[k].Weightage)*app2[k])  || 0);
            var App2was = App2was + a;
            }
            $scope.App2was = App2was;

           if($scope.App2was < 1.5){
                $scope.contextBackgroundThree = 'maroon';
                 $scope.myColThree = '#fff';
            }else if($scope.App2was > 1.5 && $scope.App2was < 2.5){
                $scope.contextBackgroundThree = 'orange';
            }else if($scope.App2was > 2.5 && $scope.App2was < 3.5){
                $scope.contextBackgroundThree = 'lightblue';
            }else if($scope.App2was >3.5 && $scope.App2was <5){
                $scope.contextBackgroundThree = '#96c96e';
                $scope.myColThree = '#101010';
            }else{
              $scope.contextBackgroundThree = '#00cc7a';
              $scope.myColThree = '#fff';
            }


              var obj = response.data[0];
                          $scope.columnAppTwo =  Object.keys(obj).filter(function(key) {
                          if (obj.hasOwnProperty(key) && typeof key == 'string') {
                            return key;
                          }
                        });
                        //alert($scope.columns);
                        $scope.format = function(str) {
                            return str.replace('_',' '); //do the rest of the formatting here. 
                        }
                                var chck = response.data;
                                //alert(chck);
               // $scope.kpilist = response.data;
                        
                        var srVal = [];
                        for (var i = 0; i < chck.length; i++) {
                        var t = {value: (Number(response.data[i].self_rating || 0))}
                        srVal.push(t);
                         }
         $scope.appTwo = response.data;
      
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
        // this callback will be called asynchronously
        // when the response is available
        
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });



         $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/reviewerRatingDetails.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
       
            var datalen=response.data.length;
            var rwas = [];
            var rWas=0;
            for (var i = 0; i < datalen; i++) 
            {
             var ap=Number(response.data[i].Rating /100  || 0);
             rwas.push(ap);
            };

            /*Loop calc Appraiser1 WAS*/
            for(var k=0; k < datalen; k++)
            {
            var a = Number(((response.data[k].Weightage)*rwas[k])  || 0);
            var rWas = rWas + a;
            }
            $scope.rWas = rWas;

            if($scope.rWas < 1.5){
                $scope.contextBackgroundFour = 'maroon';
                 $scope.myColFour = '#fff';
            }else if($scope.rWas > 1.5 && $scope.rWas < 2.5){
                $scope.contextBackgroundFour = 'orange';
            }else if($scope.rWas > 2.5 && $scope.rWas < 3.5){
                $scope.contextBackgroundFour = 'lightblue';
            }else if($scope.rWas >3.5 && $scope.rWas <5){
                $scope.contextBackgroundFour = '#96c96e';
                $scope.myColFour = '#101010';
            }else{
              $scope.contextBackgroundFour = '#00cc7a';
              $scope.myColFour = '#fff';
            }




                                var obj = response.data[0];
                                $scope.columnReviewer =  Object.keys(obj).filter(function(key) {
                          if (obj.hasOwnProperty(key) && typeof key == 'string') {
                            return key;
                          }
                        });
                        //alert($scope.columns);
                        $scope.format = function(str) {
                            return str.replace('_',' '); //do the rest of the formatting here. 
                        }
                                var chck = response.data;
                                //alert(chck);
               // $scope.kpilist = response.data;
                        
                        var srVal = [];
                        for (var i = 0; i < chck.length; i++) {
                        var t = {value: (Number(response.data[i].self_rating || 0))}
                        srVal.push(t);
                         }
         $scope.reviewer = response.data;
      
        // this callback will be called asynchronously
        // when the response is available
        
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });
         

         $http({
        method: 'GET',
        url: '../EPMSxs/phpajx/recommendApp1.php'
         }).then(function successCallback(response) {
        /*console.log(response.data);*/
       



              /*var obj = response.data[0];
                                $scope.columnReviewer =  Object.keys(obj).filter(function(key) {
                          if (obj.hasOwnProperty(key) && typeof key == 'string') {
                            return key;
                          }
                        });
                        //alert($scope.columns);
                        $scope.format = function(str) {
                            return str.replace('_',' '); //do the rest of the formatting here. 
                        }
                                var chck = response.data;
                                //alert(chck);
               // $scope.kpilist = response.data;
                        
                        var srVal = [];
                        for (var i = 0; i < chck.length; i++) {
                        var t = {value: (Number(response.data[i].self_rating || 0))}
                        srVal.push(t);*/
                    /*     }*/
         $scope.recomAppOne = response.data;
              //  console.log($scope.recomAppOne);
        // this callback will be called asynchronously
        // when the response is available
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
                '3.75':{'background-color':'#5cb85c'},
                '4':{'background-color':'#5cb85c'},
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
        
         }, 
         function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });

         //Slide Controller

         $scope.Ratings = {};
    $http({
        method:'GET',
        url:'/EPMSxs/phpajx/trans.php'
    }).then(function success(response){
            var obj = response.data[0];
                $scope.columns =  Object.keys(obj).filter(function(key) {
              if (obj.hasOwnProperty(key) && typeof key == 'string') {
                return key;
              }
            });
            //alert($scope.columns);
            $scope.format = function(str) {
                return str.replace('_',' '); //do the rest of the formatting here. 
            }
                var chck = response.data;
                //alert(chck);
                $scope.kpilist = response.data;
                
                var srVal = [];
                for (var i = 0; i < chck.length; i++) {
                                        var t = {value: (Number(response.data[i].self_rating || 0))}
                                        srVal.push(t);
                                                      }
                                    //alert(srVal);
                    
                    
                /*}*/

                    /*$scope.printme = function(v) {
                        console.log(v);
                        };*/
 
    /*$scope.sliders.push({value: 3.75, options: {floor: 1, ceil: 5,step:0.25,precision:2,getSelectionBarColor: function(value) {
                                if (value <= 1.75)
                                    return 'red';
                                if (value <= 2.75)
                                    return 'orange';
                                if (value <= 3.75)
                                    return 'lightblue';
                                return '#2AE02A';
                            });*/

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
                
     
    },function error(response){

    });

    
    $scope.SubmitScores = function(){
     
      
        
        var myData = $scope.kpilist;
        console.log(JSON.stringify(myData));
        $http({
            method:"POST",
            url:"/EPMSxs/phpajx/submitScore.php",
            data:myData,
            headers:{'content-type':'application/json'}

        }).then(function success(res){
            toastr.success('Success');
   
                      
        },function error(res){
            toastr.error('failure');
        })
    }
  
  $http({
    method:'GET',
    url:'/EPMSxs/phpajx/getGaps.php'
  }).then(function success(res){

        $scope.listGaps = res.data;
        //console.log($scope.listGaps);
  },function error(res){

  })

});