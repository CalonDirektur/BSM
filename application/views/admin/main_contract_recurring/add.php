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

              <?php if ($this->session->flashdata('message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 

              





	<!-- Nomor_kontrak Start -->

	<div class="form-group">

	  <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nomor_kontrak" name="nomor_kontrak"



	    value="<?php echo set_value('nomor_kontrak'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'nomor_kontrak',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Nomor_kontrak End -->





	





	<!-- Secondary_nomor_kontrak Start -->

	<div class="form-group">

	  <label for="secondary_nomor_kontrak" class="col-sm-3 control-label"> Secondary_nomor_kontrak </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="secondary_nomor_kontrak" name="secondary_nomor_kontrak"



	    value="<?php echo set_value('secondary_nomor_kontrak'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'secondary_nomor_kontrak',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Secondary_nomor_kontrak End -->





	



	<!-- Kategori_kontrak Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Kategori_kontrak </label>

          <div class="col-md-4">

              <select class="form-control select2" name="kategori_kontrak" id="kategori_kontrak">

              <option value="">Select Kategori_kontrak</option>

      <?php if (isset($kategori_kontrak) && !empty($kategori_kontrak)):
          foreach ($kategori_kontrak as $key => $value): ?>

          <option value="<?php echo $value->ket_kategori_kontrak; ?>">

            <?php echo $value->ket_kategori_kontrak; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Kategori_kontrak End -->







				<!-- Nama_kontrak Start -->

			<div class="form-group">

			  <label for="nama_kontrak" class="col-sm-3 control-label"> Nama_kontrak </label>

			  <div class="col-sm-4">

			    <textarea class="form-control" id="nama_kontrak" name="nama_kontrak"><?php echo set_value(
           'nama_kontrak'
       ); ?></textarea>

			  </div>

			  <div class="col-sm-5" >



			    <?php echo form_error(
           'nama_kontrak',
           "<span class='label label-danger'>",
           '</span>'
       ); ?>

			  </div>

			</div>

			<!-- Nama_kontrak End -->



			





	<!-- Customer_mitra Start -->

	<div class="form-group">

	  <label for="customer_mitra" class="col-sm-3 control-label"> Customer_mitra </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="customer_mitra" name="customer_mitra"



	    value="<?php echo set_value('customer_mitra'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'customer_mitra',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Customer_mitra End -->





	





	<!-- Wilayah_mitra Start -->

	<div class="form-group">

	  <label for="wilayah_mitra" class="col-sm-3 control-label"> Wilayah_mitra </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="wilayah_mitra" name="wilayah_mitra"



	    value="<?php echo set_value('wilayah_mitra'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'wilayah_mitra',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Wilayah_mitra End -->





	





	<!-- Objek_kontrak Start -->

	<div class="form-group">

	  <label for="objek_kontrak" class="col-sm-3 control-label"> Objek_kontrak </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="objek_kontrak" name="objek_kontrak"



	    value="<?php echo set_value('objek_kontrak'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'objek_kontrak',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Objek_kontrak End -->





	



	<!-- Tanggal_kontrak Start -->

	<div class="form-group">

	  <label for="tanggal_kontrak" class="col-sm-3 control-label"> Tanggal_kontrak </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="tanggal_kontrak" name="tanggal_kontrak" value="<?php echo set_value(
         'tanggal_kontrak',
         '2022-02-08'
     ); ?>"	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'tanggal_kontrak',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Tanggal_kontrak End -->



	



	<!-- Masa_awal Start -->

	<div class="form-group">

	  <label for="masa_awal" class="col-sm-3 control-label"> Masa_awal </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="masa_awal" name="masa_awal" value="<?php echo set_value(
         'masa_awal',
         '2022-02-08'
     ); ?>"	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'masa_awal',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Masa_awal End -->



	



	<!-- Masa_akhir Start -->

	<div class="form-group">

	  <label for="masa_akhir" class="col-sm-3 control-label"> Masa_akhir </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="masa_akhir" name="masa_akhir" value="<?php echo set_value(
         'masa_akhir',
         '2022-02-08'
     ); ?>"	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'masa_akhir',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Masa_akhir End -->



	





	<!-- Lama_kontrak_bulan Start -->

	<div class="form-group">

	  <label for="lama_kontrak_bulan" class="col-sm-3 control-label"> Lama_kontrak_bulan </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="lama_kontrak_bulan" name="lama_kontrak_bulan"



	    value="<?php echo set_value('lama_kontrak_bulan'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'lama_kontrak_bulan',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Lama_kontrak_bulan End -->





	





	<!-- Luasan_m2 Start -->

	<div class="form-group">

	  <label for="luasan_m2" class="col-sm-3 control-label"> Luasan_m2 </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="luasan_m2" name="luasan_m2"



	    value="<?php echo set_value('luasan_m2'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'luasan_m2',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Luasan_m2 End -->





	



    <!-- Nama_file Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Nama_file </label>

      <div class="col-sm-6">

      <input type="file" name="nama_file" />

      <input type="hidden" name="old_nama_file" value="<?php if (
          isset($nama_file) &&
          $nama_file != ''
      ) {
          echo $nama_file;
      } ?>" />

        <?php if (isset($nama_file_err) && !empty($nama_file_err)) {
            foreach ($nama_file_err as $key => $error) {
                echo "<div class=\"error-msg\"></div>";
            }
        } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Nama_file End -->



    





	<!-- Ket_kontrak_induk Start -->

	<div class="form-group">

	  <label for="ket_kontrak_induk" class="col-sm-3 control-label"> Ket_kontrak_induk </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="ket_kontrak_induk" name="ket_kontrak_induk"



	    value="<?php echo set_value('ket_kontrak_induk'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'ket_kontrak_induk',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>

	<!-- Ket_kontrak_induk End -->





