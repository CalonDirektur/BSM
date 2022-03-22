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
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Insight Details</a>
                      </li>
                      <!-- <li class="breadcrumb-item active">Project Details</li> -->
                    </ol>
                  </div>
                  <h4 class="page-title">Insight Details</h4>
                </div>
              </div>
            </div>
            <!-- end page title -->

            <div class="row">
              <!-- <div class="col-12"> -->
              <div class="col-xl-8 col-lg-6">
                <!-- project card -->
                <div class="card d-block">
                  <div class="card-body">
                    <div class="dropdown float-end">
                      <a
                        href="#"
                        class="dropdown-toggle arrow-none card-drop"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="dripicons-dots-3"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        
                        <!-- <a href="javascript:void(0);" class="dropdown-item"
                          ><i class="mdi mdi-pencil me-1"></i>Edit</a
                        >
                        
                        <a href="javascript:void(0);" class="dropdown-item"
                          ><i class="mdi mdi-delete me-1"></i>Delete</a
                        >
                        
                        <a href="javascript:void(0);" class="dropdown-item"
                          ><i class="mdi mdi-email-outline me-1"></i>Invite</a
                        >
                        
                        <a href="javascript:void(0);" class="dropdown-item"
                          ><i class="mdi mdi-exit-to-app me-1"></i>Leave</a
                        >
                         -->


                        <a href="http://twitter.com/share?url=<?php echo site_url() .
                            'insight/detail/' .
                            $director_insight->id .
                            '&hl=id'; ?>"target="_blank" class="dropdown-item"
                          ><i class="ti-twitter"></i> Twitter</a
                        >

                        <a href="whatsapp://send?text=<?php echo site_url() .
                            'insight/detail/' .
                            $director_insight->id .
                            '&hl=id'; ?>"target="_blank" class="dropdown-item"
                          ><i class="fab fa-whatsapp"></i> WhatsApp</a
                        >

                        
                      </div>
                    </div>
                    <!-- project title-->
                    
                                        
                    <h3 class="mt-0 font-20">Message #<?php echo set_value(
                        'id',
                        html_entity_decode($director_insight->id)
                    ); ?></h3>
                    <?php if ($this->session->flashdata('message')): ?>

                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <?php echo $this->session->flashdata(
                                                'message'
                                            ); ?>
                                        </div>
                        <?php endif; ?> 
                    <div class="badge bg-secondary text-light mb-3">
                      by <?php if (
                          isset($director_list) &&
                          !empty($director_list)
                      ):
                          foreach ($director_list as $key => $value):
                              if ($value->id == $director_insight->director) {
                                  echo $value->jabatan;
                              }
                          endforeach;
                      endif; ?>
                    </div>

                    <h5>Insight Overview:</h5>
                      <div class="alert alert-warning" role="alert">
                    <p class="text-muted mb-2">
                       <?php $text = stripslashes($director_insight->pesan); ?>
      <?php echo htmlspecialchars_decode($text); ?>     
                    </p>  

                    </div>

                    <!-- <p class="text-muted mb-4">
                      Voluptates, illo, iste itaque voluptas corrupti ratione
                      reprehenderit magni similique? Tempore, quos delectus
                      asperiores libero voluptas quod perferendis! Voluptate,
                      quod illo rerum? Lorem ipsum dolor sit amet. With
                      supporting text below as a natural lead-in to additional
                      contenposuere erat a ante.
                    </p> -->

                    <!-- <div class="mb-4">
                      <h5>Tags</h5>
                      <div class="text-uppercase">
                        <a href="#" class="badge badge-soft-primary me-1"
                          >Html</a
                        >
                        <a href="#" class="badge badge-soft-primary me-1"
                          >Css</a
                        >
                        <a href="#" class="badge badge-soft-primary me-1"
                          >Bootstrap</a
                        >
                        <a href="#" class="badge badge-soft-primary me-1"
                          >JQuery</a
                        >
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="col-md-4">
                        <div class="mb-4">


                                                <div class="icon-item">
                                                    
                                                    <span><h5>Message Date</h5></span>
                                                </div>
                        
                          <!-- <h5>Message Date</h5> -->
                          <p>
                            <i data-feather="calendar" class="icon-dual"></i>
                            <?php echo set_value(
                                'date',
                                html_entity_decode($director_insight->date)
                            ); ?>
                            <!-- <small class="text-muted">1:00 PM</small> -->
                          </p>
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="mb-8">
                          <h5>Kategori</h5>
                          <p>
                            <i data-feather="bookmark" class="icon-dual"></i>

                           <?php if (
        isset($director_insight->kategori_1) &&
        !empty($director_insight->kategori_1)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->kategori_name == $director_insight->kategori_1) {
                echo $value->kategori_name; 
            }
        endforeach;
    endif; ?> 
    
    <?php if (
        isset($director_insight->kategori_2) &&
        !empty($director_insight->kategori_2)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->kategori_name == $director_insight->kategori_2) {
                echo ", "; echo $value->kategori_name; 
            }
        endforeach;
    endif; ?> 
