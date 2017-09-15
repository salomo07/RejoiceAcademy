<link rel="stylesheet" href="assets/plugins/bootstrap/css/modalcustom.css">
<header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><img style="max-height: 40px; max-width: 40px;" src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/toga.png"></span>
      <span class="logo-lg"><b><?php echo AppNameL ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <?php foreach ($arrayHeader as $key => $value): ?>
            <li>
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
              <img src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/toga.png" alt="<?php echo AppNameS ?>" class="user-image">
              <span class="hidden-xs"><?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/PSG.png" style="height: 40px; width:40px;" alt="User Image">
                <p>
                  <?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?>
                </p>
              </li>
              <li class="user-body">
                 <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="col-md-12">
                      <a onclick="getPasswordChange(this)" value="<?php echo $arrayDataUser->IdUser;?>">Change Password</a>
                    </div><br><br>   
                    <div class="col-md-12">                 
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url().'Home/signout'?>" class="btn btn-default btn-flat">Sign out</a>
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
  <script>
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
  </script>
  <style>
  
  </style>


 <!--  <header class="main-header">  
    <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><img style="max-height: 40px; max-width: 40px;" src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/toga.png"></span>
      <span class="logo-lg"><b><?php echo AppNameL ?></b></span>
    </a>  
    <nav class="navbar navbar-static-top">
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php foreach ($arrayHeader as $key => $value): ?>
              <li>
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
              <img src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/toga.png" alt="<?php echo AppNameS ?>" class="user-image">
              <span class="hidden-xs"><?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php if(count($REQUEST_URI)>3){echo "../";} ?>assets/img/PSG.png" style="height: 40px; width:40px;" alt="User Image">
                <p>
                  <?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?>
                </p>
              </li>
              <li class="user-body">
                 <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="col-md-12">
                      <a onclick="getPasswordChange(this)" value="<?php echo $arrayDataUser->IdUser;?>">Change Password</a>
                    </div><br><br>   
                    <div class="col-md-12">                 
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url().'Home/signout'?>" class="btn btn-default btn-flat">Sign out</a>
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
  <script>
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
  </script> -->