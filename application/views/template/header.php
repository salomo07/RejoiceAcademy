<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/modalcustom.css">

<header class="main-header">
  <a href="<?php echo base_url(); ?>" class="logo">
    <span class="logo-mini"><img style="max-height: 40px; max-width: 40px;" src="<?php echo base_url();?>assets/img/toga.png"></span>
    <span class="logo-lg"><b><?php echo AppNameL ?></b></span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" title="Menu bar">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <?php $colortheme=''; foreach ($arrayHeader as $key => $value): ?>
          <li title="<?php echo $value->menu->Description; ?>">
            <a href="<?php echo base_url().$value->menu->URL ?>" <?php if (count($value->submenus)>0) : ?>
              class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
            <?php endif ?>><i class="<?php echo $value->menu->IconClass ?>" title="<?php echo $value->menu->Label ?>  " style="<?php echo $value->menu->IconStyle ?>"></i> <?php echo $value->menu->Label ?><span <?php if (count($value->submenus)>0){echo 'class="caret"';} ?>></span></a>
            <?php if (count($value->submenus>0)): ?>
              <ul class="dropdown-menu" role="menu">
                <?php  foreach ($value->submenus as $key => $menu2): ?>
                  <li><a href="<?php echo base_url().$menu2->URL ?>"><i class="<?php echo $menu2->IconClass; ?>" style="<?php echo $menu2->IconStyle ?>"></i> <?php echo $menu2->Label ?></a></li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
          </li>
        <?php endforeach ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url();?>assets/img/toga.png" alt="<?php echo AppNameS ?>" class="user-image">
            <span class="hidden-xs"><?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url();?>assets/img/toga.png" style="height: 40px; width:40px;" alt="User Image">
              <p>
                <?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?>
              </p>
            </li>
            <li class="user-body">
               <div class="row">
                <div class="col-md-12 text-center">
                  <div class="col-md-12">
                    <a onclick="getPasswordChange(<?php echo $arrayDataUser->IdUser;?>)">Change Password</a>
                  </div><br><br>   
                  <div class="col-md-12">                 
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a onclick="signout(<?php echo $arrayDataUser->IdUser;?>)" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
<script>
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

<script>
  function getAjax(url, method,dataType,sync, obdata, result)
  {
    $.ajax({
          url: url,
          method:method,
          dataType:dataType,
          async: sync,
          data : obdata,
          beforeSend: function() {
            $('#preloader').fadeIn('slow');
          },
          success: function (response) 
          {
            $('#preloader').fadeOut('slow');
            result(response);
            console.log('getAjax : '+response);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log("Error: " + errorThrown); 
          }
    });
  }
  function signout(id) 
  {
    getAjax("<?php echo base_url().'Home/signout'?>", "POST","text",false, {idUser: id},function(result){
    if(result=='Sign Out'){location.reload();}
    });
  }
</script>