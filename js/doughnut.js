$(document).ready(function(){
	$.ajax({
 		url: "../PMS_corephp/phpajx/doughnutKPI.php",
 		type: "POST",
		success: function(data){
         
         var finalRating = [];	
          /*};*/
          var len= data.length;
for (var i=0;i<len;i++) {
	var finRate = data[i].reviewer_rating;
	//alert(finRate);
	finalRating.push(finRate);
} 
     
		var ctx = $("#myDon");
		var data1 ={
				labels:["KPI1","KPI2","KPI3"],
				datasets : [{
					label : "Review_Rating ",
					data: finalRating,
					backgroundColor: [
				'rgba(255,0,0,0.5)',
                'rgba(0,255,0,0.5)',
                'rgba(0,0,255,0.5)',
                'rgba(255,0,0,0.5)',
                'rgba(0,255,0,0.5)',
                'rgba(0,0,255,0.5)'
					],
					borderColor: [
                'rgba(255,0,0,0.5)',
                'rgba(0,255,0,0.5)',
                'rgba(0,0,255,0.5)',
                'rgba(255,0,0,0.5)',
                'rgba(0,255,0,0.5)',
                'rgba(0,0,255,0.5)'
            ],
            borderWidth: 1
				}]
		};
		
		
		var chart1 = new Chart(ctx,{
			type: "doughnut",
			data: data1,
			options: {
				legend:false,
        scales: {
            xAxes: [{
               display: false
            }],
            yAxes: [{

              
              display:false
            }]
        }
    }
		})
		},
		error : function(data){

		}

	
	
});
}) 