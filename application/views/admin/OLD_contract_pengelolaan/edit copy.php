<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Contract_pengelolaan</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Contract_pengelolaan</strong>
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




<!-- Customer Start -->

<div class="form-group">

  <label for="customer" class="col-sm-3 control-label"> Customer </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="customer" name="customer"



    value="<?php echo set_value("customer",html_entity_decode($contract_pengelolaan->customer)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("customer","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Customer End -->







<!-- Wilayah Start -->

<div class="form-group">

  <label for="wilayah" class="col-sm-3 control-label"> Wilayah </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="wilayah" name="wilayah"



    value="<?php echo set_value("wilayah",html_entity_decode($contract_pengelolaan->wilayah)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("wilayah","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Wilayah End -->







<!-- Uraian_pekerjaan Start -->

<div class="form-group">

  <label for="uraian_pekerjaan" class="col-sm-3 control-label"> Uraian_pekerjaan </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="uraian_pekerjaan" name="uraian_pekerjaan"



    value="<?php echo set_value("uraian_pekerjaan",html_entity_decode($contract_pengelolaan->uraian_pekerjaan)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("uraian_pekerjaan","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Uraian_pekerjaan End -->







	<!-- Jenis_pengelolaan Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Jenis_pengelolaan </label>

          <div class="col-md-4">

              <select class="form-control select2" name="jenis_pengelolaan" id="jenis_pengelolaan">

              <option value="">Select Jenis_pengelolaan</option>

      <?php

      if(isset($jenis_pengelolaan) && !empty($jenis_pengelolaan)):

      foreach($jenis_pengelolaan as $key => $value): ?>

          <option value="<?php echo $value->pengelolaan; ?>" <?php echo $value->pengelolaan==$contract_pengelolaan->jenis_pengelolaan?'selected="selected"':""; ?>>

            <?php echo $value->pengelolaan; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Jenis_pengelolaan End -->







<!-- Nomor_kontrak Start -->

<div class="form-group">

  <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nomor_kontrak" name="nomor_kontrak"



    value="<?php echo set_value("nomor_kontrak",html_entity_decode($contract_pengelolaan->nomor_kontrak)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("nomor_kontrak","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Nomor_kontrak End -->







<!-- Tgl_kontrak Start -->

<div class="form-group">

  <label for="tgl_kontrak" class="col-sm-3 control-label"> Tgl_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tgl_kontrak" name="tgl_kontrak"



    value="<?php echo set_value("tgl_kontrak",$contract_pengelolaan->tgl_kontrak); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("tgl_kontrak","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Tgl_kontrak End -->







<!-- Masa_awal_kontrak Start -->

<div class="form-group">

  <label for="masa_awal_kontrak" class="col-sm-3 control-label"> Masa_awal_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="masa_awal_kontrak" name="masa_awal_kontrak"



    value="<?php echo set_value("masa_awal_kontrak",$contract_pengelolaan->masa_awal_kontrak); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("masa_awal_kontrak","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Masa_awal_kontrak End -->







<!-- Masa_akhir_kontrak Start -->

<div class="form-group">

  <label for="masa_akhir_kontrak" class="col-sm-3 control-label"> Masa_akhir_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="masa_akhir_kontrak" name="masa_akhir_kontrak"



    value="<?php echo set_value("masa_akhir_kontrak",$contract_pengelolaan->masa_akhir_kontrak); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("masa_akhir_kontrak","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Masa_akhir_kontrak End -->







<!-- Durasi_kontrak_bulan Start -->

<div class="form-group">

  <label for="durasi_kontrak_bulan" class="col-sm-3 control-label"> Durasi_kontrak_bulan </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="durasi_kontrak_bulan" name="durasi_kontrak_bulan"



    value="<?php echo set_value("durasi_kontrak_bulan",html_entity_decode($contract_pengelolaan->durasi_kontrak_bulan)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("durasi_kontrak_bulan","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Durasi_kontrak_bulan End -->







<!-- Luasan_m2 Start -->

<div class="form-group">

  <label for="luasan_m2" class="col-sm-3 control-label"> Luasan_m2 </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="luasan_m2" name="luasan_m2"



    value="<?php echo set_value("luasan_m2",html_entity_decode($contract_pengelolaan->luasan_m2)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("luasan_m2","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Luasan_m2 End -->







