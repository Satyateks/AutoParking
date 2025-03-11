$(document).ready(function(){



	$('input').on('keyup',function(){
		//alert('ok');

		otp_send_now2();


	});



	$('input').on('keyup',function(){
		//alert('ok');
		$('.btn_login_otp_for_phone').removeAttr('disabled');


	});


});




function otp_send_now2(){
		$('.otp_container').hide();

		var phone=$('input').val();


		var count_digit=phone.length;
		//alert(count_digit);

		if(count_digit!=10){
			show_error('Please enter 10 digit phone number !');
 			return false;
		}


		if(phone==''){
			show_error('Phone number is required !');
			return false;
		}


		 $('.otp_sent_phone_no').html(phone);
 		 $('.otp_container').show();

		$('.otp_sent_msg2').html('');




  		var str='phone='+phone;

		//$('.content').html(str);


		$.ajax({
			url:url+'/ajax/ajax_otp_send_for_login',
			type:'GET',
			data:str,
			success:function(output){
						var status=output.status;
						var message=output.message;

						$('.phone-invalid-feedback').fadeOut();

						//check is already varified
						if(status==1){
							//
							$('.otp_sent_msg2').html('<div class="alert alert-success">'+message+'</div>').fadeIn('slow');

						}else{
 							show_error('Some error sending OTP !')
						 }

					}

		});


		return true;



	}

	function btn_login_with_phone(){
		var otp=$("input" ).val();

		var phone=$( "input" ).val();
		 check_otp_for_login_with_phone(phone,otp);
		 return false;

	}





	function check_otp_for_login_with_phone(phone,otp){

	var str='phone='+phone+'&otp='+otp;
	$.ajax({
			url:url+'/ajax/check_otp_for_login_with_phone',
			type:'GET',
			data:str,
			success:function(output){
						var status=output.status;
						var message=output.message;

						if(status==1){
						 $('.otp_sent_msg2').html('<div class="alert alert-success">'+message+'</div>').fadeIn('slow');
 						   $('.btn_login_otp_for_phone').prop('disabled',false);

 							//jump to final next step
							setTimeout(function(){
								window.location.href = url;
							},1000);




						 }else{
						 	$('.otp_sent_msg2').html('<div class="alert alert-danger">'+message+'</div>').fadeIn('slow');
 							  $('.btn_login_otp_for_phone').prop('disabled',false);

						 }

					}

		});
	}




function show_error(msg){

	$('.error_message').html(msg).show();

}
