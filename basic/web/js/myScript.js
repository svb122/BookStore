$( document ).ready(function() {
    $('.action').click(function() {
        $("#adminModal").find('.modal-body').empty();
        var id = $(this).parents("tr").attr('id');
        var url = $(this).attr('href');
    
        $.post( url, function(data) {
            if(data) $("#adminModal").find('.modal-body').append(data);
			
            $("#adminModal").find('.cancel').on('click', function(){
                $("#adminModal").modal('hide');
            });
            $("#adminModal").modal('show');
        });
	
    });
	
    $('.changepassword').click(function() {
        $("#adminModal").find('.modal-body').empty();
        var id = $(this).parents("tr").attr('id');
        var url = $(this).attr('href');
    
        $.post( url, function(data) {
            if(data) $("#adminModal").find('.modal-body').append(data);
			
            $("#adminModal").find('.cancel').on('click', function(){
                $("#adminModal").modal('hide');
            });
            $("#adminModal").modal('show');
        });
	
    });
	
    $('.details').click(function() {
        $("#detailsModal").find('.modal-body').empty();
        var url = $(this).attr('href');
    
        $.post( url, function(data) {
            if(data) $("#detailsModal").find('.modal-body').append(data);
            $("#detailsModal").modal('show');
        });
	
    });
	
    $('#adminModal').on('hidde.bs.modal', function (e) {
        $("#adminModal").find('.cancel').unbind('click');
    });
	
});