$( document ).ready(function() 
{
    $("#btn").click(
    function()
    {
        var d = $('#datepicker').val();
        var day = d.substr(0,2);
        var m = d.substr(3,2);
        var y = d.substr(6,4);
        var datePick = y+'-'+day+'-'+m;
        console.log(datePick);
        $.ajax(
        {
            type: 'get',
            url: 'getDate/'+datePick,
            data: {date:d},
            dataType: 'json',
            success: function (response)
            {   
                console.log(response);            
                var dataGr = 
                {
                    labels: response.labels,
                    datasets: response.datasets 
                };
                var options = { };
                var ctx = document.getElementById("myChart").getContext("2d");                
                var lineChart = new Chart(ctx).Line(dataGr, options);
                document.getElementById('js-legend').innerHTML = lineChart.generateLegend();          
                                   
            }
        });
        return false;
    });
});
 




   
