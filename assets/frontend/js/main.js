$(function() {
	var url_action = "<?php echo site_url('tenant/savesecnote')?>";
	var url_direct = "<?php echo site_url('tenant')?>";
	'use strict';

	// Form

	var contactForm = function() {

		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: "required",
					nama_person: "required",
					telp: "required",
					nama_person: "required",
					address: "required",
					lantai: "required",
					tanggal: "required",
					/*lokasi: "required",*/
					jenis_kegiatan: "required",
					tujuan_kegiatan: "required",

					email: {
						required: true,
						email: true
					}
				},
				messages: {
					name: "Please enter your name",
					email: "Please enter a valid email address",
					telp: "Please enter telp number",
					nama_person: "Please enter pic name",
					address: "Please enter address",
					lantai: "Please enter floor",
					tanggal: "Please enter date & time",
					/*lokasi: "Please enter location",*/
					jenis_kegiatan: "Please enter type of activity",
					tujuan_kegiatan: "Please enter description"
				},
				submitHandler: function(form) {
				   /* $(':submit', form).attr('disabled', 'disabled');
				    form.submit();*/

				    Swal.fire({
                  title: 'Request Approval Secnot?',
                  text: "",
                  icon: 'info', 
                  showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                  },
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Minta persetujuan!'
                }).then((result) => {

                    if (result.isConfirmed) {
                         //$(".confirm").attr("disabled", true);
                        // A dialog has been submitted

                          $.ajax({
                          type: "post",
                          url : url_action,
                          dataType: "JSON",
                          data: $('#contactForm').serialize(),
                          success: function(data) {}
                        }).done(function(data) {
                             Swal.fire({
                                title: "Sukses", 
                                text: "Data berhasil disimpan", 
                                type: "success"
                            }).then(function() {
                                // Redirect the user
                                window.location.href = "<?php echo site_url('tenant')?>"
                            });

                        }).fail(function(data) {
                             Swal.fire({
                                title: "Error", 
                                text: "Gagal request approval",  
                                type: "error"
                            }).then(function() {
                                // Redirect the user
                                //window.location.href = "<?php // echo site_url('main/createsc')?>"
                            });
                            
                        });

                      }  

                });
                return false;
				  }
				/* submit via ajax */
		/*		submitHandler: function(form) {		
					var $submit = $('.submitting'),
						waitText = 'Submitting...';

					$.ajax({   	
				      type: "POST",
				      url: "php/send-email.php",
				      data: $(form).serialize(),

				      beforeSend: function() { 
				      	$submit.css('display', 'block').text(waitText);
				      },
				      success: function(msg) {
		               if (msg == 'OK') {
		               	$('#form-message-warning').hide();
				            setTimeout(function(){
		               		$('#contactForm').fadeOut();
		               	}, 1000);
				            setTimeout(function(){
				               $('#form-message-success').fadeIn();   
		               	}, 1400);
			               
			            } else {
			               $('#form-message-warning').html(msg);
				            $('#form-message-warning').fadeIn();
				            $submit.css('display', 'none');
			            }
				      },
				      error: function() {
				      	$('#form-message-warning').html("Something went wrong. Please try again.");
				         $('#form-message-warning').fadeIn();
				         $submit.css('display', 'none');
				      }
			      });    		
		  		}*/
				
			} );
		}
	};
	contactForm();



// show message on invalid submission
$("form").on("invalid-form.validate", function (event, validator) {
  var errors = validator.numberOfInvalids();
  if (errors) {
    //alert('There is a problem with ' + errors + ' fields.');
     Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Mohon mengisi field kosong!',
			  footer: ''
			})
  }
});

});