$(document).ready(function(){
	$("#btnLogin").click(function(){
		$.ajax({
			data: {
				"userName": $("#userName").val(),
				"userPassword": $("#userPassword").val()
			},
	    	url:  'grids.php',
	        type: 'POST',
	        success:  function (response) {
	        	if(response!="ok"){
					$("#spanError").html(response);
				}else{
					window.location.href="grids.php";
				}

	        }
	    });

	});
});

