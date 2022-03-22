<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> BSM Center </title>
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/plugins/select2/select2.min.css" rel="stylesheet">
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/app.js"></script>
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/plugins/pace/pace.min.js"></script>
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/plugins/dataTables/datatables.min.css"
        rel="stylesheet">
    <!-- Date Picker-->
    <link href="<?php echo base_url(); ?>accets/datepicker/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>accets/datepicker/bootstrap-datepicker.js"></script>
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <script src="<?php echo $this->config->item(
        'accet_url'
    ); ?>js/recordDel.js"></script>
    <link href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->item(
        'accet_url'
    ); ?>css/whatsapp-editor.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item(
        'accet_url'
    ); ?>/js/whatsapp-editor.js"></script>


<link href="<?php echo $this->config->item(
    'accet_url'
); ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet" />

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <center>
                                    <h2>
                                        <b>
                                            <script language="JavaScript1.2">
                                            var message = "BSM Center"
                                            var neonbasecolor = "gray"
                                            var neontextcolor = "white"
                                            var flashspeed = 150 //in milliseconds
                                            ///No need to edit below this line/////
                                            var n = 0
                                            if (document.all || document.getElementById) {
                                                document.write('<font color="' + neonbasecolor + '">')
                                                for (m = 0; m < message.length; m++)
                                                    document.write('<span id="neonlight' + m + '">' + message.charAt(
                                                        m) + '</span>')
                                                document.write('</font>')
                                            } else
                                                document.write(message)

                                            function crossrefaa(number) {
                                                var crossobj = document.all ? eval("document.all.neonlight" + number) :
                                                    document.getElementById("neonlight" + number)
                                                return crossobj
                                            }

                                            function neonaa() {
                                                //Change all letters to base color
                                                if (n == 0) {
                                                    for (m = 0; m < message.length; m++)
                                                        //eval("document.all.neonlight"+m).style.color=neonbasecolor
                                                        crossrefaa(m).style.color = neonbasecolor
                                                }
                                                //cycle through and change individual letters to neon color
                                                crossrefaa(n).style.color = neontextcolor
                                                if (n < message.length - 1)
                                                    n++
                                                else {
                                                    n = 0
                                                    clearInterval(flashing)
                                                    setTimeout("beginneonaa();", 1500)
                                                    return
                                                }
                                            }

                                            function beginneonaa() {
                                                if (document.all || document.getElementById)
                                                    flashing = setInterval("neonaa();", flashspeed)
                                            }
                                            beginneonaa();
                                            </script>
                                            <script>
                                            function set_common_delete(id, table_name) {
                                                $("#set_commondel_id").val(id);
                                                $("#table_name").val(table_name);
                                            }

                                            function delete_return() {
                                                del_id = $("#set_commondel_id").val();
                                                table_name = $("#table_name").val();
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/" + table_name +
                                                        "/delete/" + del_id,
                                                    data: "id=" + del_id + "&table_name=" + table_name +
                                                        "&<?php echo $this->security->get_csrf_token_name(); ?>=" +
                                                        '<?php echo $this->security->get_csrf_hash(); ?>',
                                                    type: "post",
                                                    success: function(result) {
                                                        if (result.trim() == "success") {
                                                            $('#commonDelete').modal('toggle');
                                                            $("#hide" + del_id).hide();
                                                        }
                                                    },
                                                    error: function(output) {}
                                                });
                                            }
                                            </script>
                                        </b>
                                    </h2>
                                </center>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">
                                            <!-- TRADE TEAMS -->
                                        </strong>
                                    </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            BSM
                        </div>
                    </li>
                    <!-- BO : left nav  -->
                    <?php
                    $contr = $this->uri->segment(2);
                    $action = $this->uri->segment(3);
                    $actionNext = $this->uri->segment(4);
                    if (!empty($action)) {
                        $module = $contr . '/' . $action;
                        if (!empty($actionNext)) {
                            $module =
                                $contr . '/' . $action . '/' . $actionNext;
                        }
                    } else {
                        $module = $contr;
                    }
                    $contrnew = $contr . '/' . $action;
                    ?>
                    <!-- BO : dashboard -->


                    

                    <li <?php if ($contr == '') { ?>class="active " <?php } ?>>
                        <a href="<?php echo base_url() .
                            'admin'; ?>"><i class="fa fa-home"></i><span
                                class="title">Dashboard</span>
                            <?php if (
                                $module == ''
                            ) { ?><span class="selected"></span><?php } ?>
                        </a>
                    </li>
                    <!-- EO : dashboard -->

                    <!-- BO : Modules -->
                    <?php if ($pengguna->company == 'ADMIN') { ?>
                    <li <?php if (
                        $contr == 'module'
                    ) { ?>class="active " <?php } ?>>
                        <a href="<?php echo base_url(); ?>admin/module/add"><i class="fa fa-users"></i><span
                                class="title">Generate Module</span>
                            <?php if (
                                $contr == 'module'
                            ) { ?><span class="selected"></span><?php } ?>
                            <span class="arrow <?php if (
                                $contr == 'module'
                            ) { ?>open<?php } ?>"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <!--  EO : Modules -->













                    <!-- BO : Opex_capex -->
                    <!-- <?php if ($pengguna->company == 'ADMIN') { ?>

                    <li <?php if (
                        $contr == 'opex_capex'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Opex_capex</span>

                            <?php if (
                                $contr == 'opex_capex'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'opex_capex'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'opex_capex/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/opex_capex/add"><i
                                        class="fa fa-angle-double-right">

                                    </i>Add Opex_capex</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'opex_capex/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/opex_capex/index"><i
                                        class="fa fa-gear"></i>Manage Opex_capex</a>

                            </li>

                        </ul>

                    </li>
                    <?php } ?> -->

                    <!--  EO : Opex_capex -->







                    <!-- BO : Metode_pengadaan -->
                    <!-- <?php if ($pengguna->company == 'ADMIN') { ?>

                    <li <?php if (
                        $contr == 'metode_pengadaan'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Metode_pengadaan</span>

                            <?php if (
                                $contr == 'metode_pengadaan'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'metode_pengadaan'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'metode_pengadaan/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/metode_pengadaan/add"><i
                                        class="fa fa-angle-double-right">

                                    </i>Add Metode_pengadaan</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'metode_pengadaan/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/metode_pengadaan/index"><i
                                        class="fa fa-gear"></i>Manage Metode_pengadaan</a>

                            </li>

                        </ul>

                    </li>
                    <?php } ?> -->

                    <!--  EO : Metode_pengadaan -->







                    <!-- BO : Portofolio -->

                    <!-- <?php if ($pengguna->company == 'ADMIN') { ?>

                    <li <?php if (
                        $contr == 'portofolio'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Portofolio</span>

                            <?php if (
                                $contr == 'portofolio'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'portofolio'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'portofolio/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/portofolio/add"><i
                                        class="fa fa-angle-double-right">

                                    </i>Add Portofolio</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'portofolio/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/portofolio/index"><i
                                        class="fa fa-gear"></i>Manage Portofolio</a>

                            </li>

                        </ul>

                    </li>
                    <?php } ?> -->

                    <!--  EO : Portofolio -->







                    <!-- BO : Kontrak -->
                                 <!-- <?php if (
                                     $pengguna->company == 'ADMIN'
                                 ) { ?>
                    <li <?php if (
                        $contr == 'kontrak'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Kontrak Project</span>

                            <?php if (
                                $contr == 'kontrak'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'kontrak'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'kontrak/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/kontrak/add"><i class="fa fa-angle-double-right">

                                    </i>Add Kontrak</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'kontrak/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/kontrak/index"><i class="fa fa-gear"></i>Manage
                                    Kontrak</a>

                            </li>

                        </ul>

                    </li>
                                <?php } ?> -->
                    <!--  EO : Kontrak -->







                    <!-- BO : Status_karyawan -->
                                
                    <!-- <?php if ($pengguna->company == 'ADMIN') { ?>
                    <li <?php if (
                        $contr == 'status_karyawan'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Status_karyawan</span>

                            <?php if (
                                $contr == 'status_karyawan'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'status_karyawan'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'status_karyawan/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/status_karyawan/add"><i
                                        class="fa fa-angle-double-right">

                                    </i>Add Status_karyawan</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'status_karyawan/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/status_karyawan/index"><i
                                        class="fa fa-gear"></i>Manage Status_karyawan</a>

                            </li>

                        </ul>

                    </li>
                    <?php } ?> -->

                    <!--  EO : Status_karyawan -->







                    <!-- BO : Karyawan -->
 <?php if ($pengguna->company == 'ADMIN') { ?>
                    <li <?php if (
                        $contr == 'karyawan'
                    ) { ?>class="active " <?php } ?>>

                        <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Karyawan</span>

                            <?php if (
                                $contr == 'karyawan'
                            ) { ?><span class="selected"></span><?php } ?>

                            <span class="arrow <?php if (
                                $contr == 'karyawan'
                            ) { ?>open<?php } ?>"></span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li <?php if (
                                $contrnew == 'karyawan/add'
                            ) { ?>class="active " <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/karyawan/add"><i
                                        class="fa fa-angle-double-right">

                                    </i>Add Karyawan</a>

                            </li>

                            <li <?php if (
                                $contrnew == 'karyawan/'
                            ) { ?>class="active" <?php } ?>>

                                <a href="<?php echo base_url(); ?>admin/karyawan/index"><i class="fa fa-gear"></i>Manage
                                    Karyawan</a>

                            </li>

                        </ul>

                    </li>
<?php } ?>
                    <!--  EO : Karyawan -->























             



                    



				<!-- BO : Main_contract_recurring -->
 <?php if ($pengguna->company == 'ADMIN') { ?>
                <li <?php if (
                    $contr == 'main_contract_recurring'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Main_contract_recurring</span>

                        <?php if (
                            $contr == 'main_contract_recurring'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'main_contract_recurring'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'main_contract_recurring/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/main_contract_recurring/add"><i class="fa fa-angle-double-right">

                            </i>Add Main_contract_recurring</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'main_contract_recurring/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/main_contract_recurring/index"><i class="fa fa-gear"></i>Manage Main_contract_recurring</a>

                      </li>

                    </ul>

                </li>
<?php } ?>
                <!--  EO : Main_contract_recurring -->



               



				<!-- BO : Nilai_pengelolaan -->
 <?php if ($pengguna->company == 'ADMIN') { ?>
                <li <?php if (
                    $contr == 'nilai_pengelolaan'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Nilai_pengelolaan</span>

                        <?php if (
                            $contr == 'nilai_pengelolaan'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'nilai_pengelolaan'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'nilai_pengelolaan/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/nilai_pengelolaan/add"><i class="fa fa-angle-double-right">

                            </i>Add Nilai_pengelolaan</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'nilai_pengelolaan/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/nilai_pengelolaan/index"><i class="fa fa-gear"></i>Manage Nilai_pengelolaan</a>

                      </li>

                    </ul>

                </li>
<?php } ?>
                <!--  EO : Nilai_pengelolaan -->



               



				


               



				<!-- BO : Director_insight -->
                        <?php if (
                            $pengguna->company == 'insight' ||
                            $pengguna->company == 'ADMIN'
                        ) { ?>
                <li <?php if (
                    $contr == 'director_insight'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Insight</span>

                        <?php if (
                            $contr == 'director_insight'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'director_insight'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'director_insight/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_insight/add"><i class="fa fa-angle-double-right">

                            </i>Add Director_insight</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'director_insight/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_insight/index"><i class="fa fa-gear"></i>Manage Director_insight</a>

                      </li>

                    </ul>

                </li>

                <!--  EO : Director_insight -->
                        <?php } ?>


               



				<!-- BO : Director_insight_category -->
                        <?php if (
                            $pengguna->company == 'insight' ||
                            $pengguna->company == 'ADMIN'
                        ) { ?>
                <li <?php if (
                    $contr == 'director_insight_category'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Hash Tag</span>

                        <?php if (
                            $contr == 'director_insight_category'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'director_insight_category'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'director_insight_category/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_insight_category/add"><i class="fa fa-angle-double-right">

                            </i>Add Director_insight_category</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'director_insight_category/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_insight_category/index"><i class="fa fa-gear"></i>Manage Director_insight_category</a>

                      </li>

                    </ul>

                </li>

                <!--  EO : Director_insight_category -->


                        <?php } ?>
               
<!-- BO : Director_list -->

                <?php if (
                    $pengguna->company == 'insight' ||
                    $pengguna->company == 'ADMIN'
                ) { ?>

                <li <?php if (
                    $contr == 'director_list'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">BoD List</span>

                        <?php if (
                            $contr == 'director_list'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'director_list'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'director_list/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_list/add"><i class="fa fa-angle-double-right">

                            </i>Add Director_list</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'director_list/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/director_list/index"><i class="fa fa-gear"></i>Manage Director_list</a>

                      </li>

                    </ul>

                </li>

                <!--  EO : Director_list -->
                    <?php } ?>                






                    


				<!-- BO : Document_tender -->
 <?php if ($pengguna->company == 'ADMIN') { ?>
                <li <?php if (
                    $contr == 'document_tender'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Document_tender</span>

                        <?php if (
                            $contr == 'document_tender'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'document_tender'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'document_tender/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/document_tender/add"><i class="fa fa-angle-double-right">

                            </i>Add Document_tender</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'document_tender/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/document_tender/index"><i class="fa fa-gear"></i>Manage Document_tender</a>

                      </li>

                    </ul>

                </li>
<?php } ?>
                <!--  EO : Document_tender -->



               



				<!-- BO : Project_contract -->
 <?php if ($pengguna->company == 'ADMIN') { ?>
                <li <?php if (
                    $contr == 'project_contract'
                ) { ?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Project_contract</span>

                        <?php if (
                            $contr == 'project_contract'
                        ) { ?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if (
                          $contr == 'project_contract'
                      ) { ?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if (
                          $contrnew == 'project_contract/add'
                      ) { ?>class="active "<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/project_contract/add"><i class="fa fa-angle-double-right">

                            </i>Add Project_contract</a>

                      </li>

                      <li <?php if (
                          $contrnew == 'project_contract/'
                      ) { ?>class="active"<?php } ?>>

                        <a href="<?php echo base_url(); ?>admin/project_contract/index"><i class="fa fa-gear"></i>Manage Project_contract</a>

                      </li>

                    </ul>

                </li>
<?php } ?>
                <!--  EO : Project_contract -->



               



				<!-- BO : Project_persentase_now -->

                <li <?php if($contr == 'project_persentase_now'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Project_persentase_now</span>

                        <?php if($contr == 'project_persentase_now'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'project_persentase_now'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'project_persentase_now/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/project_persentase_now/add"><i class="fa fa-angle-double-right">

                            </i>Add Project_persentase_now</a>

                      </li>

                      <li <?php if($contrnew == 'project_persentase_now/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/project_persentase_now/index"><i class="fa fa-gear"></i>Manage Project_persentase_now</a>

                      </li>

                    </ul>

                </li>

                <!--  EO : Project_persentase_now -->



               <!--  @@@@@#####@@@@@ -->



                



                



                



                



                



                



                



                








































<?php if ($pengguna->company == 'ADMIN') { ?>
                    <li><a href="<?php echo $this->config->item(
                        'left_url'
                    ); ?>password"><i class="fa fa-users"></i><span
                                class="title">Change Password</span></a></li>
                                <?php } ?>
                    <li><a href="<?php echo $this->config->item(
                        'left_url'
                    ); ?>auth/logout"><i
                                class="fa fa-users"></i><span class="title">Logout</span></a></li>
                    <?php echo base_url(); ?>

                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome
                                <?php echo $pengguna->first_name; ?>
                            </span>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="text-muted text-xs block">
                                        <img src="<?php echo $this->config->item(
                                            'accet_url'
                                        ); ?>img/user.png"
                                            class="img-circle" alt="User Image" width="20px">
                                    </span>
                                </span>
                            </a>
                            <span>
                            </span>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!-- <li><a href="<?php echo $this->config->item(
                                    'left_url'
                                ); ?>admin/profile/edit">Profile</a></li> -->
                                <li><a href="<?php echo $this->config->item(
                                    'left_url'
                                ); ?>password">Change Password </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->config->item(
                                    'left_url'
                                ); ?>auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Common Delete Popup  -->
            <div class="modal fade" id="commonDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <form action="<?php echo base_url(); ?>welcome/delete_notification/" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="frm_title">Delete</h4>
                            </div>
                            <div class="modal-body" id="frm_body">
                                Do you really want to delete?
                                <input type="hidden" id="set_commondel_id">
                                <input type="hidden" id="table_name">
                            </div>
                            <div class="modal-footer">
                                <button style='margin-left:10px;' type="button"
                                    class="btn btn-primary col-sm-2 pull-right" id="frm_submit"
                                    onclick="delete_return();">Yes</button>
                                <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal"
                                    id="frm_cancel">No</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./ Common Delete Popup /. -->