$(document).ready(function(){
	$.ajax({
 		url: "../PMS_corephp/phpajx/bubbleKPI.php",
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
     //alert(JSON.stringify(finalRating));
		var ctx = $("#myBubble");
		var data1 ={
				labels:["KPI1","KPI2","KPI3"],
				datasets : [{
					// label : "Review_Rating ",
					data: [{
      x: 100,
      y: 0,
      r: 10
    }, {
      x: 60,
      y: 30,
      r: 20
    }, {
      x: 40,
      y: 60,
      r: 25
    }, {
      x: 80,
      y: 80,
      r: 50
    }, {
      x: 20,
      y: 30,
      r: 25
    }, {
      x: 0,
      y: 100,
      r: 5
    }],
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
            radius:500,  
              hoverRadius: 1
              
				}]
		};
		
		
		var chart1 = new Chart(ctx,{
			type: "bubble",
			data: data1,
			options: {
				legend:false,
        scales: {
            xAxes: [{
                ticks: {
                    display: false,
                    beginAtZero:true
                },
                gridLines: {
                    display: true,
                }
            }],
            yAxes: [{

                ticks: {
                    display: false,
                    beginAtZero:true
                },
                gridLines: {
                    display: true,
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