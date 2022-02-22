
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
              <h6>Tabel Master User</h6>
             
                 <button style="float:right; margin-bottom: 20px;" type="button" class="btn btn-add bg-gradient-dark my-1 mb-2"data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style="font-size:16px;"></i></button>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="example">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fullname</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level/Aktif</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approver/Label</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created By/Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php if (empty($user)) { ?> 
                        <tr><td class="text-sm font-weight-bold mb-0" colspan="18"><p style="text-align:center; font-weight: bold;">Data not found..</p></td></tr>                    
                   <?php }else{
                        $no=1;
                    foreach ($user as $value) { ?> 


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
                            <h6 class="mb-0 text-sm">
                            <?=$value->fullname;?>                           
                           </h6>
                            <p class="text-xs text-secondary mb-0"><?=$value->email_user;?></p>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$value->username;?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$value->nama_dept;?></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$value->level;?></h6>
                            <p class="text-xs text-secondary mb-0"><?=($value->aktif=="1")? '<span class="badge badge-sm bg-gradient-success">Active</span>':'<span class="badge badge-sm bg-gradient-danger">Non Active</span>';?></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$value->ttd_name;?></h6>
                            <p class="text-xs text-secondary mb-0"><?=($value->approver=="1")? '<span class="badge badge-sm bg-gradient-success">True</span>':'<span class="badge badge-sm bg-gradient-danger">False</span>';?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$value->created_by;?></h6>
                            <p class="text-xs text-secondary mb-0"><?=date('d-m-Y H:i',strtotime($value->created_date));?></p>
                          </div>
                        </div>
                      </td>

                 
                      <td class="align-middle">
                          <button class="btn btn-edit" data-bs-id="<?=$value->id;?>"> <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit User" aria-label="Edit User"></i> </button>

                          <button class="btn btn-del" data-bs-id="<?=$value->id;?>" data-uname="<?=$value->username;?>"> <i class="fas fa-trash ms-auto text-dark cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Del User" aria-label="Del User"></i> </button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                             <form role="form text-left" class="mt-3" id="form">
                                <input type="hidden" name="hidden_id">
                                
                                  <div class="mb-3 mt-3">
                                    <input type="fullname" name="fullname" id="fullname" class="form-control" placeholder="Fullname" aria-label="nama" required="">
                                  </div>
                                
                                  <div class="mb-3">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="username" required="">
                                  </div>
                                
                                  <div class="mb-3">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="username" required="">
                                  </div>
                                
                                  <div class="mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="password" required="">
                                  </div>

                                  <div class="mb-3">
                                    <select class="form-control" required="" name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <select class="form-control" required="" name="dept" id="dept">
                                        <?php 
                                        if (empty($dept)) {;?>
                                            <option value=""></option>
                                        <?php }else{
                                            foreach($dept as $value){ ;?>
                                            <option value="<?=$value->id_dept;?>"><?=$value->nama_dept;?></option>
                                        <?php }} ;?>
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <select class="form-control" required="" name="aktif" id="aktif">
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Role</label>
                                            <div class="radio">
                                                <label>
                                                  <input type="radio" name="level" value="Admin"> Admin</label>
                                                </div>
                                                <div class="radio">
                                                  <label><input type="radio" name="level" value="User" checked> User</label>
                                                </div>
                                                <div class="radio">
                                                  <label><input type="radio" name="level" value="Finance"> Finance</label>
                                                </div>
                                                
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label>Approver</label>
                                                <div class="radio">
                                                  <label><input type="radio" name="approver" value="1"> True</label>
                                                </div>
                                                <div class="radio">
                                                  <label><input type="radio" name="approver" value="0" checked> False</label>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                                

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
            "pageLength": 50
        });      
        var save_method;
        $('.btn-edit').on("click", function() {
            save_method ='update';
            var id = $(this).attr("data-bs-id");  
              $.ajax({
                url : "<?php echo site_url('master/get_user/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="fullname"]').val(data.fullname);
                    $('[name="username"]').val(data.username);
                    $('[name="email"]').val(data.email_user);
                    $('#dept').val(data.dept).change();
                    $('#aktif').val(data.aktif).change();
                    $('#gender').val(data.gender).change();
                    $("[name=approver][value=" + data.approver + "]").prop('checked', true);
                    $("[name=level][value=" + data.level + "]").prop('checked', true);
                    $('[name="hidden_id"]').val(data.id);
                    $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
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
                title: 'Delete user '+ uname+'?',
                text: "You won't be able to revert this! ",
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
                  confirmButtonText: 'Yes, Delete!'

            }).then((result) => {

                    if (result.isConfirmed) {
                         //$(".confirm").attr("disabled", true);
                        // A dialog has been submitted

                          $.ajax({
                          type: "post",
                          url : "<?php echo site_url('master/del_user')?>/"+id,
                          dataType: "JSON",
                          success: function(data) {}
                        }).done(function(data) {
                             Swal.fire({
                                title: "Success", 
                                text: "Data berhasil disimpan", 
                                type: "success"
                            }).then(function() {
                                // Redirect the user
                                window.location.href = "<?php echo site_url('master/user')?>"
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
            
        
        $("#form").submit(function(){
            var url = "";            
            var id = $('[name="hidden_id"]').val();
            if(save_method=="add"){
                url="<?=site_url('master/save_user');?>";
            }else{
                url="<?=site_url('master/edit_user/');?>"+id;
            }
             Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this! : ",
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
                  confirmButtonText: 'Yes, Add User!'
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
                                window.location.href = "<?php echo site_url('master/user')?>"
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
