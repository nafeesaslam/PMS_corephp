$(document).ready(function(){
	$.ajax({
 		url: "../EPMSxs/phpajx/chart1KPI.php",
 		type: "POST",
		success: function(data){
         
         var finalRating = [];	
		 var finalLabs = [];
          /*};*/
          var len= data.length;
for (var i=0;i<len;i++) {
	var finLab = data[i].Kpi_Name;
	var finRate = data[i].reviewer_rating;
	//alert(finRate);
	finalRating.push(finRate);
	finalLabs.push(finLab);
} 
     
		var ctx = $("#myChart1");
		var data1 ={
				labels:finalLabs,
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
			type: "bar",
			data: data1,
			options: {
				legend:false,
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{

                ticks: {
                    beginAtZero:true
                },
                gridLines: {
                    display: false,
                }
            }]
        }
    }
		})
		},
		error : function(data){

		}

	
	
});
}) 