
    <div class="container-fluid py-4">
     
      <div class="row mt-2">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
             <!--  <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="20"></canvas>
                </div>
              </div> -->

             <!--  <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p> -->
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabel Configurasi Akses</h6>
             
                 <button style="float:right; margin-bottom: 20px;" type="button" class="btn btn-add bg-gradient-dark my-1 mb-2"data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style="font-size:16px;"></i></button>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="example">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Function</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Label Menu</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php if (empty($akses)) { ?> 
                        <tr><td class="text-sm font-weight-bold mb-0" colspan="18"><p style="text-align:center; font-weight: bold;">Data not found..</p></td></tr>                    
                   <?php }else{
                        $no=1;
                    foreach ($akses as $value) { ?> 


                    <tr>
                         <td>                          
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$no;?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=($value->fullname);?></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                            <?=$value->nama_menu;?>                           
                           </h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=($value->label_menu);?></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$value->nama_katagori;?></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>

                 
                      <td class="align-middle">
                          <button class="btn btn-edit" data-bs-id="<?=$value->id_akses;?>"> <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Akses" aria-label="Edit Akses"></i> </button>

                          <button class="btn btn-del" data-bs-id="<?=$value->id_akses;?>" data-uname="<?=$value->label_menu;?>"> <i class="fas fa-trash ms-auto text-dark cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Del Akses" aria-label="Del Akses"></i> </button>
                      </td>
                    </tr>
                    
                    <?php $no++;}} ;?>
                  </tbody>


                </table>
              </div>
            </div>
          </div>
        </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>




                        <!-- Modal -->                        
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Akses</h5>
                                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                             <form role="form text-left" class="mt-3" id="form">
                                <input type="hidden" name="hidden_id">

                                  <div class="mb-3  mt-3">
                                    <select class="form-control" required="" name="user" id="user">
                                    <option value="" disabled="" selected="">Select user</option>
                                        <?php 
                                        if (empty($user)) {;?>
                                            <option value=""></option>
                                        <?php }else{
                                            foreach($user as $value){ ;?>
                                            <option value="<?=$value->id;?>"><?=$value->username;?></option>
                                        <?php }} ;?>
                                    </select>
                                  </div>



                                <?php if (empty($datamenu)) {;?>
                                    <p>Menu is empty </p>
                                <?php }else{
                                    foreach($datamenu as $value){ ;?>
                                    <div class="mb-3 mt-3">
                                      <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" name="menu[]" value="<?=$value->id_menu;?>">
                                        <label class="form-check-label"><?=$value->label_menu;?></label>
                                      </div>
                                    </div>
                                <?php }} ;?>
                                

                            </div>
                          <div class="modal-footer">
                             
                            <button id="btn-submit" type="submit" class="btn bg-gradient-dark w-100 my-0 mb-2">Submit</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    <!-- end modal -->

      


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "autoWidth": false,
            "lengthChange": false,
            "pageLength": 100
        }); 
        //$("#myModal").remove();    
        var save_method;
        $('.btn-edit').on("click", function() {
            save_method ='update';
            var id = $(this).attr("data-bs-id");  
              $.ajax({
                url : "<?php echo site_url('master/get_akses/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="nama_dept"]').val(data.nama_dept);
                    $('[name="hidden_id"]').val(data.id_akses);
                    $('[name="label_dept"]').val(data.label_dept);
                    $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Akses'); // Set title to Bootstrap modal title
                    $("#myModal").appendTo("body");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });  
        });

        $('.btn-add').on("click", function() {
            save_method ='add'; 
           $('#myModal').appendTo("body").modal('show');           
        });


        $('.btn-del').on("click", function() { 
            var id = $(this).attr("data-bs-id");  
            var uname = $(this).attr("data-uname");     
            Swal.fire({
                title: 'Hapus Akses '+uname+'?',
                text: "Apabila dihapus data tidak bisa dikembalikan lagi! ",
                icon: 'warning', 
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                },
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Hapus!'

            }).then((result) => {

                    if (result.isConfirmed) {
                         //$(".confirm").attr("disabled", true);
                        // A dialog has been submitted

                          $.ajax({
                          type: "post",
                          url : "<?php echo site_url('master/del_akses/')?>"+id,
                          dataType: "JSON",
                          success: function(data) {}
                        }).done(function(data) {
                             Swal.fire({
                                title: "Success", 
                                text: "Data berhasil dihapus", 
                                type: "success"
                            }).then(function() {
                                // Redirect the user
                                window.location.href = "<?php echo site_url('master/akses')?>"
                            });

                        }).fail(function(data) {
                             Swal.fire({
                                title: "Error", 
                                text: "Gagal menghapus data",  
                                type: "error"
                            }).then(function() {
                                // Redirect the user
                                //window.location.href = "<?php // echo site_url('master/user')?>"
                            });
                            
                        });

                      }  

                });
                return false;    
        });



        
        $("#form").submit(function(){
            var url = "";            
            var id = $('[name="hidden_id"]').val();
            if(save_method=="add"){
                url="<?=site_url('master/save_akses');?>";
            }else{
                url="<?=site_url('master/edit_akses/');?>"+id;
            }
             Swal.fire({
                  title: 'Yakin?',
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
                  confirmButtonText: 'Ya, Simpan'
                }).then((result) => {

                    if (result.isConfirmed) {
                        //$(".confirm").attr("disabled", true);
                        // A dialog has been submitted
                          $.ajax({
                          type: "post",
                          url : url,
                          dataType: "JSON",
                          data: $('#form').serialize(),
                          success: function(data) {}
                        }).done(function(data) {
                             Swal.fire({
                                title: "Success", 
                                text: "Data berhasil disimpan", 
                                type: "success"
                            }).then(function() {
                                // Redirect the user
                                window.location.href = "<?php echo site_url('master/akses')?>"
                            });

                        }).fail(function(data) {
                             Swal.fire({
                                title: "Error", 
                                text: "Gagal menyimpan data",  
                                type: "error"
                            }).then(function() {
                                // Redirect the user
                                //window.location.href = "<?php // echo site_url('master/user')?>"
                            });
                            
                        });

                      }  

                });
                return false;
         }); 

    });
</script>




