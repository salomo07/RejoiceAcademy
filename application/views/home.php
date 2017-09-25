<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo AppNameL; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url() ?>favicon.ico" />
  <?php $this->load->view('/template/link');?>
  

</head>

<body class="hold-transition skin-blue fixed">
<div class="wrapper">
  <?php echo $this->general->header;?>
  <?php echo $this->general->asideleft;?>
  
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb" <?php if (!$this->general->dataUser){echo 'style="display : none"';} ?> >
        <li><a href="<?php echo base_url(); ?>"><?php echo AppNameS; ?></a></li>
        <li class="active"><a href="<?php echo current_url();?>"><?php echo $this->router->fetch_class();?></a>
        </li>
      </ol>
    </section>
    <section class="content">
    </section>
  </div>

  <?php $this->load->view('/template/footer');?>
  <?php echo $this->general->asideright;?>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>

<?php $this->load->view('/template/script');?>
