$("#add").submit(function()
    {
        var date = $('#datepicker').val();
        
            $.ajax(
            {
                type: 'POST',
                url: 'getDataTime/'+ date,
                success: function(data) 
                {
                   //console.log(data);
                },
            });     
                  
    })
function displayLineChart() 
    {
       $.ajax(
        {
            type: 'GET',
            url: 'getDataTime',
            dataType: 'json',
            success: function (data)
            {   
            
                            var dataGr = 
                            {
                                labels: data.labels,
                                datasets: data.datasets 
                            };
                            

                            
                            
                            var options = { };
                            var ctx = document.getElementById("myChart").getContext("2d");                
                            var lineChart = new Chart(ctx).Line(dataGr, options);
                            document.getElementById('js-legend').innerHTML = lineChart.generateLegend();          
            }
            
        });
    }




   
