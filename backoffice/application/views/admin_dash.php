
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/jvectormap/jquery-jvectormap.css') ?>">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
<!-- ChartJS -->
<script src="<?php echo base_url('bower_components/Chart.js/Chart.js') ?>"></script>
<?php
/**
** Simple User Treatment
**/
$users_simple_query = $this->db->get('users_simple');

$users_simple=$users_simple_query->num_rows();
//$users_simple_query =  json_encode($users_simple_query->result());
// simple Users by month replace 2016 by NOW()
$users_simple_data =array();
$users_simple_query_january = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 1 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_january->num_rows();
$users_simple_query_february = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 2 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_february->num_rows();
$users_simple_query_march = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 3 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_march->num_rows();
$users_simple_query_april = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 4 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_april->num_rows();
$users_simple_query_may = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 5 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_may->num_rows();
$users_simple_query_june = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 6 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_june->num_rows();
$users_simple_query_july = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 7 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_july->num_rows();
$users_simple_query_august = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 8 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_august->num_rows();
$users_simple_query_september = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 9 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_september->num_rows();
$users_simple_query_october = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 10 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_october->num_rows();
$users_simple_query_november = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_november->num_rows();
$users_simple_query_december = $this->db->query('SELECT uid FROM users_simple
   WHERE MONTH(created_at) = 12 AND YEAR(created_at) = 2016');
   $users_simple_data[] = $users_simple_query_december->num_rows();

   // Count networks for simple users
   $array_simple = array();
   $num = 0;
   if ($users_simple > 0) {
   foreach($users_simple_query->result() as $row) {
   $num++;
   $array_simple[] = $row->network;


   }
   $vals_simple = array_count_values($array_simple);
   //echo 'No. of NON Duplicate Items: '.count($vals_simple).'<br><br>';
   //print_r($vals_simple);
   $pieChart2 = array();
   foreach(array_keys($vals_simple) as $paramName2) {
     $color2 = dechex(rand(0x000000, 0xFFFFFF));
     $trash2 = array("value" => $vals_simple[$paramName2],
         "color"    => "#".$color2,
         "highlight" => "#".$color2,
         "label" => $paramName2);

         $pieChart2[]= $trash2;

   }
   } else {
     echo "error on database";
   }

   /**
   ** Geolocated User Treatment
   **/
$users_geolocated_query = $this->db->get('users');
// Geolocated Users by month replace 2016 by NOW()
$users_geolocated_data =array();
$users_geolocated_query_january = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 1 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_january->num_rows();
$users_geolocated_query_february = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 2 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_february->num_rows();
$users_geolocated_query_march = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 3 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_march->num_rows();
$users_geolocated_query_april = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 4 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_april->num_rows();
$users_geolocated_query_may = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 5 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_may->num_rows();
$users_geolocated_query_june = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 6 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_june->num_rows();
$users_geolocated_query_july = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 7 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_july->num_rows();
$users_geolocated_query_august = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 8 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_august->num_rows();
$users_geolocated_query_september = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 9 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_september->num_rows();
$users_geolocated_query_october = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 10 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_october->num_rows();
$users_geolocated_query_november = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_november->num_rows();
$users_geolocated_query_december = $this->db->query('SELECT uid FROM users
   WHERE MONTH(created_at) = 12 AND YEAR(created_at) = 2016');
   $users_geolocated_data[] = $users_geolocated_query_december->num_rows();




$users_geolocated=$users_geolocated_query->num_rows();
//$users_geolocated_query =  json_encode($users_geolocated_query->result());

$validated_codes_query = $this->db->get('codemembre');
$validated_codes=$validated_codes_query->num_rows();

$generated_codes_query = $this->db->get('codeGenerer');
$generated_codes=$generated_codes_query->num_rows();


// Counts network for geolocated users
$array_geolocated = array();
$num = 0;
if ($users_geolocated > 0) {
foreach($users_geolocated_query->result() as $row) {
$num++;
$array_geolocated[] = $row->network;


}
$vals_geolocated = array_count_values($array_geolocated);
//echo 'No. of NON Duplicate Items: '.count($vals_geolocated).'<br><br>';
//print_r($vals_geolocated);
$pieChart = array();
foreach(array_keys($vals_geolocated) as $paramName) {
  $color = dechex(rand(0x000000, 0xFFFFFF));
  $trash = array("value" => $vals_geolocated[$paramName],
      "color"    => "#".$color,
      "highlight" => "#".$color,
      "label" => $paramName);

      $pieChart[]= $trash;

}
} else {
  echo "error on database";
}
?>
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
  </section>

  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->

        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $users_simple;?></h3>

            <p>Simple members</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $users_geolocated;?></h3>

            <p>Geolocated members</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $validated_codes;?></h3>

            <p>Validated codes</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $generated_codes;?></h3>

            <p>Generated codes</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->

      <div class="col-xs-12">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Subscriptions</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Simple Users by network</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Geolocated Users by network</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <canvas id="pieChart2" style="height:250px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      </div>
    <!-- /.row -->
  </section>

</div>


<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('bower_components/raphael/raphael.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('bower_components/chart.js/Chart.js') ?>"></script>




<script >
/*
var users = JSON.parse('<?php echo $users_geolocated_query ?>');
var users_simple = JSON.parse('<?php echo $users_simple_query ?>');
var current_year = '<?php echo date('Y') ?>';
var current_month = '<?php echo date('m') ?>';
var cities = [];
var cities_simple = [];

//console.log(geocodeposition(52.5487429714954,-1.81602098644987));


for(var i = 0 ; i < 1 ; i++ ) {
  var cit;
  var latit = Number(users[i]['latitude']);
  var longi = Number(users[i]['longitude']);


  //cit = geocodeposition(latit, longi);
  cities[i] = {};
  cities[i] = cit;
}
*/
//console.log(cities);

var Pie = '<?php echo json_encode($pieChart) ?>'
Pie = JSON.parse(Pie)

var Pie2 = '<?php echo json_encode($pieChart2) ?>'
Pie2 = JSON.parse(Pie2)



var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
  datasets: [
    {
      label               : 'Electronics',
      fillColor           : 'rgba(210, 214, 222, 1)',
      strokeColor         : 'rgba(210, 214, 222, 1)',
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: <?php echo json_encode($users_geolocated_data) ?>
    },
    {
      label               : 'Digital Goods',
      fillColor           : 'rgba(60,141,188,0.9)',
      strokeColor         : 'rgba(60,141,188,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : <?php echo json_encode($users_simple_data) ?>
    }
  ]
}






</script>
<!-- Page script -->
<script src="<?php echo base_url('dist/js/custom.js') ?>"></script>
