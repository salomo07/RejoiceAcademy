<header class="main-header">    
    <nav class="navbar navbar-static-top">
      
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="padding-top: 4px" href="<?php echo base_url();?>">
          <img alt="<?php echo AppNameL; ?>" title="<?php echo AppNameL; ?>" height="37" width="40" src="assets/img/PSG.png">
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($arrayHeader as $key => $value): ?>
            <li>
              <a href="<?php echo $value->menu->URL ?>" <?php if (count($value->submenus)>0) : ?>
                class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
              <?php endif ?>><i class="<?php echo $value->menu->IconClass ?>" title="<?php echo $value->menu->Label ?>" style="<?php echo $value->menu->IconStyle ?>"></i> <?php echo $value->menu->Label ?><span <?php if (count($value->submenus)>0){echo 'class="caret"';} ?>></span></a>
              <?php if (count($value->submenus>0)): ?>
                <ul class="dropdown-menu" role="menu">
                  <?php  foreach ($value->submenus as $key => $menu2): ?>
                    <li><a href="<?php echo $menu2->URL ?>"><i class="<?php echo $menu2->IconClass; ?>" style="<?php echo $menu2->IconStyle ?>"></i> <?php echo $menu2->Label ?></a></li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </li>
          <?php endforeach ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" style="padding-top: 4px;" data-toggle="dropdown">
              <img src="assets/img/PSG.png" style="height: 35px; width:35px;" alt="PSG Logo">
              <span class="hidden-xs"><?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="assets/img/PSG.png" style="height: 40px; width:40px;" alt="User Image">
                <p>
                  <?php echo $arrayDataUser->Username.' ('.$arrayDataUser->Role.')'; ?>
                </p>
              </li>
              <li class="user-body">
                <!-- <div class="row"> -->
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
                <!-- </div> -->
              </li>
            </ul>
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