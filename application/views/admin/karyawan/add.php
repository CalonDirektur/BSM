<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Karyawan</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Karyawan</strong>
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
              





	<!-- Nama Start -->

	<div class="form-group">

	  <label for="nama" class="col-sm-3 control-label"> Nama </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nama" name="nama" 

	    

	    value="<?php echo set_value("nama"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("nama","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Nama End -->





	





	<!-- Nik Start -->

	<div class="form-group">

	  <label for="nik" class="col-sm-3 control-label"> Nik </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nik" name="nik" 

	    

	    value="<?php echo set_value("nik"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("nik","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Nik End -->





	



	<!-- Status Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Status </label>

          <div class="col-md-4">

              <select class="form-control select2" name="status" id="status">

              <option value="">Select Status</option>

      <?php 

      if(isset($status_karyawan) && !empty($status_karyawan)):

      foreach($status_karyawan as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->status_kary; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Status End -->









	<!-- Unit Start -->

	<div class="form-group">

	  <label for="unit" class="col-sm-3 control-label"> Unit </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="unit" name="unit" 

	    

	    value="<?php echo set_value("unit"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("unit","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Unit End -->





	





	<!-- Sub_unit Start -->

	<div class="form-group">

	  <label for="sub_unit" class="col-sm-3 control-label"> Sub_unit </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="sub_unit" name="sub_unit" 

	    

	    value="<?php echo set_value("sub_unit"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("sub_unit","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Sub_unit End -->





	





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





	



	<!-- Entry_by Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Entry_by </label>

          <div class="col-md-4">

              <select class="form-control select2" name="entry_by" id="entry_by">

              <option value="">Select Entry_by</option>

      <?php 

      if(isset($users) && !empty($users)):

      foreach($users as $key => $value): ?>

          <option value="<?php echo $value->username; ?>">

            <?php echo $value->username; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Entry_by End -->




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