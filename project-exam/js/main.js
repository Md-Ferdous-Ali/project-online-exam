$(function(){
	//for user registration
	$('#regsubmit').click(function(){
		var name     = $('#name').val();
		var username = $('#username').val();
		var password = $('#password').val();
		var email    = $('#email').val();

		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
		$.ajax({
			type: 'POST',
			url:'getregister.php',
			data:dataString,
			success:function(data){
				$('#state').html(data);

			}
		});
		return false;
	});

	//for user login
	$('#loginsubmit').click(function(){
		var email    = $('#email').val();
		var password = $('#password').val();

		var dataString = 'email='+email+'&password='+password;
		$.ajax({
			type: 'POST',
			url:'getlogin.php',
			data:dataString,
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){ $(".empty").fadeOut(3000);}, 4000);
					//$(".error").hide();->need not because style="display:none" is given in index.php
					//$(".disable").hide();->need not because style="display:none" is given in index.php
				}else if($.trim(data) == "disable") {
					$(".disable").show();
					setTimeout(function(){ $(".disable").fadeOut(3000);}, 4000);
					//$(".empty").hide();->need not because style="display:none" is given in index.php
					//$(".error").hide();->need not because style="display:none" is given in index.php
				}else if($.trim(data) == "error") {
					$(".error").show();
					setTimeout(function(){ $(".error").fadeOut(3000);}, 4000);
					//$(".empty").hide();->need not because style="display:none" is given in index.php
					//$(".disable").hide();->need not because style="display:none" is given in index.php
				}else{
					window.location = "exam.php";
				}
			}
		});
		return false;
	}); 
}); //end document function 