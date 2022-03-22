<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
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
            <a href="<?php echo base_url(); ?>admin/contract_pengelolaan/add" class="btn btn-info">ADD NEW</a>
            <div class="form-group pull-right">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>
            </div>
            <form method="GET" action="<?php echo base_url().'admin/contract_pengelolaan/index'; ?>" class="form-inline ibox-content">
               <div class="form-group">
                  <select name="searchBy" class="form-control">
                  <option value="customer" <?php echo $searchBy=="customer"?'selected="selected"':""; ?>>Customer</option><option value="wilayah" <?php echo $searchBy=="wilayah"?'selected="selected"':""; ?>>Wilayah</option><option value="uraian_pekerjaan" <?php echo $searchBy=="uraian_pekerjaan"?'selected="selected"':""; ?>>Uraian_pekerjaan</option><option value="jenis_pengelolaan.pengelolaan" <?php echo $searchBy=="jenis_pengelolaan.pengelolaan"?'selected="selected"':""; ?>>Jenis_pengelolaan</option><option value="nomor_kontrak" <?php echo $searchBy=="nomor_kontrak"?'selected="selected"':""; ?>>Nomor_kontrak</option><option value="tgl_kontrak" <?php echo $searchBy=="tgl_kontrak"?'selected="selected"':""; ?>>Tgl_kontrak</option><option value="masa_awal_kontrak" <?php echo $searchBy=="masa_awal_kontrak"?'selected="selected"':""; ?>>Masa_awal_kontrak</option><option value="masa_akhir_kontrak" <?php echo $searchBy=="masa_akhir_kontrak"?'selected="selected"':""; ?>>Masa_akhir_kontrak</option><option value="durasi_kontrak_bulan" <?php echo $searchBy=="durasi_kontrak_bulan"?'selected="selected"':""; ?>>Durasi_kontrak_bulan</option><option value="luasan_m2" <?php echo $searchBy=="luasan_m2"?'selected="selected"':""; ?>>Luasan_m2</option><option value="hrg_base_rent_m2" <?php echo $searchBy=="hrg_base_rent_m2"?'selected="selected"':""; ?>>Hrg_base_rent_m2</option><option value="hrg_srvc_chrg_m2" <?php echo $searchBy=="hrg_srvc_chrg_m2"?'selected="selected"':""; ?>>Hrg_srvc_chrg_m2</option><option value="alamat_lokasi_kontrak" <?php echo $searchBy=="alamat_lokasi_kontrak"?'selected="selected"':""; ?>>Alamat_lokasi_kontrak</option><option value="hrg_br_per_bulan_rp" <?php echo $searchBy=="hrg_br_per_bulan_rp"?'selected="selected"':""; ?>>Hrg_br_per_bulan_rp</option><option value="hrg_sc_per_bulan_rp" <?php echo $searchBy=="hrg_sc_per_bulan_rp"?'selected="selected"':""; ?>>Hrg_sc_per_bulan_rp</option><option value="hrg_br_per_periodkontrak_rp" <?php echo $searchBy=="hrg_br_per_periodkontrak_rp"?'selected="selected"':""; ?>>Hrg_br_per_periodkontrak_rp</option><option value=" hrg_sc_per_periodkontrakrp" <?php echo $searchBy==" hrg_sc_per_periodkontrakrp"?'selected="selected"':""; ?>> hrg_sc_per_periodkontrakrp</option><option value="satuan_period_kontrak.satuan" <?php echo $searchBy=="satuan_period_kontrak.satuan"?'selected="selected"':""; ?>>Satuan_period_kontrak</option><option value="captive_or_non.keterangan" <?php echo $searchBy=="captive_or_non.keterangan"?'selected="selected"':""; ?>>Captive_or_notcaptive</option><option value="unit_fm_bm.nama_unit" <?php echo $searchBy=="unit_fm_bm.nama_unit"?'selected="selected"':""; ?>>Profit_center</option><option value="status_kontrak.keterangan_status" <?php echo $searchBy=="status_kontrak.keterangan_status"?'selected="selected"':""; ?>>Status_kontrak</option><option value="tax_remark" <?php echo $searchBy=="tax_remark"?'selected="selected"':""; ?>>Tax_remark</option><option value="id_file" <?php echo $searchBy=="id_file"?'selected="selected"':""; ?>>Id_file</option><option value="users.first_name" <?php echo $searchBy=="users.first_name"?'selected="selected"':""; ?>>Updater_by</option><option value="tanggal" <?php echo $searchBy=="tanggal"?'selected="selected"':""; ?>>Tanggal</option>
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

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="customer"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["customer"]; ?>" class="link_css"> Customer <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="wilayah"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["wilayah"]; ?>" class="link_css"> Wilayah <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="uraian_pekerjaan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["uraian_pekerjaan"]; ?>" class="link_css"> Uraian_pekerjaan <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="jenis_pengelolaan.pengelolaan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["jenis_pengelolaan.pengelolaan"]; ?>" class="link_css"> Jenis_pengelolaan <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nomor_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nomor_kontrak"]; ?>" class="link_css"> Nomor_kontrak <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tgl_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tgl_kontrak"]; ?>" class="link_css"> Tgl_kontrak <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="masa_awal_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["masa_awal_kontrak"]; ?>" class="link_css"> Masa_awal_kontrak <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="masa_akhir_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["masa_akhir_kontrak"]; ?>" class="link_css"> Masa_akhir_kontrak <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="durasi_kontrak_bulan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["durasi_kontrak_bulan"]; ?>" class="link_css"> Durasi_kontrak_bulan <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="luasan_m2"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["luasan_m2"]; ?>" class="link_css"> Luasan_m2 <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="hrg_base_rent_m2"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["hrg_base_rent_m2"]; ?>" class="link_css"> Hrg_base_rent_m2 <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="hrg_srvc_chrg_m2"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["hrg_srvc_chrg_m2"]; ?>" class="link_css"> Hrg_srvc_chrg_m2 <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="alamat_lokasi_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["alamat_lokasi_kontrak"]; ?>" class="link_css"> Alamat_lokasi_kontrak <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="hrg_br_per_bulan_rp"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["hrg_br_per_bulan_rp"]; ?>" class="link_css"> Hrg_br_per_bulan_rp <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="hrg_sc_per_bulan_rp"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["hrg_sc_per_bulan_rp"]; ?>" class="link_css"> Hrg_sc_per_bulan_rp <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="hrg_br_per_periodkontrak_rp"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["hrg_br_per_periodkontrak_rp"]; ?>" class="link_css"> Hrg_br_per_periodkontrak_rp <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]==" hrg_sc_per_periodkontrakrp"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links[" hrg_sc_per_periodkontrakrp"]; ?>" class="link_css">  hrg_sc_per_periodkontrakrp <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="satuan_period_kontrak.satuan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["satuan_period_kontrak.satuan"]; ?>" class="link_css"> Satuan_period_kontrak <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="captive_or_non.keterangan"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["captive_or_non.keterangan"]; ?>" class="link_css"> Captive_or_notcaptive <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="unit_fm_bm.nama_unit"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["unit_fm_bm.nama_unit"]; ?>" class="link_css"> Profit_center <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="status_kontrak.keterangan_status"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["status_kontrak.keterangan_status"]; ?>" class="link_css"> Status_kontrak <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tax_remark"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tax_remark"]; ?>" class="link_css"> Tax_remark <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="id_file"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["id_file"]; ?>" class="link_css"> Id_file <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="users.first_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["users.first_name"]; ?>" class="link_css"> Updater_by <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal"]; ?>" class="link_css"> Tanggal <?php echo $symbol ?></a></th>

						
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



            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->customer)){ echo $value->customer; }?></th>

                <th><?php if(!empty($value->wilayah)){ echo $value->wilayah; }?></th>

                <th><?php if(!empty($value->uraian_pekerjaan)){ echo $value->uraian_pekerjaan; }?></th>

                <th><?php if(!empty($value->jenis_pengelolaan)){ echo $value->jenis_pengelolaan; }?></th>

                <th><?php if(!empty($value->nomor_kontrak)){ echo $value->nomor_kontrak; }?></th>

                <th><?php if(!empty($value->tgl_kontrak)){ echo $value->tgl_kontrak; }?></th>

                <th><?php if(!empty($value->masa_awal_kontrak)){ echo $value->masa_awal_kontrak; }?></th>

                <th><?php if(!empty($value->masa_akhir_kontrak)){ echo $value->masa_akhir_kontrak; }?></th>

                <th><?php if(!empty($value->durasi_kontrak_bulan)){ echo $value->durasi_kontrak_bulan; }?></th>

                <th><?php if(!empty($value->luasan_m2)){ echo $value->luasan_m2; }?></th>

                <th><?php if(!empty($value->hrg_base_rent_m2)){ echo $value->hrg_base_rent_m2; }?></th>

                <th><?php if(!empty($value->hrg_srvc_chrg_m2)){ echo $value->hrg_srvc_chrg_m2; }?></th>

                <th><?php if(!empty($value->alamat_lokasi_kontrak)){ echo $value->alamat_lokasi_kontrak; }?></th>

                <th><?php if(!empty($value->hrg_br_per_bulan_rp)){ echo $value->hrg_br_per_bulan_rp; }?></th>

                <th><?php if(!empty($value->hrg_sc_per_bulan_rp)){ echo $value->hrg_sc_per_bulan_rp; }?></th>

                <th><?php if(!empty($value->hrg_br_per_periodkontrak_rp)){ echo $value->hrg_br_per_periodkontrak_rp; }?></th>

                <th><?php if(!empty($value-> hrg_sc_per_periodkontrakrp)){ echo $value-> hrg_sc_per_periodkontrakrp; }?></th>

                <th><?php if(!empty($value->satuan_period_kontrak)){ echo $value->satuan_period_kontrak; }?></th>

                <th><?php if(!empty($value->captive_or_notcaptive)){ echo $value->captive_or_notcaptive; }?></th>

                <th><?php if(!empty($value->profit_center)){ echo $value->profit_center; }?></th>

                <th><?php if(!empty($value->status_kontrak)){ echo $value->status_kontrak; }?></th>

                <th><?php if(!empty($value->tax_remark)){ echo $value->tax_remark; }?></th>

                <th><?php if(!empty($value->id_file)){ ?>

                        <img src="<?php echo $this->config->item('photo_url');?><?php echo $value->id_file; ?>" alt="pic" width="50" height="50" />

                         <?php }?></th><th><?php if(!empty($value->updater_by)){ echo $value->updater_by; }?></th>

                <th><?php if(!empty($value->tanggal)){ echo $value->tanggal; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/contract_pengelolaan/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/contract_pengelolaan/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','contract_pengelolaan');">

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
     url:'<?php echo base_url()."admin/contract_pengelolaan/deleteAll"; ?>',
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