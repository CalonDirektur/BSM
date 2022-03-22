<?php $this->load->view('header_insight'); ?>
<?php $this->load->view('topbar_insight'); ?>
<?php $this->load->view('menu_kiri_insight'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Extended UI</a></li>
                                <li class="breadcrumb-item active">Dragula</li> -->
                            </ol>
                        </div>
                        <h4 class="page-title">Insight of President Director</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

             <div class="row">
                            <div class="col-12">
                                <div class="text-center filter-menu">
                                    <a href="javascript: void(0);" class="filter-menu-item active" data-rel="all">All</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="web">Web Design</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="graphic">Graphic Design</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="illustrator">Illustrator</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="photography">Photography</a>
                                </div>
                            </div>
                        </div>

            <!-- <div class="row"> -->
            <div class="row filterable-content">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Collection of insights </h4>
                            <p class="text-muted font-13">
                                Halaman ini menampilkan qoutation dari <code>President Director</code>
                                TelkomProperty
                            </p>

                            <div class="row filter-item all graphic photography" id="simple-dragula" data-plugin="dragula">

                                <?php if (isset($results) and !empty($results)) {
                                            $count = 1; ?>

                                            <?php foreach (
                                             $results
                                             as $key => $value) { ?>









                                <div class="col-md-4">
                                    <div class="card mb-0 mt-3 border">
                                    <!-- <div class="card mb-0 mt-3 border border-success">     -->
                                        <div class="card-body">
                                            <!-- <span
                                                class="badge badge-soft-secondary float-end"><?php echo $value->id; ?></span> -->

                                                 <span
                                                class="badge badge-soft-secondary float-end"><?php echo $value->date; ?></span>
                                       

                                            <h5 class="mt-0"><a href="<?php echo base_url(); ?>insight/detail/<?php echo $value->id; ?>"
                                                    class="text-success"><bold>Message #<?php echo $value->id; ?></bold></a></h5>
                                            <?php if (
                                                             !empty($value->pesan)
                                                         ) { ?>

                                                                        <?php $text = (stripslashes($value->pesan));
                                                                        $anu = (htmlspecialchars_decode ($text)); ?>
                                                            
                                            <p><?php echo substr ($anu , 0 , 200);?>       </p>
                                           <? } ?>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="javascript: void(0);" class="text-reset">
                                                        <img src="<?php echo base_url() ?>assets/images/users/Mohammad-Firdaus-White.png" alt="task-user"
                                                            class="avatar-sm img-thumbnail rounded-circle">

                                                        <?php if (!empty($value->director)
                                                ) { ?>


                                                        <span
                                                            class="d-none d-md-inline-block ms-1 fw-semibold"><small style="font-size:11px"><?php echo $value->director; ?></small></span>
                                                       <? } ?>
                                                    </a>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <div class="text-end text-muted">
                                                        <?php if (!empty($value->date)) { ?>


                                                        <p class="font-13 mt-2 mb-0"><i class="mdi mdi-calendar"></i>
                                                           <small style="font-size:9px"> <?php echo $value->date; ?></small></p>
                                                        <?php } ?> 
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                                <?php }} ?>
                                

                            </div>
                            <!-- end row-->

                        </div> <!-- end card-body-->

                        <ul class="pagination justify-content-end pagination-rounded mt-0">

                            <?php echo $links; ?> 
                            <!-- <?php var_dump ($links); ?> -->
                            <!-- <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">«</span>
                              <span class="visually-hidden">Previous</span>
                            </a>
                          </li> -->
                          <!-- <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">3</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">4</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">5</a>
                          </li> -->
                          <!-- <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">»</span>
                              <span class="visually-hidden">Next</span>
                            </a>
                          </li> -->
                        </ul>

                        <div class="clearfix"></div>

                    </div> <!-- end card-->



                </div> <!-- end col-->




            </div> <!-- end row -->






        </div> <!-- container -->

    </div> <!-- content -->



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    <?php $this->load->view('menu_footer_insight'); ?>
    <!-- <p><?php $this->load->view('menu_kanan_insight'); ?></p> -->
    <?php $this->load->view('footer_insight'); ?>