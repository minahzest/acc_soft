<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/cosmos/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:29 GMT -->

<head>
  <?php $this->load->view('includes/head'); ?>
  <style>
    @media print {
      body * {
        visibility: hidden;
        margin-top: 0px;

      }

      .panel,
      .panel * {
        visibility: visible;
      }

      /* .panel {
        position: absolute;
        left: 0;
        top: 0;
      } */
      .btn,
      .btn * {
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
          <div class="row m-b-30" style="display: flex;">
            <div class="col-lg-3">
              <img src="<?= base_url() ?>assets/img/logo.jpeg" style="width: 135px; margin-left: -17px;">
              <p>360/4B Warana Road,
                <br>Thihariya,
                <br>Kalagedihena.
              </p>
              <!-- <p class="m-b-0">Telephone: +94 77 669 4984</p> -->
              <!-- <p class="m-b-0 pull-right">+94 77 445 4943</p> -->
            </div>
            <div class="col-sm-7 text-center" style="margin-left: 50px;">
              <h1 class="m-t-0" style="font-weight: 900; font-size: 32px;">DELHI MOTORS</h1>
              <p class="m-b-0" style="font-size: 15px;">Importers & Retailer of Genuine Spare of</p>
              <p class="m-b-0" style="font-size: 12px;">TATA - MAHINDRA - LEYLAND - MARUTI - ALTO</p>
              <p class="m-b-0" style="font-size: 12px;">Tel: +94 77 669 4984 | +94 77 445 4943</p>
            </div>
            <div class="col-lg-3 text-right">
              <p class="m-b-0"><?= $invoice_data['customer'] ?></p>
              <p class="m-b-0"><?= $invoice_data['date'] ?></p>
              <p>Invoice number: <span style="font-weight: bold;"><?= $invoice_number ?></span> </p>
            </div>
          </div>
          <table class="table table-bordered m-b-30">
            <thead>
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
              $subTotal = 0;
              $count = 1;
              foreach ($items as $key => $value) {
                $subTotal = $subTotal + $value['subtotal'];
              ?>
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $value['name'] ?></td>
                  <td><?= $value['qty'] ?></td>
                  <td>Rs. <?= $value['price'] ?></td>
                  <td>Rs. <?= $value['qty'] * $value['price'] ?></td>
                </tr>
              <?php
                $count++;
              }
              ?>
              <tr>
                <td scope="row" colspan="3">
                  <div class="text-center">
                    <?php
                      if ($invoice_data['discount'] != 0) {
                    ?>
                    This invoice is entitle to 
                    <strong><?=$invoice_data['discount']?>% </strong>
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
                  Rs. <?= $subTotal ?>
                  <!-- <br> $180.50
                  <br> $1009.00 -->
                  <br>
                  <?php
                      if ($invoice_data['discount'] != 0) {
                        $disc = ($subTotal/100)*$invoice_data['discount'];
                    ?>
                      <strong>Rs. <?= $subTotal-$disc ?></strong>
                    <?php
                      }else{
                    ?>
                      <strong>Rs. <?= $subTotal?></strong>
                    <?php
                      }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>
          <p class="text-muted m-b-0">Thank you for your business. We do expect payment within 03 months, so please process this invoice within that time.</p>
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
    function changeLocation() {
      window.location.href = '<?= base_url() ?>Sales';
    }
  </script>
</body>

<!-- Mirrored from big-bang-studio.com/cosmos/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:29 GMT -->

</html>