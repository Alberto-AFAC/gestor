// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		

		  var nameregex = /^[A-Z0-9_\.\-\+\*\/,a-z,ñ,Ñ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
	
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#Dtall").validate({
					
		  rules:
		  {
				gstNombr: {
				required: true,
				validname: true,
				minlength: 5
				},
				gstNmpld: {
				required: true,
				validnumer: true,
				minlength: 7
				},
		   },
		   messages:
		   {

				gstNombr: {
					required: "Favor de ingresar usuario",
					validname: "Utilice formato solicitado",
					minlength: "Su usuario es demasiado corto"
					  },
				gstNmpld:{
					required: "Favor de ingresar su número",
					validnumer: "Utilice formato solicitado",
					minlength: "Su número es demasiado corto"
					},

		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   

		   
		   }); 
		   
		   
		
});

