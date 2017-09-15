<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo AppNameL; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $this->load->view('/template/link')?>
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
  <?php echo $this->general->header;?>
  <?php echo $this->general->asideleft;?>
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><?php echo AppNameS ?></a></li>
        <li class="active"><?php echo $this->router->fetch_class();?></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box" style="<?php echo "border-top-".$this->general->colorStyle; ?>"> <!-- Add & Edit BC -->
            <div class="box-header with-border">
              <h3 class="box-title">Menu Level 1</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" style="overflow: auto;">
              <div class="col-md-12">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tanggal Transaksi :</label>
                    <div class="radio" id="rgSwitchTanggalTransaksi" onchange="rgSwitchTanggalTransaksiChange()">
                      <form>
                        <label>
                          <input type="radio" name="rgSwitchTanggalTransaksi" id="optionradioOff" value="disabled" checked="">
                          Tanggal Hari Ini
                        </label>
                        <label> </label>
                        <label>
                          <input type="radio" name="rgSwitchTanggalTransaksi" id="optionradioOn">
                          Pilih Tanggal
                        </label>
                        <label></label>
                      </form>
                    </div>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="txtTanggalTransaksi" class="form-control pull-right" value="<?php echo date('d-m-Y'); ?>" onchange="getBC('<?php echo $jenis;?>')" disabled>
                    </div>
                    <br><button id="btnPrintBC" onclick="printReport()" class="btn btn-block" style="background-color: #80ffff"><i class="glyphicon glyphicon-floppy-save"></i> Export to Excel</button>
                  </div>
                </div>
              </div>
              <br><br><br><center><div id="txtMsg"></div></center>
              <div class="col-md-12">
                <table id="tblBC" class="table table-bordered table-hover dataTable" role="grid" width="100%">
                  <thead>
                    <tr>
                      <th><center>Voy</center></th>
                      <th><center>No Pabean</center></th>                    
                      <th><center>No Nota</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="box-footer">
              <div class="col-md-12">
                <div class="col-md-4"><button id="btnAddBC" onclick="getModalAddBC()" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-plus"></i>  Add BC <i class="fa fa-spin tes-spin"></i></button></div>
                <div class="col-md-4"><button id="btnDeleteBC" onclick="alert('Silahkan pilih Data BC yang akan dihapus.');operation='Delete';" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-trash"></i>  Delete BC</button></div>
                <div class="col-md-4"><button id="btnEditBC" onclick="alert('Silahkan pilih Data BC yang akan diubah.');operation='Edit';" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-edit"></i> Edit BC</button></div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="box" style="<?php echo "border-top-".$this->general->colorStyle; ?>"> <!-- Add & Edit BC -->
            <div class="box-header with-border">
              <h3 class="box-title">Menu Level 1</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" style="overflow: auto;">
              <div class="col-md-12">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tanggal Transaksi :</label>
                    <div class="radio" id="rgSwitchTanggalTransaksi" onchange="rgSwitchTanggalTransaksiChange()">
                      <form>
                        <label>
                          <input type="radio" name="rgSwitchTanggalTransaksi" id="optionradioOff" value="disabled" checked="">
                          Tanggal Hari Ini
                        </label>
                        <label> </label>
                        <label>
                          <input type="radio" name="rgSwitchTanggalTransaksi" id="optionradioOn">
                          Pilih Tanggal
                        </label>
                        <label></label>
                      </form>
                    </div>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="txtTanggalTransaksi" class="form-control pull-right" value="<?php echo date('d-m-Y'); ?>" onchange="getBC('<?php echo $jenis;?>')" disabled>
                    </div>
                    <br><button id="btnPrintBC" onclick="printReport()" class="btn btn-block" style="background-color: #80ffff"><i class="glyphicon glyphicon-floppy-save"></i> Export to Excel</button>
                  </div>
                </div>
              </div>
              <br><br><br><center><div id="txtMsg"></div></center>
              <div class="col-md-12">
                <table id="tblBC" class="table table-bordered table-hover dataTable" role="grid" width="100%">
                  <thead>
                    <tr>
                      <th><center>Voy</center></th>
                      <th><center>No Pabean</center></th>                    
                      <th><center>No Nota</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="box-footer">
              <div class="col-md-12">
                <div class="col-md-4"><button id="btnAddBC" onclick="getModalAddBC()" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-plus"></i>  Add BC <i class="fa fa-spin tes-spin"></i></button></div>
                <div class="col-md-4"><button id="btnDeleteBC" onclick="alert('Silahkan pilih Data BC yang akan dihapus.');operation='Delete';" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-trash"></i>  Delete BC</button></div>
                <div class="col-md-4"><button id="btnEditBC" onclick="alert('Silahkan pilih Data BC yang akan diubah.');operation='Edit';" class="btn btn-block" style="background-color: #80ffff"><i class="fa fa-edit"></i> Edit BC</button></div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>

  </div>

  <footer class="main-footer">
    <center>Copyright &copy; <?php echo CompanyName; ?></center>
  </footer>
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog"></div>
<div class="control-sidebar-bg"></div>
</div>
</body>
</html>
<?php $this->load->view('/template/script');?> 
<script>
  
</script>
 