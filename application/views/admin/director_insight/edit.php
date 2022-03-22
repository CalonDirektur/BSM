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

  <div class="wrapper wrapper-content animated fadeInRight">

    <div class="ibox ">

      <div class="ibox-title" >

        <h5> Edit <small></small></h5>

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

          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="box-body">

              <?php if ($this->session->flashdata('message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 

              

<!-- Pesan Start -->





<!-- <div class="form-group">

  <label for="pesan" class="col-sm-3 control-label"> Pesan </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="pesan" name="pesan"><?php echo set_value(
        'pesan',
        html_entity_decode($director_insight->pesan)
    ); ?></textarea>

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'pesan',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div> -->



<div class="form-group">

	  <label for="pesan" class="col-sm-3 control-label"> Pesan </label>

	  <div class="col-sm-4 ">
    
      <input type="hidden" name="pesan" value="  <?php $text = stripslashes(
          $director_insight->pesan
      ); ?>
      <?php echo htmlspecialchars_decode($text); ?>   ">
      <div id="editor" style="min-height: 60px;">  <?php $text = stripslashes(
          $director_insight->pesan
      ); ?>
      <?php echo htmlspecialchars_decode($text); ?>   </div>
	  </div>

    

	  <div class="col-sm-5" >



	    <?php echo form_error(
         'pesan',
         "<span class='label label-danger'>",
         '</span>'
     ); ?>

	  </div>

	</div>


<!-- Pesan End -->





	<!-- Director Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Director </label>

          <div class="col-md-4">

              <select class="form-control select2" name="director" id="director">

              <option value="">Select Director</option>

      <?php if (isset($director_list) && !empty($director_list)):
          foreach ($director_list as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id ==
$director_insight->director
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->jabatan; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

      <!-- Director End -->




<!-- Kategori 1 -->
<div class="form-group">

        <label class="control-label col-md-3"> Kat. 1 </label>

          <div class="col-md-4">

              <select class="form-control select2" name="kategori_1" id="kategori_1">

              <option value="">Select Kategori 1</option>

      <?php if (
          isset($director_insight_category) &&
          !empty($director_insight_category)
      ):
          foreach ($director_insight_category as $key => $value): ?>

          <option value="<?php echo $value->kategori_name; ?>" <?php echo $value->kategori_name ==
$director_insight->kategori_1
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->kategori_name; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>





    <!-- Kategori 2 -->
<div class="form-group">

        <label class="control-label col-md-3"> Kat. 2 </label>

          <div class="col-md-4">

              <select class="form-control select2" name="kategori_2" id="kategori_2">

              <option value="">Select Kategori 2</option>

      <?php if (
          isset($director_insight_category) &&
          !empty($director_insight_category)
      ):
          foreach ($director_insight_category as $key => $value): ?>

          <option value="<?php echo $value->kategori_name; ?>" <?php echo $value->kategori_name ==
$director_insight->kategori_2
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->kategori_name; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>



      <!-- Kategori 3 -->
<div class="form-group">

        <label class="control-label col-md-3"> Kat. 3 </label>

          <div class="col-md-4">

              <select class="form-control select2" name="kategori_3" id="kategori_3">

              <option value="">Select Kategori 3</option>
              

      <?php if (
          isset($director_insight_category) &&
          !empty($director_insight_category)
      ):
          foreach ($director_insight_category as $key => $value): ?>

          <option value="<?php echo $value->kategori_name; ?>" <?php echo $value->kategori_name ==
$director_insight->kategori_3
    ? 'selected="selected"'
    : ''; ?>>

            <?php echo $value->kategori_name; ?>

          </option>

      <?php endforeach; ?>

      <?php
      endif; ?>

      </select>

        </div>

    </div>

<!-- Date Start -->

<div class="form-group">

  <label for="date" class="col-sm-3 control-label"> Date </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="date" name="date"



    value="<?php echo set_value('date', $director_insight->date); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'date',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Date End -->





              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">Reset</button>

                  <button type="submit" class="btn btn-info ">Submit</button>

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



<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='pesan']").value = quill.root.innerHTML;
  });
</script>

<?php $this->load->view('footer');
