<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/toga.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Raja Salomo Sitompul</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu">
        <li class="header">My Profile</li>
        <li class="treeview">
            <a href="http://localhost/posasli/#"><i src="" class="glyphicon glyphicon-import" style="color:#80ffff"></i><span> <b><i> Transaction</i></b></span></a>
              
              <ul class="treeview-menu">                
                  <li><a href="http://localhost/posasli/Transaction?c=IN"><i src="" class="fa fa-book" style="color:#80ffff"></i>  Transaksi Masuk</a></li>                
                  <li><a href="http://localhost/posasli/Transaction?c=OUT"><i src="" class="fa fa-book" style="color:#80ffff"></i>  Transaksi Keluar</a></li>                
              </ul>              
        </li>
        <!-- <?php foreach ($arrayAside as $key => $value):$menu=$value->menu;?>
          <li class="treeview">
            <a href="<?php echo $menu->URL; ?>"><i src="" class="<?php echo $menu->IconClass; ?>" style="<?php echo $menu->IconStyle; ?>"></i><span> <b><i> <?php echo $menu->Label; ?></i></b></span></a>
            <ul class="treeview-menu">
                
                <li><a href="http://localhost/posasli/Transaction?c=IN"><i src="" class="fa fa-book" style="color:#80ffff"></i>  Transaksi Masuk</a></li>
              
                <li><a href="http://localhost/posasli/Transaction?c=OUT"><i src="" class="fa fa-book" style="color:#80ffff"></i>  Transaksi Keluar</a></li>
              
            </ul>
          </li>
        <?php endforeach ?> -->
      </ul>
    </section>
  </aside>