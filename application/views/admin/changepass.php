
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.23/jquery.inputmask.min.js" integrity="sha512-mh8BrmrpMLvcfym8unG8TXU+LGUP0A2C6tN4b/RXWK3xffaA9k4blevFyY9WFyn3Y4pqpPNIVWtCZUTGRLqrrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
  
    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px) {

    }

    /* Large Devices, Wide Screens */
    @media only screen and (min-width : 1200px) {

    }

</style>

    <div class="container-fluid py-4">
      <form role="form text-left" class="mt-3" id="form">
      <div class="row mt-2">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
             <!--  <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="20"></canvas>
                </div>
              </div> -->
              <h6 class="ms-2 mt-4 mb-0"> Form Input Secnot </h6>
             <!--  <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p> -->
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-md-6 col-lg-6 col-xs-12 py-3 ps-0">
         
                    <h4 class="font-weight-bolder">Ubah Password</h4>
                    <p style="font-size:12px; color:red;" id="msg"></p>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-100" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                          <div class="mb-3 mt-3">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="New password" aria-label="pass" required="">
                          </div>
                          <div class="mb-3">
                            <input type="password" name="confpass" id="confpass" class="form-control" placeholder="Confirm password" aria-label="confpass" aria-describedby="confpass-addon" required="">
                          </div>
                         

                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-0 mb-2">Submit</button>
                      </div>
                  </div>
                  
                                       
                   
                          
                      
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
      

  </form>





<script type="text/javascript">
    $(document).ready(function() {
        
        $('#confpass').keyup(function () {
            if ($('#confpass').val()!==$('#pass').val()) {
                $('#msg').text('Password tidak sama'); 
                $(':input[type="submit"]').prop('disabled', true);
            } else{
                $('#msg').text('');
                $(':input[type="submit"]').prop('disabled', false);
            }
        });

        $('#pass').keyup(function () {
            if ($('#pass').val()!==$('#confpass').val()) {
                $('#msg').text('Password tidak sama');
                $(':input[type="submit"]').prop('disabled', true);
            } else{
                $('#msg').text('');
                $(':input[type="submit"]').prop('disabled', false);
            }
        });

        $("#form").submit(function(){
             Swal.fire({
                  title: 'Ubah password ?',
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
                  confirmButtonText: 'Ya, Ubah!'
                }).then((result) => {

                    if (result.isConfirmed) {
                         //$(".confirm").attr("disabled", true);
                        // A dialog has been submitted

                        $.ajax({
                          type: "post",
                          url : "<?php echo site_url('master/changepass')?>/",
                          dataType: "JSON",
                          data: $('#form').serialize(),
                          success: function(data) {}
                        }).done(function(data) {
                             Swal.fire({
                                title: "Sukses", 
                                text: "Data berhasil diubah", 
                                type: "success"
                            }).then(function() {
                                // Redirect the user
                                window.location.href = "<?php echo site_url('main/newpass')?>"
                            });

                        }).fail(function(data) {
                             Swal.fire({
                                title: "Error", 
                                text: "Gagal menyimpan data",  
                                type: "error"
                            }).then(function() {
                                // Redirect the user
                                //window.location.href = "<?php // echo site_url('main/createsc')?>"
                            });
                            
                        });

                      }  

                });
                return false;
         }); 


    });


</script>





