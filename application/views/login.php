<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from big-bang-studio.com/cosmos/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <title>Company</title>
    <link rel="icon" type="image/png" href="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/cosmos.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/application.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/waitMe.css">
    <style type="text/css">
    	.dark-inbox{
    		border: 1px solid #171e24 !important;
    		background-color: #171e24 !important;
    		color: #c7d0d7 !important;
    	}
    	.dark-font{
    		color: #c7d0d7 !important;
    		border: none !important;
    	}
    </style>
  </head>
  <body class="authentication-body">
    <div class="container-fluid">
      <div class="authentication-header m-b-60">
        <div class="clearfix">
          <div class="pull-left">
            <a class="authentication-logo" href="index-2.html">
              <img src="<?=base_url()?>assets/img/logo.jpeg" alt="" height="50">
              <!-- <span>cosmos</span> -->
            </a>
          </div>
          <!-- <div class="pull-right"> #171e24 //// #1c2a35 //// #c7d0d7
            <a href="http://big-bang-studio.com/pages-signup.html" class="btn btn-outline-info">Something </a>
          </div> -->
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-4 col-sm-offset-1">
          
        </div> -->
        <div class="col-sm-4 col-sm-offset-4">
          <div class="authentication-content m-b-30 mw-100">
            <h2 class="m-t-0 m-b-10 text-center p-3 mb-0">DELHI MOTORS</h2>
            <h3 class="m-t-0 m-b-30 text-center mb-0" style="color: #00aced;">LOG IN</h3>
            <form id="loginForm">
              <div class="form-group">
                <label for="form-control-1"></label>
                <input type="text" class="form-control input-pill text-center" placeholder="Username" name="username" id="username" required="required">
                <span id="usernameError" class="error"></span>
              </div>
              <div class="form-group">
                <label for="form-control-2" class="text-center"></label>
                <input type="password" class="form-control input-pill text-center" name="password" id="password" required="required" placeholder="Password">
                <span id="passwordError" class="error"></span>
              </div>
              <div class="form-group">
                <label class="custom-control custom-control-primary custom-checkbox active">
                  <input class="custom-control-input" type="checkbox" name="mode" checked="checked">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-label">Keep me signed in</span>
                </label>
                <a href="http://big-bang-studio.com/pages-reset-password.html" class="text-info pull-right">Forgot password?</a>
              </div>
              <button type="submit" class="btn btn-twitter btn-block input-pill">Submit</button>
            </form>
          </div>
	      <div class="authentication-footer">
	        <span class="text-muted">Need help? Contact us mail@example.com</span>
	      </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url()?>assets/js/vendor.js"></script>
    <script src="<?=base_url()?>assets/js/cosmos.js"></script>
    <script src="<?=base_url()?>assets/js/application.js"></script>  
    <script src="<?=base_url()?>assets/js/waitMe.js"></script>
    <script type="text/javascript">                  
      $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?=base_url()?>sign-in",
            data: $('#loginForm').serialize(),
            success: function(result) {
                var responsedata = $.parseJSON(result);
                if(responsedata.status=='success'){
                    window.location.href = "<?=base_url()?>"+responsedata.message;
                }else{
                    document.getElementById('loginForm').reset(); 
                    $('#loginForm').find("input").val("");
                    toastr["error"](responsedata.message);
                }
            },
            error: function(result) {
                toastr["error"](result);
            }
        });
      });
    </script>
  </body>

<!-- Mirrored from big-bang-studio.com/cosmos/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2017 11:53:28 GMT -->
</html>