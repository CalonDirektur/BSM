<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Document_tender</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url() . 'admin/'; ?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Document_tender</strong>

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

                     <?php if ($this->session->flashdata('message')): ?>

                     <div class="alert alert-success">

                        <button type="button" class="close" data-close="alert"></button>

                        <?php echo $this->session->flashdata('message'); ?>

                     </div>

                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>

	<tr>

	 <td>

	   <label for="nama_document" class="col-sm-3 control-label"> Nama_document </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'nama_document',
        html_entity_decode($document_tender->nama_document)
    ); ?>

	 </td>

	</tr>

	



    <!-- Link_document Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> Link_document </label>

	 </td>

	 <td>
       <h4>View File :  </h4>
<object data="<?php
echo $this->config->item('photo_url');
echo $document_tender->link_document;
?>" width="600" height="400"></object>

	 <?php if (
      isset($document_tender->link_document) &&
      $document_tender->link_document != ''
  ) { ?>

	            
               <a href="<?php
               echo $this->config->item('photo_url');
               echo $document_tender->link_document;
               ?>" target="_blank">Download file</a>

	    <!-- <img src="<?php
     echo $this->config->item('photo_url');
     echo $document_tender->link_document;
     ?>" alt="pic" width="50" height="50" /> -->

	    <?php } ?>

	 </td>

	</tr>

    <!-- Link_document End -->



	



    <!-- Tanggal_document Start -->

	<tr>

	 <td>

	  <label for="tanggal_document" class="col-sm-3 control-label"> Tanggal_document </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tanggal_document',
        html_entity_decode($document_tender->tanggal_document)
    ); ?>

	 </td>

	</tr>

    <!-- Tanggal_document End -->



	



    <!-- Expire_date_doc Start -->

	<tr>

	 <td>

	  <label for="expire_date_doc" class="col-sm-3 control-label"> Expire_date_doc </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'expire_date_doc',
        html_entity_decode($document_tender->expire_date_doc)
    ); ?>

	 </td>

	</tr>

    <!-- Expire_date_doc End -->



	



    <!-- Keterangan Start -->

	<tr>

	 <td>

	  <label for="keterangan" class="col-sm-3 control-label"> Keterangan </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'keterangan',
        html_entity_decode($document_tender->keterangan)
    ); ?>

	 </td>

	</tr>

    <!-- Keterangan End -->



	



    <!-- Tanggal_update Start -->

	<tr>

	 <td>

	  <label for="tanggal_update" class="col-sm-3 control-label"> Tanggal_update </label>

	 </td>

	 <td>

	   <?php echo set_value(
        'tanggal_update',
        html_entity_decode($document_tender->tanggal_update)
    ); ?>

	 </td>

	</tr>

    <!-- Tanggal_update End -->



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
