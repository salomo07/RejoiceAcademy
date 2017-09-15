<link rel="stylesheet" href="assets/plugins/bootstrap/css/modalcustom.css">
<header class="main-header">
    <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><img style="max-height: 40px; max-width: 40px;" src="assets/img/toga.png"></span>
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
          <h4 class="modal-title"><img style="max-width: 30px;max-height: 30px" src="assets/img/toga.png"> Registration</img></h4>
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
          <h4 class="modal-title"><img style="max-width: 30px;max-height: 30px" src="assets/img/toga.png"> Registration</img></h4>
        </div>
        <div class="modal-body">
          <form id="formModalLogin" action="#" method="post">      
            <div class="form-group has-feedback">
              <label for="username">Username</label>
              <input id="txtLogUsername" name="username" type="text" class="form-control input-lg" placeholder="Username / Email">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="email">Email</label>
              <input id="txtLogPassword" name="password" type="password" class="form-control input-lg" placeholder="Password">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" onclick="tryLogin()"  class="btn btn-primary btn-block btn-lg">Log In</button>
        </div>
      </div>
    </div>
</div>
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
            {window.location.href=window.location.href;}
            else if(response=='Password wrong'){alert('Password wrong');}
            else if(response=='User not found'){alert('User not found');}
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Error: " + errorThrown); 
          }
    });
  }
  function getPasswordChange(element) 
  {
    $.ajax({
          url: "<?php echo base_url();?>Home/getModalChangePassword",
          method:"POST",
          data : { idUser: $(element).attr('value')},
          success: function (response) 
          {
            $('#myModal').html(response);
            $('#myModal').modal('show');
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
</script>
<style>
  #preloader { 
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
