var UserManager = {

	chkLogin:function(){
		$("#login_frm").validate({	
		rules: {
			username: "required",
			password: "required"
	},
			submitHandler: function(form) {
				var username = $("#username").val();
				var password = $("#password").val();

				// Call ajax user login function
				UserManager.doAjaxLogin(username, password);
			}
		
		});
		
	},
	
	doAjaxLogin : function(username, password) {

			var params = "username="+username+"&password="+password;
			var handlerUrl = base_url+"common/check_login";
			$.post(handlerUrl, params, function(data) 
			{
				if (data == true) {
					window.location.href = base_url+'';
				}
				else {
					var errorMsg = '<label class="errorLabel" for="email">Incorrect Email or Password.</label>';
					$("#error").html(errorMsg);
				}

			});
	},
	
	changePassword:function(){
		$("#chng_pwd").validate({	
		rules: {
					old_password: "required",
					password: "required",
					confirm_password:"required",
					 confirm_password: {
					equalTo: "#password"
					}
				},
				
			submitHandler: function(form) {
				var old_password = $("#old_password").val();
				var password = $("#password").val();
				// Call ajax user login function
				UserManager.doAjaxPasswordCheck(old_password,password);
			}
		
		});
		
	},
	
	doAjaxPasswordCheck : function(old_password,password) {
	
	
			 $.ajax({
					  type: "POST",
					  url: base_url+"common/change_password_handler",
					  data: "old_password="+old_password+"&password="+password,
					  async: false,
				  success: function(msg)
				  { 
					//alert(msg);

					  if (msg == 0) {
					  $(".alert_success").show();
					$(".alert_success").html("Old Password is Incorrect.");
					  $("#old_password").val("");
					  $("#password").val("");
					  $("#confirm_password").val("");
					  $("#old_password").focus();
								
							}
							else if (msg == 1) {
					  $(".alert_success").show();
								$(".alert_success").html("Password has been changed.");
					  $("#old_password").val("");
					  $("#password").val("");
					  $("#confirm_password").val("");
					  $("#old_password").focus();
					  
								
							}
							else if (msg == 3) {
					  $(".alert_success").show();
								$(".alert_success").html("Error changing password. Please try later.");
					  $("#old_password").val("");
					  $("#password").val("");
					  $("#confirm_password").val("");
					  $("#old_password").focus();
				 }

						  
					  },
					  error: function(jqXHR, textStatus, errorThrown)
					  {
						  //alert(errorThrown);
						  alert("Error occured. Please try again later.");
					  }
				   });
			
	},	
	
	editAdminProfile:function(){
		$("#personal_info").validate({	
		rules: {
			admin_name: "required",
			admin_email: {required: true, email: true}
			}
		
		});
		
	},
	saveNewsletter:function(){
		$("#newsletter_subs").validate({	
		rules: {
			newsletter_title: {required: true},
			newsletter_desc: {required: true},
			},
		
		});
		
	},
	editNewsletter:function(){
		$("#newsletter_subs").validate({	
		rules: {
			newsletter_title: {required: true},
			newsletter_desc: {required: true},
			},
			
		
		});
		
	},
	
	
	
	
	
}

function delete_news(id)
{
		var ret=confirm("Are you sure to delete  record.");
        if(!ret){return false;}
			
			var params = "newsletter_id="+id;
			var handlerUrl = base_url+"common/delete_news";
			$.post(handlerUrl, params, function(data) 
			{
        //alert(data);
				if (data) {
					alert("Deleted Sucessfully");
				location.href=location.href; 
				}
				else {
					alert('Error Occurred.');
				}

			});
}

function delete_address_book(id)
{
		var ret=confirm("Are you sure to delete  record.");
        if(!ret){return false;}
			
			var params = "address_book_id="+id;
			var handlerUrl = base_url+"common/delete_address_book";
			$.post(handlerUrl, params, function(data) 
			{
        //alert(data);
				if (data) {
					alert("Deleted Sucessfully");
				location.href=location.href; 
				}
				else {
					alert('Error Occurred.');
				}

			});
}














function changeStatus(table, column, value, uniqueNameCol, uniqueColValue)
{
	//alert(value);
	
	$.ajax({
		type: "POST",
		url: base_url+"common/change_status",
		data: "table="+table+"&column="+column+"&value="+value+"&uniqueNameCol="+uniqueNameCol+"&uniqueColValue="+uniqueColValue,
		async: true,
        success: function(msg)
        { //alert(msg);
			window.location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			//alert(errorThrown);
			alert("Error occured. Please try again later.");
		}
	 });	
	
}

function logout()
{

	var params = "logout="+true;
	var handlerUrl = base_url+"common/logout";
	$.post(handlerUrl, params, function(data) 
			{
				window.location.reload();

			});
}

/**
 * Function to check multiple records
 *
*/
function checkall()
{
	var is_check=document.getElementById('main_checkbox').checked;
	var s=document.getElementsByName("child_checkbox");
	if(is_check==true)
	{	
		var value = '';
		var count = 0;
		for(var i=0;i<s.length;i++)
		{
			s[i].checked=true;
		}
	}
	else
	{
		for(var i=0;i<s.length;i++)
		{
			s[i].checked=false;
		}				
	}
}
