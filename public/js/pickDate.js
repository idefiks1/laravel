$(document).ready(function() { 
    
    $("#add").submit(function()
    {
        var headline = $('#headline').val();
        var textComment = $('#textComment').val();
        console.log(headline, textComment);
            $.ajax(
            {
                type: 'POST',
                url: 'getDate',
                data:{headline:$('#headline').val(), textComment:$('#textComment').val()},
                success: function(data) 
                {
                   
                },
            });     
                  
    })
});



   
