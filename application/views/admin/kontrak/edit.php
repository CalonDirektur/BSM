<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Kontrak</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Kontrak</strong>
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
        <h5> Edit <small></small></h5>
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
              



<!-- Nama_pengadaan Start -->

<div class="form-group">

  <label for="nama_pengadaan" class="col-sm-3 control-label"> Nama_pengadaan </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan" 

    

    value="<?php echo set_value("nama_pengadaan",html_entity_decode($kontrak->nama_pengadaan)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("nama_pengadaan","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Nama_pengadaan End -->







<!-- Vendor Start -->

<div class="form-group">

  <label for="vendor" class="col-sm-3 control-label"> Vendor </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="vendor" name="vendor" 

    

    value="<?php echo set_value("vendor",html_entity_decode($kontrak->vendor)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("vendor","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Vendor End -->







<!-- Nilai_kontrak_customer Start -->

<div class="form-group">

  <label for="nilai_kontrak_customer" class="col-sm-3 control-label"> Nilai_kontrak_customer </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nilai_kontrak_customer" name="nilai_kontrak_customer" 

    

    value="<?php echo set_value("nilai_kontrak_customer",html_entity_decode($kontrak->nilai_kontrak_customer)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("nilai_kontrak_customer","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Nilai_kontrak_customer End -->







<!-- Nilai_juskeb Start -->

<div class="form-group">

  <label for="nilai_juskeb" class="col-sm-3 control-label"> Nilai_juskeb </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nilai_juskeb" name="nilai_juskeb" 

    

    value="<?php echo set_value("nilai_juskeb",html_entity_decode($kontrak->nilai_juskeb)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("nilai_juskeb","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Nilai_juskeb End -->







<!-- Nilai_kontrak_mitra Start -->

<div class="form-group">

  <label for="nilai_kontrak_mitra" class="col-sm-3 control-label"> Nilai_kontrak_mitra </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nilai_kontrak_mitra" name="nilai_kontrak_mitra" 

    

    value="<?php echo set_value("nilai_kontrak_mitra",html_entity_decode($kontrak->nilai_kontrak_mitra)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("nilai_kontrak_mitra","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Nilai_kontrak_mitra End -->







<!-- Tanggal_kontrak_pengadaan Start -->

<div class="form-group">

  <label for="tanggal_kontrak_pengadaan" class="col-sm-3 control-label"> Tanggal_kontrak_pengadaan </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_kontrak_pengadaan" name="tanggal_kontrak_pengadaan" 

    

    value="<?php echo set_value("tanggal_kontrak_pengadaan",$kontrak->tanggal_kontrak_pengadaan); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_kontrak_pengadaan","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_kontrak_pengadaan End -->







<!-- Tanggal_kontrak_berakhir Start -->

<div class="form-group">

  <label for="tanggal_kontrak_berakhir" class="col-sm-3 control-label"> Tanggal_kontrak_berakhir </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_kontrak_berakhir" name="tanggal_kontrak_berakhir" 

    

    value="<?php echo set_value("tanggal_kontrak_berakhir",$kontrak->tanggal_kontrak_berakhir); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_kontrak_berakhir","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_kontrak_berakhir End -->







<!-- Tanggal_bast Start -->

<div class="form-group">

  <label for="tanggal_bast" class="col-sm-3 control-label"> Tanggal_bast </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_bast" name="tanggal_bast" 

    

    value="<?php echo set_value("tanggal_bast",$kontrak->tanggal_bast); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_bast","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_bast End -->







<!-- Tanggal_invoice Start -->

<div class="form-group">

  <label for="tanggal_invoice" class="col-sm-3 control-label"> Tanggal_invoice </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_invoice" name="tanggal_invoice" 

    

    value="<?php echo set_value("tanggal_invoice",$kontrak->tanggal_invoice); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_invoice","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_invoice End -->







<!-- Tanggal_payment Start -->

