<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('includes/head'); ?>
  </head>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed layout-desktop layout-left-sidebar-collapsed">
    <?php $this->load->view('includes/topbar'); ?>
    <div class="site-main">
      <?php $this->load->view('includes/sidebar'); ?>
      <div class="site-content" style="padding-top: 0px;">
        <div class="panel panel-default m-b-0">
          <div class="panel-heading menu-bar-colr">
            <h3 class="m-y-0">Functions</h3>
          </div>
          <div class="panel-body">
            <!-- <pre><?php //echo print_r($outofStock) ?> </pre> -->
            <div class="row row-sm" id="mainDiv">
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab1">
                <div class="demo-flag-block" onclick="chnage('invent');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">INV -</span>
                      <span class="func" id="func1">Inventory</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-widgets zmdi-hc-fw" style="color:#5296ce;"></i> 
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab2">
                <div class="demo-flag-block" onclick="chnage('bank');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">BNK -</span>
                      <span class="func" id="func2">Bank</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-balance zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab3">
                <div class="demo-flag-block" onclick="chnage('sls');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">SLS -</span>
                      <span class="func" id="func3">Sales</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-case-check zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab4">
                <div class="demo-flag-block" onclick="chnage('lgs');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">LGS -</span>
                      <span class="func" id="func4">Logistics</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-truck zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab5">
                <div class="demo-flag-block" onclick="chnage('back-office');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">EMP -</span>
                      <span class="func" id="func5">Employee</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-male-female zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab6">
                <div class="demo-flag-block" onclick="chnage('sup');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">SUP -</span>
                      <span class="func" id="func6">Suppliers</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-nature-people zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab7">
                <div class="demo-flag-block" onclick="chnage('brd');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">BRD -</span>
                      <span class="func" id="func7">Brand</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-local-offer zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab8">
                <div class="demo-flag-block" onclick="chnage('cat');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">CAT -</span>
                      <span class="func" id="func8">Category</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-view-comfy zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 15px;">
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-primary m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Latest Invoice
                  <span class="t-caret text-success">
                    <i class="zmdi zmdi-caret-up"></i>
                  </span>
                </div>
                <div class="wt-number"><?=$invoice[0]->sale_id?></div>
                <div class="wt-text">Issued on <?=$invoice[0]->date?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-accounts"></i>
              </div>
              <div class="wt-chart">
                <span id="peity-chart-1">7,3,8,4,4,8,10,3,4,5,9,2,5,1,4,2,9,8,2,1</span>
              </div>
            </div>
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Total Sales</div>
                <!-- <pre> -->
                  <?php
                    // print_r($total_sales[0]->total);
                  ?>
                <!-- </pre> -->
                <div class="wt-number">Rs. <?=$total_sales[0]->total?></div>
                <div class="wt-text">For the month of October</div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-shopping-basket"></i>
              </div>
              <div class="wt-chart">
                <span id="peity-chart-2">7,3,8,4,4,8,10,3,4,5,9,2,5,1,4,2,9,8,5,9</span>
              </div>
            </div>
            <!-- <div class="widget widget-tile-2 bg-success m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Total Sale for the month</div>
                <div class="wt-number">75%</div>
                <div class="wt-text">Updated: 09:26 AM</div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-email-open"></i>
              </div>
              <div class="wt-chart">
                <span id="peity-chart-3">0,1,2,3,2,1,5,6,7,3,8,9,10,9,8,12,15,11,15,17</span>
              </div>
            </div> -->
          </div>
          <?php
            if ($out_of_stock) {
          ?>
          <div class="col-md-8 col-sm-7">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="panel-tools">
                  <a href="<?=base_url()?>available_inventory" class="tools-icon">
                    <i class="zmdi zmdi-eye zmdi-hc-fw"></i>
                  </a>
                  <a href="javascript:reload()" class="tools-icon">
                    <i class="zmdi zmdi-refresh"></i>
                  </a>
                </div>
                <h3 class="panel-title">Out of Stocks <span class="badge badge-danger"><?=count($out_of_stock)?></span></h3>
                <div class="panel-subtitle">At the moment Product below the reorder level</div>
              </div>
              <div class="table-responsive">
                <table class="table table-borderless table-condensed m-b-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Reduction</th>
                      <th>Last 8 day sales</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 1;
                      foreach ($out_of_stock as $value) {
                    ?>
                    <tr>
                      <td class="col-xs-1"><?=$count?></td>
                      <td class="col-xs-3">
                        <a href="#" class="text-primary"><?=$value->inv_name?></a>
                      </td>
                      <td class="col-xs-3">
                        <?=$value->qty?>
                      </td>
                      <td class="col-xs-3" style="color: red;">
                      <?=$value->Percent?>%
                        <i class="zmdi zmdi-arrow-left-bottom"></i>
                      </td>
                      <td>
                        <span data-chart="peity" data-type="line">5,3,1,6,2,9,2,3,5,2</span>
                      </td>
                    </tr>
                    <?php $count++; }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        </div>
      </div>
      <?php $this->load->view('includes/footer'); ?>
    </div>
    <?php $this->load->view('includes/javascripts'); ?>
    <script src="<?=base_url()?>assets/js/dashboard-2.js"></script>
    <script>
      function chnage(name){
        window.location.href = "<?=base_url()?>"+name;
      }
      function search(){
        $('.tab').css("visibility", "visible");
        var st = $('#srach').val().toLowerCase();
        if (st == '' || st == null) {
          st = '$';
        }
        for (let a = 1; a <= $('.func').length; a++) {
          if($('#func'+a).text().toLowerCase().indexOf(st) > -1){
            $('#tab'+a).show();
          }else if(st=='$'){
            $('#tab'+a).show();
          }else{
            $('#tab'+a).hide();
          }
        }
        // $("#mainDiv").load(location.href+" #mainDiv>*","");
      }
      function chnage(name){
        window.location.href = "<?=base_url()?>"+name;
      }
      $('#srach').on('keypress',function(e) {
          // alert('You pressed enter!');
        if(e.which == 13){//Enter key pressed
          $('#searchButton').click();//Trigger search button click event
        }
      });

      function reload(){  
        location.reload();
      }
    </script>
    
  </body>
</html>