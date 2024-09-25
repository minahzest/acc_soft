<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->
  <head>
    <?php $this->load->view('includes/head'); ?>
    <style type="text/css">
      @media (min-width: 768px){
        .modal-dialog {
            width: 800px;
        }
      }
      .zmdi-filter-list{
        transform: rotate(0deg) !important;
      }
      #subInvBox{
        border: 1px solid #5a798c !important;
        padding: 17px;
        border-radius: 4px;
        left: 10px;
        border-left: solid 1px;
        border-right: solid 1px;
        background-color: #4a5d73 !important;
        color: #fff;
      }
      /* #invDetailsPanel{ */
        /* display: none; */
      /* } */
      #panel-2{
        display: none;
      }
      .table-main-inv{
        background-color: lightblue;
      }
      .table-sub-inv{
        vertical-align: middle;
        padding: 8px;
        line-height: 1.538462;
        border-top: 1px solid #ddd;
      }
      .main-inv-card{
        padding: 8px 20px 8px 20px;
        /* background-color: #faa800; */
        color: #ffffff;
        text-align: center;
        font-weight: 600;
        flex-direction: column;
        border: #000;
      }
      .inv-name{
        height: auto;
        width: 45%;
        color: #000;
      }
      .main-inv-card table{
        color: #000;
        width: 100%;
      }
      label{
        font-weight: 600 !important;
      }
      .main-inv-card table tr td{
        font-weight: 100;
      }
    </style>
  </head>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed layout-desktop layout-left-sidebar-collapsed">
    <?php $this->load->view('includes/topbar'); ?>
    <div class="site-main">
      <?php $this->load->view('includes/sidebar'); ?>
      <div class="site-content">
        <div class="panel paneo-default" id="create-div">
          <div class="panel-heading menu-bar-colr">
            <h3 class="m-y-0" id="headBank">Create Inventory</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="tab-9">
                  
                  <form id="add-inventory">
                    <div class="form-group col-md-6">
                      <label for="form-control-1" class="control-label input-label">Inventory</label>
                        <div class="input-group autocomplete menu-bar-colr">
                          <span class="input-group-addon">
                            <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                          </span>
                          <input type="text" pattern="^[_A-z0-9]{1,&}$" class="form-control" name="invName" id="name" placeholder="Inventory Name" required>
                          <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('name');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                          </span>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="form-control-2" class="control-label input-label">Supplier</label>
                          <div class="input-group">
                            <select class="form-control select2-supplier-container" data-plugin="select2" name="supplier" id="supplier" style="width: 100%">
                              <option></option>
                              <option value="0">Unknown</option>
                              <?php
                                foreach ($sup as $value) {
                              ?>
                                <option value="<?=$value->supplier_id?>"><?=$value->supplier_name?></option>
                              <?php
                                }
                              ?>
                            </select>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="add supplier" onclick="addItem('supplier');">
                                <i class="zmdi zmdi-plus zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label for="form-control-5" class="control-label input-label">Brand</label>
                          <div class="input-group">
                            <select class="form-control select2-supplier-container" data-plugin="select2" name="brand" id="brand" style="width: 100%">
                              <option></option>
                              <?php
                                foreach ($brd as $value) {
                              ?>
                                <option value="<?=$value->brand_id?>"><?=$value->brand?></option>
                              <?php
                                }
                              ?>
                            </select>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="add brand" onclick="addItem('supplier');">
                                <i class="zmdi zmdi-plus zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row" id="subInvBox">
                        <div class="col-sm-12">
                          <label for="form-control-2" class="control-label input-label">Main Inventory</label>
                          <div class="input-group">
                            <select class="form-control select2-supplier-container" onchange="getInvDetails();" data-plugin="select2" name="InvMain" id="InvMain" style="width: 100%">
                              <option></option>
                              <option value="0">Unknown</option>
                              <?php
                                foreach ($inv as $value) {
                              ?>
                              <option value="<?=$value->inv_id?>"><?=$value->inv_name?></option>
                              <?php
                                }
                              ?>
                            </select>

                          </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="form-control-3" class="control-label input-label" style="padding-top: 12px;"><i class="zmdi zmdi-alert-circle zmdi-hc-fw" data-toggle="tooltip" data-placement="top" title="select the product first before enter the product details"></i>
                              This field is applicable only when you are attempting to create sub product
                            </label><br>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="cost" class="control-label input-label">Cost</label>
                          <div class="input-group">
                            <input type="number" class="form-control" id="cost" name="cost" placeholder="Enter Cost" min="0" required>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="add category" onclick="addItem('supplier');">
                                <i class="zmdi zmdi-plus zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                          <div class="help-block with-errors m-b-0"></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="SP" class="control-label input-label">Selling Price</label>
                          <div class="input-group">
                            <input type="number" class="form-control" id="SP" name="SP" placeholder="Enter Selling Price" min="0" required>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('qty');">
                                <i class="zmdi zmdi-plus zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                          <div class="help-block with-errors m-b-0"></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="qty" class="control-label input-label">Quantity</label>
                          <div class="input-group">
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" min="0" required>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('qty');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                          <div class="help-block with-errors m-b-0"></div>
                        </div>
                        <div class="col-sm-6 cat">
                          <label for="cat" class="control-label input-label">Category</label>
                          <div class="input-group">
                            <select class="form-control select2-supplier-container" data-plugin="select2" name="cat" id="cat" style="width: 100%" required>
                              <option></option>
                              <?php
                                foreach ($cat as $value) {
                              ?>
                                <option value="<?=$value->cat_id?>"><?=$value->cat_name?></option>
                              <?php
                                }
                              ?>
                            </select>
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="add category" onclick="addItem('supplier');">
                                <i class="zmdi zmdi-plus zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                          <div class="help-block with-errors m-b-0"></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      
                    </div>
                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6 reqty-tab">
                          <label for="form-control-5" class="control-label input-label">Re-order Quantity</label>
                          <div class="input-group">
                            <input type="number" class="form-control" id="reqty" name="reqty" placeholder="Enter Re-order Quantity" min="0">
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('qty');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="form-group col-md-6">
                      <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="check">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Mark as deleted</span>
                      </label>
                    </div> -->
                    <div class="form-group col-md-12">
                      <button type="submit" id="submitForm" class="btn m-w-120" style="background-color: #5296ce;">
                        <i class="zmdi zmdi-filter-list zmdi-hc-fw"></i>
                      Go</button>
                    </div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab-10">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia non massa a euismod. Nam bibendum mauris mollis, ultricies orci vitae, tristique est. Mauris pellentesque justo ut est fringilla imperdiet.</p>
                    <p>Cras varius vehicula lorem sollicitudin ullamcorper. Sed nec purus eget velit elementum posuere. Aliquam et orci tincidunt, vulputate tortor quis, iaculis sapien. Praesent semper dui at porta consequat. In quis turpis mollis, rutrum erat tincidunt, tincidunt ipsum. Suspendisse feugiat bibendum faucibus.</p>
                  </div>
                  <!-- <pre> -->
                    <?php
                      // print_r($MainInv);
                    ?>
                  <!-- </pre> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default panel-table" id="panel-2">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5" style="float: left;">Available Inventory</h3>
            <div class="text-right dark-font" style="font-size: 20px;">
              <i class="zmdi zmdi-settings zmdi-hc-fw"></i>
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped dataTable" id="table-2">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Barcode</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Sellin Price</th>
                  </tr>
                </thead>
                <tbody id="table_body">
                    <?php
                      $outOfStock = "";
                      $action = "";
                      $tag = "";
                      // foreach ($inv as $val) {
                        // switch ($val->Sub_Inv_Flag) {
                        //   case 0:
                        //     $action = "";
                        //     $tag = "";
                        //     break;
                          
                        //   default:
                        //     $action = 'onclick="getSubInventory('.$val->Inv_ID.')"';
                        //     $tag = '<i class="zmdi zmdi-widgets zmdi-hc-fw" style="color:green;"></i>';
                        //     break;
                        // }
                        // if($val->Qty <= $val->Reorder_Qty){
                        //   $outOfStock = "background-color: lightgoldenrodyellow";
                        // }else{
                        //   $outOfStock = "";
                        // }
                    ?>
                      <!-- <tr id="tb<?=$val->Inv_ID?>" style="<?=$outOfStock?>" <?=$action?>>
                        <td id="name<?=$val->Inv_ID?>"><?=$val->Inv_Name.' '.$tag?></td>
                        <td><?=$val->Cat_Name?></td>
                        <td><?=$val->Barcode?></td>
                        <td><?=$val->Qty?></td>
                        <td>Rs. <?=number_format("$val->Cost")?></td>
                        <td>Rs. <?=number_format("$val->Selling_Price")?></td>
                      </tr> -->
                    <?php
                      // }
                    ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Barcode</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Sellin Price</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <div class="row" id="invDetailsPanel">
          <div class="col-md-8">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="panel-tools">
                    <span class="badge badge-warning" style="background-color: #faa800;">Re-order</span>
                    <span class="badge badge-danger" style="background-color: #e53935;">Out of stock</span>
                  <a href="#" class="tools-icon">
                    <i class="zmdi zmdi-close"></i>
                  </a>
                </div>
                <h3 class="panel-title"><strong>Sub Inventories</strong></h3>
                <div class="panel-subtitle">+23% from previous period</div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Specification</th>
                      <th>Brand</th>
                      <th>Supplier</th>
                      <th>Quantity</th>
                      <th>Cost</th>
                      <th>Selling Price</th>
                      <th style="width: 5%"></th>
                    </tr>
                  </thead>
                  <tbody id="sub_inv_body">
                    <tr></tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="panel-tools">
                  <a href="#" class="tools-icon">
                    <!-- <i class="zmdi zmdi-download"></i> -->
                  </a>
                  <a href="#" class="tools-icon">
                    <i class="zmdi zmdi-close"></i>
                  </a>
                </div>
                <h3 class="panel-title"><strong>Main Inventory</strong></h3>
                <div class="panel-subtitle">+17% from previous period</div>
              </div>
              <div class="main-inv-card">
                <div class="inv-name" style="width: 100%; text-align: left;">
                    <!-- <h4 id="name-of-inv">this is sample name left</h2> -->
                    <!-- <p id="name-of-cat">this is sample name left</p> -->
                    <button class="btn btn-outline-primary btn-block" id="name-of-inv">  </button>
                </div>
                <!-- <div class="inv-name-img">
                  <span class="input-group-addon" style="padding: 20px 20px;">
                    <i class="zmdi zmdi-widgets zmdi-hc-fw" style="font-size: 30px;"></i>
                  </span>
                </div> -->
                <hr>
                <div>
                  <table>
                    <tr>
                      <td class="text-left">Category</td>
                      <td class="text-right" id="name-of-cate"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Brand</td>
                      <td class="text-right" id="name-of-brd"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Number of Sub Inventories</td>
                      <td class="text-right" id="no-of-subs"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Cost</td>
                      <td class="text-right" id="name-of-cost"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Selling Price</td>
                      <td class="text-right" id="name-of-SP"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Quantity</td>
                      <td class="text-right" id="name-of-qty"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Created Date</td>
                      <td class="text-right" id="name-of-date"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Sub inventory modal-->
        <div id="otherModal1" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header input-text-theme">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
              
                <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="panel-tools">
                    </div>
                    <h3 class="panel-title modal-pro"></h3>
                    <div class="panel-subtitle">Same product from different supplier and different price</div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Supplier</th>
                          <th>Specification</th>
                          <th>Barcode</th>
                          <th>Quantity</th>
                          <th>Cost</th>
                          <th>Sellin Price</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody id="SubInvBody">

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
              <div class="modal-footer text-center">
                <button type="button" data-dismiss="modal" class="btn m-w-120 pull-righ" style="background-color: #5296ce">Continue</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php $this->load->view('includes/footer'); ?>
      
    </div>
    <?php $this->load->view('includes/javascripts'); ?>
    <script src="<?=base_url()?>assets/js/ui-notifications.js"></script>
    <script src="<?=base_url()?>assets/js/forms-plugins.js"></script>
    <script type="text/javascript">
    function ReplaceNumberWithCommas(yourNumber) {
      //Seperates the components of the number
      var n= yourNumber.toString().split(".");
      //Comma-fies the first part
      n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      //Combines the two sections
      return n.join(".");
    }

    function getInvDetails() {  
      let InvId = $('#InvMain').val();
      // $('#invDetailsPanel').fadeOut();
      if (InvId != '') {
        $('#submitForm').removeClass('disabled');
        $('#cat').removeAttr('required');
      }else{
        $('#submitForm').addClass('disabled');
        $('#cat').attr('required', true);
      }
      $('#table_body').empty();
      $('#sub_inv_body').empty();
      let main_inv_body = '';
      let sub_inv_body = '';
      let brand = '';
      let label = '';
      if(!(InvId == '')){
        $.ajax({
          type: 'POST',
          url: "<?=base_url()?>getInvDetails",
          data: 'id='+InvId,
          success: function(result){  
            let resp = $.parseJSON(result);
            main_inv_body += '<tr>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['inv_name'] + '</td>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['cat_name'] + '</td>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['brand'] + '</td>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['qty'] + '</td>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['cost'] + '</td>'+
                          '<td class="table-main-inv">' + resp.MainInv[0]['selling_price'] + '</td>'+
                        '</tr>';

            $('#name-of-inv').html(resp.MainInv[0]['inv_name']);
            $('#no-of-subs').html(ReplaceNumberWithCommas(resp.MainInv[0]['subs']));
            $('#name-of-cat').html(resp.MainInv[0]['cat_name']);
            $('#name-of-cate').html(resp.MainInv[0]['cat_name']);
            $('#name-of-brd').html(resp.MainInv[0]['brand']);
            $('#name-of-cost').html(ReplaceNumberWithCommas(resp.MainInv[0]['cost']));
            $('#name-of-SP').html(ReplaceNumberWithCommas(resp.MainInv[0]['selling_price']));
            $('#name-of-qty').html(ReplaceNumberWithCommas(resp.MainInv[0]['qty']));
            $('#name-of-date').html(resp.MainInv[0]['inv_date']);
            
            if (resp.SubInv.length) {
              for (let i = 0; i < resp.SubInv.length; i++) {
                if (!resp.SubInv[i]['brand']) {
                  brand = resp.MainInv[0]['brand'];
                }else{
                  brand = resp.SubInv[i]['brand'];
                }
                if (resp.SubInv[i]['qty'] < 1) {
                  label = 'danger';
                }else if(resp.SubInv[i]['qty'] < 5){
                  label = 'warning';
                }
                sub_inv_body += '<tr class="'+label+'">'+
                                  '<td class="table-sub-inv" style="padding-left: 20px;">'+
                                    '<span>'+resp.SubInv[i]['specification']+'</span>'+
                                  '</td>'+
                                  '<td class="table-sub-inv">'+brand+'</td>'+
                                  '<td class="table-sub-inv">'+resp.SubInv[i]['supplier_name']+
                                    '<span class="text-success">'+
                                      '<i class="zmdi zmdi-arrow-right-top"></i>'+
                                    '</span>'+
                                  '</td>'+
                                  '<td class="table-sub-inv">'+ReplaceNumberWithCommas(resp.SubInv[i]['qty'])+'</td>'+
                                  '<td class="table-sub-inv">'+ReplaceNumberWithCommas(resp.SubInv[i]['cost'])+'</td>'+
                                  '<td class="table-sub-inv">'+ReplaceNumberWithCommas(resp.SubInv[i]['selling_price'])+'</td>'+
                                  '<td class="actions table-sub-inv">'+
                                    '<a href="#">'+
                                      '<i class="zmdi zmdi-more"></i>'+
                                    '</a>'+
                                  '</td>'+
                                '</tr>';
              }
            }
            
            $('#table_body').append(main_inv_body);
            $('#sub_inv_body').html(sub_inv_body);
            $('#invDetailsPanel').fadeIn();
            $('.cat').fadeOut();
            $('.reqty-tab').fadeOut();
          },
          error: function(result) {  

          }
        });
      }
      $('#invDetailsPanel').fadeOut();
      $('.cat').fadeIn();
      $('.reqty-tab').fadeIn();
    }

    $('#add-inventory').validator().on('submit', function (e) {
      if (!(e.isDefaultPrevented())) {
        e.preventDefault();
        run_waitMe('#create-div');
        // alert($('#add-inventory').serialize());
        $.ajax({
          type: "POST",
          url: "<?=base_url()?>addInventory",
          data: $('#add-inventory').serialize(),
          success: function(result) {
            var responsedata = $.parseJSON(result);
            if(responsedata.status=='success'){
              toastr.success(responsedata.message);
              $('#add-inventory').trigger("reset");
            }else{
              toastr.error(responsedata.message);
            }
            $('#create-div').waitMe('hide');
          },
          error: function(result) {
            $('#create-div').waitMe('hide');
            toastr.error('Error :'+result)
          }
        });
      }
    });


      // var countries = ["Afghanistan","Albania","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

      $("#supplier").select2({
        placeholder: "Select a Supplier",
        allowClear: true
      });

      $("#brand").select2({
        placeholder: "Select a Brand",
        allowClear: true
      });

      $("#cat").select2({
        placeholder: "Select a Category",
        allowClear: true
      });

      $("#InvMain").select2({
        placeholder: "Select Inventory",
        allowClear: true
      });
      
      function chngeBank(id,name){
        // alert(id+" "+name);
        $("#headBank").html(name);
      }

      function copyText(id){
        var copyText = document.getElementById(""+id);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

         /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        toastr.success("Copied the text: " + copyText.value);
        // alert("Copied the text: " + copyText.value);
      }

      // function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      // var currentFocus;
      /*execute a function when someone writes in the text field:*/
      // inp.addEventListener("input", function(e) {
      //     var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          // closeAllLists();
          // if (!val) { return false;}
          // currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          // a = document.createElement("DIV");
          // a.setAttribute("id", this.id + "autocomplete-list");
          // a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          // this.parentNode.appendChild(a);
          /*for each item in the array...*/
          // for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            // if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              // b = document.createElement("DIV");
              /*make the matching letters bold:*/
              // b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              // b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              // b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
                  // b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    // inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
      //               closeAllLists();
      //             });
      //         a.appendChild(b);
      //       }
      //     }
      // });
      /*execute a function presses a key on the keyboard:*/
      // inp.addEventListener("keydown", function(e) {
      //     var x = document.getElementById(this.id + "autocomplete-list");
      //     if (x) x = x.getElementsByTagName("div");
      //     if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            // currentFocus++;
            /*and and make the current item more visible:*/
            // addActive(x);
          // } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            // currentFocus--;
            /*and and make the current item more visible:*/
          //   addActive(x);
          // } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            // e.preventDefault();
            // if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
      //         if (x) x[currentFocus].click();
      //       }
      //     }
      // });
      // function addActive(x) {
        /*a function to classify an item as "active":*/
        // if (!x) return false;
        /*start by removing the "active" class on all items:*/
        // removeActive(x);
        // if (currentFocus >= x.length) currentFocus = 0;
        // if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
      //   x[currentFocus].classList.add("autocomplete-active");
      // }
      // function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
      //   for (var i = 0; i < x.length; i++) {
      //     x[i].classList.remove("autocomplete-active");
      //   }
      // }
      // function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
    //     var x = document.getElementsByClassName("autocomplete-items");
    //     for (var i = 0; i < x.length; i++) {
    //       if (elmnt != x[i] && elmnt != inp) {
    //       x[i].parentNode.removeChild(x[i]);
    //     }
    //   }
    // }
    /*execute a function when someone clicks in the document:*/
    // document.addEventListener("click", function (e) {
    //     closeAllLists(e.target);
    // });
    // }

    // autocomplete(document.getElementById("name"), countries);
    
    </script>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->
</html>