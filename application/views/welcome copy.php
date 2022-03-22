<?php $this->load->view('header');?>
<!-- content -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <!-- <a href="" class="btn btn-primary">This is action area</a> -->
        </div>
    </div>
</div>
<!-- <br>
<br clear="all"> -->

<!-- content -->
<!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="widget style1 red-bg">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <?php $now = new DateTime();
$now->setTimezone(new DateTimezone('Asia/Makassar'));?>
                        <span> <?php echo $now->format('d-m-Y'); ?> </span>


                        <h2 class="font-bold"> Today </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Total Kartap </span>
                        <h2 class="font-bold"><?php echo $data_kartap->num_rows(); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-file-text-o fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Total Kontrak Aktif </span>
                        <!-- <h2 class="font-bold"><?php echo $kontrak_active->num_rows(); ?></h2> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-times fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Total Kontrak Expire</span>
                        <!-- <h2 class="font-bold"><?php echo $kontrak_expire->num_rows(); ?></h2> -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <span class="pull-right text-right">
                            <small>Average value of sales in the past month in: <strong>United
                                    states</strong></small>
                            <br />
                            All sales: 162,862
                        </span>
                        <h1 class="m-b-xs">$ 50,992</h1>
                        <h3 class="font-bold no-margins">
                            Half-year revenue margin
                        </h3>
                        <small>Sales marketing.</small>
                    </div>

                    <div>
                        <canvas id="lineChart" height="70"></canvas>
                    </div>

                    <div class="m-t-md">
                        <small class="pull-right">
                            <i class="fa fa-clock-o"> </i>
                            Update on 16.07.2015
                        </small>
                        <small>
                            <strong>Analysis of sales:</strong> The value has been changed over time, and last month
                            reached a level over $50,000.
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">This month</span>
                    <h5>Revenue</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">22 285,400</h1>
                    <div class="stat-percent font-bold text-navy">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">This month</span>
                    <h5>EBITDA</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">60 420,600</h1>
                    <div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">This month</span>
                    <h5>NIAT</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">$ 120 430,800</h1>
                    <div class="stat-percent font-bold text-warning">16% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                    <small> <?php echo $this->config->item('accet_url'); ?> </small>
                </div>
            </div>
        </div>
    </div>


    <?php
$tahun_sekarang = date("Y", strtotime("-0 year"));
$tahun_kemarin = date("Y", strtotime("-1 year"));

$bulan_sekarang = date("m", strtotime("-0 month"));
$bulan_sekarang = date('M', mktime(0, 0, 0, $bulan_sekarang, 10));

$bulan_kemarin = date("m", strtotime("-1 month"));
$bulan_kemarin = date('M', mktime(0, 0, 0, $bulan_kemarin, 10));

$dua_bulan_kemarin = date("m", strtotime("-2 month"));
$dua_bulan_kemarin = date('M', mktime(0, 0, 0, $dua_bulan_kemarin, 10));

$tiga_bulan_kemarin = date("m", strtotime("-3 month"));
$tiga_bulan_kemarin = date('M', mktime(0, 0, 0, $tiga_bulan_kemarin, 10));

$empat_bulan_kemarin = date("m", strtotime("-4 month"));
$empat_bulan_kemarin = date('M', mktime(0, 0, 0, $empat_bulan_kemarin, 10));

$lima_bulan_kemarin = date("m", strtotime("-5 month"));
$lima_bulan_kemarin = date('M', mktime(0, 0, 0, $lima_bulan_kemarin, 10));

$date = '2014-01-03';

$dateTime = new DateTime($date);

$lastMonth = $dateTime->modify('-' . $dateTime->format('d') . ' days')->format('F Y');

echo $lastMonth; // 'December 2013'

echo $bulan_sekarang;
echo "& ";
echo $tahun_kemarin;
echo "</br>";

echo "</br>";
echo date("m-Y", strtotime("-0 month"));
echo "</br>";
echo date("m-Y", strtotime("-1 month"));
echo "</br>";
echo date("m-Y", strtotime("-2 month"));
echo "</br>";
echo date("m-Y", strtotime("-3 month"));
echo "</br>";
echo date("m-Y", strtotime("-4 month"));
echo "</br>";
echo date("m-Y", strtotime("-5 month"));
?>


</div>








<?php $this->load->view('footer');?>