<?php if (
        isset($director_insight->kategori_3) &&
        !empty($director_insight->kategori_3)
    ):
        foreach ($director_insight_category as $key => $value):
            if ($value->kategori_name == $director_insight->kategori_3) {
                echo ", "; echo $value->kategori_name; 
            }
        endforeach;
    endif; ?> 






                           
                            <!-- <small class="text-muted">1:00 PM</small> -->
                          </p>
                        </div>
                      </div>
                      <!-- <div class="col-md-4">
                        <div class="mb-4">
                          <h5>Budget</h5>
                          <p>$15,800</p>
                        </div>
                      </div> -->
                    </div>

                    
                  </div>
                  <!-- end card-body-->
                </div>
                <!-- end card-->

                <!-- <div class="card">
                  <div class="card-body">
                    <div class="dropdown float-end">
                      <a
                        href="#"
                        class="dropdown-toggle arrow-none card-drop"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="dripicons-dots-3"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        
                        <a href="javascript:void(0);" class="dropdown-item"
                          >Latest</a
                        >
                        
                        <a href="javascript:void(0);" class="dropdown-item"
                          >Popular</a
                        >
                      </div>
                    </div>

                    <h4 class="mt-0 mb-3">Komentar (258)</h4>

                    <textarea
                      class="form-control form-control-light mb-2"
                      placeholder="Write message"
                      id="example-textarea"
                      rows="3"
                    ></textarea>
                    <div class="text-end">
                      <div class="btn-group mb-2">
                        <button
                          type="button"
                          class="btn btn-link btn-sm text-muted font-18"
                        >
                          <i class="dripicons-paperclip"></i>
                        </button>
                      </div>
                      <div class="btn-group mb-2 ms-2">
                        <button type="button" class="btn btn-primary btn-sm">
                          Submit
                        </button>
                      </div>
                    </div>

                    <div class="mt-2">
                      <div class="d-flex align-items-start">
                        <img
                          class="me-2 avatar-sm rounded-circle"
                          src="../assets/images/users/user-3.jpg"
                          alt="Generic placeholder image"
                        />
                        <div class="w-100">
                          <h5 class="mt-0">
                            <a href="contacts-profile.html" class="text-reset"
                              >Jeremy Tomlinson</a
                            >
                            <small class="text-muted">3 hours ago</small>
                          </h5>
                          Nice work, makes me think of The Money Pit.

                          <br />
                          <a
                            href="javascript: void(0);"
                            class="text-muted font-13 d-inline-block mt-2"
                            ><i class="mdi mdi-reply"></i> Reply</a
                          >

                          <div class="d-flex align-items-start mt-3">
                            <a class="pe-2" href="#">
                              <img
                                src="../assets/images/users/user-4.jpg"
                                class="avatar-sm rounded-circle"
                                alt="Generic placeholder image"
                              />
                            </a>
                            <div class="w-100">
                              <h5 class="mt-0">
                                <a
                                  href="contacts-profile.html"
                                  class="text-reset"
                                  >Kathleen Thomas</a
                                >
                                <small class="text-muted">1 hours ago</small>
                              </h5>
                              i'm in the middle of a timelapse animation myself!
                              (Very different though.) Awesome stuff.
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex align-items-start mt-3">
                        <img
                          class="me-2 avatar-sm rounded-circle"
                          src="../assets/images/users/user-2.jpg"
                          alt="Generic placeholder image"
                        />
                        <div class="w-100">
                          <h5 class="mt-0">
                            <a href="contacts-profile.html" class="text-reset"
                              >Jonathan Tiner</a
                            >
                            <small class="text-muted">1 day ago</small>
                          </h5>
                          The parallax is a little odd but O.o that house build
                          is awesome!!

                          <br />
                          <a
                            href="javascript: void(0);"
                            class="text-muted font-13 d-inline-block mt-2"
                            ><i class="mdi mdi-reply"></i> Reply</a
                          >
                        </div>
                      </div>

                      <div class="d-flex align-items-start mt-3">
                        <a class="pe-2" href="#">
                          <img
                            src="../assets/images/users/user-1.jpg"
                            class="rounded-circle"
                            alt="Generic placeholder image"
                            height="31"
                          />
                        </a>
                        <div class="w-100">
                          <input
                            type="text"
                            id="simpleinput"
                            class="form-control form-control-sm form-control-light"
                            placeholder="Add comment"
                          />
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="text-center mt-2">
                      <a href="javascript:void(0);" class="text-danger"
                        ><i class="mdi mdi-spin mdi-loading me-1 font-16"></i>
                        Load more
                      </a>
                    </div>
                  </div>
                
                </div> -->
                
              </div>
           

              <div class="col-lg-6 col-xl-4" card bg-secondary>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title mb-3">Preview</h5>




                      <!-- <div class="card text-white" >
                        <div class="card-body bg-success text-white">
                          <blockquote class="blockquote blockquote-custom px-3 pt-4 text-white">
                            <div class="blockquote-custom-icon bg-info shadow-1-strong">
                              <i class="fa fa-quote-left text-white"></i>
                            </div>
                            <p class="text-red">Message <?php echo $director_insight->id; ?></p>

                            <p>
                              
                            <?php $text = stripslashes(
                                $director_insight->pesan
                            ); ?>
                            <H6 class="text-white">
                          <?php echo htmlspecialchars_decode(
                              $text
                          ); ?>        </H6>
                          
                              
                            </p>
                            <footer class="blockquote-footer pt-4 mt-4 border-top text-white">
                             <?php if (
                                 isset($director_list) &&
                                 !empty($director_list)
                             ):
                                 foreach ($director_list as $key => $value):
                                     if (
                                         $value->id ==
                                         $director_insight->director
                                     ) {
                                         echo $value->jabatan;
                                     }
                                 endforeach;
                             endif; ?>
                              
                              <p></p>
                               <cite title="Source Title">WAG - Komunikasi Perusahaan - <?php echo $director_insight->date; ?></cite>
                            </footer>
                          </blockquote>
                        </div>
                      </div> -->

      <!-- </div>
    </div> -->
  <!-- </div> -->
