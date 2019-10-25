$(document).ready(function(){
	
	$(document).on('submit', '#bs_login_form', function(e){
		//prevent default submition
		e.preventDefault();
		var fdata = $(this).serializeArray();

		$.ajax({
			method: 'POST',
            url: 'server/request/login.request.php',
            data: fdata,
            cache: false,
            dataType: 'JSON',
            beforeSend: function(){
                //show form processing is in progress
				$(document).find('.bs_login_btn').prop('disabled', true);
				$(document).find('.bs_login_btn').css({cursor: 'progress'});
				$(document).find('.bs_load_progress').text('Processing form...');
				bs_alerter('Please Wait...');
			},
			success: function(response){
				//reset button 
				$(document).find('.bs_login_btn').prop('disabled', false);
				$(document).find('.bs_login_btn').css({cursor: 'pointer'});
				if(response.error !== undefined)
				{
					$(document).find('.bs_load_progress').html('<span class="text-danger">'+response.error+'</span>');
				}
				else
				{
					$(document).find('.bs_load_progress').html('<span class="text-success">'+response.success+'</span>');
					//for debug purpose
					$(document).find('.bs_login_btn').prop('disabled', false);
					$(document).find('.bs_login_btn').css({cursor: 'pointer'});
				}
			},
			error: function(){
				$(document).find('.bs_load_progress').html('<span class="text-danger">Sorry can\'t log you in right now #Error Processing Server Request.</span>');
			}
		});
		
		
	});
	function bs_alerter(msg){
		//show alert box and append message inside.		
		$(document).find('.bs_alert_msg').html(msg);
		$(document).find('.bs_alert').animate({top: '10%'}).delay(3000).animate({top: '-10%'});
		
	}
	
	
});