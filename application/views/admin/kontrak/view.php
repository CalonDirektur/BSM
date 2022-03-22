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

	   <label for="nama_pengadaan" class="col-sm-3 control-label"> Nama_pengadaan </label>

	 </td>

	 <td> 

	   <?php echo set_value("nama_pengadaan",html_entity_decode($kontrak->nama_pengadaan)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="vendor" class="col-sm-3 control-label"> Vendor </label>

	 </td>

	 <td> 

	   <?php echo set_value("vendor",html_entity_decode($kontrak->vendor)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="nilai_kontrak_customer" class="col-sm-3 control-label"> Nilai_kontrak_customer </label>

	 </td>

	 <td> 

	   <?php echo set_value("nilai_kontrak_customer",html_entity_decode($kontrak->nilai_kontrak_customer)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="nilai_juskeb" class="col-sm-3 control-label"> Nilai_juskeb </label>

	 </td>

	 <td> 

	   <?php echo set_value("nilai_juskeb",html_entity_decode($kontrak->nilai_juskeb)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="nilai_kontrak_mitra" class="col-sm-3 control-label"> Nilai_kontrak_mitra </label>

	 </td>

	 <td> 

	   <?php echo set_value("nilai_kontrak_mitra",html_entity_decode($kontrak->nilai_kontrak_mitra)); ?>

	 </td>

	</tr>

	



    <!-- Tanggal_kontrak_pengadaan Start -->

	<tr>

	 <td>

	  <label for="tanggal_kontrak_pengadaan" class="col-sm-3 control-label"> Tanggal_kontrak_pengadaan </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_kontrak_pengadaan", html_entity_decode($kontrak->tanggal_kontrak_pengadaan)); ?>

	 </td>

	</tr>

    <!-- Tanggal_kontrak_pengadaan End -->



	



    <!-- Tanggal_kontrak_berakhir Start -->

	<tr>

	 <td>

	  <label for="tanggal_kontrak_berakhir" class="col-sm-3 control-label"> Tanggal_kontrak_berakhir </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_kontrak_berakhir", html_entity_decode($kontrak->tanggal_kontrak_berakhir)); ?>

	 </td>

	</tr>

    <!-- Tanggal_kontrak_berakhir End -->



	



    <!-- Tanggal_bast Start -->

	<tr>

	 <td>

	  <label for="tanggal_bast" class="col-sm-3 control-label"> Tanggal_bast </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_bast", html_entity_decode($kontrak->tanggal_bast)); ?>

	 </td>

	</tr>

    <!-- Tanggal_bast End -->



	



    <!-- Tanggal_invoice Start -->

	<tr>

	 <td>

	  <label for="tanggal_invoice" class="col-sm-3 control-label"> Tanggal_invoice </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_invoice", html_entity_decode($kontrak->tanggal_invoice)); ?>

	 </td>

	</tr>

    <!-- Tanggal_invoice End -->



	



    <!-- Tanggal_payment Start -->

	<tr>

	 <td>

	  <label for="tanggal_payment" class="col-sm-3 control-label"> Tanggal_payment </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_payment", html_entity_decode($kontrak->tanggal_payment)); ?>

	 </td>

	</tr>

    <!-- Tanggal_payment End -->



	



    <!-- Opex_capex Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Opex_capex </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($opex_capex) && !empty($opex_capex)):



	      foreach($opex_capex as $key => $value): 

	       if($value->keterangan==$kontrak->opex_capex)

	             echo $value->keterangan;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Opex_capex End -->



	

	<tr>

	 <td>

	   <label for="lokasi" class="col-sm-3 control-label"> Lokasi </label>

	 </td>

	 <td> 

	   <?php echo set_value("lokasi",html_entity_decode($kontrak->lokasi)); ?>

	 </td>

	</tr>

	



    <!-- Portofolio Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Portofolio </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($portofolio) && !empty($portofolio)):



	      foreach($portofolio as $key => $value): 

	       if($value->jenis_portofolio==$kontrak->portofolio)

	             echo $value->jenis_portofolio;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Portofolio End -->



	



    <!-- Metode_pengadaan Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Metode_pengadaan </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($metode_pengadaan) && !empty($metode_pengadaan)):



	      foreach($metode_pengadaan as $key => $value): 

	       if($value->keterangan_pengadaan==$kontrak->metode_pengadaan)

	             echo $value->keterangan_pengadaan;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Metode_pengadaan End -->



	



    <!-- Tanggal_penerimaan_juskeb Start -->

	<tr>

	 <td>

	  <label for="tanggal_penerimaan_juskeb" class="col-sm-3 control-label"> Tanggal_penerimaan_juskeb </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_penerimaan_juskeb", html_entity_decode($kontrak->tanggal_penerimaan_juskeb)); ?>

	 </td>

	</tr>

    <!-- Tanggal_penerimaan_juskeb End -->



	



    <!-- Tanggal_pr Start -->

	<tr>

	 <td>

	  <label for="tanggal_pr" class="col-sm-3 control-label"> Tanggal_pr </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_pr", html_entity_decode($kontrak->tanggal_pr)); ?>

	 </td>

	</tr>

    <!-- Tanggal_pr End -->



	



    <!-- Tanggal_po Start -->

	<tr>

	 <td>

	  <label for="tanggal_po" class="col-sm-3 control-label"> Tanggal_po </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_po", html_entity_decode($kontrak->tanggal_po)); ?>

	 </td>

	</tr>

    <!-- Tanggal_po End -->



	



    <!-- Tanggal_insert Start -->

	<tr>

	 <td>

	  <label for="tanggal_insert" class="col-sm-3 control-label"> Tanggal_insert </label>

	 </td>

	 <td> 

	   <?php echo set_value("tanggal_insert", html_entity_decode($kontrak->tanggal_insert)); ?>

	 </td>

	</tr>

    <!-- Tanggal_insert End -->



	



    <!-- Username Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Username </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):



	      foreach($users as $key => $value): 

	       if($value->id==$kontrak->username)

	             echo $value->username;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Username End -->



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