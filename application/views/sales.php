<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('includes/head'); ?>
  <style>
    .btn-outline-theme {
      background-color: transparent;
      border-color: #395163;
      color: #395163;
    }

    .btn-outline-theme:hover {
      background-color: #395163;
      border-color: #395163;
      color: #fff;
    }
  </style>
</head>

<body class="layout layout-header-fixed layout-left-sidebar-fixed layout-desktop layout-left-sidebar-collapsed">
  <?php $this->load->view('includes/topbar'); ?>
  <div class="site-main">
    <?php $this->load->view('includes/sidebar'); ?>

    <div class="site-content" style="padding-top: 0px;">

      <div class="panel panel-default">
        <div class="panel-heading menu-bar-colr">
          <h3 class="m-y-0">Invoice</h3>
          <!-- <pre> -->
            <?php
              // print_r($this->session->invoice_data['date']);
            ?>
          <!-- </pre> -->
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-6">
              <label for="">Customer Name</label>
              <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" pattern="a-z">
            </div>
            <div class="form-group col-sm-6">
              <label for="">Date</label>
              <input type="date" class="form-control" id="invoice_date">
            </div>
            <div class="form-group col-sm-6">
              <label for="">Discount (%)</label>
              <input type="number" class="form-control" id="discount" placeholder="Enter Discount Percentage Value Only">
            </div>
          <div class="row row-sm">

          </div>
        </div>
      </div>

      <div class="row" id="invDetailsPanel">
        <div class="col-md-8">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="panel-tools">
                <button class="btn btn-outline-theme m-w-120 pull-righ" onclick="getProduct()"><strong><i class="zmdi zmdi-plus"></i></strong></button>
              </div>
              <h3 class="panel-title" style="height: 30px;"><strong>Product List</strong></h3>
              <!-- <div class="panel-subtitle">+23% from previous period</div> -->
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sum</th>
                    <th style="width: 5%">
                      Action
                      <!-- <i class="zmdi zmdi-edit"></i>
                      <i class="zmdi zmdi-edit"></i> -->
                    </th>
                  </tr>
                </thead>
                <tbody id="sub_inv_body">
                  <!-- <pre> -->
                    <?php
                    // print_r($this->cart->contents());
                    ?>
                  <!-- </pre> -->
                  <!-- // print_r($this->cart->contents()); -->
                  <?php
                  $subtotal = 0;
                  $count = 1;
                  foreach ($this->cart->contents() as $items) {
                    $subtotal = $items['subtotal'] + $subtotal;
                  ?>
                    <tr id="row<?= $items['rowid'] ?>">
                      <td><?=$count?></td>
                      <td><?= $items['name'] ?></td>
                      <td><?= $items['price'] ?></td>
                      <td style="width: 20%;"> <input type="number" class="form-control" style="width: 50%;" min="1" id="qty<?= $items['rowid'] ?>" value="<?= $items['qty'] ?>" onchange="updateQty('<?= $items['rowid'] ?>','<?= $items['price']?>')"></td>
                      <td id="sum<?= $items['rowid'] ?>"><?= $items['price'] * $items['qty'] ?></td>
                      <td class="text-center">
                        <a href="javascript:removeItem('<?= $items["rowid"] ?>');" style="color: #e40f0a !important;">
                          <i class="zmdi zmdi-delete"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  $count++;
                  }
                  ?>
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
              <h3 class="panel-title"><strong>Invlice Details</strong></h3>
              <!-- <div class="panel-subtitle">+17% from previous period</div> -->
            </div>
            <div class="main-inv-card">
              <div class="inv-name" style="width: 100%; text-align: left;">
                <!-- <h4 id="name-of-inv">this is sample name left</h2> -->
                <!-- <p id="name-of-cat">this is sample name left</p> -->
                <!-- <button class="btn btn-outline-primary btn-block" id="name-of-inv">  </button> -->
              </div>
              <!-- <div class="inv-name-img">
                  <span class="input-group-addon" style="padding: 20px 20px;">
                    <i class="zmdi zmdi-widgets zmdi-hc-fw" style="font-size: 30px;"></i>
                  </span>
                </div> -->
              <!-- <hr> -->
              <div style="margin: 20px;">
                <table style="width: 100%;">
                  <tbody>
                    <tr>
                      <td class="text-left">Invoice Number</td>
                      <!-- <pre> -->
                        <?php
                          // print_r($invoice)
                        ?>
                      <!-- </pre> -->
                      <td class="text-right" id="invlice-number"><?= $invoice[0]->sale_id+1 ?></td>
                    </tr>
                    <tr>
                      <td class="text-left">Invlice Type</td>
                      <td class="text-right" id="invoice-type">Sales</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e5e5;">
                      <td class="text-left">Date</td>
                      <td class="text-right" id="invoice-date"><?= date('Y-m-d') ?></td>
                    </tr>
                  </tbody>
                </table>
                <table style="width: 100%; margin-top: 15px;">
                  <tbody>
                    <tr>
                      <td class="text-left"><strong>Total Price</strong></td>
                      <td class="text-right" id="invoice-total"><?= $subtotal ?></td>
                    </tr>
                    <tr>
                      <td class="text-left">Cash Received</td>
                      <td class="text-right" id="cah-received"></td>
                    </tr>
                    <tr>
                      <td class="text-left">Balance</td>
                      <td class="text-right" id="invoice-balance"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <button class="btn btn-block btn-outline-theme " id="get_invoice">submit</button>
            </div>
          </div>
        </div>
      </div>


      <!--new product modal-->
      <div id="products" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header input-text-theme">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close"></i>
                </span>
              </button>
              <h4 class="modal-title" style="color: #fff;">Add New Product to Invoice</h4>
            </div>
            <div class="modal-body">
              <div class="row m-x-0">
                <div class="col-sm-7 col-lg-7">
                  <form id="pro_form">
                    <div class="form-group">
                      <input type="hidden" id="selling_price" name="selling_price" value="0">
                      <input type="hidden" id="product_name" name="product_name" value="">
                      <label for="form-control-1" class="control-label">Product</label>

                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="zmdi zmdi-view-comfy zmdi-hc-fw"></i>
                        </span>
                        <!-- <select class="form-control-2 select2-supplier-container" data-plugin="select2" name="pro" id="pro" style="width: 100%" onchange="getProInfo()"> -->
                        <select class="form-control" data-plugin="select2" name="pro" id="pro" style="width: 100%" onchange="getProInfo()">
                          <option></option>
                          <?php
                          foreach ($products as $key => $value) {
                          ?>
                            <option value="<?= $value->inv_id ?>"><?= $value->inv_name ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      
                      <!-- <input type="text" class="form-control" id="product" name="product" placeholder="Product"> -->
                      <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                    </div>
                    <div class="form-group">
                      <label for="form-control-1" class="control-label">Quantity</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="zmdi zmdi-storage zmdi-hc-fw"></i>
                        </span>
                        <form id="list_form">
                        <input type="number" class="form-control" id="qty" name="qty" value="1" placeholder="Quantity">
                      </div>
                      <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                    </div>
                    <div class="form-group">
                      <label for="form-control-1" class="control-label">Price</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="zmdi zmdi-money zmdi-hc-fw"></i>
                        </span>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                      </div>
                      <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                    </div>
                </div>
                <div class="col-5 col-sm-5 col-lg-5">
                  <div style="border: 1px solid #e5e5e5; height: 184px; margin-top: 23px;">
                    <!-- <i class="zmdi zmdi-receipt zmdi-hc-fw"></i> -->
                    <div class="text-center"><span class="form-control-1">Product Information</span></div>
                    <table style="width: -webkit-fill-available; margin: 15px 10px 10px 10px;">
                      <tbody id="pro_info_body">
                        <tr>
                          <td class="text-left">Name</td>
                          <td class="text-right" id="pro_name"></td>
                        </tr>
                        <tr>
                          <td class="text-left"><strong>Quantity</strong></td>
                          <td class="text-right"><strong id="pro_qty"></strong></td>
                        </tr>
                        <tr>
                          <td class="text-left">Cost</td>
                          <td class="text-right" id="pro_cost">Rs.</td>
                        </tr>
                        <tr>
                          <td class="text-left"><strong>Selling Price</strong></td>
                          <td class="text-right"><strong id="pro_price">Rs.</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn" id="add_list" style="background-color: #5296ce; color:#fff;">Add to list</button>
              <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
  </div>

  <?php $this->load->view('includes/footer'); ?>
  </div>
  <?php $this->load->view('includes/javascripts'); ?>
  <script src="<?= base_url() ?>assets/js/dashboard-2.js"></script>
  <script src="<?= base_url() ?>assets/js/ui-notifications.js"></script>
  <script src="<?= base_url() ?>assets/js/forms-plugins.js"></script>

  <script>  
    $("#pro").select2({
      placeholder: "Select a Product",
      allowClear: true,
      dropdownParent: $('#products')
    });

    function search() {
      $('.tab').css("visibility", "visible");
      var st = $('#srach').val().toLowerCase();
      if (st == '' || st == null) {
        st = '$';
      }
      for (let a = 1; a <= $('.func').length; a++) {
        if ($('#func' + a).text().toLowerCase().indexOf(st) > -1) {
          $('#tab' + a).show();
        } else if (st == '$') {
          $('#tab' + a).show();
        } else {
          $('#tab' + a).hide();
        }
      }

    }

    function chnage(name) {
      window.location.href = "<?= base_url() ?>" + name;
    }

    $('#srach').on('keypress', function(e) {
      // alert('You pressed enter!');
      if (e.which == 13) { //Enter key pressed
        $('#searchButton').click(); //Trigger search button click event
      }


    });
  </script>
  <script>
    function getProduct() {
      // alert();

      $('#products').modal('show');
    }

    function getProInfo(id) {
      if ($('#pro').val() == '') {
        $('#pro_name').text('');
        $('#pro_qty').text('');
        $('#pro_cost').text('Rs. ');
        $('#pro_price').text('Rs. ');
        $('#selling_price').val(0);
        $('#product_name').val('');
      } else {
        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>getProInfo',
          data: 'id=' + $('#pro').val(),
          success: function(result) {
            var res = $.parseJSON(result);
            if (res.status == 'success') {
              $('#pro_name').text(res.data['inv_name']);
              $('#pro_qty').text(res.data['qty']);
              $('#pro_cost').text('Rs. ' + res.data['cost']);
              $('#pro_price').text('Rs. ' + res.data['selling_price']);
              $('#selling_price').val(res.data['selling_price']);
              $('#product_name').val(res.data['inv_name']);
              $('#qty').focus();




            }
          },
          error: function(result) {

          }
        });
      }

    }
  </script>
  <script>
    $('#add_list').on('click', function(e) {
      // alert($('#pro').val());
      if ($('#pro').val() == '' || $('#pro').val() == null || $('#qty').val() == 0 || $('#qty').val() == '') {
        alert('Select product and quantity cannot be zero');
      } else {
        $.ajax({
          type: 'POST',
          url: '<?= base_url() ?>addList',
          data: $('#pro_form').serialize(),
          success: function(result) {
            var res = $.parseJSON(result);
            if (res.status == 'success') {
              location.reload();
            }
          },
          error: function(result) {

          }
        });
      }
    });
  </script>
  <script>
    function removeItem(row_id) {
      $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>remove_cart_item_ajax",
        data: 'rowid=' + row_id,
        cache: false,
        success: function(result) {
          var responsedata = $.parseJSON(result);
          $('#row' + row_id).animate({
            backgroundColor: 'red'
          }, 100).fadeOut(100, function() {
            $('#row' + row_id).remove();
          });
          // $('#crtSubTot1').text((responsedata.total).toLocaleString('en'));
          // $('#crtSubTot2').text((responsedata.total).toLocaleString('en'));
          // $("#num_order").text(responsedata.count);
        }
      });
    }

    function updateQty(id,price){  
      // alert(price);
      $.ajax({
          type: "POST",
          url: "<?=base_url()?>update_qty_ajax",
          data: 'rowid='+ id +'&qty='+ $('#qty'+id).val(),
          cache: false,
          success: function(result){
              var responsedata = $.parseJSON(result);
              if(responsedata.status=='success'){
                  $('#sum'+id).text(($('#qty'+id).val()*price));
              }else{
                  toastr["warning"](responsedata.message)
              }
          },
          error: function(result) {
              toastr["error"](result);
          }
      });
    }
  </script>
  <script>
    $('#get_invoice').on('click', function(e) {
      var customer = $('#customer_name').val();
      var invoice_date = $('#invoice_date').val();
      var discount = $('#discount').val();
      if (customer == '') {
        customer = 'unknown';
      }
      $.ajax({
        type: 'POST',
        url: '<?=base_url()?>save_invoice_ajax',
        data: 'customer='+customer+'&date='+invoice_date+'&discount='+discount,
        success: function(result){  
          var res = $.parseJSON(result);
          if (res.status == 'success') {
            window.location.href = "<?=base_url();?>invoice";
          }else{
            toastr.error(res.msg);
          }
        },
        error: function(result){  

        }
      });
    });
  </script>
</body>

</html>