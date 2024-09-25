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
            <h3 class="m-y-0">Sales Functions</h3>
          </div>
          <div class="panel-body">
            <!-- <pre><?php //echo print_r($outofStock) ?> </pre> -->
            <div class="row row-sm">
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab1">
                <div class="demo-flag-block" onclick="chnage('Sales');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">SLS -</span>
                      <span class="func" id="func1">Billing</span> 
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-receipt zmdi-hc-fw" style="color:#5296ce;"></i> 
                  </span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 tab" id="tab2">
                <div class="demo-flag-block" onclick="chnage('bill_list');" style="cursor: pointer;">
                  <div class="name" title="Afghanistan" style="font-size: 14px;">
                    <strong>
                      <span class="code">SLS -</span>
                      <span class="func" id="func2">Invoice</span>
                    </strong>
                  </div>
                  <div class="capital" style="color: #666666;">Manage</div>
                  <span class="icn-stye"> 
                    <i class="zmdi zmdi-file-text zmdi-hc-fw" style="color:#5296ce;"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 15px;">
          <!-- <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-primary m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">New users
                  <span class="t-caret text-success">
                    <i class="zmdi zmdi-caret-up"></i>
                  </span>
                </div>
                <div class="wt-number">175</div>
                <div class="wt-text">Updated today at 14:57</div>
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
                <div class="wt-title">My Target Sales</div>
                <div class="wt-number">LKR 47,855</div>
                <div class="wt-text">For the month of October</div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-shopping-basket"></i>
              </div>
              <div class="wt-chart">
                <span id="peity-chart-2">7,3,8,4,4,8,10,3,4,5,9,2,5,1,4,2,9,8,5,9</span>
              </div>
            </div>
            <div class="widget widget-tile-2 bg-success m-b-30">
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
            </div>
          </div> -->
          
          <?php
            if ($outofStock) {
          ?>
          <div class="col-md-8 col-sm-7">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="panel-tools">
                  <a href="#" class="tools-icon">
                    <i class="zmdi zmdi-eye zmdi-hc-fw"></i>
                  </a>
                  <a href="#" class="tools-icon">
                    <i class="zmdi zmdi-refresh"></i>
                  </a>
                </div>
                <h3 class="panel-title">Out of Stocks <span class="badge badge-danger">27</span></h3>
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
                      foreach ($outofStock as $value) {
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
                      <?=($value->qty / $value->reorder_qty)*100?>%
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
    </script>
    
  </body>
</html>