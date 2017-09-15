<link rel="stylesheet" href="assets/plugins/bootstrap/css/modalcustom.css">
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo AppNameL; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/css/skins/_all-skins.css">
  <link rel="stylesheet" href="assets/fonts/googlefont.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap-validator/bootstrapValidator.min.css">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <?php echo $this->general->header;?>
    <?php //echo $this->general->asideleft;?>
    <div class="content-wrapper">  
      <div class="register-box">
        <div class="register-box-body">
          <p class="login-box-msg">Register a new membership</p>

          <form id="formRegistrastion" action="<?php echo base_url(); ?>Registration/createUser" method="post">
            <div class="form-group has-feedback">
              <input name="username" type="text" class="form-control input-lg" placeholder="Username" value="<?php echo $uname; ?>">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="fullname" type="text" class="form-control input-lg" placeholder="Full name">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="email" type="email" class="form-control input-lg" placeholder="Email" value="<?php echo $email; ?>">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control input-lg" placeholder="Password" >
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="repassword" type="password" class="form-control input-lg" placeholder="Retype password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#" data-toggle="modal" data-target="#termModal">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center">
            <p> OR </p>
            <a href="#" class="text-center" data-toggle="modal" data-target="#logModal">I already have a membership</a>
          </div>
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>"><?php echo AppNameL; ?></a>
    </footer>
    <?php //echo $this->general->asideright;?>
    <div class="control-sidebar-bg"></div>
  </div>

  <div id="termModal" class="modal fade" role="dialog">
    <div class="modal-dialog modalcentered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-log-in" style="color: #f39c12"></i> Login</h4>
        </div>
        <div class="modal-body">
          <form id="formModalLogin" action="#" method="post"> 
            <div class="form-group has-feedback">
              <input name="username" type="text" class="form-control input-lg" placeholder="Username / Email">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control input-lg" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-6">
              </div>
              <div class="col-xs-6">
                <button type="submit"  class="btn btn-primary btn-block btn-lg">Sign In</button>
              </div>
            </div>
          </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>

  <script src="assets/plugins/jQuery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="assets/plugins/fastclick/fastclick.js"></script>
  <script src="assets/plugins/iCheck/icheck.min.js"></script>
  <script src="assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
  <script src="assets/js/adminlte.min.js"></script>
</body>
</html>



<script>
  $('#formRegistrastion, #formModalRegistration').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'The username must be more than 3 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
  });
  $('#preloader').fadeOut('slow',function(){$(this).remove();});


  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $(document).ready(function(){
    $('input[name=username]').val($('input[name=username]').val());
    $('input[name=fullname]').val($('input[name=fullname]').val());
    $('input[name=email]').val($('input[name=email]').val());
    $('input[name=password]').val($('input[name=password]').val());
    $('input[name=repassword]').val($('input[name=repassword]').val());
  });
</script>





