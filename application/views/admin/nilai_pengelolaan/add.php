<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Nilai_pengelolaan</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

      </li>

      <li class="active">

        <strong>Nilai_pengelolaan</strong>

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

      if(isset($main_contract_recurring) && !empty($main_contract_recurring)):

      foreach($main_contract_recurring as $key => $value): ?>

          <option value="<?php echo $value->id_kontrak; ?>">

            <?php echo $value->nomor_kontrak; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Id_kontrak End -->







	<!-- Portofolio Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Portofolio </label>

          <div class="col-md-4">

              <select class="form-control select2" name="portofolio" id="portofolio">

              <option value="">Select Portofolio</option>

      <?php

      if(isset($portofolio) && !empty($portofolio)):

      foreach($portofolio as $key => $value): ?>

          <option value="<?php echo $value->kode_portofolio; ?>">

            <?php echo $value->jenis_portofolio; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Portofolio End -->









	<!-- Nilai_bulan Start -->

	<div class="form-group">

	  <label for="nilai_bulan" class="col-sm-3 control-label"> Nilai_bulan </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nilai_bulan" name="nilai_bulan"



	    value="<?php echo set_value("nilai_bulan"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error("nilai_bulan","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Nilai_bulan End -->





	



	<!-- Fm Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> FM </label>

          <div class="col-md-4">

              <select class="form-control select2" name="fm" id="fm">

              <option value="">Select Fm</option>

      <?php

      if(isset($unit_fm_bm) && !empty($unit_fm_bm)):

      foreach($unit_fm_bm as $key => $value): ?>

          <option value="<?php echo $value->nama_unit; ?>">

            <?php echo $value->nama_unit; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Fm End -->





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