<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Project_contract</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url() . 'admin/'; ?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Project_contract</strong>

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

                     <?php if ($this->session->flashdata('message')): ?>

                     <div class="alert alert-success">

                        <button type="button" class="close" data-close="alert"></button>

                        <?php echo $this->session->flashdata('message'); ?>

                     </div>

                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>



    <!-- Segmen Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Segmen </label>

	 </td>

	 <td>

	   <?php if (isset($project_segmen) && !empty($project_segmen)):
        foreach ($project_segmen as $key => $value):
            if ($value->segment_customer == $project_contract->segmen) {
                echo $value->segment_customer;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>

    <!-- Segmen End -->



	



    <!-- Uraian_pekerjaan Start -->

	<tr>

	 <td>

	  <label for="uraian_pekerjaan" class="col-sm-3 control-label"> Uraian_pekerjaan </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'uraian_pekerjaan',
        html_entity_decode($project_contract->uraian_pekerjaan)
    ); ?>

	 </td>

	</tr>

    <!-- Uraian_pekerjaan End -->



	

	<tr>

	 <td>

	   <label for="lokasi" class="col-sm-3 control-label"> Lokasi </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'lokasi',
        html_entity_decode($project_contract->lokasi)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="customer" class="col-sm-3 control-label"> Customer </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'customer',
        html_entity_decode($project_contract->customer)
    ); ?>

	 </td>

	</tr>

	



    <!-- Fm Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Fm </label>

	 </td>

	 <td>

	   <?php if (isset($unit_fm_bm) && !empty($unit_fm_bm)):
        foreach ($unit_fm_bm as $key => $value):
            if ($value->nama_unit == $project_contract->fm) {
                echo $value->nama_unit;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>

    <!-- Fm End -->



	

	<tr>

	 <td>

	   <label for="owner_group" class="col-sm-3 control-label"> Owner_group </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'owner_group',
        html_entity_decode($project_contract->owner_group)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="detil_projek" class="col-sm-3 control-label"> Detil_projek </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'detil_projek',
        html_entity_decode($project_contract->detil_projek)
    ); ?>

	 </td>

	</tr>

	



    <!-- Kontrak_handle Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Kontrak_handle </label>

	 </td>

	 <td>

	   <?php if (isset($project_kontrak_handle) && !empty($project_kontrak_handle)):
        foreach ($project_kontrak_handle as $key => $value):
            if ($value->handling == $project_contract->kontrak_handle) {
                echo $value->handling;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>

    <!-- Kontrak_handle End -->



	

	<tr>

	 <td>

	   <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'nomor_kontrak',
        html_entity_decode($project_contract->nomor_kontrak)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="nilai_kontrak" class="col-sm-3 control-label"> Nilai_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'nilai_kontrak',
        html_entity_decode($project_contract->nilai_kontrak)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="jangka_waktu_hari" class="col-sm-3 control-label"> Jangka_waktu_hari </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'jangka_waktu_hari',
        html_entity_decode($project_contract->jangka_waktu_hari)
    ); ?>

	 </td>

	</tr>

	



    <!-- Tanggal_mulai_kontrak Start -->

	<tr>

	 <td>

	  <label for="tanggal_mulai_kontrak" class="col-sm-3 control-label"> Tanggal_mulai_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tanggal_mulai_kontrak',
        html_entity_decode($project_contract->tanggal_mulai_kontrak)
    ); ?>

	 </td>

	</tr>

    <!-- Tanggal_mulai_kontrak End -->



	



    <!-- Tanggal_akhir_kontrak Start -->

	<tr>

	 <td>

	  <label for="tanggal_akhir_kontrak" class="col-sm-3 control-label"> Tanggal_akhir_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tanggal_akhir_kontrak',
        html_entity_decode($project_contract->tanggal_akhir_kontrak)
    ); ?>

	 </td>

	</tr>

    <!-- Tanggal_akhir_kontrak End -->



	

	<tr>

	 <td>

	   <label for="tahun_projek" class="col-sm-3 control-label"> Tahun_projek </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tahun_projek',
        html_entity_decode($project_contract->tahun_projek)
    ); ?>

	 </td>

	</tr>

	



    <!-- Progress_saat_ini Start -->

	<!-- <tr>

	 <td>

	  <label for="persentase_progress" class="control-label col-sm-3"> Progress_Awal </label>

	 </td>

	 <td>



<?php echo set_value(
    'persentase_progress',
    html_entity_decode($project_contract->persentase_progress)
); ?>

	 </td>

	</tr> -->

    <!-- Progress_saat_ini End -->



	



    <!-- Dok_bapp Start -->

	<!-- <tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Dok_bapp </label>

	 </td>

	 <td>

	 <?php if (
      isset($project_contract->dok_bapp) &&
      $project_contract->dok_bapp != ''
  ) { ?>

	            <br>

	    <img src="<?php
     echo $this->config->item('photo_url');
     echo $project_contract->dok_bapp;
     ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr> -->

    <!-- Dok_bapp End -->



	



    <!-- Dok_baut Start -->

	<!-- <tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Dok_baut </label>

	 </td>

	 <td>

	 <?php if (
      isset($project_contract->dok_baut) &&
      $project_contract->dok_baut != ''
  ) { ?>

	            <br>

	    <img src="<?php
     echo $this->config->item('photo_url');
     echo $project_contract->dok_baut;
     ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr> -->

    <!-- Dok_baut End -->



	



    <!-- Dok_bast Start -->

	<!-- <tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Dok_bast </label>

	 </td>

	 <td>

	 <?php if (
      isset($project_contract->dok_bast) &&
      $project_contract->dok_bast != ''
  ) { ?>

	            <br>

	    <img src="<?php
     echo $this->config->item('photo_url');
     echo $project_contract->dok_bast;
     ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr> -->

    <!-- Dok_bast End -->
    <?php if (
        isset($project_persentase_now) and !empty($project_persentase_now)
    ) {
        $count = 1; ?>
	
                  <?php
                  foreach ($project_persentase_now as $key => $value) { ?>
	<tr>

	 <td>
        <?php if (!empty($value->id)) { ?>
                
              
	   <label for="persentase_progress" class="col-sm-6 control-label"> Progress_<?php echo $count; ?> </label>
         <?php $count++;} ?>

	 </td>

	 <td>
		<?php echo $value->persentase_progress; ?>% - <?php echo $value->tanggal_update; ?>
                     

	 </td>

	</tr>


						<?php }
                  $count++;

    } ?>
 

    <!-- <tr>

	 <td>

	   <label for="tahun_projek" class="col-sm-3 control-label"> Persentase Progress </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tahun_projek',
        html_entity_decode($project_contract->tahun_projek)
    ); ?>

	 </td>

	</tr> -->



	<tr><td colspan="2">
        
    <!-- <a href="<?php echo base_url(); ?>admin/project_contract/add_progress/<?php echo $value->id; ?>" class="btn btn-info">Add Progress</a> -->
    <!-- <a type="button" class="btn btn-info" onclick="history.back()">Basss    ck</a> -->

<a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a>
</td></tr>


<?php echo $last_data_row; ?>

</table>

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
