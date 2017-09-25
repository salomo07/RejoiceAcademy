<aside class="main-sidebar" style="background-color: #fff;">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>favicon.ico" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->general->dataUser->Fullname; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search ...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><center><b>Profile</b></center></li>
        <li class="treeview">
      <?php foreach ($arrayAside as $key => $value):$menu=$value->menu;?>
        <li class="<?php if(count($value->submenus)>0){ echo "treeview";}?>" title="<?php echo $menu->Description; ?>">
          <a href="<?php echo base_url().$menu->URL; ?>"><i src="" class="<?php echo $menu->IconClass; ?>" style="<?php echo $menu->IconStyle; ?>"></i><span> <b><i> <?php echo $menu->Label; ?></i></b></span></a>
            <?php if(count($value->submenus)>0){?>
            <ul class="treeview-menu">
              <?php foreach ($value->submenus as $key => $menu2): ?>
                <li title="<?php echo $menu2->Description;?>"><a href="<?php echo base_url().$menu2->URL; ?>"><i src="" class="<?php echo $menu2->IconClass; ?>" style="<?php echo $menu2->IconStyle; ?>"></i>  <?php echo $menu2->Label; ?></a></li> 
              <?php endforeach ?>              
            </ul>            
            <?php } ?>
        </li>
      <?php endforeach ?>
    </ul>
  </section>
</aside>
