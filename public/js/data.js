$( document ).ready(function() 
{
/*	$('#example').DataTable( 
                {
        			"data": 'http://laravel.loc/data/6/offline'
    				} ); 

*/

	$("#submit").click(
    function()
    {
/*    	var d = $('#datepicker').val();
        var day = d.substr(0,2);
        var m = d.substr(3,2);
        var y = d.substr(6,4);
        var datePick = y+'-'+day+'-'+m;
        
    	var name = document.getElementById('name');
    	var id = name.value;

    	var status = document.getElementById('status');
    	var statusTake = status.value;

    	var version = document.getElementById('version');
    	var versionTake = version.value;


        console.log(id);
        console.log(datePick);
        console.log(statusTake);
        console.log(versionTake);*/

                $('#example').DataTable(     {    			"ajax": 'http://laravel.loc/data/6/offline'
    				} );    
/*        $.ajax(
        {
            type: 'GET',
            url: 'data/'+id+'/'+statusTake,
            data: {id:id, statusTake: statusTake},
            dataType: 'json',
            success: function (response)
            {
            	console.log(response);
                             
            }
        });*/
       // return false;
    });
});