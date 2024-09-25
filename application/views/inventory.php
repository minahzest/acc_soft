<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->

<head>
  <?php $this->load->view('includes/head'); ?>
  <style type="text/css">
    @media (min-width: 768px) {
      .modal-dialog {
        width: 800px;
      }
    }

    .zmdi-filter-list {
      transform: rotate(0deg) !important;
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
          <div class="panel-heading menu-bar-colr" role="tab">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordionOne" href="#accordion-1" aria-expanded="false" class="collapsed bar-fnt-colr">
                <i class="zmdi zmdi-chevron-down"></i> Advance Fiter <i class="zmdi zmdi-filter-list zmdi-hc-fw"></i>
              </a>
              <div class="text-right" style="float: right; margin-top: -5px;">
                <button class="btn m-w-120 pull-righ" style="background-color: #5296ce" onclick="addInv()">
                  <i class="zmdi zmdi-widgets zmdi-hc-fw"></i> Create Inventory
                </button>
              </div>
            </h4>
          </div>
          <div id="accordion-1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
            <div class="panel-body menu-bar-colr">
              <row>
                <div class="">
                  <form id="filter-form">

                    <div class="form-group col-md-6">
                      <label for="form-control-1" class="control-label input-label">Inventory</label>
                      <div class="input-group autocomplete">
                        <span class="input-group-addon">
                          <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                        </span>
                        <input type="text" pattern="^[_A-z0-9]{1,&}$" class="form-control input-text-theme" id="name" placeholder="Inventory Name">
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
                            <input type="text" class="form-control input-text-theme" id="supplier" placeholder="Supplier Name" name="supplier">

                            <!-- <select class="form-control input-text-theme" data-plugin="select2" name="supplier" id="supplier" style="width: 100%" style="background-color: #4a5d73; border: 1px solid #5a798c; color: #a4adb3;">
                                  <option disabled selected>Supplier</option>
                                  <option value="option1">HTML</option>
                                  <option value="option2">CSS</option>
                                  <option value="option3">Javascript</option>
                                  <option value="option4">PHP</option>
                                  <option value="option5">Bootstrap</option>
                                </select> -->

                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('supplier');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label for="form-control-5" class="control-label input-label">Suppier Code</label>
                          <div class="input-group">
                            <input type="text" class="form-control input-text-theme" id="SPcode" placeholder="Suppier Code">
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('SPcode');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="form-control-3" class="control-label input-label">Choose counrty</label>
                          <select id="form-control-3" class="custom-select input-text-theme">
                            <option value="" selected="selected">Choose counrty</option>
                            <option value="1">Denmark</option>
                            <option value="2">Iceland</option>
                            <option value="3">Republic of Macedonia</option>
                            <option value="4">Saint Kitts and Nevis</option>
                            <option value="4">Sri anka</option>
                            <option value="5">Vanuatu</option>
                            <option value="6">Yemen</option>
                            <option value="7">Zimbabwe</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <label for="form-control-2" class="control-label input-label">Inventory Code</label>
                          <div class="input-group">
                            <input type="text" class="form-control input-text-theme" pattern="^[_A-z0-9]{1,&}$" id="InvCode" placeholder="Inventory Code" name="InvCode">
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('InvCode');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="form-control-5" class="control-label input-label">Category</label>
                          <div class="input-group">
                            <input type="text" class="form-control input-text-theme" id="cat" name="cat" placeholder="Suppier Code">
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('SPcode');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                          <!-- <div class="help-block with-errors m-b-0">Minimum of 6 characters</div> -->
                        </div>
                        <div class="col-sm-6">
                          <label for="form-control-5" class="control-label input-label">Category Code</label>
                          <div class="input-group">
                            <input type="text" class="form-control input-text-theme" id="catCode" name="catCode" placeholder="Confirm">
                            <span class="input-group-btn">
                              <label class="btn input-text-theme" data-toggle="tooltip" data-placement="top" title="Copy" onclick="copyText('catCode');">
                                <i class="zmdi zmdi-copy zmdi-hc-fw"></i>
                              </label>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="check">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Mark as deleted</span>
                      </label>
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn m-w-120" style="background-color: #5296ce;">
                        <i class="zmdi zmdi-filter-list zmdi-hc-fw"></i>
                        Go</button>
                    </div>
                  </form>
                </div>
              </row>
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default panel-table">
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
                foreach ($inv as $val) {
                  $action = 'onclick="getSubInventory(' . $val->inv_id . ')"';
                  // switch ($val->sub_inv_flag) {
                  //   case 0:
                  //     $action = "";
                  //     $tag = "";
                  //     break;

                  //   default:
                  //     $tag = '<i class="zmdi zmdi-widgets zmdi-hc-fw" style="color:green;"></i>';
                  //     break;
                  // }
                  if ($val->qty <= $val->reorder_qty) {
                    $outOfStock = "background-color: lightgoldenrodyellow";
                  } else {
                    $outOfStock = "";
                  }
                ?>
                  <tr id="tb<?= $val->inv_id ?>" style="<?= $outOfStock ?>" <?= $action ?>>
                    <td id="name<?= $val->inv_id ?>">
                      <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="closeButton">
                        <span class="custom-control-indicator"></span>
                      </label>
                      <?= $val->inv_name . ' ' . $tag ?>
                    </td>
                    <td><?= $val->cat_name ?></td>
                    <td><?= $val->barcode ?></td>
                    <td><?= $val->qty ?></td>
                    <td>Rs. <?= number_format("$val->cost") ?></td>
                    <td>Rs. <?= number_format("$val->selling_price") ?></td>
                  </tr>
                <?php
                }
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
              <h4 class="modal-title" style="color: #fff;"></h4>
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
                        <th>Re-order Quantity</th>
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

              <form id="supplier_form">
                <input type="hidden" name="operation_id" id="operation_id" value="0">
                <div class="form-group col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                    </span>
                    <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Name">
                  </div>
                  <div class="help-block with-errors" id="name-error" style="color: red; display: none;">Name already exist.</div>
                </div>
                <div class="form-group col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-money zmdi-hc-fw"></i>
                    </span>
                    <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost">
                  </div>
                  <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                </div>
                <div class="form-group col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-money-box zmdi-hc-fw"></i>
                    </span>
                    <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="Selling Price">
                  </div>
                  <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                </div>
                <div class="form-group col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                    </span>
                    <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity">
                  </div>
                  <!-- <div class="help-block with-errors">Write some details about yourself.</div> -->
                </div>
                <div class="form-group col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-refresh-alt zmdi-hc-fw"></i>
                    </span>
                    <input type="number" class="form-control" id="re-qty" name="re-qty" placeholder="Re-order Quantity">
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

  </div>
  <?php $this->load->view('includes/footer'); ?>

  </div>
  <?php $this->load->view('includes/javascripts'); ?>
  <script src="<?= base_url() ?>assets/js/tables-datatables.js"></script>
  <script src="<?= base_url() ?>assets/js/ui-notifications.js"></script>
  <script src="<?= base_url() ?>assets/js/forms-plugins.js"></script>
  <script type="text/javascript">
    var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "2314", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];

    function getInventory() {
      $('#table_body').empty();
      var table_body = "";
      run_waitMe('#table-2');
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>getInven",
        success: function(result) {
          $resp = $.parseJSON(result);
          if ($resp.status == 'success') {
            for (let i = 0; i < $resp.data.length; i++) {
              $resp.data[i];
              table_body += '<tr id="tb' + $resp.data[i]['inv_id'] + '">' +
                '<td>' + $resp.data[i]['inv_name'] + '</td>' +
                '<td>' + $resp.data[i]['cat_name'] + '</td>' +
                // '<td>'+$resp.data[i]['Barcode']+'</td>'+
                '<td>' + $resp.data[i]['qty'] + '</td>' +
                '<td>' + $resp.data[i]['cost'] + '</td>' +
                '<td>' + $resp.data[i]['selling_price'] + '</td>' +
                '</tr>';
            }
            $('#table_body').append(table_body);
          }

          $('#table-2').waitMe('hide');
        },
        error: function(result) {
          toastr.error(result);
          $('#table-2').waitMe('hide');
        }
      });
    }

    function getSubInventory(id) {
      $('#SubInvBody').empty();
      $('.modal-title').text($('#name' + id).text());
      $('.modal-pro').text($('#name' + id).text());
      var subInv_body = "";
      $('#operation_id').val(id);
      run_waitMe('#table-2');
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>getSubInven",
        data: "id=" + id,
        success: function(results) {
          var resp = $.parseJSON(results);
          if (resp.status == 'success') {
            if (resp.data) {
                subInv_body += '<tr id="sub' + resp.data['inv_id'] + '">' +
                  '<td>' + resp.data['reorder_qty'] + '</td>' +
                  '<td>' + resp.data['qty'] + '</td>' +
                  '<td>Rs. ' + (new Intl.NumberFormat().format(resp.data['cost'])) + '</td>' +
                  '<td>Rs. ' + (new Intl.NumberFormat().format(resp.data['selling_price'])) + '</td>' +
                  '<td><span class="label label-outline-success">' + resp.data['inv_date'] + '</span></td>' +
                  '</tr>';

                  $('#pro_name').val(resp.data['inv_name']);
                  $('#cost').val(resp.data['cost']);
                  $('#selling_price').val(resp.data['selling_price']);
                  $('#qty').val(resp.data['qty']);
                  $('#re-qty').val(resp.data['reorder_qty']);
            }
          } else {
            toastr.error(resp.message);
          }
          $('#SubInvBody').append(subInv_body);
          $('#table-2').waitMe('hide');
        },
        error: function(results) {
          toastr.error(result);
          $('#table-2').waitMe('hide');
        }
      });

      $('#otherModal1').modal('show');
    }

    function copyText(id) {
      var copyText = document.getElementById("" + id);

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);

      /* Alert the copied text */
      toastr.success("Copied the text: " + copyText.value);
      // alert("Copied the text: " + copyText.value);
    }

    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
          return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
            });
            a.appendChild(b);
          }
        }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
      });

      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }

      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }

      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function(e) {
        closeAllLists(e.target);
      });
    }

    autocomplete(document.getElementById("name"), countries);

    $('#filter-form').validator().on('submit', function(e) {
      if (!(e.isDefaultPrevented())) {
        e.preventDefault();
        run_waitMe('#accordionOne');
        alert($("#name").val());
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>saveCustomer",
          data: $('#filter-form').serialize(),
          success: function(result) {
            var responsedata = $.parseJSON(result);
            if (responsedata.status == 'success') {

            } else {

            }
            $('#accordionOne').waitMe('hide');
          },
          error: function(result) {
            $('#accordionOne').waitMe('hide');
            toastr.error('Error :' + result)
          }
        });
      }
    });

    function addInv() {
      window.location = "<?= base_url() ?>create_inventory";
    }
  </script>
  <script>
    $('#selling_price').on('change paste keyup input', function() {
        if($('#selling_price').val() != ''){
          $('#selling_price').css('border-color', '#ccc');
          $('#selling_price').css('color', '#555555');
          $('#pro_name').attr('stat', 'yes');
        }else{
          $('#selling_price').css('border-color', 'red');
          $('#selling_price').css('color', 'red');
          $('#pro_name').attr('stat', 'no');
        }
    });
    $('#cost').on('change paste keyup input', function() {
        if($('#cost').val() != ''){
          $('#cost').css('border-color', '#ccc');
          $('#cost').css('color', '#555555');
          $('#pro_name').attr('stat', 'yes');
        }else{
          $('#cost').css('border-color', 'red');
          $('#cost').css('color', 'red');
          $('#pro_name').attr('stat', 'no');
        }
    });
    $('#qty').on('change paste keyup input', function() {
        if($('#qty').val() != ''){
          $('#qty').css('border-color', '#ccc');
          $('#qty').css('color', '#555555');
          $('#pro_name').attr('stat', 'yes');
        }else{
          $('#qty').css('border-color', 'red');
          $('#qty').css('color', 'red');
          $('#pro_name').attr('stat', 'no');

        }
    });

    $('#pro_name').on('change paste keyup input', function() {
      if ($('#pro_name').val() == '') {
          $('#pro_name').css('border-color', 'red');
          $('#pro_name').css('color', 'red');
          $('#pro_name').attr('stat', 'no');
      }else{
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>check_name_ajax',
          data: 'id='+$('#operation_id').val()+'&name='+$('#pro_name').val(),
          success: function (result){  
            var res = $.parseJSON(result);
            if(res.status == 'success'){
              $('#pro_name').css('border-color', '#ccc');
              $('#pro_name').css('color', '#555555');
              $('#pro_name').attr('stat', 'yes');
            }else{
              $('#pro_name').css('border-color', 'red');
              $('#pro_name').css('color', 'red');
              $('#pro_name').attr('stat', 'no');
  
            }
          },
          error: function (result){  
  
          }
        });
      }
		});

    $('#supplier_form').on('submit', function(e){  
      e.preventDefault();
      if ($('#pro_name').attr('stat') == 'no') {
        alert('Check the fields');
      }else{
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>update_inv_ajax',
          data: $('#supplier_form').serialize(),
          success: function (result){  
            var res = $.parseJSON(result);
            if (res.status == 'success') {
              location.reload();
            }else{
              alert('Something went wrong :(');
            }
          },
          error: function (result){  
            alert('Something went wrong :(');

          }
        });
      }
    });
  </script>
</body>

<!-- Mirrored from big-bang-studio.com/cosmos/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:52:46 GMT -->

</html>