<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

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

   <div class="col-lg-2">

   </div>

</div>

<div class="row">

   <div class="col-lg-12">

      <div class="ibox ">

         <br>

         <div class="ibox-title">

            <?php if ($this->session->flashdata('message')): ?>

            <div class="alert alert-success">

               <button type="button" class="close" data-close="alert"></button>

               <?php echo $this->session->flashdata('message'); ?>

            </div>

            <?php endif; ?>

            <a href="<?php echo base_url(); ?>admin/project_contract/add" class="btn btn-info">ADD NEW</a>

            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url() .
                'admin/project_contract/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="project_segmen.segment_customer" <?php echo $searchBy ==
                  'project_segmen.segment_customer'
                      ? 'selected="selected"'
                      : ''; ?>>Segmen</option><option value="uraian_pekerjaan" <?php echo $searchBy ==
'uraian_pekerjaan'
    ? 'selected="selected"'
    : ''; ?>>Uraian_pekerjaan</option><option value="lokasi" <?php echo $searchBy ==
'lokasi'
    ? 'selected="selected"'
    : ''; ?>>Lokasi</option><option value="customer" <?php echo $searchBy ==
'customer'
    ? 'selected="selected"'
    : ''; ?>>Customer</option><option value="unit_fm_bm.nama_unit" <?php echo $searchBy ==
'unit_fm_bm.nama_unit'
    ? 'selected="selected"'
    : ''; ?>>Fm</option><option value="owner_group" <?php echo $searchBy ==
'owner_group'
    ? 'selected="selected"'
    : ''; ?>>Owner_group</option><option value="detil_projek" <?php echo $searchBy ==
'detil_projek'
    ? 'selected="selected"'
    : ''; ?>>Detil_projek</option><option value="project_kontrak_handle.handling" <?php echo $searchBy ==
'project_kontrak_handle.handling'
    ? 'selected="selected"'
    : ''; ?>>Kontrak_handle</option><option value="nomor_kontrak" <?php echo $searchBy ==
'nomor_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Nomor_kontrak</option><option value="nilai_kontrak" <?php echo $searchBy ==
'nilai_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Nilai_kontrak</option><option value="jangka_waktu_hari" <?php echo $searchBy ==
'jangka_waktu_hari'
    ? 'selected="selected"'
    : ''; ?>>Jangka_waktu_hari</option><option value="tanggal_mulai_kontrak" <?php echo $searchBy ==
'tanggal_mulai_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Tanggal_mulai_kontrak</option><option value="tanggal_akhir_kontrak" <?php echo $searchBy ==
'tanggal_akhir_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Tanggal_akhir_kontrak</option><option value="tahun_projek" <?php echo $searchBy ==
'tahun_projek'
    ? 'selected="selected"'
    : ''; ?>>Tahun_projek</option><option value="project_progress_saat_ini.progress_opsi" <?php echo $searchBy ==
'project_progress_saat_ini.progress_opsi'
    ? 'selected="selected"'
    : ''; ?>>Progress_saat_ini</option><option value="dok_bapp" <?php echo $searchBy ==
'dok_bapp'
    ? 'selected="selected"'
    : ''; ?>>Dok_bapp</option><option value="dok_baut" <?php echo $searchBy ==
'dok_baut'
    ? 'selected="selected"'
    : ''; ?>>Dok_baut</option><option value="dok_bast" <?php echo $searchBy ==
