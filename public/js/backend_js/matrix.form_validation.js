
$(document).ready(function(){
	
	// $("#new_pwd").click(function(){

	// 	var current_pwd = $("current_pwd").val();
	// 	$.ajax({
	// 				type:'get',
	// 				url:'/admin/check-pwd',
	// 				data:{current_pwd:current_pwd},
	// 				//data:current_pwd,
	// 				success:function(resp){
	// 					//alert(resp);
	// 					if(resp=="false"){
	// 						$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font> ");
	// 					}else if(resp=="true"){
	// 						$("#chkPwd").html("<font color='green'>Current Password is Correct</font> ");
	// 						}
	// 				},error:function()
	// 				{
	// 					alert('Error');
	// 				}
	// 			});
	// });

	

	// $("#new_pwd").click(function(){
		$(document).on("click", "#new_pwd", function() { 
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			async: true,
			dataType: "json",
			contentType: "application/jsonp; charset=utf-8",
			data:{current_pwd:current_pwd},
			// dataType: 'json',
			
			// success: function(data) {
			// 	if(data == "success")
			// 	  alert('Data saved.');
			//   }

			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").show().html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").show().html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	// Add Category Form Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,			
			},			
			url:{
				required:true,
				// url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	// Edit Category Form Validation
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},			
			url:{
				required:true,
				//url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add Product Form Validation
	$("#add_product").validate({
		rules:{
			category_id:{
				required:true,
			},
			product_name:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			
			price:{
				required:true,
				number:true,
			},
			image:{
				required:true,
			}
			
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//Edit Product Form Validation
	$("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			description:{
				required:true,
				
			},
			
			price:{
				required:true,
				number: true,
			},
			// image:{
			// 	required:true,
			// },
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// $("#delCat").click(function(){
	// 	alert('Click on Ok');
	// 	if(confirm('Are you sure you want delete this Category ?')){
	// 		return true;
	// 	}
	// 	return false;
	// });

	
	// $("#delProduct").click(function(){
	// 	alert('Click on Ok');
	// 	if(confirm('Are you sure, you want to delete this Product?')){
	// 		return true;
	// 	}
	// 	return false;
	// });

	//Delete Category 
	$('.deleteCategory').click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
			swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
				},
			function(){
				window.location.href="/admin/"+ deleteFunction +"/"+id;
			}	
		);
	});

	//Delete Record of indivudually
	$('.deleteRecord').click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
			swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
				},
			function(){
				window.location.href="/admin/"+ deleteFunction +"/"+id;
			}	
		);
	});
	
	//Attributes Added of individually
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper" style="margin-left: 180px;"><div class="add-attributes"><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px; margin-right:3px; margin-top:4px;"/><input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px; margin-right:3px; margin-top:4px;"/><input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px; margin-right:3px; margin-top:4px;"/><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px; margin-right:3px; margin-top:4px;"/><a href="javascript:void(0);" class="remove_button"><img src="/images/backend_images/remove.png" /></a></div></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});

	//Attributes Validation
	// $("#add_attributes").validate({
	// 	rules:{
	// 		sku:{
	// 			required:true
	// 		},
	// 		size:{
	// 			required:true,
				
	// 		},
			
	// 		price:{
	// 			required:true,
				
	// 		},
	// 		stock:{
	// 			required:true,
	// 		}
	// 	},
	// 	errorClass: "help-inline",
	// 	errorElement: "span",
	// 	highlight:function(element, errorClass, validClass) {
	// 		$(element).parents('.control-group').addClass('error');
	// 	},
	// 	unhighlight: function(element, errorClass, validClass) {
	// 		$(element).parents('.control-group').removeClass('error');
	// 		$(element).parents('.control-group').addClass('success');
	// 	}
	// });

	//Delete Attribute
	$('.deleteAttribute').click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
			swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
				},
			function(){
				window.location.href="/admin/"+ deleteFunction +"/"+id;
			}	
		);
	});

});
