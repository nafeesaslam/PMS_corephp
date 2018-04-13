$(document).ready(function(){
	$.ajax({
 		url: "../EPMSxs/phpajx/chart2KPI.php",
 		type: "POST",
		success: function(data){
         
         var finalRating = [];	
         var finalLab = [];
          /*};*/
          var len= data.length;
for (var i=0;i<len;i++) {
    var finLab = data[i].financial_year + '_' + data[i].half_year;
	var finRate = data[i].scr;
	//alert(finRate);
    //alert(finLab);
	finalRating.push(finRate);
    finalLab.push(finLab);
} 
     
		var ctx = $("#myChart");
		var data1 ={
				labels:finalLab,
				datasets : [{
					label : "Weighted Average Score ",
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
			type: "horizontalBar",
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