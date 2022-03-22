<div class="footer">
    <div class="pull-right">
    </div>
    <div>
        <strong>Copyright</strong> IT A7
    </div>
</div>
<!-- </div> -->
<!-- Mainly scripts -->
<!-- <script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/jquery-3.1.1.min.js"></script> -->
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>/js/plugins/cropper/cropper.min.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/summernote/summernote.min.js"></script>


<!-- Custom and plugin javascript -->
<script type="text/javascript">
$(function() {
    var navMain = $("#nav-main");
    navMain.on("click", "a", null, function() {
        navMain.collapse('hide');
    });
});
</script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/chosen/chosen.jquery.js"></script>
<script type="text/javascript">
$(".chosen-select").chosen();
</script>

<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">
$(".select2").select2();
</script>
<script type="text/javascript">
$(function() {
    window.prettyPrint && prettyPrint();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
</script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/clockpicker/clockpicker.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>css/plugins/moment-develop/min/moment-with-locales.js">
</script>
<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/bootstrap-datetimepicker.js"></script>

<script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

 <script>
      $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
      })
    </script>





<!-- Flot -->


<!-- Custom and plugin javascript -->
<!-- <script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/inspinia.js"></script> -->
<!-- <script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/pace/pace.min.js"></script> -->

<!-- jQuery UI -->
<!-- <script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/jquery-ui/jquery-ui.min.js"></script> -->


<!-- ChartJS-->
<!-- <script src="<?php echo $this->config->item(
    'accet_url'
); ?>js/plugins/chartJs/Chart.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
$(document).ready(function() {

    var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
                label: "Target RKAP",
                backgroundColor: "rgba(26,179,148,0.5)",
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: "Achievement",
                backgroundColor: "rgba(220,220,220,0.5)",
                borderColor: "rgba(220,220,220,1)",
                pointBackgroundColor: "rgba(220,220,220,1)",
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {
        type: 'line',
        data: lineData,
        options: lineOptions
    });

});
</script>




<script type="text/javascript">
$(function() {
    $(".datetimepicker").datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
});
</script>




</body>

</html>