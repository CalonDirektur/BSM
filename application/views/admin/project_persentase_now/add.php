<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Project_persentase_now</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Project_persentase_now</strong>
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
              



	<!-- Id_kontrak Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Id_kontrak </label>

          <div class="col-md-4">

              <select class="form-control select2" name="id_kontrak" id="id_kontrak">

              <option value="">Select Id_kontrak</option>

      <?php

      if(isset($project_contract) && !empty($project_contract)):

      foreach($project_contract as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->nomor_kontrak; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Id_kontrak End -->









	<!-- Persentase_progress Start -->

	<div class="form-group">

	  <label for="persentase_progress" class="col-sm-3 control-label"> Persentase_progress </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="persentase_progress" name="persentase_progress"



	    value="<?php echo set_value("persentase_progress"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error("persentase_progress","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Persentase_progress End -->





	



	<!-- Tanggal_update Start -->

	<div class="form-group">

	  <label for="tanggal_update" class="col-sm-3 control-label"> Tanggal_update </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="tanggal_update" name="tanggal_update" value="<?php echo set_value("tanggal_update","2022-03-21"); ?>"	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error("tanggal_update","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Tanggal_update End -->



	



				<!-- Remark Start -->

			<div class="form-group">

			  <label for="remark" class="col-sm-3 control-label"> Remark </label>

			  <div class="col-sm-4">

			    <textarea class="form-control" id="remark" name="remark"><?php echo set_value("remark"); ?></textarea>

			  </div>

			  <div class="col-sm-5" >



			    <?php echo form_error("remark","<span class='label label-danger'>","</span>")?>

			  </div>

			</div>

			<!-- Remark End -->



			
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