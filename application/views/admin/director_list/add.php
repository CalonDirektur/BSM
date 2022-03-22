<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Director_list</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Director_list</strong>
      </li>
    </ol>
  </div>
  <div class="col-sm-8">
    <div class="title-action">
    </div>
  </div>
</div>
<!--  EO :heading -->
<div class="row">
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ">
      <div class="ibox-title" >
        <h5>Add <small></small></h5>
        <div class="ibox-tools">                           
        </div>
      </div>
      <!-- ............................................................. -->
      <!-- BO : content  -->
      <div class="col-sm-12 white-bg ">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">  </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
              <?php if($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-close="alert"></button>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php endif; ?> 
              





	<!-- Nama_direktur Start -->

	<div class="form-group">

	  <label for="nama_direktur" class="col-sm-3 control-label"> Nama_direktur </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nama_direktur" name="nama_direktur"



	    value="<?php echo set_value("nama_direktur"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error("nama_direktur","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Nama_direktur End -->





	





	<!-- Jabatan Start -->

	<div class="form-group">

	  <label for="jabatan" class="col-sm-3 control-label"> Jabatan </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="jabatan" name="jabatan"



	    value="<?php echo set_value("jabatan"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error("jabatan","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Jabatan End -->





	
              <div class="form-group">
                <div class="col-sm-3" >                       
                </div>
                <div class="col-sm-6">
                  <button type="reset" class="btn btn-default ">Reset</button>
                  <button type="submit" class="btn btn-info ">Submit</button>
                </div>
                <div class="col-sm-3" >                       
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
        <br><br><br><br>
      </div>
      <!-- EO : content  -->
      <!-- ...................................................................... -->
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>