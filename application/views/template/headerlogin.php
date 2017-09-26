<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/modalcustom.css">
<header class="main-header">
    <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><img style="max-height: 40px; max-width: 40px;" src="<?php echo base_url(); ?>assets/img/toga.png"></span>
      <span class="logo-lg"><b><?php echo AppNameL; ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="register user-menu">
            <a href="#" data-toggle="modal" data-target="#regModal">
              <i class="glyphicon glyphicon-user text-gray"></i>
              <span class="hidden-xs text-gray"><b> Register</b></span>
            </a>
          </li>
          <li class="login user-menu">
            <a href="#" data-toggle="modal" data-target="#logModal">
              <i class="glyphicon glyphicon-lock text-gray"></i>
              <span class="hidden-xs text-gray"><b> Login</b></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
</header>
<div id="preloader"></div>

<div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog modalcentered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img style="max-width: 30px;max-height: 30px" src="<?php echo base_url(); ?>assets/img/toga.png"> Registration</img></h4>
        </div>
        <div class="modal-body">
          <form id="formModalRegistration" action="#" method="post">      
            <div class="form-group has-feedback">
              <label for="txtRegUsername">Username</label>
              <input id="txtRegUsername" name="username" type="text" class="form-control input-lg" placeholder="Username">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="txtRegEmail">Email</label>
              <input type="email" name="email" class="form-control input-lg" id="txtRegEmail" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="toRegistration()" type="button" class="btn btn-primary btn-block btn-lg">Registration</button>
        </div>
      </div>
    </div>
</div>
<div id="logModal" class="modal fade" role="dialog">
    <div class="modal-dialog modalcentered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><img style="max-width: 30px;max-height: 30px" src="<?php echo base_url(); ?>assets/img/toga.png"> Login</img></h4>
        </div>
        <div class="modal-body">
          <form id="formModalLogin" action="#" method="post">      
            <div class="form-group has-feedback">
              <label for="username">Username</label>
              <input id="txtLogUsername" name="username" type="text" class="form-control input-lg" placeholder="Username / Email">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="email">Password</label>
              <input id="txtLogPassword" name="password" type="password" class="form-control input-lg" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" onclick="tryLogin()"  class="btn btn-primary btn-block btn-lg">Log In</button>
        </div>
      </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
<script>
  function tryLogin()
  {    
    $.ajax({
          url: "<?php echo base_url('Home/tryLogin');?>",
          method:"POST",
          data : { username: $('#txtLogUsername').val(),pass:$('#txtLogPassword').val()},          
          beforeSend: function() {
            $('#preloader').fadeIn('slow');
          },
          success: function (response) 
          {
            $('#preloader').fadeOut('slow');
            if(response=='User found')
            {$('#logModal').modal('hide'); location.reload();}
            else if(response=='Password wrong'){alert('Password wrong');}
            else if(response=='User not found'){alert('User not found');}
            else{alert('sss')}
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Error: " + errorThrown); 
          }
    });
  }
  function toRegistration()
  {
    window.location.href ='<?php echo base_url();?>Registration?email='+$('#txtRegEmail').val()+'&&uname='+$('#txtRegUsername').val();
  }
  $(document).ready(function($) {  
    $('#preloader').fadeOut('slow',function(){/*$(this).remove();*/});
  });
  
  $('#formModalRegistration,#formModalLogin').bootstrapValidator({
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
          },
          password: {
              validators: {
                  notEmpty: {
                      message: 'The password is required and cannot be empty'
                  },
                  stringLength: {
                      min: 4,
                      max: 30,
                      message: 'The password must be more than 3 and less than 30 characters long'
                  },
                  regexp: {
                      regexp: /^[a-zA-Z0-9_]+$/,
                      message: 'The password can only consist of alphabetical, number and underscore'
                  }
              }
          }
      }
  });
</script>
<style>
  #preloader 
  { 
    position: fixed; 
    left: 0; 
    top: 0; 
    z-index: 99999999999; 
    width: 100%; 
    height: 100%; 
    overflow: visible; 
    background: #ecf0f5 url('assets/img/preloader.gif') 
    no-repeat center center; 
  }

</style>
