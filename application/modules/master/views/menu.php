<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo AppNameL; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

</head>

<body class="hold-transition skin-blue fixed">
<div class="wrapper">
  <?php echo $this->general->header;?>
  <?php echo $this->general->asideleft;?>

  
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><?php echo AppNameS; ?></a></li>
        <li class="active"><a href="<?php echo current_url();?>"><?php echo $this->router->fetch_class();?></a>
        </li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Master Menu Level 1</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="jsGrid" style=""></div>
        <div class="box-footer">
        </div>
      </div>
    </section>
  </div>

  
  <?php echo $this->general->asideright;?>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>

<?php $this->load->view('/template/link');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jsgrid/jsgrid.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jsgrid/jsgrid-theme.min.css" />

<?php $this->load->view('/template/script');?>
<script src="<?php echo base_url();?>assets/plugins/jsgrid/jsgrid.js"></script>
<script>
  <?php if ($this->general->dataUser): ?>
    // getAjax("<?php echo base_url().'Master/Master_Menu/masterMenu1'?>", "POST","json",true,{all: 1},function(result){
    //   var menu=result;
    //   console.log(result);
    //   $("#jsGrid").jsGrid({ 
    //       inserting: true,
    //       editing: true,
    //       sorting: true,
    //       paging: true,
    //       loadData: function(filter) {
    //           return $.ajax({
    //               type: "POST",
    //               url: "<?php echo base_url(); ?>'Master/Master_Menu/masterMenu1",
    //               data: filter
    //           });
    //       },
    //       insertItem: "<?php echo base_url(); ?>'Master/Master_Menu/masterMenu1",
    //       updateItem: "<?php echo base_url(); ?>'Master/Master_Menu/masterMenu1",
    //       deleteItem: "<?php echo base_url(); ?>'Master/Master_Menu/masterMenu1",

    //       width: "100%",
    //       height: "auto",
    //       data: menu,
   
    //       fields: [
    //           { name: "IdMenu", type: "hidden", validate: "required",width:35, visible:false},
    //           { name: "Label", type: "text", validate: "required" },
    //           { name: "URL", type: "text" },
    //           { name: "IconClass", type: "text" },
    //           { name: "IconStyle", type: "text" },
    //           { name: "IconSrc", type: "text"},
    //           { name: "Description", type: "text" },
    //           { type: "control" }
    //       ]
    //   });//.css('width','100%','overflow','scroll');
    // });

    $("#jsGrid").jsGrid({ 
        inserting: true,
        autoload: true,
        loadData: function(filter) {
          // var d = $.Deferred();
          // $.ajax({
          //   url: "<?php echo base_url() ?>Master/Master_Menu/masterAsideMenu1",
          //   dataType: "JSON",
          //   type: "POST",
          //   data:{"filter":"sss"},
          // }).done(function(response) 
          // {
          //     d.resolve({data: response.data});
          //     console.log(response);
          // });

          // return d.promise();
          var d = $.Deferred();

          $.ajax({
            url: "<?php echo base_url() ?>Master/Master_Menu/masterAsideMenu1",
            dataType: "JSON",
            type: "POST",
            data:{"filter":""}
          }).done(function(response) {console.log(response)
              d.resolve({
                  data: response.data,
                  itemsCount: response.count
             });
          });

          return d.promise();
        },


        width: "100%",
        height: "auto",
 
        fields: [
            { name: "IdMenu", type: "hidden", validate: "required",width:35, visible:false},
            { name: "Label", type: "text", validate: "required" },
            { name: "URL", type: "text" },
            { name: "IconClass", type: "text" },
            { name: "IconStyle", type: "text" },
            { name: "IconSrc", type: "text"},
            { name: "Description", type: "text" },
            { type: "control" }
        ]
    });
  <?php endif ?>
</script>
