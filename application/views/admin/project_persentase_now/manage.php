<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Project_persentase_now</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Project_persentase_now</strong>
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
            <a href="<?php echo base_url(); ?>admin/project_persentase_now/add" class="btn btn-info">ADD NEW</a>
            <div class="form-group pull-right">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>
            </div>
            <form method="GET" action="<?php echo base_url().'admin/project_persentase_now/index'; ?>" class="form-inline ibox-content">
               <div class="form-group">
                  <select name="searchBy" class="form-control">
                  <option value="project_contract.nomor_kontrak" <?php echo $searchBy=="project_contract.nomor_kontrak"?'selected="selected"':""; ?>>Id_kontrak</option><option value="persentase_progress" <?php echo $searchBy=="persentase_progress"?'selected="selected"':""; ?>>Persentase_progress</option><option value="tanggal_update" <?php echo $searchBy=="tanggal_update"?'selected="selected"':""; ?>>Tanggal_update</option><option value="remark" <?php echo $searchBy=="remark"?'selected="selected"':""; ?>>Remark</option>
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

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="project_contract.nomor_kontrak"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["project_contract.nomor_kontrak"]; ?>" class="link_css"> Id_kontrak <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="persentase_progress"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["persentase_progress"]; ?>" class="link_css"> Persentase_progress <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="tanggal_update"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["tanggal_update"]; ?>" class="link_css"> Tanggal_update <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="remark"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["remark"]; ?>" class="link_css"> Remark <?php echo $symbol ?></a></th>

						
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



            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->id_kontrak)){ echo $value->id_kontrak; }?></th>

                <th><?php if(!empty($value->persentase_progress)){ echo $value->persentase_progress; }?></th>

                <th><?php if(!empty($value->tanggal_update)){ echo $value->tanggal_update; }?></th>

                <th><?php if(!empty($value->remark)){ echo $value->remark; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/project_persentase_now/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/project_persentase_now/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','project_persentase_now');">

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
     url:'<?php echo base_url()."admin/project_persentase_now/deleteAll"; ?>',
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