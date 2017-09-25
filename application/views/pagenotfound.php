<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo AppNameL; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('/template/script');?>

</head>

<body class="hold-transition skin-blue fixed">
<div class="wrapper">
  <?php echo $this->general->header;?>
  <?php echo $this->general->asideleft;?>
  
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><?php echo AppNameS; ?></a></li>
        <li class="active"><a href="<?php echo base_url().$this->router->fetch_class(); ?>">Page Not Found</a>
        </li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
      <?php echo $this->router->fetch_class() ?>
    </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Version</b> 2.4.0</div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>"><?php echo AppNameL; ?></a>
  </footer>
  <?php echo $this->general->asideright;?>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>


<?php $this->load->view('/template/link');?>