<!-- Portofolio Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Portofolio Pertama </label>

          <div class="col-md-4">

              <select class="form-control select2" name="portofolio" id="portofolio">

              <option value="">Select Portofolio</option>

      <?php if (isset($portofolio) && !empty($portofolio)):
          foreach ($portofolio as $key => $value): ?>

          <option value="<?php echo $value->kode_portofolio; ?>">

            <?php echo $value->jenis_portofolio; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Portofolio End -->

	<!-- Base Rent Start -->
	<div class="form-group">

	  <label for="nilai_bulan" class="col-sm-3 control-label"> Nilai Base Rent </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nilai_bulan" name="nilai_bulan"



	    value="<?php echo set_value('nilai_bulan'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'nilai_bulan',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>




	<div class="form-group">

        <label class="control-label col-md-3"> Portofolio Kedua </label>

          <div class="col-md-4">

              <select class="form-control select2" name="portofolio_kedua" id="portofolio_kedua">

              <option value="">Select Portofolio</option>

      <?php if (isset($portofolio) && !empty($portofolio)):
          foreach ($portofolio as $key => $value): ?>

          <option value="<?php echo $value->kode_portofolio; ?>">

            <?php echo $value->jenis_portofolio; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

	<div class="form-group">

	  <label for="nilai_bulan" class="col-sm-3 control-label"> Nilai Service Charge </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="nilai_bulan_sc" name="nilai_bulan_sc"



	    value="<?php echo set_value('nilai_bulan_sc'); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'nilai_bulan_sc',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>



<!-- Fm Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> FM </label>

          <div class="col-md-4">

              <select class="form-control select2" name="fm" id="fm">

              <option value="">Select Fm</option>

      <?php if (isset($unit_fm_bm) && !empty($unit_fm_bm)):
          foreach ($unit_fm_bm as $key => $value): ?>

          <option value="<?php echo $value->nama_unit; ?>">

            <?php echo $value->nama_unit; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

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
