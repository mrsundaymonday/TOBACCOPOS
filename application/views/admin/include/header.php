<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?=base_url('assets/frontend/tsm.ico');?>">
  <title>
    IPOS Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url();?>assets/template/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?=base_url();?>assets/template/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?=base_url();?>assets/template/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url();?>assets/template/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

  <!-- datatable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="<?=base_url();?>assets/template/js/sweetalert2.js"></script>
  <style type="text/css">

    .dataTables_wrapper .dataTables_info{font-size: 13px; color: #8392AB !important; }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
      font-size: 13px; color: #8392AB !important;}
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover { border-radius: 17px; }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {border-radius: 30px; }
    table.dataTable tbody th, table.dataTable tbody td{padding: 0px 10px !important;}
    .table > :not(caption) > * > * {border-bottom-color: #d9c4c4 !important;padding: 0.2rem 0.5rem !important;}
    table.dataTable.no-footer { border-bottom:1px solid #d9c4c4 !important; }

@media only screen and (max-width: 600px) {
    .container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl{ padding: 0px; }
    .card-header h6{ text-align: center; }
    .text-sm {font-size: .7rem !important;}
    h4 {font-size: 15px; }
    small{font-size: 0.5em !important;color: #e37181 !important;}
   }
   
   .ps> .ps__scrollbar-x-rail, .ps> .ps__scrollbar-y-rail{
        opacity: 0.6;
    }
/*    body {
    overflow: -moz-scrollbars-vertical;
    overflow-x: hidden;
    overflow-y: auto;
    }*/

    .card .card-header {padding: 0.2rem !important;}

</style>

<style>
      * {
        margin: 0;
        padding: 0;
      }

      html,
      body {
        width: 100%;
        height: 100%;
      }

      .pull-to-refresh-container {
        width: 100%;
        height: 100%;
        background-color: yellow;
        position: relative;
      }

      .pull-to-refresh-content-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        margin: 0px;
        text-align: center;
      }
      
      .pdf-eo { color: #3b68d2 !important; }
      .btn {padding: 0.5rem .5rem !important;}

      .navbar-vertical.navbar-expand-xs .navbar-nav .nav-link {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
    }
    .btn-remove{
      background-color: #e37181 !important;
    }
    
    .form-control{ appearance: auto !important; }
     #area_akses_masuk, #area_akses_keluar { padding-left: 20px; }
 

    @media only screen and (min-device-width: 768px){
      body{        
        overflow: hidden;
      }
      small{font-size: 0.75em !important;color: #e37181 !important;}
      .form-switch .form-check-input {  height: 1.5em;}
    }
    .progress-bar { height: 2px !important;}

    .form-switch .form-check-input {
        background-color: rgba(58, 65, 111, 0.2) !important;
      }
      .form-switch .form-check-input:checked {
        background-color: rgba(58, 65, 111, 0.95) !important;
      }
      /*.row {--bs-gutter-x: 0rem !important;}*/
    </style>
<script type="text/javascript">
  $(document).ready(function(){
    $('ul li a').click(function(){
      $('li a').removeClass("active");
      $(this).addClass("active");
    });

   

  });
</script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.min.css" integrity="sha512-aOY1DMp/EOhmSIAuJFIsrXRnk2wSrUB7BK5x+HU3ne0TIzKinEkiiEnIhELUbgsmUDU7U9YONFSnjwjRoX7GXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
          $(document).ready(function(){

         /* if($("#search-menu").val()==""){
            //window.location.href = "<?php // echo site_url('pos')?>";
            return false;
          }*/
            


          $('#search-menu').autocomplete({
                source: "<?php echo site_url('pos/getmenu');?>",     
                select: function (event, ui) {
                  $('[name="search-menu"]').val(ui.item.label); 
                  $('[name="id_menu"]').val(ui.item.description); 
                     $.ajax({
                        type: 'POST',
                        url : "<?php echo site_url('pos/selectmenu/')?>"+ui.item.description,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) { 
                          $('#searchmenu').html("<div class='row'><div class='col-xl-2 col-sm-6 mb-xl-0 mb-4'><div class='card mb-3'><div class='card-body p-2'><div class='row'><a href='><div class='col-2 text-end'><img src='<?=base_url();?>assets/frontend/menu.png' class='img-responsive img-menu' height='75px'></div><p class='text-xs text-center mt-2'>"+data.query.label_menu+"</p></a></div></div></div></div></div>");                    
                        },
                       error: function (jqXHR, textStatus, errorThrown){
                            alert('Error getting data...');
                        }
                     });
                },
                change: function(event, ui) {
                  if (!ui.item) {
                     $('[name="search-menu"]').val(''); 
                     $('[name="id_menu"]').val('');
                     $("#searchmenu").html("");
                 
                  }
              }
            });

          });
        </script>

</head>
