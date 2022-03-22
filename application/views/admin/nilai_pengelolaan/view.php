<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Nilai_pengelolaan</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Nilai_pengelolaan</strong>
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

	      if(isset($main_contract_recurring) && !empty($main_contract_recurring)):



	      foreach($main_contract_recurring as $key => $value):

	       if($value->id_kontrak==$nilai_pengelolaan->id_kontrak)

	             echo $value->nomor_kontrak;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Id_kontrak End -->



	



    <!-- Portofolio Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Portofolio </label>

	 </td>

	 <td>

	   <?php

	      if(isset($portofolio) && !empty($portofolio)):



	      foreach($portofolio as $key => $value):

	       if($value->kode_portofolio==$nilai_pengelolaan->portofolio)

	             echo $value->jenis_portofolio;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Portofolio End -->



	

	<tr>

	 <td>

	   <label for="nilai_bulan" class="col-sm-3 control-label"> Nilai_bulan </label>

	 </td>

	 <td>

	   <?php echo set_value("nilai_bulan",html_entity_decode($nilai_pengelolaan->nilai_bulan)); ?>

	 </td>

	</tr>

	



    <!-- Fm Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Fm </label>

	 </td>

	 <td>

	   <?php

	      if(isset($unit_fm_bm) && !empty($unit_fm_bm)):



	      foreach($unit_fm_bm as $key => $value):

	       if($value->nama_unit==$nilai_pengelolaan->fm)

	             echo $value->nama_unit;



	       endforeach;

	       endif; ?>

	 </td>

	</tr>

    <!-- Fm End -->



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