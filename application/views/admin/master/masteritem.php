
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

    <div class="container-fluid px-3">
     
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
              <h6>Tabel Master Item</h6>
             
                 <button style="float:left; margin-bottom: 20px;" type="button" class="btn btn-add bg-gradient-dark my-1 mb-2"data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style="font-size:16px;"></i></button>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="example">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Barang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Pokok</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Grosir</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php if (empty($masteritem)) { ?> 
                        <tr><td class="text-sm font-weight-bold mb-0" colspan="18"><p style="text-align:center; font-weight: bold;">Data not found..</p></td></tr>                    
                   <?php }else{
                        $no=1;
                    foreach ($masteritem as $value) { ?> 


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
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_id;?></p>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_nama;?></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_satuan;?></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_harpok;?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_harjul;?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs text-secondary mb-0"><?=$value->barang_harjul_grosir;?></p>
                          </div>
                        </div>
                      </td>

                 
                      <td class="align-middle">
                          <button class="btn btn-edit" data-bs-id="<?=$value->barang_id;?>"> <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit User" aria-label="Edit Barang"></i> </button>

                          <button class="btn btn-del" data-bs-id="<?=$value->barang_id;?>" data-uname="<?=$value->barang_nama;?>"> <i class="fas fa-trash ms-auto text-dark cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Del User" aria-label="Del User"></i> </button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                             <form role="form text-left" class="mt-1" id="form">
                                <input type="hidden" name="hidden_id">
                                  
                                  <div class="mb-1">
                                    <input type="text" name="barang_id" id="barang_id" class="form-control" placeholder="id barang" aria-label="barang_id" required="" value="<?=$lastitem;?>" readonly>
                                  </div>
                                
                                  <div class="mb-1">
                                    <select class="form-control selectpicker" required="" name="katagori" id="katagori"  data-live-search="true">
                                        <option value="">Pilih</option>
                                        <?php foreach ($katagori as $value) {?>
                                        <option value="<?=$value->kategori_id;?>"><?=$value->kategori_nama;?></option>
                                        <?php }?>
                                    </select>
                                  </div>

                                  <div class="mb-1">
                                    <input type="text" name="barang_nama" id="barang_nama" class="form-control" placeholder="Nama barang" aria-label="barang_nama" required="">
                                  </div>
                                
                                  <div class="mb-1">
                                    <label>Satuan</label>
                                      <div class="radio">
                                        <?php foreach($satuan as $value): ?>
                                        <label><input type="radio" name="satuan" value="<?=$value->nama_satuan;?>">
                                         <?=$value->nama_satuan;?></label>
                                        <?php endforeach;?>
                                      </div>

                                  </div>
                                
                                  <div class="mb-1">
                                    <input type="text" name="harpok" id="harpok" class="form-control" placeholder="Harga pokok" aria-label="Harga pokok" required="">
                                  </div>

                                  <div class="mb-1">
                                    <input type="text" name="harjul" id="harjul" class="form-control" placeholder="Harga jual" aria-label="Harga jual" required="">
                                  </div>

                                  <div class="mb-1">
                                    <input type="text" name="harjulgross" id="harjulgross" class="form-control" placeholder="Harga jual grossir" aria-label="Harga jual grossir" required="">
                                  </div>


                                  <div class="mb-1">
                                    <input type="text" name="brg_stok" id="brg_stok" class="form-control" placeholder="Stock" aria-label="brg_stok" required="">
                                  </div>


                                  <div class="mb-1">
                                    <input type="text" name="brg_min_stok" id="brg_min_stok" class="form-control" placeholder="Barang min stock" aria-label="Barang min stok" required="">
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
                    
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.selectpicker').selectpicker();

        $('#example').DataTable({
          "autoWidth": false,
            "lengthChange": false
        });      
        var save_method;

        $('#example').on('click','.btn-edit',function () {
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

        $('.btn-add').on('click',function () {
            save_method ='add'; 
            $('.selectpicker').selectpicker();          
            $('#myModal').appendTo("body").modal('show'); 
        });

        $('#example').on('click','.btn-del',function () {
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
                          url : "<?php echo site_url('master/del_item')?>/"+id,
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
                url="<?=site_url('master/add_item');?>";
            }else{
                url="<?=site_url('master/edit_item/');?>"+id;
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
                  confirmButtonText: 'Yes, Add this item!'
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
                                window.location.href = "<?php echo site_url('pos/masteritem')?>"
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

<script type="text/javascript">
    $harpok = $('#harpok').val();
    $harjul = $('#harjul').val();
    $harjulgross = $('#harjulgross').val();
    harpok.addEventListener('keyup', function(e){
      harpok.value = formatRupiah(this.value, 'Rp. ');
    });  
    harjul.addEventListener('keyup', function(e){
      harjul.value = formatRupiah(this.value, 'Rp. ');
    });  
    harjulgross.addEventListener('keyup', function(e){
      harjulgross.value = formatRupiah(this.value, 'Rp. ');
    });  


    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

  function currencyFormat(num) {
      return 'Rp. ' + parseFloat(num).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

  </script>