'dok_bast'
    ? 'selected="selected"'
    : ''; ?>>Dok_bast</option>

                  </select>

               </div>

               <div class="form-group">

                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">

               </div>

               <input type="submit" name="search" value="Search" class="btn btn-info">

               <div class="form-group pull-right">

                  <select name="per_page" class="form-control" onchange="this.form.submit()">

                     <option value="5" <?php echo $per_page == '5'
                         ? 'selected="selected"'
                         : ''; ?>>5</option>

                     <option value="10" <?php echo $per_page == '10'
                         ? 'selected="selected"'
                         : ''; ?>>10</option>

                     <option value="20" <?php echo $per_page == '20'
                         ? 'selected="selected"'
                         : ''; ?>>20</option>

                     <option value="50" <?php echo $per_page == '50'
                         ? 'selected="selected"'
                         : ''; ?>>50</option>

                     <option value="100" <?php echo $per_page == '100'
                         ? 'selected="selected"'
                         : ''; ?>>100</option>

                  </select>

               </div>

            </form>

         </div>

         <div class="ibox-content">

         <div class="table table-responsive">

            <table class="table table-striped table-bordered table-hover Tax" >

               <thead>

                  <tr>

                     <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>

                     <th> Sr No. </th>

                     <?php $sortSym =
                         isset($_GET['order']) && $_GET['order'] == 'asc'
                             ? 'up'
                             : 'down'; ?>

				<?php $symbol =
        isset($_GET['sortBy']) &&
        $_GET['sortBy'] == 'project_segmen.segment_customer'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links[
        'project_segmen.segment_customer'
    ]; ?>" class="link_css"> Segmen <?php echo $symbol; ?></a></th>

   						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'uraian_pekerjaan'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'uraian_pekerjaan'
    ]; ?>" class="link_css"> Uraian_pekerjaan <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'lokasi'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'lokasi'
    ]; ?>" class="link_css"> Lokasi <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'customer'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'customer'
    ]; ?>" class="link_css"> Customer <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'unit_fm_bm.nama_unit'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links[
        'unit_fm_bm.nama_unit'
    ]; ?>" class="link_css"> Fm <?php echo $symbol; ?></a></th>

   						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'owner_group'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'owner_group'
    ]; ?>" class="link_css"> Owner_group <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'detil_projek'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'detil_projek'
    ]; ?>" class="link_css"> Detil_projek <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) &&
        $_GET['sortBy'] == 'project_kontrak_handle.handling'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links[
        'project_kontrak_handle.handling'
    ]; ?>" class="link_css"> Kontrak_handle <?php echo $symbol; ?></a></th>

   						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'nomor_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'nomor_kontrak'
    ]; ?>" class="link_css"> Nomor_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'nilai_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'nilai_kontrak'
    ]; ?>" class="link_css"> Nilai_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'jangka_waktu_hari'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'jangka_waktu_hari'
    ]; ?>" class="link_css"> Jangka_waktu_hari <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'tanggal_mulai_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'tanggal_mulai_kontrak'
    ]; ?>" class="link_css"> Tanggal_mulai_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'tanggal_akhir_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'tanggal_akhir_kontrak'
    ]; ?>" class="link_css"> Tanggal_akhir_kontrak <?php echo $symbol; ?></a></th>

						

				<!-- <?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'tahun_projek'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'tahun_projek'
    ]; ?>" class="link_css"> Tahun_projek <?php echo $symbol; ?></a></th> -->

						

				<?php $symbol =
        isset($_GET['sortBy']) &&
        $_GET['sortBy'] == 'project_progress_saat_ini.progress_opsi'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links[
        'project_progress_saat_ini.progress_opsi'
    ]; ?>" class="link_css"> Persentase_Progress <?php echo $symbol; ?></a></th>

   						

				<!-- <?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'dok_bapp'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'dok_bapp'
    ]; ?>" class="link_css"> Dok_bapp <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'dok_baut'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'dok_baut'
    ]; ?>" class="link_css"> Dok_baut <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'dok_bast'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'dok_bast'
    ]; ?>" class="link_css"> Dok_bast <?php echo $symbol; ?></a></th> -->

						

                     <th> Action </th>

                  </tr>

               </thead>

               <tbody>

                  <?php if (isset($results) and !empty($results)) {
                      $count = 1; ?>

                  <?php foreach ($results as $key => $value) { ?>

                  <tr  id="hide<?php echo $value->id; ?>" >

                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>



            <th><?php if (!empty($value->id)) {
                echo $count;
                $count++;
            } ?></th><th><?php if (!empty($value->segmen)) {
    echo $value->segmen;
} ?></th>

                <th><?php if (!empty($value->uraian_pekerjaan)) {
                    echo $value->uraian_pekerjaan;
                } ?></th>

                <th><?php if (!empty($value->lokasi)) {
                    echo $value->lokasi;
                } ?></th>

                <th><?php if (!empty($value->customer)) {
                    echo $value->customer;
                } ?></th>

                <th><?php if (!empty($value->fm)) {
                    echo $value->fm;
                } ?></th>

                <th><?php if (!empty($value->owner_group)) {
                    echo $value->owner_group;
                } ?></th>

                <th><?php if (!empty($value->detil_projek)) {
                    echo $value->detil_projek;
                } ?></th>

                <th><?php if (!empty($value->kontrak_handle)) {
                    echo $value->kontrak_handle;
                } ?></th>

                <th><?php if (!empty($value->nomor_kontrak)) {
                    echo $value->nomor_kontrak;
                } ?></th>

                <th><?php if (!empty($value->nilai_kontrak)) {
                    echo $value->nilai_kontrak;
                } ?></th>

                <th><?php if (!empty($value->jangka_waktu_hari)) {
                    echo $value->jangka_waktu_hari;
                } ?></th>

                <th><?php if (!empty($value->tanggal_mulai_kontrak)) {
                    echo $value->tanggal_mulai_kontrak;
                } ?></th>

                <th><?php if (!empty($value->tanggal_akhir_kontrak)) {
                    echo $value->tanggal_akhir_kontrak;
                } ?></th>

                <!-- <th><?php if (!empty($value->tahun_projek)) {
                    echo $value->tahun_projek;
                } ?></th> -->

                <th><?php if (!empty($value->persentase_progress)) {
                    echo $value->persentase_progress;
                } ?></th>

                <!-- <th><?php if (!empty($value->dok_bapp)) { ?>

                        <img src="<?php
                        echo $this->config->item('photo_url');
                        echo $value->dok_bapp;
                        ?>" alt="pic" width="50" height="50" />

                         <?php } ?></th><th><?php if (
    !empty($value->dok_baut)
) { ?>

                        <img src="<?php
                        echo $this->config->item('photo_url');
                        echo $value->dok_baut;
                        ?>" alt="pic" width="50" height="50" />

                         <?php } ?></th><th><?php if (
    !empty($value->dok_bast)
) { ?>

                        <img src="<?php
                        echo $this->config->item('photo_url');
                        echo $value->dok_bast;
                        ?>" alt="pic" width="50" height="50" />

                         <?php } ?></th> -->
                         
                         
                         
                         
                         <th class="action-width">

		   <a href="<?php echo base_url(); ?>admin/project_contract/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url(); ?>admin/project_contract/add_progress/<?php echo $value->id; ?>" title="Add Progress">

            <span class="btn btn-info " ><i class="fa fa-plus"></i></span>

           </a>


           <a href="<?php echo base_url(); ?>admin/project_contract/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','project_contract');">

           <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

           </a>

            </th>

                  </tr>

                  <?php }
                  } else {
                      echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                  } ?>  

               </tbody>

            </table>

            </div>

            <?php echo $links; ?>

         </div>

      </div>

      <img onclick="callme('','item','')" src="<?php echo $this->config->item(
          'accet_url'
      ); ?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>

   </div>

</div>

<script type="text/javascript">

   function delRow()

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   ids = values();

   $.ajax({

     type:"POST",

     url:'<?php echo base_url() . 'admin/project_contract/deleteAll'; ?>',

     data:{

       allIds : ids,

       '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'

     },

     success:function(){

       location.reload();

       },

     });

   }

   }

</script>

<?php $this->load->view('footer'); ?>
