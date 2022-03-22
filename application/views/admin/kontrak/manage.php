<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
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
   <div class="col-lg-2">
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="ibox ">
         <br>
         <div class="ibox-title">
            <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
               <button type="button" class="close" data-close="alert"></button>
               <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>
            <a href="<?php echo base_url(); ?>admin/kontrak/add" class="btn btn-info">ADD NEW</a>
            <div class="form-group pull-right">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>
            </div>
            <form method="GET" action="<?php echo base_url().'admin/kontrak/index'; ?>" class="form-inline ibox-content">
               <div class="form-group">
                  <select name="searchBy" class="form-control">
                  <option value="nama_pengadaan" <?php echo $searchBy=="nama_pengadaan"?'selected="selected"':""; ?>>Nama_pengadaan</option><option value="vendor" <?php echo $searchBy=="vendor"?'selected="selected"':""; ?>>Vendor</option><option value="nilai_kontrak_customer" <?php echo $searchBy=="nilai_kontrak_customer"?'selected="selected"':""; ?>>Nilai_kontrak_customer</option><option value="nilai_juskeb" <?php echo $searchBy=="nilai_juskeb"?'selected="selected"':""; ?>>Nilai_juskeb</option><option value="nilai_kontrak_mitra" <?php echo $searchBy=="nilai_kontrak_mitra"?'selected="selected"':""; ?>>Nilai_kontrak_mitra</option><option value="tanggal_kontrak_pengadaan" <?php echo $searchBy=="tanggal_kontrak_pengadaan"?'selected="selected"':""; ?>>Tanggal_kontrak_pengadaan</option><option value="tanggal_kontrak_berakhir" <?php echo $searchBy=="tanggal_kontrak_berakhir"?'selected="selected"':""; ?>>Tanggal_kontrak_berakhir</option><option value="tanggal_bast" <?php echo $searchBy=="tanggal_bast"?'selected="selected"':""; ?>>Tanggal_bast</option><option value="tanggal_invoice" <?php echo $searchBy=="tanggal_invoice"?'selected="selected"':""; ?>>Tanggal_invoice</option><option value="tanggal_payment" <?php echo $searchBy=="tanggal_payment"?'selected="selected"':""; ?>>Tanggal_payment</option><option value="opex_capex.keterangan" <?php echo $searchBy=="opex_capex.keterangan"?'selected="selected"':""; ?>>Opex_capex</option><option value="lokasi" <?php echo $searchBy=="lokasi"?'selected="selected"':""; ?>>Lokasi</option><option value="portofolio.jenis_portofolio" <?php echo $searchBy=="portofolio.jenis_portofolio"?'selected="selected"':""; ?>>Portofolio</option><option value="metode_pengadaan.keterangan_pengadaan" <?php echo $searchBy=="metode_pengadaan.keterangan_pengadaan"?'selected="selected"':""; ?>>Metode_pengadaan</option><option value="tanggal_penerimaan_juskeb" <?php echo $searchBy=="tanggal_penerimaan_juskeb"?'selected="selected"':""; ?>>Tanggal_penerimaan_juskeb</option><option value="tanggal_pr" <?php echo $searchBy=="tanggal_pr"?'selected="selected"':""; ?>>Tanggal_pr</option><option value="tanggal_po" <?php echo $searchBy=="tanggal_po"?'selected="selected"':""; ?>>Tanggal_po</option><option value="tanggal_insert" <?php echo $searchBy=="tanggal_insert"?'selected="selected"':""; ?>>Tanggal_insert</option><option value="users.username" <?php echo $searchBy=="users.username"?'selected="selected"':""; ?>>Username</option>
                  </select>
               </div>
               <div class="form-group">
                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">
               </div>
               <input type="submit" name="search" value="Search" class="btn btn-info">
               <div class="form-group pull-right">
                  <select name="per_page" class="form-control" onchange="this.form.submit()">
                     <option value="5" <?php echo $per_page=="5"?'selected="selected"':""; ?>>5</option>
                     <option value="10" <?php echo $per_page=="10"?'selected="selected"':""; ?>>10</option>
                     <option value="20" <?php echo $per_page=="20"?'selected="selected"':""; ?>>20</option>
                     <option value="50" <?php echo $per_page=="50"?'selected="selected"':""; ?>>50</option>
                     <option value="100" <?php echo $per_page=="100"?'selected="selected"':""; ?>>100</option>
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
                     <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nama_pengadaan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nama_pengadaan"]; ?>" class="link_css"> Nama_pengadaan <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="vendor"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["vendor"]; ?>" class="link_css"> Vendor <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nilai_kontrak_customer"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nilai_kontrak_customer"]; ?>" class="link_css"> Nilai_kontrak_customer <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nilai_juskeb"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nilai_juskeb"]; ?>" class="link_css"> Nilai_juskeb <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nilai_kontrak_mitra"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nilai_kontrak_mitra"]; ?>" class="link_css"> Nilai_kontrak_mitra <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_kontrak_pengadaan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_kontrak_pengadaan"]; ?>" class="link_css"> Tanggal_kontrak_pengadaan <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_kontrak_berakhir"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_kontrak_berakhir"]; ?>" class="link_css"> Tanggal_kontrak_berakhir <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_bast"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_bast"]; ?>" class="link_css"> Tanggal_bast <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_invoice"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_invoice"]; ?>" class="link_css"> Tanggal_invoice <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_payment"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_payment"]; ?>" class="link_css"> Tanggal_payment <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="opex_capex.keterangan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["opex_capex.keterangan"]; ?>" class="link_css"> Opex_capex <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="lokasi"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["lokasi"]; ?>" class="link_css"> Lokasi <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="portofolio.jenis_portofolio"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["portofolio.jenis_portofolio"]; ?>" class="link_css"> Portofolio <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="metode_pengadaan.keterangan_pengadaan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["metode_pengadaan.keterangan_pengadaan"]; ?>" class="link_css"> Metode_pengadaan <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_penerimaan_juskeb"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_penerimaan_juskeb"]; ?>" class="link_css"> Tanggal_penerimaan_juskeb <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_pr"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_pr"]; ?>" class="link_css"> Tanggal_pr <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_po"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_po"]; ?>" class="link_css"> Tanggal_po <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_insert"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_insert"]; ?>" class="link_css"> Tanggal_insert <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="users.username"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["users.username"]; ?>" class="link_css"> Username <?php echo $symbol ?></a></th>

   						
                     <th> Action </th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(isset($results) and !empty($results))
                     {
                     
                       $count=1;
                     
                       ?>
                  <?php 
                     foreach ($results as $key => $value) {
                     
                      ?>
                  <tr  id="hide<?php echo $value->id; ?>" >
                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>

                              

            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->nama_pengadaan)){ echo $value->nama_pengadaan; }?></th>

                <th><?php if(!empty($value->vendor)){ echo $value->vendor; }?></th>

                <th><?php if(!empty($value->nilai_kontrak_customer)){ echo $value->nilai_kontrak_customer; }?></th>

                <th><?php if(!empty($value->nilai_juskeb)){ echo $value->nilai_juskeb; }?></th>

                <th><?php if(!empty($value->nilai_kontrak_mitra)){ echo $value->nilai_kontrak_mitra; }?></th>

                <th><?php if(!empty($value->tanggal_kontrak_pengadaan)){ echo $value->tanggal_kontrak_pengadaan; }?></th>

                <th><?php if(!empty($value->tanggal_kontrak_berakhir)){ echo $value->tanggal_kontrak_berakhir; }?></th>

                <th><?php if(!empty($value->tanggal_bast)){ echo $value->tanggal_bast; }?></th>

                <th><?php if(!empty($value->tanggal_invoice)){ echo $value->tanggal_invoice; }?></th>

                <th><?php if(!empty($value->tanggal_payment)){ echo $value->tanggal_payment; }?></th>

                <th><?php if(!empty($value->opex_capex)){ echo $value->opex_capex; }?></th>

                <th><?php if(!empty($value->lokasi)){ echo $value->lokasi; }?></th>

                <th><?php if(!empty($value->portofolio)){ echo $value->portofolio; }?></th>

                <th><?php if(!empty($value->metode_pengadaan)){ echo $value->metode_pengadaan; }?></th>

                <th><?php if(!empty($value->tanggal_penerimaan_juskeb)){ echo $value->tanggal_penerimaan_juskeb; }?></th>

                <th><?php if(!empty($value->tanggal_pr)){ echo $value->tanggal_pr; }?></th>

                <th><?php if(!empty($value->tanggal_po)){ echo $value->tanggal_po; }?></th>

                <th><?php if(!empty($value->tanggal_insert)){ echo $value->tanggal_insert; }?></th>

                <th><?php if(!empty($value->username)){ echo $value->username; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/kontrak/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/kontrak/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','kontrak');">

           <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

           </a>

            </th>
                  </tr>
                  <?php 
                     }
                     
                     
                     } else{
                     echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                     } ?>  
               </tbody>
            </table>
            </div>
            <?php echo $links; ?>
         </div>
      </div>
      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url')?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>
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
     url:'<?php echo base_url()."admin/kontrak/deleteAll"; ?>',
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