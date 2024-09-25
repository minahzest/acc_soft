<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/cosmos/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:29 GMT -->
<head>
  <?php $this->load->view('includes/head'); ?>
  <style>
  	table {
            border: 1px solid #ddd !important;
            border-width: 1px 0 0 1px !important;
            border-bottom-style: none;
        }
      th, td {
            border: 1px solid #ddd !important;
            border-width: 0 1px 1px 0 !important;
            border-bottom-style: none;
        }
    @media print {
      body * {
        visibility: hidden;
      }
      table{
            border: solid white !important;
            /*border-width: 1px 0 0 1px !important;
            border-bottom-style: none !important;*/
        }
      th, td{
            border: solid white !important;
            /*border-width: 0 1px 1px 0 !important;
            border-bottom-style: none !important;*/
        }
       /*table tr, td{ 
       	border: none !important; 
       	zoom: 1; 
       }*/

      .panel, .panel * {
        visibility: visible;
      }
      thead *{
        visibility: hidden;
     

      } 
      .btn, .btn *{
        visibility: hidden;
      }
      
    }
  </style>
</head>

<body class="layout layout-header-fixed layout-left-sidebar-fixed layout-desktop layout-left-sidebar-collapsed">
  <?php $this->load->view('includes/topbar'); ?>
  <div class="site-main">
    <?php $this->load->view('includes/sidebar'); ?>
    <div class="site-content">
      <div class="panel panel-default m-b-0" style="margin-top: -102px;">
        <div class="panel-heading">
          <h3 class="m-y-0">Invoice</h3>
        </div>
        <div class="panel-body" id="panel_body">
          <div class="row" style="display: flex; visibility: hidden;">
            <div class="col-sm-3">
              <img src="<?= base_url() ?>assets/img/logo.jpeg" style="width: 135px; margin-left: -17px;">
              <p>360/4B Warana Road,
                <br>Thihariya,
                <br>Kalagedihena.
              </p>
              <!-- <p class="m-b-0">Tel: +94 77 669 4984</p>
              <p class="m-b-0">Tel: +94 77 445 4943</p> -->
            </div>
            <div class="col-sm-7 text-center" style="margin-left: 50px;">
              <h1 class="m-t-0" style="font-weight: 900; font-size: 32px;">DELHI MOTORS</h1>
              <p class="m-b-0" style="font-size: 15px;">Importers & Retailer of Genuine Spare of</p>
              <p class="m-b-0" style="font-size: 12px;">TATA - MAHINDRA - LEYLAND - MARUTI - ALTO</p>
              <p class="m-b-0" style="font-size: 12px;">Tel: +94 77 669 4984 | +94 77 445 4943</p>
            </div>
            <div class="col-sm-2" style="margin-left: 50px;">
              <p class="m-b-0"><?=$invoice[0]->customer?></p>
              <p class="m-b-0"><?=$invoice[0]->date?></p>
              <p>Invoice number: <span style="font-weight: bold;"><?=$invoice[0]->sale_id?></span> </p>
            </div>
          </div>
          <div class="row">
          	<div class="col-sm-2">

            </div>
            <div class="col-sm-8">
              <p class="m-b-0"><?=$invoice[0]->customer?></p>
            </div>
            <div class="col-sm-2">
              <p class="m-b-0"><?=$invoice[0]->date?></p>
              <p>Invoice number: <span style="font-weight: bold;"><?=$invoice[0]->sale_id?></span> </p>
            </div>
          </div>
          <table class="table m-b-30">
            <thead style="">
              <tr>
                <th>
                  #
                </th>
                <th>
                  Description
                </th>
                <th>
                  Quantity
                </th>
                <th>
                  Unit Price
                </th>
                <th>
                  Amount
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
              foreach ($invoice as $key => $value) {
              ?>
                <tr>
                  <td><?=$count?></td>
                  <td width="50%"><?=$value->inv_name?></td>
                  <td><?=$value->qty?></td>
                  <td>Rs. <?=$value->price?></td>
                  <td>Rs. <?=$value->qty*$value->price?></td>
                </tr>
              <?php
              $count++;
              }
              ?>
              <?php
              	if ($count < 15) {
              		for ($i=0; $i < (16-$count); $i++) { 
              ?>
				<tr style="visibility: hidden; border-style: none">
                  <td>ab</td>
                  <td>ab</td>
                  <td>ab</td>
                  <td>ab</td>
                  <td>ab</td>
                </tr>
              <?php
          			}
          		}
              ?>
              <tr>
                <td scope="row" colspan="3">
                  <div class="text-center">
                    <?php
                      if ($invoice[0]->discount != 0) {
                    ?>
                    This invoice is entitle to 
                    <strong><?=$invoice[0]->discount?>% </strong>
                    Discount
                    <?php
                      }
                    ?>
                  </div>
                </td>
                <td scope="row" colspan="1">
                  <div class="text-right">
                    Subtotal
                    <!-- <br> Shipping
                    <br> Discount (20%) -->
                    <br>
                    <strong>TOTAL</strong>
                  </div>
                </td>
                <td>
                  Rs. <?=$invoice[0]->amount?>
                  <!-- <br> $180.50
                  <br> $1009.00 -->
                  <br>
                  <?php
                      // if ($invoice[0]->customer != 0) {
                        $disc = ($invoice[0]->amount/100)*$invoice[0]->discount;
                    ?>
                      <strong>Rs. <?= $invoice[0]->amount-$disc ?></strong>
                    <?php
                      // }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- <p class="text-muted m-b-0">Thank you for your business. We do expect payment within 03 months, so please process this invoice within that time.</p> -->
          <!-- <pre>
            <?php
            // print_r($items);
            ?>
          </pre> -->
        </div>
        <div class="panel-footer text-right">
          <button type="button" class="btn btn-warning btn-labeled" onclick="changeLocation()">Close
            <span class="btn-label btn-label-right p-x-10">
              <i class="zmdi zmdi-close"></i>
            </span>
          </button>
          <button type="button" class="btn btn-primary btn-labeled" onclick="print()">Print
            <span class="btn-label btn-label-right p-x-10">
              <i class="zmdi zmdi-print"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
    <?php $this->load->view('includes/footer'); ?>
  </div>
  <?php $this->load->view('includes/javascripts'); ?>
  <script>
    function changeLocation(){  
      window.location.href = '<?=base_url()?>bill_list';
    }
  </script>
</body>

<!-- Mirrored from big-bang-studio.com/cosmos/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:29 GMT -->
<!-- ALTER TABLE users AUTO_INCREMENT=1001; -->

</html>