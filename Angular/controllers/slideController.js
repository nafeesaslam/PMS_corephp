dashboard.controller('slideCtrl', function($scope,$http,toastr) {
	// body...


//$scope.Remarks = {};
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
					        var one = 1;
           		$scope.slider = {
    							value:one,
    							options: {
					    		floor:1,
					    		ceil:5,
					    		step:0.25,
					    		precision:2,
					        	showSelectionBar: false,
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
    		toastr.success(res.data);
   
    		          
    	},function error(res){
    		toastr.error('failure' + res.code);
    	})
    }
  

});