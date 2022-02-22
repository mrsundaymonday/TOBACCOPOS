<style type="text/css">
  .img-menu {padding-left: 2.5rem !important; padding-top: 1rem !important;}
  .pos-card-menu:hover{ background-color: #cfddba; }
  .ui-front {
              z-index: 2000 !important;
              padding: 5px;

          }
  .pos-card-menu { border-radius:5px; background-color: #d7dfde !important;}

</style>
<?php 
    
    $data_menu = array("Pesanan Penjualan", "Daftar Penjualan", "Penjualan Kasir", "History Harga Jual","Tukar Tambah","Pembayaran Piutang","Status Lunas/Cek/BG","Retur Penjualan","Point Penjualan","Daftar Pembayaran Sales","Status Lunas BG/Cek Sales","Data Pengiriman expedisi")?>
    <div class="container-fluid py-4">
      <div id="searchmenu">
      <div class="row">
        <!-- start col menu -->
        <?php foreach ($menu as $value) { 
             foreach ($items[$value->id_menu_katagori] as $katagori) {;?>
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                  <div class="card mb-3">
                    <div class="card-body p-2 pos-card-menu">
                      <div class="row">
                        <a href="<?=base_url(strtolower($value->nama_katagori).'/'.strtolower($katagori->nama_menu));?>">
                        <div class="col-2 text-end">
                          <img src="<?=base_url();?>assets/frontend/icon/<?=($katagori->image=="" ? 'not-found.png': $katagori->image);?>" class="img-responsive img-menu" height="75px">
                        </div>
                        <p class="text-xs text-center mt-2"><?=$katagori->label_menu;?></p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
      <?php } }?>
      </div>



          <!-- end col menu -->
        </div>


      

      
  <!--     <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Built by developers</p>
                    <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                    <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="<?=base_url();?>assets/template/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="<?=base_url();?>assets/template/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?=base_url();?>assets/template/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
 -->
    



