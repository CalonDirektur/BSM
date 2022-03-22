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

              <?php if ($this->session->flashdata('message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 

              



	<!-- Segmen Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Segmen </label>

          <div class="col-md-4">

              <select class="form-control select2" name="segmen" id="segmen">

              <option value="">Select Segmen</option>

      <?php if (isset($project_segmen) && !empty($project_segmen)):
          foreach ($project_segmen as $key => $value): ?>

          <option value="<?php echo $value->segment_customer; ?>" <?php echo $value->segment_customer ==
$project_contract->segmen
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->segment_customer; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Segmen End -->





<!-- Uraian_pekerjaan Start -->



<div class="form-group">

  <label for="uraian_pekerjaan" class="col-sm-3 control-label"> Uraian_pekerjaan </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="uraian_pekerjaan" name="uraian_pekerjaan"><?php echo set_value(
        'uraian_pekerjaan',
        html_entity_decode($project_contract->uraian_pekerjaan)
    ); ?></textarea>

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'uraian_pekerjaan',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>



<!-- Uraian_pekerjaan End -->





<!-- Lokasi Start -->

<div class="form-group">

  <label for="lokasi" class="col-sm-3 control-label"> Lokasi </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="lokasi" name="lokasi"



    value="<?php echo set_value(
        'lokasi',
        html_entity_decode($project_contract->lokasi)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'lokasi',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Lokasi End -->







<!-- Customer Start -->

<div class="form-group">

  <label for="customer" class="col-sm-3 control-label"> Customer </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="customer" name="customer"



    value="<?php echo set_value(
        'customer',
        html_entity_decode($project_contract->customer)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'customer',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Customer End -->







	<!-- Fm Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Fm </label>

          <div class="col-md-4">

              <select class="form-control select2" name="fm" id="fm">

              <option value="">Select Fm</option>

      <?php if (isset($unit_fm_bm) && !empty($unit_fm_bm)):
          foreach ($unit_fm_bm as $key => $value): ?>

          <option value="<?php echo $value->nama_unit; ?>" <?php echo $value->nama_unit ==
$project_contract->fm
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->nama_unit; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Fm End -->







<!-- Owner_group Start -->

<div class="form-group">

  <label for="owner_group" class="col-sm-3 control-label"> Owner_group </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="owner_group" name="owner_group"



    value="<?php echo set_value(
        'owner_group',
        html_entity_decode($project_contract->owner_group)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'owner_group',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Owner_group End -->







<!-- Detil_projek Start -->

<div class="form-group">

  <label for="detil_projek" class="col-sm-3 control-label"> Detil_projek </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="detil_projek" name="detil_projek"



    value="<?php echo set_value(
        'detil_projek',
        html_entity_decode($project_contract->detil_projek)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'detil_projek',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Detil_projek End -->







	<!-- Kontrak_handle Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Kontrak_handle </label>

          <div class="col-md-4">

              <select class="form-control select2" name="kontrak_handle" id="kontrak_handle">

              <option value="">Select Kontrak_handle</option>

      <?php if (
          isset($project_kontrak_handle) &&
          !empty($project_kontrak_handle)
      ):
          foreach ($project_kontrak_handle as $key => $value): ?>

          <option value="<?php echo $value->handling; ?>" <?php echo $value->handling ==
$project_contract->kontrak_handle
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->handling; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Kontrak_handle End -->







<!-- Nomor_kontrak Start -->

<div class="form-group">

  <label for="nomor_kontrak" class="col-sm-3 control-label"> Nomor_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nomor_kontrak" name="nomor_kontrak"



    value="<?php echo set_value(
        'nomor_kontrak',
        html_entity_decode($project_contract->nomor_kontrak)
    ); ?>"

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







<!-- Nilai_kontrak Start -->

<div class="form-group">

  <label for="nilai_kontrak" class="col-sm-3 control-label"> Nilai_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak"



    value="<?php echo set_value(
        'nilai_kontrak',
        html_entity_decode($project_contract->nilai_kontrak)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'nilai_kontrak',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Nilai_kontrak End -->







<!-- Jangka_waktu_hari Start -->

<div class="form-group">

  <label for="jangka_waktu_hari" class="col-sm-3 control-label"> Jangka_waktu_hari </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="jangka_waktu_hari" name="jangka_waktu_hari"



    value="<?php echo set_value(
        'jangka_waktu_hari',
        html_entity_decode($project_contract->jangka_waktu_hari)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'jangka_waktu_hari',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Jangka_waktu_hari End -->







<!-- Tanggal_mulai_kontrak Start -->

<div class="form-group">

  <label for="tanggal_mulai_kontrak" class="col-sm-3 control-label"> Tanggal_mulai_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_mulai_kontrak" name="tanggal_mulai_kontrak"



    value="<?php echo set_value(
        'tanggal_mulai_kontrak',
        $project_contract->tanggal_mulai_kontrak
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'tanggal_mulai_kontrak',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Tanggal_mulai_kontrak End -->







<!-- Tanggal_akhir_kontrak Start -->

<div class="form-group">

  <label for="tanggal_akhir_kontrak" class="col-sm-3 control-label"> Tanggal_akhir_kontrak </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_akhir_kontrak" name="tanggal_akhir_kontrak"



    value="<?php echo set_value(
        'tanggal_akhir_kontrak',
        $project_contract->tanggal_akhir_kontrak
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'tanggal_akhir_kontrak',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Tanggal_akhir_kontrak End -->





<!-- <div class="form-group">

  <label for="persentase_progress" class="col-sm-3 control-label"> Persentase Progress Awal  </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="persentase_progress" name="persentase_progress"



    value="<?php echo set_value(
        'persentase_progress',
        html_entity_decode($project_contract->persentase_progress)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'persentase_progress',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div> -->




<!-- Tahun_projek Start -->

<!-- <div class="form-group">

  <label for="tahun_projek" class="col-sm-3 control-label"> Tahun_projek </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="tahun_projek" name="tahun_projek"



    value="<?php echo set_value(
        'tahun_projek',
        html_entity_decode($project_contract->tahun_projek)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'tahun_projek',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div> -->

<!-- Tahun_projek End -->







	<!-- Progress_saat_ini Start -->

	<!-- <div class="form-group">

        <label class="control-label col-md-3"> Progress_saat_ini </label>

          <div class="col-md-4">

              <select class="form-control select2" name="progress_saat_ini" id="progress_saat_ini">

              <option value="">Select Progress_saat_ini</option>

      <?php if (
          isset($project_progress_saat_ini) &&
          !empty($project_progress_saat_ini)
      ):
          foreach ($project_progress_saat_ini as $key => $value): ?>

          <option value="<?php echo $value->progress_opsi; ?>" <?php echo $value->progress_opsi ==
$project_contract->progress_saat_ini
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->progress_opsi; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div> -->

      <!-- Progress_saat_ini End -->







    <!-- Dok_bapp Start -->

    <!-- <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Dok_bapp </label>

      <div class="col-sm-6">

      <input type="file" name="dok_bapp" />

      <input type="hidden" name="old_dok_bapp"

      value="<?php if (isset($dok_bapp) && $dok_bapp != '') {
          echo $dok_bapp;
      } ?>" />

        <?php if (isset($dok_bapp_err) && !empty($dok_bapp_err)) {
            foreach ($dok_bapp_err as $key => $error) {
                echo "<div class=\"error-msg\"></div>";
            }
        } ?>

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

      </div>

        <div class="col-sm-3" >

      </div>

    </div> -->

    <!-- Dok_bapp End -->



    



    <!-- Dok_baut Start -->

    <!-- <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Dok_baut </label>

      <div class="col-sm-6">

      <input type="file" name="dok_baut" />

      <input type="hidden" name="old_dok_baut"

      value="<?php if (isset($dok_baut) && $dok_baut != '') {
          echo $dok_baut;
      } ?>" />

        <?php if (isset($dok_baut_err) && !empty($dok_baut_err)) {
            foreach ($dok_baut_err as $key => $error) {
                echo "<div class=\"error-msg\"></div>";
            }
        } ?>

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

      </div>

        <div class="col-sm-3" >

      </div>

    </div> -->

    <!-- Dok_baut End -->



    



    <!-- Dok_bast Start -->

    <!-- <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Dok_bast </label>

      <div class="col-sm-6">

      <input type="file" name="dok_bast" />

      <input type="hidden" name="old_dok_bast"

      value="<?php if (isset($dok_bast) && $dok_bast != '') {
          echo $dok_bast;
      } ?>" />

        <?php if (isset($dok_bast_err) && !empty($dok_bast_err)) {
            foreach ($dok_bast_err as $key => $error) {
                echo "<div class=\"error-msg\"></div>";
            }
        } ?>

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

      </div>

        <div class="col-sm-3" >

      </div>

    </div> -->

    <!-- Dok_bast End -->



    

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
