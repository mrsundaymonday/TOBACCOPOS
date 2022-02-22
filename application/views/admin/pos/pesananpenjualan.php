<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.23/jquery.inputmask.min.js" integrity="sha512-mh8BrmrpMLvcfym8unG8TXU+LGUP0A2C6tN4b/RXWK3xffaA9k4blevFyY9WFyn3Y4pqpPNIVWtCZUTGRLqrrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<style type="text/css">

  input,select { font-size: 13px !important; }
  .btn-add, .btn-remove { color:#fff !important; padding: .7rem .75rem !important; }
  .form-group { margin-bottom: 0rem !important;}
  select {font-family: 'FontAwesome', 'sans-serif';}
  .submit-btn{float: right;} 
  .fr{ float: right; }
   .no-padding{ padding: 0rem !important; }

   
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>

    <div class="container-fluid py-0">
       <div id="searchmenu"></div>
      <form role="form text-left" class="mt-3" id="form">
      <div class="row mt-0">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
             <!--  <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="20"></canvas>
                </div>
              </div> -->
             <!--  <h6 class="ms-2 mt-0 mb-0"> Kasir </h6> -->
             <!--  <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p> -->
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-lg-3">
                         <form id="form">
                            <div class="input-group">
                            <input type="text" name="kode_brg" class="form-control" id="kode_brg" placeholder="Barcode (BR000001)" autocomplete="off">
                            <span class="input-group-text text-body"><a href="#" class="barcode-search"><i class="fas fa-search" aria-hidden="true"></i></a></span>
                          </div>

                        
                      
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div id="detail_barang" class="table table-responsive"></div>
                    </div>
                  </div>
                  </form>
               


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card-body px-0 pt-0 pb-2">
                      <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                      <thead>
                          <tr>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th style="text-align:center;">Satuan</th>
                              <th style="text-align:center;">Harga(Rp)</th>
                              <th style="text-align:center;">Diskon(Rp)</th>
                              <th style="text-align:center;">Qty</th>
                              <th style="text-align:center;">Sub Total</th>
                              <th style="width:100px;text-align:center;">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($this->cart->contents() as $items): ?>
                          <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                          <tr>
                               <td><?=$items['id'];?></td>
                               <td><?=$items['name'];?></td>
                               <td style="text-align:center;"><?=$items['satuan'];?></td>
                               <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                               <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                               <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                               <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                              
                               <td style="text-align:center;"><a href="<?php echo base_url().'pos/removecart/'.$items['rowid'];?>" class=" btn-xs"><span class="fa fa-trash-o"></span></a></td>
                          </tr>
                          
                          <?php $i++; ?>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
                    </div>
                  </div>
                </div><!-- end table -->


                <div class="row">
                  <div class="col-lg-12">
                      <form action="<?php echo base_url().'pos/simpan_penjualan'?>" method="post">
                        <table>
                            <tr>
                                <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                                <th style="width:140px;">Total Belanja(Rp)</th>
                                <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                                <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                            </tr>
                            <tr>
                                <th>Tunai(Rp)</th>
                                <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                                <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Kembalian(Rp)</th>
                                <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                            </tr>

                        </table>
                        </form>
                  </div>
                </div>
     <!--    <div class="progress w-100 mb-3">
          <div class="progress-bar bg-dark w-100" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

                <div class="row">
                  <div class="col-lg-3">
                    <div class="card">
                      <div class="card-body no-padding">
                        <label>Sub Total</label><input type="text" value="20.000" name="subtotal" class="form-control">
                        <label>Discount</label><input type="text" value="500" name="subtotal" class="form-control">
                        <label>Grand Total</label><input type="text" value="19.500" name="subtotal" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card">
                      <div class="card-body no-padding">
                        <label>Cash</label><input type="text" value="20.000" name="subtotal" class="form-control">
                        <label>Change</label><input type="text" value="500" name="subtotal" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card">
                      <div class="card-body no-padding">
                        <label>Note</label><input type="text" placeholder="send note" name="subtotal" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="card">
                      <div class="card-body no-padding">
                        <a href="#" class="btn btn-md">Cancel</a><br>
                        <a href="#" class="btn btn-md">Process Payment</a>

                      </div>
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </div>


      </div>
      

  </form>




<script src="<?=base_url();?>assets/frontend/js/jquery.datetimepicker.full.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/jquery.datetimepicker.css"/>
<script src="<?php echo base_url().'assets/frontend/js/jquery.price_format.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.barcode-search').click(function(){
        alert('barcode-search onclick');
        return false;
       });

       $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });

    $("#form").submit(function(){
            $.ajax({
                type: "post",
                url : "<?=site_url('pos/addtocart')?>/",
                dataType: "JSON",
                data: $('#form').serialize(),
                  success: function(data) {
                      window.location.href = "<?=site_url('pos/psnsale')?>"
                  },
                   error: function (request, status, error) {
                      alert(request.responseText);
                  }
                });
                return false;
         }); 

            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
              $(this).val($(this).val().toUpperCase());
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'pos/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });



        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });

        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>