<div class="form-group">

  <label for="tanggal_payment" class="col-sm-3 control-label"> Tanggal_payment </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_payment" name="tanggal_payment" 

    

    value="<?php echo set_value("tanggal_payment",$kontrak->tanggal_payment); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_payment","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_payment End -->







	<!-- Opex_capex Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Opex_capex </label>

          <div class="col-md-4">

              <select class="form-control select2" name="opex_capex" id="opex_capex">

              <option value="">Select Opex_capex</option>

      <?php 

      if(isset($opex_capex) && !empty($opex_capex)):

      foreach($opex_capex as $key => $value): ?>

          <option value="<?php echo $value->keterangan; ?>" <?php echo $value->keterangan==$kontrak->opex_capex?'selected="selected"':""; ?>>

            <?php echo $value->keterangan; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Opex_capex End -->







<!-- Lokasi Start -->

<div class="form-group">

  <label for="lokasi" class="col-sm-3 control-label"> Lokasi </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="lokasi" name="lokasi" 

    

    value="<?php echo set_value("lokasi",html_entity_decode($kontrak->lokasi)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("lokasi","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Lokasi End -->







	<!-- Portofolio Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Portofolio </label>

          <div class="col-md-4">

              <select class="form-control select2" name="portofolio" id="portofolio">

              <option value="">Select Portofolio</option>

      <?php 

      if(isset($portofolio) && !empty($portofolio)):

      foreach($portofolio as $key => $value): ?>

          <option value="<?php echo $value->jenis_portofolio; ?>" <?php echo $value->jenis_portofolio==$kontrak->portofolio?'selected="selected"':""; ?>>

            <?php echo $value->jenis_portofolio; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Portofolio End -->







	<!-- Metode_pengadaan Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Metode_pengadaan </label>

          <div class="col-md-4">

              <select class="form-control select2" name="metode_pengadaan" id="metode_pengadaan">

              <option value="">Select Metode_pengadaan</option>

      <?php 

      if(isset($metode_pengadaan) && !empty($metode_pengadaan)):

      foreach($metode_pengadaan as $key => $value): ?>

          <option value="<?php echo $value->keterangan_pengadaan; ?>" <?php echo $value->keterangan_pengadaan==$kontrak->metode_pengadaan?'selected="selected"':""; ?>>

            <?php echo $value->keterangan_pengadaan; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Metode_pengadaan End -->







<!-- Tanggal_penerimaan_juskeb Start -->

<div class="form-group">

  <label for="tanggal_penerimaan_juskeb" class="col-sm-3 control-label"> Tanggal_penerimaan_juskeb </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_penerimaan_juskeb" name="tanggal_penerimaan_juskeb" 

    

    value="<?php echo set_value("tanggal_penerimaan_juskeb",$kontrak->tanggal_penerimaan_juskeb); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_penerimaan_juskeb","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_penerimaan_juskeb End -->







<!-- Tanggal_pr Start -->

<div class="form-group">

  <label for="tanggal_pr" class="col-sm-3 control-label"> Tanggal_pr </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_pr" name="tanggal_pr" 

    

    value="<?php echo set_value("tanggal_pr",$kontrak->tanggal_pr); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_pr","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_pr End -->







<!-- Tanggal_po Start -->

<div class="form-group">

  <label for="tanggal_po" class="col-sm-3 control-label"> Tanggal_po </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_po" name="tanggal_po" 

    

    value="<?php echo set_value("tanggal_po",$kontrak->tanggal_po); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("tanggal_po","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Tanggal_po End -->







	<!-- Tanggal_insert Start -->

	<div class="form-group">

	  <label for="tanggal_insert" class="col-sm-3 control-label"> Tanggal_insert </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control datetimepicker" name="tanggal_insert" id="tanggal_insert" value="<?php echo set_value("tanggal_insert",$kontrak->tanggal_insert); ?>"/> 

	  </div>

	  <div class="col-sm-5" >

	    <?php echo form_error("tanggal_insert","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Tanggal_insert End -->



	



	<!-- Username Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Username </label>

          <div class="col-md-4">

              <select class="form-control select2" name="username" id="username">

              <option value="">Select Username</option>

      <?php 

      if(isset($users) && !empty($users)):

      foreach($users as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$kontrak->username?'selected="selected"':""; ?>>

            <?php echo $value->username; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Username End -->




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
<?php $this->load->view('footer'); 