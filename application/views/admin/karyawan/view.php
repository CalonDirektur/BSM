<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Karyawan</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Karyawan</strong>
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

	<tr>

	 <td>

	   <label for="nama" class="col-sm-3 control-label"> Nama </label>

	 </td>

	 <td> 

	   <?php echo set_value("nama",html_entity_decode($karyawan->nama)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="nik" class="col-sm-3 control-label"> Nik </label>

	 </td>

	 <td> 

	   <?php echo set_value("nik",html_entity_decode($karyawan->nik)); ?>

	 </td>

	</tr>

	



    <!-- Status Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Status </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($status_karyawan) && !empty($status_karyawan)):



	      foreach($status_karyawan as $key => $value): 

	       if($value->id==$karyawan->status)

	             echo $value->status_kary;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Status End -->



	

	<tr>

	 <td>

	   <label for="unit" class="col-sm-3 control-label"> Unit </label>

	 </td>

	 <td> 

	   <?php echo set_value("unit",html_entity_decode($karyawan->unit)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="sub_unit" class="col-sm-3 control-label"> Sub_unit </label>

	 </td>

	 <td> 

	   <?php echo set_value("sub_unit",html_entity_decode($karyawan->sub_unit)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="jabatan" class="col-sm-3 control-label"> Jabatan </label>

	 </td>

	 <td> 

	   <?php echo set_value("jabatan",html_entity_decode($karyawan->jabatan)); ?>

	 </td>

	</tr>

	



    <!-- Entry_by Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Entry_by </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):



	      foreach($users as $key => $value): 

	       if($value->username==$karyawan->entry_by)

	             echo $value->username;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Entry_by End -->



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