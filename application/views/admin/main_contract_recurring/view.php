<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Main_contract_recurring</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url() . 'admin/'; ?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Main_contract_recurring</strong>

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

	<tr>

	 <td>

	   <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'nomor_kontrak',
        html_entity_decode($main_contract_recurring->nomor_kontrak)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="secondary_nomor_kontrak" class="col-sm-3 control-label"> Secondary_nomor_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'secondary_nomor_kontrak',
        html_entity_decode($main_contract_recurring->secondary_nomor_kontrak)
    ); ?>

	 </td>

	</tr>

	



    <!-- Kategori_kontrak Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Kategori_kontrak </label>

	 </td>

	 <td>

	   <?php if (isset($kategori_kontrak) && !empty($kategori_kontrak)):
        foreach ($kategori_kontrak as $key => $value):
            if (
                $value->ket_kategori_kontrak ==
                $main_contract_recurring->kategori_kontrak
            ) {
                echo $value->ket_kategori_kontrak;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>

    <!-- Kategori_kontrak End -->



	



    <!-- Nama_kontrak Start -->

	<tr>

	 <td>

	  <label for="nama_kontrak" class="col-sm-3 control-label"> Nama_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'nama_kontrak',
        html_entity_decode($main_contract_recurring->nama_kontrak)
    ); ?>

	 </td>

	</tr>

    <!-- Nama_kontrak End -->



	

	<tr>

	 <td>

	   <label for="customer_mitra" class="col-sm-3 control-label"> Customer_mitra </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'customer_mitra',
        html_entity_decode($main_contract_recurring->customer_mitra)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="wilayah_mitra" class="col-sm-3 control-label"> Wilayah_mitra </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'wilayah_mitra',
        html_entity_decode($main_contract_recurring->wilayah_mitra)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="objek_kontrak" class="col-sm-3 control-label"> Objek_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'objek_kontrak',
        html_entity_decode($main_contract_recurring->objek_kontrak)
    ); ?>

	 </td>

	</tr>

	



    <!-- Tanggal_kontrak Start -->

	<tr>

	 <td>

	  <label for="tanggal_kontrak" class="col-sm-3 control-label"> Tanggal_kontrak </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tanggal_kontrak',
        html_entity_decode($main_contract_recurring->tanggal_kontrak)
    ); ?>

	 </td>

	</tr>

    <!-- Tanggal_kontrak End -->



	



    <!-- Masa_awal Start -->

	<tr>

	 <td>

	  <label for="masa_awal" class="col-sm-3 control-label">Masa_awal </label>

	 </td>

	 <td>
	   <?php echo set_value(
        'masa_awal',
        html_entity_decode($main_contract_recurring->masa_awal)
    ); ?>

	 </td>

	</tr>

    <!-- Masa_awal End -->



	



    <!-- Masa_akhir Start -->

	<tr>

	 <td>

	  <label for="masa_akhir" class="col-sm-3 control-label"> Masa_akhir </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'masa_akhir',
        html_entity_decode($main_contract_recurring->masa_akhir)
    ); ?>

	 </td>

	</tr>

    <!-- Masa_akhir End -->



	

	<tr>

	 <td>

	   <label for="lama_kontrak_bulan" class="col-sm-3 control-label"> Lama_kontrak_bulan </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'lama_kontrak_bulan',
        html_entity_decode($main_contract_recurring->lama_kontrak_bulan)
    ); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="luasan_m2" class="col-sm-3 control-label"> Luasan_m2 </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'luasan_m2',
        html_entity_decode($main_contract_recurring->luasan_m2)
    ); ?>

	 </td>

	</tr>

	



    <!-- Nama_file Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Nama_file </label>

	 </td>

	 <td>

	 <?php if (
      isset($main_contract_recurring->nama_file) &&
      $main_contract_recurring->nama_file != ''
  ) { ?>
		                            <a href="<?php
                              echo $this->config->item('photo_url');
                              echo $main_contract_recurring->nama_file;
                              ?>" target="_blank">Download file</a>


	    <!-- <img src="<?php
     echo $this->config->item('photo_url');
     echo $main_contract_recurring->nama_file;
     ?>" alt="pic" width="50" height="50" /> -->

	    <?php } ?>

	 </td>

	</tr>

    <!-- Nama_file End -->

	<!-- Nilai Bulanan -->

	<?php if (isset($nilai_pengelolaans) and !empty($nilai_pengelolaans)) {
     $count = 1; ?>
	
                  <?php foreach ($nilai_pengelolaans as $key => $value) { ?>
	<tr>

	 <td>

	   <label for="ket_kontrak_induk" class="col-sm-3 control-label"> Nilai <?php echo $value->portofolio; ?> </label>

	 </td>

	 <td>
		<?php echo $value->nilai_bulan; ?>


	 </td>

	</tr>


						<?php }
 } ?>
	

	<tr>

	 <td>

	   <label for="ket_kontrak_induk" class="col-sm-3 control-label"> Ket_kontrak_induk </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'ket_kontrak_induk',
        html_entity_decode($main_contract_recurring->ket_kontrak_induk)
    ); ?>

	 </td>

	</tr>

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
