var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
               
                rules: {
                    p_registration: {
                        maxlength: 5,
                        required: true,
                        number: true
                    },
                    p_insurance: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    p_processing: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    p_finance_commission: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    p_interest: {
                        required: true,
                        maxlength: 5,
                        number: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    // success1.show();
                    // error1.hide();
                    private_settings(form);                   
                }
            });


    }


    var handleValidation2 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_2');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                    c_registration: {
                        maxlength: 5,
                        required: true,
                        number: true
                    },
                    c_insurance: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    c_processing: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    c_finance_commission: {
                        required: true,
                        maxlength: 5,
                        number: true
                    },
                    c_interest: {
                        required: true,
                        maxlength:5,
                        number: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    commercial_settings(form);
                }
            });


    }


//end settings

var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_profile');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                    username: {
                        maxlength: 10,
                        required: true
                       
                    },
                    name: {
                        required: true,
                        maxlength: 50                       
                    },
                    email: {
                        required: true,                       
                        email: true
                    },
                    phone: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        number: true
                    },
                    address: {
                        required: true
                                          
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                   /*starts ajax*/
                     var formdata = $(form).serialize();
                         $.ajax({
                          type: "POST",
                          url: "process/user_profile_process.php",
                          data: formdata,
                          success: function(msg){
                               
                                toastr["success"](msg, "Settings");
                          },
                          error: function(XMLHttpRequest, textStatus, errorThrown) {
                             alert("Error Occur");
                          }
                        });

                    /*ends ajax*/
                }
            });


    }


/*profile pic*/
var handleValidation4 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_profile_pic');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                    profile_pic: {                       
                        required: true
                        }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                   /*starts ajax*/
                    data = new FormData();
                    data.append('pic', $('#pic')[0].files[0]);

                        $.ajax({
                            url: "process/user_profile_pic_ajax.php",    
                            type: "POST",                   
                            data: data,      
                            contentType: false,             
                            cache: false,                  
                            processData:false,              
                            success: function(data)         
                            {
                                toastr["success"]("Profile Pic Uploaded", "Settings");                                 
                                $("#profile_pic").attr('src',data);

                            }, 
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                             alert("Error Occur");
                                          }          
                       });  
                     /*ends ajax*/
                         
                }
            });


    }


/*password change*/

var handleValidation5 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#profile_password');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                    old_password: {
                        maxlength: 16,
                        minlength: 4,
                        required: true                        
                    },
                    new_password: {
                        required: true,
                        minlength: 4,
                        maxlength: 16   
                    },
                    repeat_password: {
                        required: true,
                        maxlength: 16,
                        minlength: 4,
                        equalTo: "#new_password"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                     /*starts ajax*/
                     var formdata = $(form).serialize();
                         $.ajax({
                          type: "POST",
                          url: "process/user_profile_password_ajax.php",
                          data: formdata,
                          success: function(msg){

                           var x =  parseInt( msg, 10 ); 
                               if(x ==1){ 
                                   toastr["success"]("Password Updated" , "Settings");
                               } 
                               if(x ==2){ 
                                   toastr["warning"]( "Password Not Updated" , "Settings");
                               } 
                               if(x ==0){ 
                                   toastr["error"]( "wrong password" , "Settings");
                               }  
                                
                          },
                          error: function(XMLHttpRequest, textStatus, errorThrown) {
                             alert("Error Occur");
                          }
                        });

                    /*ends ajax*/
                }
            });


    }


    

     toastr.options = {
          "closeButton": true,
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

 var private_settings = function(form) {
     
     var formdata = $(form).serialize();

     $.ajax({
      type: "POST",
      url: "process/private_process.php",
      data: formdata,
      success: function(msg){
           
            toastr["success"](msg, "Settings");
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert("some error");
      }
    });
   
 } 

 var commercial_settings = function(form) {

     var formdata = $(form).serialize();

     $.ajax({
      type: "POST",
      url: "process/commercial_process.php",
      data: formdata,
      success: function(msg){
             toastr["success"](msg, "Settings");
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert("some error");
      }
    });
   
 }    

    return {
        //main function to initiate the module
        init: function () {          
            handleValidation1();
            handleValidation2(); 
            handleValidation3();
            handleValidation4();
            handleValidation5();             

        }

    };

}();