<!-- </section> -->

                  <?php if (isset($director_insights) and !empty($director_insights)) {
                                            $count = 1; ?>

                                            <?php foreach (
                                             $director_insights
                                             as $key => $value) { ?>



                    <div class="card mb-1 shadow-none border" onclick="location.href='<?php echo base_url(); ?>insight/detail/<?php echo $value->id; ?>'" >
                      <div class="p-2">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <div class="avatar-sm">
                              <span
                                class="avatar-title badge-soft-primary text-primary rounded"
                              >
                                <?php echo $value->id; ?>
                              </span>
                            </div>
                          </div>
                          <div class="col ps-0">
                            <a
                              href="javascript:void(0);"
                              class="text-muted fw-bold"
                              >Message #<?php echo $value->id; ?></a
                            >
                            <p class="mb-0"><?php echo $value->date; ?></p>
                          </div>
                          <div class="col-auto">
                            
                            <a
                              href="javascript:void(0);"
                              class="btn btn-link btn-lg text-muted"
                            >
                              <i class=" dripicons-archive"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>


                                            <? }}?>

                    <!-- <div class="card mb-1 shadow-none border">
                      <div class="p-2">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <div class="avatar-sm">
                              <span
                                class="avatar-title badge-soft-primary text-primary rounded"
                              >
                                JPG
                              </span>
                            </div>
                          </div>
                          <div class="col ps-0">
                            <a
                              href="javascript:void(0);"
                              class="text-muted fw-bold"
                              >Dashboard-design.jpg</a
                            >
                            <p class="mb-0">3.25 MB</p>
                          </div>
                          <div class="col-auto">
                           
                            <a
                              href="javascript:void(0);"
                              class="btn btn-link btn-lg text-muted"
                            >
                              <i class="dripicons-download"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card mb-0 shadow-none border">
                      <div class="p-2">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <div class="avatar-sm">
                              <span
                                class="avatar-title badge-soft-primary text-primary rounded"
                              >
                                MP4
                              </span>
                            </div>
                          </div>
                          <div class="col ps-0">
                            <a
                              href="javascript:void(0);"
                              class="text-muted fw-bold"
                              >Admin-bug-report.mp4</a
                            >
                            <p class="mb-0">7.05 MB</p>
                          </div>
                          <div class="col-auto">
                           
                            <a
                              href="javascript:void(0);"
                              class="btn btn-link btn-lg text-muted"
                            >
                              <i class="dripicons-download"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>
          <!-- container -->
        </div>
        <!-- content -->


        <style>
.blockquote-custom {
  position: relative;
  font-size: 1.1rem;
}

.blockquote-custom-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -40px;
  left: 19px;
}
</style>
<?php $this->load->view('menu_footer_insight'); ?>

<!-- <p><?php $this->load->view('menu_kanan_insight'); ?></p> -->
<?php $this->load->view('footer_insight'); ?>