<!-- Hrg_base_rent_m2 Start -->

<div class="form-group">

  <label for="hrg_base_rent_m2" class="col-sm-3 control-label"> Hrg_base_rent_m2 </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_base_rent_m2" name="hrg_base_rent_m2"



    value="<?php echo set_value("hrg_base_rent_m2",html_entity_decode($contract_pengelolaan->hrg_base_rent_m2)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_base_rent_m2","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Hrg_base_rent_m2 End -->







<!-- Hrg_srvc_chrg_m2 Start -->

<div class="form-group">

  <label for="hrg_srvc_chrg_m2" class="col-sm-3 control-label"> Hrg_srvc_chrg_m2 </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_srvc_chrg_m2" name="hrg_srvc_chrg_m2"



    value="<?php echo set_value("hrg_srvc_chrg_m2",html_entity_decode($contract_pengelolaan->hrg_srvc_chrg_m2)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_srvc_chrg_m2","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Hrg_srvc_chrg_m2 End -->







<!-- Alamat_lokasi_kontrak Start -->

<div class="form-group">

  <label for="alamat_lokasi_kontrak" class="col-sm-3 control-label"> Alamat_lokasi_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="alamat_lokasi_kontrak" name="alamat_lokasi_kontrak"



    value="<?php echo set_value("alamat_lokasi_kontrak",html_entity_decode($contract_pengelolaan->alamat_lokasi_kontrak)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("alamat_lokasi_kontrak","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Alamat_lokasi_kontrak End -->







<!-- Hrg_br_per_bulan_rp Start -->

<div class="form-group">

  <label for="hrg_br_per_bulan_rp" class="col-sm-3 control-label"> Hrg_br_per_bulan_rp </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_br_per_bulan_rp" name="hrg_br_per_bulan_rp"



    value="<?php echo set_value("hrg_br_per_bulan_rp",html_entity_decode($contract_pengelolaan->hrg_br_per_bulan_rp)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_br_per_bulan_rp","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Hrg_br_per_bulan_rp End -->







<!-- Hrg_sc_per_bulan_rp Start -->

<div class="form-group">

  <label for="hrg_sc_per_bulan_rp" class="col-sm-3 control-label"> Hrg_sc_per_bulan_rp </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_sc_per_bulan_rp" name="hrg_sc_per_bulan_rp"



    value="<?php echo set_value("hrg_sc_per_bulan_rp",html_entity_decode($contract_pengelolaan->hrg_sc_per_bulan_rp)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_sc_per_bulan_rp","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Hrg_sc_per_bulan_rp End -->







<!-- Hrg_br_per_periodkontrak_rp Start -->

<div class="form-group">

  <label for="hrg_br_per_periodkontrak_rp" class="col-sm-3 control-label"> Hrg_br_per_periodkontrak_rp </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_br_per_periodkontrak_rp" name="hrg_br_per_periodkontrak_rp"



    value="<?php echo set_value("hrg_br_per_periodkontrak_rp",html_entity_decode($contract_pengelolaan->hrg_br_per_periodkontrak_rp)); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_br_per_periodkontrak_rp","<span class='label label-danger'>","</span>")?>

  </div>

</div>

<!-- Hrg_br_per_periodkontrak_rp End -->



<div class="form-group">

  <label for="hrg_sc_per_periodkontrakrp" class="col-sm-3 control-label"> Hrg_Sc_per_periodkontrak_rp </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="hrg_sc_per_periodkontrakrp" name="hrg_sc_per_periodkontrakrp"



    value="<?php echo set_value("hrg_sc_per_periodkontrakrp",html_entity_decode($contract_pengelolaan->hrg_sc_per_periodkontrakrp)); ?>">

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("hrg_sc_per_periodkontrakrp","<span class='label label-danger'>","</span>")?>

  </div>

