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
      .btn-outline-theme{
        background-color: transparent;
        border-color: #395163;
        color: #395163;
      }
      .btn-outline-theme:hover{
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
        
          <div class="panel-group" id="accordionOne" role="tablist" aria-multiselectable="true" style="margin-bottom: 0px;">
            <div class="panel panel-default">
              
            </div>
          </div>

        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5" style="float: left;">Invoice</h3>
            <div class="text-right dark-font" style="font-size: 20px;">
              <button type="button" class="btn btn-outline-theme m-w-120 pull-righ" onclick="issueBill()">
                <i class="zmdi zmdi-receipt zmdi-hc-fw"></i>
                Issue bill
              </button>
              <!-- <i class="zmdi zmdi-setti395163 !importantngs zmdi-hc-fw"></i> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped dataTable" id="table-2">
                <thead>
                  <tr>
                    <th>Invoice number</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="table_body">
                    <?php
                      $labelCol = "";
                      foreach ($invoice as $val) {
                        if($val->status == 2){
                          $labelCol = "background-color: mistyrose";
                        }else if ($val->status == 3) {
                          $labelCol = "background-color: lightgoldenrodyellow";
                        }else{
                          $labelCol = "";
                        }
                    ?>
                      <tr id="tb<?=$val->sale_id?>" style="<?=$labelCol?>">
                        <td id="name<?=$val->sale_id?>">
                        <label class="custom-control custom-control-primary custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="closeButton">
                          <span class="custom-control-indicator"></span>
                        </label>
                        <?=$val->sale_id?></td>
                        <td><?=$val->customer?></td>
                        <td><?=$val->amount?></td>
                        <td><?=$val->date?></td>
                        <td class="text-right">
                          <button type="button" class="btn btn-outline-warning pull-righ" onclick="status(<?=$val->sale_id?>,<?=$val->status?>)">
                            <i class="zmdi zmdi-edit zmdi-hc-fw"></i>
                          </button>
                          <button type="button" class="btn btn-outline-theme pull-righ" onclick="viewSls(<?=$val->sale_id?>)">
                            <i class="zmdi zmdi-eye zmdi-hc-fw"></i>
                          </button>
                          <!-- <button type="button" class="btn btn-outline-danger pull-righ" onclick="deleteSls(<?=$val->sale_id?>)">
                            <i class="zmdi zmdi-delete zmdi-hc-fw"></i>
                          </button> -->
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Invoice number</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <!--new category modal-->
        <div id="otherModal2" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header input-text-theme">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button>
                <h4 class="modal-title" style="color: #fff;">Bill Status</h4>
              </div>
              <div class="modal-body">
                <form id="sale_form">
                  <input type="hidden" name="sale_id" id="sale_id" value="0">
                  <div class="form-group">
                    <label for="form-control-1" class="control-label">Status</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                      </span>
                      <select class="form-control" data-plugin="select2" name="stat" id="stat" style="width: 100%">
                        <option value="1">Active</option>
                        <option value="2">Cancel</option>
                        <option value="3">Return</option>
                      </select>
                    </div>
                    <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn" style="background-color: #5296ce; color:#fff;">Submit</button>
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <?php $this->load->view('includes/footer'); ?>
      
    </div>
    <?php $this->load->view('includes/javascripts'); ?>
    <script src="<?=base_url()?>assets/js/tables-datatables.js"></script>
    <script src="<?=base_url()?>assets/js/ui-notifications.js"></script>
    <script src="<?=base_url()?>assets/js/forms-plugins.js"></script>
    <script type="text/javascript">
      $('#stat').select2({
        placeholder: 'Select status'
      });
      var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla"];
      
      function viewSls(id){
          window.location.href = '<?=base_url()?>view_invoice/'+id;
      }

      function editBrd(id,name){
        $('#brand_form').trigger('reset');
        $('#brand_id').val(id);
        $('#brand').val(name);
        $('#otherModal2').modal('show');

      }
    </script>
    <script>
      $('#brand_form').on('submit', function(e){  
        e.preventDefault();
        alert('hi');
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>save_brand_ajax',
          data: $('#brand_form').serialize(),
          success: function(result){  
            var res = $.parseJSON(result);
            if (res.status == 'success') {
              // alert(res.msg);
              toastr.success(res.msg);
              location.reload();
              $('#brand_form').trigger('reset');
              $('#brand_id').val(0);
              $('#otherModal2').modal('hide');
            }else{
              // alert(res.msg);
              toastr.error(res.msg);

            }
          },
          error: function(result){  

          }
        });
      });
    </script>
    <script>
      function issueBill(){  
        window.location.href = "<?=base_url()?>Sales";
      }
    </script>
    <script>
      function status(id,stat){  
        $('#sale_id').val(id);
        $('#stat').val(stat);
        $('#stat').trigger('change');
        // $('#stat option[value="'+stat+'"]')
        // $("#stat option:eq("+stat+")").prop('selected', true)
        // $("#stat").select(stat)
        $('#otherModal2').modal('show');
      }

      $('#sale_form').on('submit', function(e){  
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>update_status_ajax',
          data: 'id='+$('#sale_id').val()+'&stat='+$('#stat').val(),
          success: function (result){  
              var res = $.parseJSON(result);
              if(res.status == 'success'){
                toastr.success(res.message);
                setTimeout(
                  function() {
                    location.reload();
                  }, 1000);
              }else{
                toastr.error(res.message);
              }
          },
          error: function (result){  

          }
        });
      });
    </script>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->
</html>