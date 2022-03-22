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
   <div class="col-lg-12 row wrapper ">
      <div class="ibox ">
         <div class="ibox-title" >
            <h5>View <small></small></h5>
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
                  <div class="box-body">
                     <?php if($this->session->flashdata('message')): ?>
                     <div class="alert alert-success">
                        <button type="button" class="close" data-close="alert"></button>
                        <?php echo $this->session->flashdata('message'); ?>
                     </div>
                     <?php endif; ?> 
                     

<table class='table table-bordered' style='width:70%;' align='center'>

	<tr>

	 <td>

	   <label for="customer" class="col-sm-3 control-label"> Customer </label>

	 </td>

	 <td>

	   <?php echo set_value("customer",html_entity_decode($contract_pengelolaan->customer)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="wilayah" class="col-sm-3 control-label"> Wilayah </label>

	 </td>

	 <td>

	   <?php echo set_value("wilayah",html_entity_decode($contract_pengelolaan->wilayah)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="uraian_pekerjaan" class="col-sm-3 control-label"> Uraian_pekerjaan </label>

	 </td>

	 <td>

	   <?php echo set_value("uraian_pekerjaan",html_entity_decode($contract_pengelolaan->uraian_pekerjaan)); ?>

	 </td>

	</tr>

	



    <!-- Jenis_pengelolaan Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Jenis_pengelolaan </label>

	 </td>

	 <td>

	   <?php

	      if(isset($jenis_pengelolaan) && !empty($jenis_pengelolaan)):



	      foreach($jenis_pengelolaan as $key => $value):

	       if($value->pengelolaan==$contract_pengelolaan->jenis_pengelolaan)

	             echo $value->pengelolaan;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Jenis_pengelolaan End -->



	

	<tr>

	 <td>

	   <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value("nomor_kontrak",html_entity_decode($contract_pengelolaan->nomor_kontrak)); ?>

	 </td>

	</tr>

	



    <!-- Tgl_kontrak Start -->

	<tr>

	 <td>

	  <label for="tgl_kontrak" class="col-sm-3 control-label"> Tgl_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value("tgl_kontrak", html_entity_decode($contract_pengelolaan->tgl_kontrak)); ?>

	 </td>

	</tr>

    <!-- Tgl_kontrak End -->



	



    <!-- Masa_awal_kontrak Start -->

	<tr>

	 <td>

	  <label for="masa_awal_kontrak" class="col-sm-3 control-label"> Masa_awal_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value("masa_awal_kontrak", html_entity_decode($contract_pengelolaan->masa_awal_kontrak)); ?>

	 </td>

	</tr>

    <!-- Masa_awal_kontrak End -->



	



    <!-- Masa_akhir_kontrak Start -->

	<tr>

	 <td>

	  <label for="masa_akhir_kontrak" class="col-sm-3 control-label"> Masa_akhir_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value("masa_akhir_kontrak", html_entity_decode($contract_pengelolaan->masa_akhir_kontrak)); ?>

	 </td>

	</tr>

    <!-- Masa_akhir_kontrak End -->



	

	<tr>

	 <td>

	   <label for="durasi_kontrak_bulan" class="col-sm-3 control-label"> Durasi_kontrak_bulan </label>

	 </td>

	 <td>

	   <?php echo set_value("durasi_kontrak_bulan",html_entity_decode($contract_pengelolaan->durasi_kontrak_bulan)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="luasan_m2" class="col-sm-3 control-label"> Luasan_m2 </label>

	 </td>

	 <td>

	   <?php echo set_value("luasan_m2",html_entity_decode($contract_pengelolaan->luasan_m2)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="hrg_base_rent_m2" class="col-sm-3 control-label"> Hrg_base_rent_m2 </label>

	 </td>

	 <td>

	   <?php echo set_value("hrg_base_rent_m2",html_entity_decode($contract_pengelolaan->hrg_base_rent_m2)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="hrg_srvc_chrg_m2" class="col-sm-3 control-label"> Hrg_srvc_chrg_m2 </label>

	 </td>

	 <td>

	   <?php echo set_value("hrg_srvc_chrg_m2",html_entity_decode($contract_pengelolaan->hrg_srvc_chrg_m2)); ?>

	 </td>

	</tr>

	



    <!-- Alamat_lokasi_kontrak Start -->

	<tr>

	 <td>

	  <label for="alamat_lokasi_kontrak" class="col-sm-3 control-label"> Alamat_lokasi_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value("alamat_lokasi_kontrak",  html_entity_decode($contract_pengelolaan->alamat_lokasi_kontrak)); ?>

	 </td>

	</tr>

    <!-- Alamat_lokasi_kontrak End -->



	

	<tr>

	 <td>

	   <label for="hrg_br_per_bulan_rp" class="col-sm-3 control-label"> Hrg_br_per_bulan_rp </label>

	 </td>

	 <td>

	   <?php echo set_value("hrg_br_per_bulan_rp",html_entity_decode($contract_pengelolaan->hrg_br_per_bulan_rp)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="hrg_sc_per_bulan_rp" class="col-sm-3 control-label"> Hrg_sc_per_bulan_rp </label>

	 </td>

	 <td>

	   <?php echo set_value("hrg_sc_per_bulan_rp",html_entity_decode($contract_pengelolaan->hrg_sc_per_bulan_rp)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="hrg_br_per_periodkontrak_rp" class="col-sm-3 control-label"> Hrg_br_per_periodkontrak_rp </label>

	 </td>

	 <td>

	   <?php echo set_value("hrg_br_per_periodkontrak_rp",html_entity_decode($contract_pengelolaan->hrg_br_per_periodkontrak_rp)); ?>

	 </td>

	</tr>

	



    <!-- Satuan_period_kontrak Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Satuan_period_kontrak </label>

	 </td>

	 <td>

	   <?php

	      if(isset($satuan_period_kontrak) && !empty($satuan_period_kontrak)):



	      foreach($satuan_period_kontrak as $key => $value):

	       if($value->satuan==$contract_pengelolaan->satuan_period_kontrak)

	             echo $value->satuan;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Satuan_period_kontrak End -->



	



    <!-- Captive_or_notcaptive Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Captive_or_notcaptive </label>

	 </td>

	 <td>

	   <?php

	      if(isset($captive_or_non) && !empty($captive_or_non)):



	      foreach($captive_or_non as $key => $value):

	       if($value->keterangan==$contract_pengelolaan->captive_or_notcaptive)

	             echo $value->keterangan;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Captive_or_notcaptive End -->



	



    <!-- Profit_center Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Profit_center </label>

	 </td>

	 <td>

	   <?php

	      if(isset($unit_fm_bm) && !empty($unit_fm_bm)):



	      foreach($unit_fm_bm as $key => $value):

	       if($value->profit_center==$contract_pengelolaan->profit_center)

	             echo $value->nama_unit;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Profit_center End -->



	



    <!-- Status_kontrak Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Status_kontrak </label>

	 </td>

	 <td>

	   <?php

	      if(isset($status_kontrak) && !empty($status_kontrak)):



	      foreach($status_kontrak as $key => $value):

	       if($value->keterangan_status==$contract_pengelolaan->status_kontrak)

	             echo $value->keterangan_status;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Status_kontrak End -->



	



    <!-- Tax_remark Start -->

	<tr>

	 <td>

	  <label for="tax_remark" class="col-sm-3 control-label"> Tax_remark </label>

	 </td>

	 <td>

	   <?php echo set_value("tax_remark",  html_entity_decode($contract_pengelolaan->tax_remark)); ?>

	 </td>

	</tr>

    <!-- Tax_remark End -->



	



    <!-- Id_file Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Id_file </label>

	 </td>

	 <td>

	 <?php if (isset($contract_pengelolaan->id_file) && $contract_pengelolaan->id_file!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $contract_pengelolaan->id_file; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Id_file End -->



	



    <!-- Updater_by Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Updater_by </label>

	 </td>

	 <td>

	   <?php

	      if(isset($users) && !empty($users)):



	      foreach($users as $key => $value):

	       if($value->id==$contract_pengelolaan->updater_by)

	             echo $value->first_name;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Updater_by End -->



	



    <!-- Tanggal Start -->

	<tr>

	 <td>

	  <label for="tanggal" class="col-sm-3 control-label"> Tanggal </label>

	 </td>

	 <td>

	   <?php echo set_value("tanggal", html_entity_decode($contract_pengelolaan->tanggal)); ?>

	 </td>

	</tr>

    <!-- Tanggal End -->



	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td></tr></table>
                     <div class="form-group">
                        <div class="col-sm-3" >                       
                        </div>
                        <div class="col-sm-6">
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