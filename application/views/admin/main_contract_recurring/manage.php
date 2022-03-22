<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

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

            <a href="<?php echo base_url(); ?>admin/main_contract_recurring/add" class="btn btn-info">ADD NEW</a>

            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url() .
                'admin/main_contract_recurring/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="nomor_kontrak" <?php echo $searchBy ==
                  'nomor_kontrak'
                      ? 'selected="selected"'
                      : ''; ?>>Nomor_kontrak</option><option value="secondary_nomor_kontrak" <?php echo $searchBy ==
'secondary_nomor_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Secondary_nomor_kontrak</option><option value="kategori_kontrak.ket_kategori_kontrak" <?php echo $searchBy ==
'kategori_kontrak.ket_kategori_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Kategori_kontrak</option><option value="nama_kontrak" <?php echo $searchBy ==
'nama_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Nama_kontrak</option><option value="customer_mitra" <?php echo $searchBy ==
'customer_mitra'
    ? 'selected="selected"'
    : ''; ?>>Customer_mitra</option><option value="wilayah_mitra" <?php echo $searchBy ==
'wilayah_mitra'
    ? 'selected="selected"'
    : ''; ?>>Wilayah_mitra</option><option value="objek_kontrak" <?php echo $searchBy ==
'objek_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Objek_kontrak</option><option value="tanggal_kontrak" <?php echo $searchBy ==
'tanggal_kontrak'
    ? 'selected="selected"'
    : ''; ?>>Tanggal_kontrak</option><option value="masa_awal" <?php echo $searchBy ==
'masa_awal'
    ? 'selected="selected"'
    : ''; ?>>Masa_awal</option><option value="masa_akhir" <?php echo $searchBy ==
'masa_akhir'
    ? 'selected="selected"'
    : ''; ?>>Masa_akhir</option><option value="lama_kontrak_bulan" <?php echo $searchBy ==
'lama_kontrak_bulan'
    ? 'selected="selected"'
    : ''; ?>>Lama_kontrak_bulan</option><option value="luasan_m2" <?php echo $searchBy ==
'luasan_m2'
    ? 'selected="selected"'
    : ''; ?>>Luasan_m2</option><option value="nama_file" <?php echo $searchBy ==
'nama_file'
    ? 'selected="selected"'
    : ''; ?>>Nama_file</option><option value="ket_kontrak_induk" <?php echo $searchBy ==
