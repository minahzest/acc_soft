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
            <h3 class="m-t-0 m-b-5" style="float: left;">Available Brnad</h3>
            <div class="text-right dark-font" style="font-size: 20px;">
              <button type="button" class="btn btn-outline-theme m-w-120 pull-righ" onclick="addBrd()">
                <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                Add new brand
              </button>
              <!-- <i class="zmdi zmdi-setti395163 !importantngs zmdi-hc-fw"></i> -->
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped dataTable" id="table-2">
                <thead>
                  <tr>
                    <th>Brand</th>
                    <th>Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="table_body">
                    <?php
                      $labelCol = "";
                      foreach ($brands as $val) {
                        if($val->status == 0){
                          $labelCol = "background-color: mistyrose";
                        }else{
                          $labelCol = "";
                        }
                    ?>
                      <tr id="tb<?=$val->brand_id?>" style="<?=$labelCol?>">
                        <td id="name<?=$val->brand_id?>">
                        <label class="custom-control custom-control-primary custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="closeButton">
                          <span class="custom-control-indicator"></span>
                        </label>
                        <?=$val->brand?></td>
                        <td><?=$val->date?></td>
                        <td class="text-right">
                          <button type="button" class="btn btn-outline-theme pull-righ" onclick="editBrd(<?=$val->brand_id?>, '<?=$val->brand?>')">
                            <i class="zmdi zmdi-edit zmdi-hc-fw"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger pull-righ" onclick="deleteBrd(<?=$val->brand_id?>)">
                            <i class="zmdi zmdi-delete zmdi-hc-fw"></i>
                          </button>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Brand</th>
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
                <h4 class="modal-title" style="color: #fff;">Add New Brand</h4>
              </div>
              <div class="modal-body">
                <form id="brand_form">
                  <input type="hidden" name="brand_id" id="brand_id" value="0">
                  <div class="form-group">
                    <label for="form-control-1" class="control-label">Brand</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                      </span>
                      <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
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
      var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla"];
      
      function addBrd(){
        $('#brand_form').trigger('reset');
        $('#brand_id').val(0);
        $('#otherModal2').modal('show');

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
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->
</html>