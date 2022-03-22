<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
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



    <!-- Id_kontrak Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Id_kontrak </label>

	 </td>

	 <td>

	   <?php

	      if(isset($project_contract) && !empty($project_contract)):



	      foreach($project_contract as $key => $value):

	       if($value->id==$project_persentase_now->id_kontrak)

	             echo $value->nomor_kontrak;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Id_kontrak End -->



	

	<tr>

	 <td>

	   <label for="persentase_progress" class="col-sm-3 control-label"> Persentase_progress </label>

	 </td>

	 <td>

	   <?php echo set_value("persentase_progress",html_entity_decode($project_persentase_now->persentase_progress)); ?>

	 </td>

	</tr>

	



    <!-- Tanggal_update Start -->

	<tr>

	 <td>

	  <label for="tanggal_update" class="col-sm-3 control-label"> Tanggal_update </label>

	 </td>

	 <td>

	   <?php echo set_value("tanggal_update", html_entity_decode($project_persentase_now->tanggal_update)); ?>

	 </td>

	</tr>

    <!-- Tanggal_update End -->



	



    <!-- Remark Start -->

	<tr>

	 <td>

	  <label for="remark" class="col-sm-3 control-label"> Remark </label>

	 </td>

	 <td>

	   <?php echo set_value("remark",  html_entity_decode($project_persentase_now->remark)); ?>

	 </td>

	</tr>

    <!-- Remark End -->



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