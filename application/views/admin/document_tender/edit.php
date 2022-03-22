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

              



<!-- Nama_document Start -->

<div class="form-group">

  <label for="nama_document" class="col-sm-3 control-label"> Nama_document </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="nama_document" name="nama_document"



    value="<?php echo set_value(
        'nama_document',
        html_entity_decode($document_tender->nama_document)
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'nama_document',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Nama_document End -->







    <!-- Link_document Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Link_document </label>

      <div class="col-sm-6">

      <input type="file" name="link_document" />

      <input type="hidden" name="old_link_document"

      value="<?php if (isset($link_document) && $link_document != '') {
          echo $link_document;
      } ?>" />

        <?php if (isset($link_document_err) && !empty($link_document_err)) {
            foreach ($link_document_err as $key => $error) {
                echo "<div class=\"error-msg\"></div>";
            }
        } ?>

        <?php if (
            isset($document_tender->link_document) &&
            $document_tender->link_document != ''
        ) { ?>

            <br>
<object data="<?php
echo $this->config->item('photo_url');
echo $document_tender->link_document;
?>" width="400" height="600"></object>
<br>

<a href="<?php
echo $this->config->item('photo_url');
echo $document_tender->link_document;
?>" target="_blank">Download file</a>


  <!-- <img src="<?php
  echo $this->config->item('photo_url');
  echo $document_tender->link_document;
  ?>" alt="pic" width="50" height="50" /> -->

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Link_document End -->



    



<!-- Tanggal_document Start -->

<div class="form-group">

  <label for="tanggal_document" class="col-sm-3 control-label"> Tanggal_document </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_document" name="tanggal_document"



    value="<?php echo set_value(
        'tanggal_document',
        $document_tender->tanggal_document
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'tanggal_document',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Tanggal_document End -->







<!-- Expire_date_doc Start -->

<div class="form-group">

  <label for="expire_date_doc" class="col-sm-3 control-label"> Expire_date_doc </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="expire_date_doc" name="expire_date_doc"



    value="<?php echo set_value(
        'expire_date_doc',
        $document_tender->expire_date_doc
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'expire_date_doc',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Expire_date_doc End -->





<!-- Keterangan Start -->



<div class="form-group">

  <label for="keterangan" class="col-sm-3 control-label"> Keterangan </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="keterangan" name="keterangan"><?php echo set_value(
        'keterangan',
        html_entity_decode($document_tender->keterangan)
    ); ?></textarea>

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'keterangan',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>



<!-- Keterangan End -->





<!-- Tanggal_update Start -->

<div class="form-group">

  <label for="tanggal_update" class="col-sm-3 control-label"> Tanggal_update </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="tanggal_update" name="tanggal_update"



    value="<?php echo set_value(
        'tanggal_update',
        $document_tender->tanggal_update
    ); ?>"

    >

  </div>

  <div class="col-sm-5" >



    <?php echo form_error(
        'tanggal_update',
        "<span class='label label-danger'>",
        '</span>'
    ); ?>

  </div>

</div>

<!-- Tanggal_update End -->





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

<?php $this->load->view('footer');