</div>






	<!-- Satuan_period_kontrak Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Satuan_period_kontrak </label>

          <div class="col-md-4">

              <select class="form-control select2" name="satuan_period_kontrak" id="satuan_period_kontrak">

              <option value="">Select Satuan_period_kontrak</option>

      <?php

      if(isset($satuan_period_kontrak) && !empty($satuan_period_kontrak)):

      foreach($satuan_period_kontrak as $key => $value): ?>

          <option value="<?php echo $value->satuan; ?>" <?php echo $value->satuan==$contract_pengelolaan->satuan_period_kontrak?'selected="selected"':""; ?>>

            <?php echo $value->satuan; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Satuan_period_kontrak End -->







	<!-- Captive_or_notcaptive Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Captive_or_notcaptive </label>

          <div class="col-md-4">

              <select class="form-control select2" name="captive_or_notcaptive" id="captive_or_notcaptive">

              <option value="">Select Captive_or_notcaptive</option>

      <?php

      if(isset($captive_or_non) && !empty($captive_or_non)):

      foreach($captive_or_non as $key => $value): ?>

          <option value="<?php echo $value->keterangan; ?>" <?php echo $value->keterangan==$contract_pengelolaan->captive_or_notcaptive?'selected="selected"':""; ?>>

            <?php echo $value->keterangan; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Captive_or_notcaptive End -->







	<!-- Profit_center Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Profit_center </label>

          <div class="col-md-4">

              <select class="form-control select2" name="profit_center" id="profit_center">

              <option value="">Select Profit_center</option>

      <?php

      if(isset($unit_fm_bm) && !empty($unit_fm_bm)):

      foreach($unit_fm_bm as $key => $value): ?>

          <option value="<?php echo $value->profit_center; ?>" <?php echo $value->profit_center==$contract_pengelolaan->profit_center?'selected="selected"':""; ?>>

            <?php echo $value->nama_unit; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Profit_center End -->







	<!-- Status_kontrak Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Status_kontrak </label>

          <div class="col-md-4">

              <select class="form-control select2" name="status_kontrak" id="status_kontrak">

              <option value="">Select Status_kontrak</option>

      <?php

      if(isset($status_kontrak) && !empty($status_kontrak)):

      foreach($status_kontrak as $key => $value): ?>

          <option value="<?php echo $value->keterangan_status; ?>" <?php echo $value->keterangan_status==$contract_pengelolaan->status_kontrak?'selected="selected"':""; ?>>

            <?php echo $value->keterangan_status; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Status_kontrak End -->





<!-- Tax_remark Start -->



<div class="form-group">

  <label for="tax_remark" class="col-sm-3 control-label"> Tax_remark </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="tax_remark" name="tax_remark"><?php echo set_value("tax_remark",html_entity_decode($contract_pengelolaan->tax_remark)); ?></textarea>

  </div>

  <div class="col-sm-5" >



    <?php echo form_error("tax_remark","<span class='label label-danger'>","</span>")?>

  </div>

</div>



<!-- Tax_remark End -->





    <!-- Id_file Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Id_file </label>

      <div class="col-sm-6">

      <input type="file" name="id_file" />

      <input type="hidden" name="old_id_file"

      value="<?php if (isset($id_file) && $id_file!=""){echo $id_file; }?>" />

        <?php if(isset($id_file_err) && !empty($id_file_err))

        {foreach($id_file_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($contract_pengelolaan->id_file) && $contract_pengelolaan->id_file!=""){?>

            <br>

  <img src="<?php echo $this->config->item("photo_url");?><?php echo $contract_pengelolaan->id_file; ?>" alt="pic" width="50" height="50" />

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Id_file End -->







	<!-- Updater_by Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Updater_by </label>

          <div class="col-md-4">

              <select class="form-control select2" name="updater_by" id="updater_by">

              <option value="">Select Updater_by</option>

      <?php

      if(isset($users) && !empty($users)):

      foreach($users as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$contract_pengelolaan->updater_by?'selected="selected"':""; ?>>

            <?php echo $value->first_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Updater_by End -->







	<!-- Tanggal Start -->

	<div class="form-group">

	  <label for="tanggal" class="col-sm-3 control-label"> Tanggal </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control datetimepicker" name="tanggal" id="tanggal" value="<?php echo set_value("tanggal",$contract_pengelolaan->tanggal); ?>"/>

	  </div>

	  <div class="col-sm-5" >

	    <?php echo form_error("tanggal","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Tanggal End -->




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
