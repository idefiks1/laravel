$( document ).ready(function() 
{
	
	$('#example').DataTable(     { "ajax": 'data/'
    				} );
    
    $("#clear").click(
    function()
        {
            $('#example').DataTable().destroy();
            $('#example').DataTable(     { "ajax": 'data/'
                    } );
        });



	$("#submit").click(

    function()
    {
    	var dataTable = $('#example').DataTable();

    	var d = $('#datepicker').val();
        var day = d.substr(0,2);
        var m = d.substr(3,2);
        var y = d.substr(6,4);
        var datePick = y+'-'+day+'-'+m;
        
    	var name = document.getElementById('name');
    	var id = name.value;

    	//var status = document.getElementById('status');
    	//var statusTake = status.value;

    	var version = document.getElementById('version');
    	var versionTake = version.value;


        console.log(id);
        console.log(datePick);
        //console.log(statusTake);
        console.log(versionTake);

               
        $.ajax(
        {
            type: 'GET',
            url: 'data/'+id+'/'+datePick + '/' + versionTake,
            data: {id:id, datePick:datePick, versionTake:versionTake},
            dataType: 'json',
            success: function (response)
            {
            	
            	dataTable.destroy();           	
            	$('#example').DataTable(     { "ajax": 'data/'+id+'/'+datePick +'/'+ versionTake
    				} );    
                             
            }
        });
        //return false;
    });
});