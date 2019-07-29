 <script type="text/javascript">
   

function test(){
var e=document.getElementById("department");
var val=e.options[e.selectedIndex].value;
var select=document.getElementById("subdepartment");

for (var j=0;j<select.length;j++){
  select.remove(j);
  j--;
}


for (var i in obj){
 if(obj[i]==val){
  var option=document.createElement('option');
  option.text=option.value=i;

  select.add(option,0);
 }
}
}
 </script>

 <script>
      $( function() {
        $( "#dobpicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat:'dd/mm/yy'
        });
      } );
      
        $( function() {
        $( "#joinpicker" ).datepicker(
            {
              dateFormat:'dd/mm/yy',
              changeMonth:true
            }
          );
      } );

     $(function()
     {
      $('#spouse_name').hide();
      $('#married').click(function(){
         $('#spouse_name').show();
      });
       $('#unmarried').click(function(){
         $('#spouse_name').hide();
      });
     });

     $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "-5w",
          changeMonth: true,
          changeYear:true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear:true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );

</script>
<script type="text/javascript">

        function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});    
   </script>





   <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
      
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
        var nospecial_nodot=/^[^*|\":<>[\]{}`\\()';@&$]+$/;
        var nospecial_dot=/^[^*|\":<>[\]{}`\\()'.;@&$]+$/;
        var all_int=/^\d+$/;
        $(document).ready(function() {
          $('#contact_form').bootstrapValidator({
              // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  full_name: {
                      validators: {
                              stringLength: {
                              min: 2,
                          },
                              notEmpty: {
                              message: 'Please supply your Full Name'
                          },
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                   father_name: {
                      validators: {
                         
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                  spouse_name: {
                      validators: {
                         
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                   empid: {
                      validators: {
                           stringLength: {
                              min: 2,
                          },
                          notEmpty: {
                              message: 'Please supply Employee ID'
                          }
                      }
                  },
                  department:{
                      validators:{
                        notEmpty:{
                          message:'Department is required.'
                        }
                      }
                  },
                  blood_group:{
                      validators:{
                        stringLength:{
                          max:3,
                          message:'Blood Group should not contain more than 3 characters'
                        }
                      }
                  },
                  email: {
                      validators: {
                          notEmpty: {
                              message: 'Please supply your email address'
                          },
                          emailAddress: {
                              message: 'Please supply a valid email address'
                          }
                      }
                  },
                  phone: {
                      validators: {
                          notEmpty: {
                              message: 'Please supply your phone number'
                          },
                          stringLength: {
                              min:10,
                              max:10,
                              message: 'Please supply a vaild phone'
                          },
                          regexp:{
                            regexp:nospecial_dot,
                            message:'Field should contain no special character.'
                          },
                          regexp:{
                            regexp:all_int,
                            message:'Should contain Intergers only'
                          }
                      }
                  },
                  ephone: {
                      validators: {
                          notEmpty: {
                              message: 'Please supply your Emergency phone number'
                          },
                          stringLength: {
                              min:10,
                              max:10,
                              message: 'Please supply a vaild phone'
                          },
                          regexp:{
                            regexp:nospecial_dot,
                            message:'Field should contain no special character.'
                          },
                          regexp:{
                            regexp:all_int,
                            message:'Should contain Intergers only'
                          }
                      }
                  },
                  dob:{
                    validators:{
                       notEmpty:{
                        message:"DOB is required"
                       },
                       date:{
                        format:'DD/MM/YYYY',
                        message:'Invalid DOB'
                       }
                    }
                  },
                    joining:{
                    validators:{
                       notEmpty:{
                        message:"Date of Joining is required"
                       },
                       date:{
                        format:'DD/MM/YYYY',
                        message:'Invalid Date'
                       }
                    }
                  },
                  pan:{
                    validators:{
                       notEmpty:{
                            message:'PAN Card is required.'
                          },
                       stringLength:{
                        min:10,
                        max:10,
                        message:'PAN Number should be of 10 alphanumeric characters'
                       },
                       regexp:{
                        regexp:nospecial_dot,
                        message:'PAN Number should contain no special characters'
                       }
                      

                    }
                  },
                     aadhar:{
                    validators:{
                     
                       stringLength:{
                        min:12,
                        max:12,
                        message:'Aadhar Number should be of 12 digits'
                       },
                       regexp:{
                        regexp:nospecial_dot,
                        message:'Aadhar Number should contain no special characters'
                       },
                          regexp:{
                            regexp:all_int,
                            message:'Should contain Intergers only'
                          }

                    }
                  },
                    voter:{
                    validators:{
                       stringLength:{
                        min:12,
                        max:12,
                        message:'Aadhar Number should be of 12 digits'
                       },
                       regexp:{
                        regexp:nospecial_dot,
                        message:'Aadhar Number should contain no special characters'
                       },
                          regexp:{
                            regexp:all_int,
                            message:'Should contain Intergers only'
                          }

                    }
                  },
                  salary:{
                    validators:{
                          notEmpty:{
                            message:'Enter salary.'
                          },
                          regexp:{
                            regexp:all_int,
                            message:'Should contain Intergers only'
                          }
                    }
                  },
                  cur_address: {
                      validators: {
                           stringLength: {
                              min: 4,
                          },
                          notEmpty: {
                              message: 'Please supply your street address'
                          },
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                  cur_city: {
                      validators: {
                           stringLength: {
                              min: 4,
                          },
                          notEmpty: {
                              message: 'Please supply your city'
                          },
                          regexp:{
                            regexp:nospecial_dot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                  cur_state: {
                      validators: {
                          notEmpty: {
                              message: 'Please select your state'
                          }

                      }
                  },
                  cur_pin: {
                      validators: {
                          notEmpty: {
                              message: 'Please supply your zip code'
                          },
                          stringLength: {
                             min:6,
                             max:6,
                             message:'Should contain 6 Intergers only'

                          }
                          ,
                          regexp:{
                            regexp:all_int
                          }
                      }
                  },
                   per_address: {
                      validators: {
                           stringLength: {
                              min: 4,
                          },
                          notEmpty: {
                              message: 'Please supply your street address'
                          },
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                  per_city: {
                      validators: {
                           stringLength: {
                              min: 4,
                          },
                          notEmpty: {
                              message: 'Please supply your city'
                          },
                          regexp:{
                            regexp:nospecial_dot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                  per_state: {
                      validators: {
                          notEmpty: {
                              message: 'Please select your state'
                          }

                      }
                  },
                  per_pin: {
                      validators: {
                          notEmpty: {
                              message: 'Please supply your pin code'
                          },
                          stringLength: {
                             min:6,
                             max:6,
                             message:'Should contain 6 Intergers only'

                          },
                          regexp:{
                            regexp:all_int
                          }
                      }
                  },
                  comment: {
                      validators: {
                            stringLength: {
                              min: 10,
                              max: 200,
                              message:'Please enter at least 10 characters and no more than 200'
                          },
                          notEmpty: {
                              message: 'Please supply a description of your project'
                          }
                          }
                      }
                  }
              })
              .on('success.form.bv', function(e) {
                  $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                      $('#contact_form').data('bootstrapValidator').resetForm();
      
                  // Prevent form submission
                  e.preventDefault();
      
                  // Get the form instance
                  var $form = $(e.target);
      
                  // Get the BootstrapValidator instance
                  var bv = $form.data('bootstrapValidator');
      
                  // Use Ajax to submit form data
                  $.post($form.attr('action'), $form.serialize(), function(result) {
                      console.log(result);
                  }, 'json');
              });
      });
      
      
      
   </script>

   <script type="text/javascript">
           $("#exp_success").hide();
           $(document).ready(function() {
          $('#experience_form').bootstrapValidator({
              // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  emp_code: {
                      validators: {
                              stringLength: {
                              min: 2,
                          },
                              notEmpty: {
                              message: 'Please supply your Employee Code/ID'
                          },
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                   company: {
                      validators: {
                        notEmpty:{
                              message:'Please supply company name.'
                        },
                         
                          regexp:{
                            regexp:nospecial_nodot,
                            message:'Field should contain no special character.'
                          }
                      }
                  },
                     start_date:{
                    validators:{
                       notEmpty:{
                        message:"Start Date is required"
                       },
                       date:{
                        format:'DD/MM/YYYY',
                        message:'Invalid Start Date'
                       }
                    }
                  },end_date:{
                    validators:{
                       notEmpty:{
                        message:"End Date is required"
                       },
                       date:{
                        format:'DD/MM/YYYY',
                        message:'Invalid End Date'
                       }
                    }
                  },
                  designation:{
                     validators:{
                      notEmpty:{
                        message:"Designation is required."
                      },
                      regexp:{
                        regexp:nospecial_nodot,
                        message:"No special character allowed"

                      }
                     }
                  },
                  company_address:{
                   
                      regexp:{
                        regexp:nospecial_nodot,
                        message:"No special character allowed"

                      
                     }
                  },
                    company_description:{
                   
                      regexp:{
                        regexp:nospecial_nodot,
                        message:"No special character allowed"

                      
                     }
                  },
                
                  comment: {
                      validators: {
                            stringLength: {
                              min: 10,
                              max: 200,
                              message:'Please enter at least 10 characters and no more than 200'
                          },
                          notEmpty: {
                              message: 'Please supply a description of your project'
                          }
                          }
                      }
                  }
              })
              .on('success.form.bv', function(e) {
                  $('#exp_success').slideDown({ opacity: "show" }, "slow") // Do something ...
                      $('#experience_form').data('bootstrapValidator').resetForm();
      
                  // Prevent form submission
                  e.preventDefault();
      
                  // Get the form instance
                  var $form = $(e.target);
      
                  // Get the BootstrapValidator instance
                  var bv = $form.data('bootstrapValidator');
      
                  // Use Ajax to submit form data
                  $.post($form.attr('action'), $form.serialize(), function(result) {
                      console.log(result);
                  }, 'json');
              });
      });
      
      
      
   </script>