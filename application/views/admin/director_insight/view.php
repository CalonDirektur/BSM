<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Director_insight</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url() . 'admin/'; ?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Director_insight</strong>

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



    <!-- Pesan Start -->

	<tr>

	 <td>

	  <label for="pesan" class="col-sm-3 control-label"> Pesan </label>

	 </td>

	 <td>
       <?php $text = stripslashes($director_insight->pesan); ?>
      <?php echo htmlspecialchars_decode($text); ?>               
	   <!-- <?php echo set_value(
        'pesan',
        htmlspecialchars_decode(stripslashes($director_insight->pesan))
    ); ?> -->

	 </td>

	</tr>

    <!-- Pesan End -->



	



    <!-- Director Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Director </label>

	 </td>

	 <td>

	   <?php if (isset($director_list) && !empty($director_list)):
        foreach ($director_list as $key => $value):
            if ($value->id == $director_insight->director) {
                echo $value->jabatan;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>

    <!-- Director End -->


    <!-- kategori 1 -->
    <tr>

	 <td>

	  <label class="control-label col-md-3"> Kat. 1 </label>

	 </td>

	 <td>

	   <?php if (
        isset($director_insight_category) &&
        !empty($director_insight_category)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->id == $director_insight->kategori_1) {
                echo $value->kategori_name;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>


    <!-- kategori 2 -->
    <tr>

	 <td>

	  <label class="control-label col-md-3"> Kat. 2 </label>

	 </td>

	 <td>

	   <?php if (
        isset($director_insight_category) &&
        !empty($director_insight_category)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->id == $director_insight->kategori_2) {
                echo $value->kategori_name;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>


    <!-- kategori 3 -->
    <tr>

	 <td>

	  <label class="control-label col-md-3"> Kat. 3 </label>

	 </td>

	 <td>

	   <?php if (
        isset($director_insight_category) &&
        !empty($director_insight_category)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->id == $director_insight->kategori_3) {
                echo $value->kategori_name;
            }
        endforeach;
    endif; ?>

	 </td>

	</tr>


	



    <!-- Date Start -->

	<tr>

	 <td>

	  <label for="date" class="col-sm-3 control-label"> Date </label>

	 </td>

	 <td>

	   <?php echo set_value('date', html_entity_decode($director_insight->date)); ?>

	 </td>

	</tr>

    <!-- Date End -->



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