'ket_kontrak_induk'
    ? 'selected="selected"'
    : ''; ?>>Ket_kontrak_induk</option>

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
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'nomor_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'nomor_kontrak'
    ]; ?>" class="link_css"> Nomor_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'secondary_nomor_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<!-- <th> <a href="<?php echo $fields_links[
        'secondary_nomor_kontrak'
    ]; ?>" class="link_css"> Secondary_nomor_kontrak <?php echo $symbol; ?></a></th> -->

						

				<?php $symbol =
        isset($_GET['sortBy']) &&
        $_GET['sortBy'] == 'kategori_kontrak.ket_kategori_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<!-- <th> <a href="<?php echo $fields_links[
        'kategori_kontrak.ket_kategori_kontrak'
    ]; ?>" class="link_css"> Kategori_kontrak <?php echo $symbol; ?></a></th> -->

   						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'nama_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'nama_kontrak'
    ]; ?>" class="link_css"> Nama_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'customer_mitra'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'customer_mitra'
    ]; ?>" class="link_css"> Customer_mitra <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'wilayah_mitra'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'wilayah_mitra'
    ]; ?>" class="link_css"> Wilayah_mitra <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'objek_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'objek_kontrak'
    ]; ?>" class="link_css"> Objek_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'tanggal_kontrak'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'tanggal_kontrak'
    ]; ?>" class="link_css"> Tanggal_kontrak <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'masa_awal'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'masa_awal'
    ]; ?>" class="link_css"> Masa_awal <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'masa_akhir'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'masa_akhir'
    ]; ?>" class="link_css"> Masa_akhir <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'lama_kontrak_bulan'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'lama_kontrak_bulan'
    ]; ?>" class="link_css"> Lama_kontrak_bulan <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'luasan_m2'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'luasan_m2'
    ]; ?>" class="link_css"> Luasan_m2 <?php echo $symbol; ?></a></th>

						

				<?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'nama_file'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'nama_file'
    ]; ?>" class="link_css"> Nama_file <?php echo $symbol; ?></a></th>

						

				<!-- <?php $symbol =
        isset($_GET['sortBy']) && $_GET['sortBy'] == 'ket_kontrak_induk'
            ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>"
            : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[
        'ket_kontrak_induk'
    ]; ?>" class="link_css"> Ket_kontrak_induk <?php echo $symbol; ?></a></th> -->

					<th>Keadaan Kontrak</th>	

                     <th> Action </th>

                  </tr>

               </thead>

               <tbody>
                  <!-- <?php var_dump($results); ?> -->

                  <?php if (isset($results) and !empty($results)) {
                      $count = 1; ?>

                  <?php foreach ($results as $key => $value) { ?>

                  <tr  id="hide<?php echo $value->id_kontrak; ?>" >

                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id_kontrak; ?>'/></th>



            <th><?php if (!empty($value->id_kontrak)) {
                echo $count;
                $count++;
            } ?></th><th><?php if (!empty($value->nomor_kontrak)) {
    echo $value->nomor_kontrak;
} ?></th>

                <!-- <th><?php if (!empty($value->secondary_nomor_kontrak)) {
                    echo $value->secondary_nomor_kontrak;
                } ?></th> -->

                <!-- <th><?php if (!empty($value->kategori_kontrak)) {
                    echo $value->kategori_kontrak;
                } ?></th> -->

                <th><?php if (!empty($value->nama_kontrak)) {
                    echo $value->nama_kontrak;
                } ?></th>

                <th><?php if (!empty($value->customer_mitra)) {
                    echo $value->customer_mitra;
                } ?></th>

                <th><?php if (!empty($value->wilayah_mitra)) {
                    echo $value->wilayah_mitra;
                } ?></th>

                <th><?php if (!empty($value->objek_kontrak)) {
                    echo $value->objek_kontrak;
                } ?></th>

                <th><?php if (!empty($value->tanggal_kontrak)) {
                    echo $value->tanggal_kontrak;
                } ?></th>

                <th><?php if (!empty($value->masa_awal)) {
                    echo $value->masa_awal;
                } ?></th>

                <th><?php if (!empty($value->masa_akhir)) {
                    echo $value->masa_akhir;
                } ?></th>

                <th><?php if (!empty($value->lama_kontrak_bulan)) {
                    echo $value->lama_kontrak_bulan;
                } ?></th>

                <th><?php if (!empty($value->luasan_m2)) {
                    echo $value->luasan_m2;
                } ?></th>

                <th><?php if (!empty($value->nama_file)) { ?>

                        <!-- <img src="<?php
                        echo $this->config->item('photo_url');
                        echo $value->nama_file;
                        ?>" alt="pic" width="50" height="50" /> -->


                            <a href="<?php
                            echo $this->config->item('photo_url');
                            echo $value->nama_file;
                            ?>" target="_blank">Download</a>

                         <?php } ?>
                        
                       

                        
                        
                        </th>
                         
                         
                <!-- <th><?php if (!empty($value->ket_kontrak_induk)) {
                    echo $value->ket_kontrak_induk;
                } ?></th> -->

                <th>
                <?php $akhir = strtotime($value->masa_akhir); ?>
                <!-- <?php echo $akhir; ?> <br> -->

          


                
                <?php $tgl_sekarang = time(); ?>
            
                <?php $datediff = $akhir - $tgl_sekarang; ?>
                <?php $hari_sisa = round($datediff / (60 * 60 * 24)); ?>

                <?php if ($datediff > 31) { ?>
                    <span class="badge badge-primary">Kontrak Aktif</span>
                    <? } elseif ($datediff <= 1 && $datediff >= 30) { ?>
                    <span class="badge badge-warning">Kontrak akan berakhir</span>
                    <?php } elseif ($datediff < 0) { ?>
                        <span class="badge badge-danger">Kontrak Berakhir</span>
                        <?php } ?>


                    <!-- echo 'Kontrak Aktif, sisa aktifnya sekitar ' .
                        $hari_sisa .
                        ' hari';
                } elseif ($datediff <= 1 && $datediff >= 30) {
                    echo 'Kurang Sebulan, sisa aktifnya sekitar ' .
                        $hari_sisa .
                        ' hari lagi';
                } elseif ($datediff < 0) {
                    echo 'Kontrak berakhir sekitar ' .
                        abs($hari_sisa) .
                        ' hari yang lalu';
                } -->
                     

                
                </th>	

                <th class="action-width">

		   <a href="<?php echo base_url(); ?>admin/main_contract_recurring/view/<?php echo $value->id_kontrak; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url(); ?>admin/main_contract_recurring/edit/<?php echo $value->id_kontrak; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id_kontrak; ?>','main_contract_recurring');">

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

     url:'<?php echo base_url() .
         'admin/main_contract_recurring/deleteAll'; ?>',

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