$('#finance_type').on('change', function() {
      //alert( this.value ); // or $(this).val()
      var flag = this.value;
      //var flag = parseInt(flag, 10);
     
      if(flag != 1){
        $("#threewheller").attr('disabled',false);
       
        var c_registration = $('#submit_form input[name="c_registration"]').val();
        var c_insurance = $('#submit_form input[name="c_insurance"]').val();
        var c_processing = $('#submit_form input[name="c_processing"]').val();
        var c_finance_commission = $('#submit_form input[name="c_finance_commission"]').val();
        var c_interest = $('#submit_form input[name="c_interest"]').val();

        $('#submit_form input[name="registration"]').val(c_registration);
        $('#submit_form input[name="insurance"]').val(c_insurance);
        $('#submit_form input[name="documentation"]').val(c_processing);
        $('#submit_form input[name="finance_commission"]').val(c_finance_commission);
        $('#submit_form input[name="interest"]').val(c_interest);

      }else{
        $("#threewheller").attr('disabled','disabled');
        $('#vehicle_type').val(2);

        var p_registration = $('#submit_form input[name="p_registration"]').val();
        var p_insurance = $('#submit_form input[name="p_insurance"]').val();
        var p_processing = $('#submit_form input[name="p_processing"]').val();
        var p_finance_commission = $('#submit_form input[name="p_finance_commission"]').val();
        var p_interest = $('#submit_form input[name="p_interest"]').val();

        $('#submit_form input[name="registration"]').val(p_registration);
        $('#submit_form input[name="insurance"]').val(p_insurance);
        $('#submit_form input[name="documentation"]').val(p_processing);
        $('#submit_form input[name="finance_commission"]').val(p_finance_commission);
        $('#submit_form input[name="interest"]').val(p_interest);

      }

});

$("#submit_form input[name='vehicle_price']").keyup(function(){  
    finance();
});
$("#submit_form input[name='insurance']").keyup(function(){  
    finance();
});
$("#submit_form input[name='down_payment']").keyup(function(){  
    finance();
});
$("#submit_form select[name='scheme']").change(function(){  
    finance();
});
$("#submit_form input[name='insurancefor']").keyup(function(){  
    finance();
});
//$("#myform input[name='disc']").keyup(function(){  
  //  finance();
    // });
var finance = function(){

	var insurance = $('#submit_form input[name="insurance"]').val();
	var registration = $('#submit_form input[name="registration"]').val();
	var v_price = $('#submit_form input[name="vehicle_price"]').val();
	
	insurance = parseFloat( insurance );
	registration = parseFloat( registration );
	v_price = parseFloat( v_price );
	  
	 var sum = v_price + registration + insurance;
	 $('#submit_form input[name="on_road_price"]').val(sum); 
	  
    var down_payment = $('#submit_form input[name="down_payment"]').val();
    var sum2 = sum - down_payment;
    $('#submit_form input[name="finance_amount"]').val(sum2);

    var finance_amount = $('#submit_form input[name="finance_amount"]').val();
        finance_amount = parseFloat( finance_amount );
    var documentation = $('#submit_form input[name="documentation"]').val();
    documentation = parseFloat( documentation);
    var finance_commission = $('#submit_form input[name="finance_commission"]').val();
    finance_commission = parseFloat( finance_commission );
    var interest = $('#submit_form input[name="interest"]').val();
    interest = parseFloat( interest );
	
	var scheme = $('#submit_form select[name="scheme"]').val();
    scheme = parseFloat( scheme );
	
	var insurancefor = $('#submit_form input[name="insurancefor"]').val();
    insurancefor = parseFloat( insurancefor );
	
	console.log(scheme);
	if(scheme == 11){
		interest=interest*1;		
		}
	if(scheme == 16){
		interest=interest*1.5;		
		}
	if(scheme == 22){
		interest=interest*2;		
		}
	if(scheme == 28){
		interest=interest*2.6;		
		}
	if(scheme == 33){
		interest=interest*3;		
		}	
	if(scheme == 38){
		interest=interest*3.5;		
		}
	if(scheme == 44){
		interest=interest*4;		
		}	
	if(scheme == 49){
		interest=interest*4.5;		
		}
	if(scheme == 55){
		interest=interest*5;		
		}						
	
	
	

    var amt = finance_amount + documentation;
    var comm = amt*(finance_commission/100);
    amt= amt + comm;
    var intst = amt *(interest/100);
    amt = amt + intst+insurancefor;
    
	console.log(interest);
	
    var net_finance = $('#submit_form input[name="net_finance"]').val(amt);
	
	//var sub_t = $('#myform input[name="total"]').val();
    //var discount = $('#myform input[name="disc"]').val();
    //var grand_t = sub_t - discount;
    //$('#myform input[name="gt"]').val(grand_t);
	
}
