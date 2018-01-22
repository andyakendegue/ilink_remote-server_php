<style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */

    #map {
        min-height: 250px;
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

</style>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php

    if($alert=="ok") {

      if(!$success=="ok"){
        ?>
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Error!</h4>
                <?php echo $message; ?>
            </div>

            <?php
    } else {
      ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $message; ?>
                </div>

                <?php
    }
    }
     ?>



                    <h1>
                        Map of members
                        <small>Zoom on a specific zone to see members with details</small>
                    </h1>
                    <section class="content">
                        <div id="map"></div>

                    </section>

                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">All the members</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">

                                        <?php

$result=$this->db->get('users');

$numrows=$result->num_rows();
$num = 0;
if ($numrows > 0) {


?>


                                            <table id="listeMembres" class="table table-bordered table-striped table-modified">
                                                <thead>
                                                    <tr class="label-primary">
                                                        <th>Nom</th>
                                                        <th>Adresse</th>
                                                        <th>code<br> pays</th>
                                                        <th>Reseau</th>
                                                        <th>code membre</th>
                                                        <th>code parrain</th>
                                                        <th>code d'activation</th>
                                                        <th>Membre reseau</th>
                                                        <th>Membre du sous reseau</th>
                                                        <th>Mail</th>
                                                        <th>category</th>
                                                        <th>Numero de telephone</th>
                                                        <th>Activé</th>
                                                        <th>Modifier</th>
                                                        <th>Effacer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
$site_url = base_url();
// output data of each row
foreach($result->result() as $row) {
$num++;
echo "<tr>

<td>  $row->lastname</td>
<td>  $row->firstname </td>
<td >$row->country_code </td>
<td>$row->network</td>
<td > $row->member_code</td>
<td > $row->code_parrain</td>
<td>$row->validation_code </td>
<td>$row->mbre_reseau </td>
<td>$row->mbre_ss_reseau </td>
<td > $row->email</td>
<td > $row->category</td>
<td>$row->phone</td>
<td>$row->active</td>
<td >



<a id='modal-497395".$num."' href='#modal-container-497395".$num."' class='btn btn-app' role='button' role='button' data-toggle='modal'><i class='fa fa-edit'></i>Edit</a>

<div class='modal fade' id='modal-container-497395".$num."' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
<div class='modal-dialog'>
<div class='modal-content'>


<div class='modal-body'>
                                  <h4 class='modal-title' id='myModalLabel'>
  Modification
                                                  <hr class='colorgraph'>
</h4>

<form action='Listes_admin/modif' id='form-horizontal'   method='POST' >

<div class='control-group'>
<label class='control-label' for='inputEmail' >Nom</label>
<div class='controls'>
<input id='inputEmail' type='text' name='nm' class='form-control input-sm' value='$row->lastname'/>
</div>
</div>
<div class='control-group'>
<label class='control-label' for='inputEmail' >prenom</label>
<div class='controls'>
<input id='inputEmail' type='text' name='prnm' class='form-control input-sm' value='$row->firstname'/>
</div>

<div class='control-group'>
<label class='control-label' for='inputEmail'>Code Pays</label>
<div class='controls'>
                              <input id='inputEmail' type='text' name='cdpays' class='form-control input-sm' value='$row->country_code'/>

</div>
</div>
<div class='control-group'>
<label class='control-label' for='inputEmail'>Reseau</label>
<div class='controls'>

                              <input id='inputEmail' type='text' name='reso' class='form-control input-sm' value='$row->network'/>

</div>
</div>
<div class='control-group'>
<label class='control-label' for='inputEmail'>Code Membre</label>
<div class='controls'>
                              <input id='inputEmail' type='text' name='cmbre' class='form-control input-sm' value='$row->member_code'>

                          </div>
</div>
<div class='control-group'>
<label class='control-label' for='inputEmail'>Email</label>
<div class='controls'>
<input id='inputEmail' type='text' name='maill' class='form-control input-sm' value='$row->email'/>
</div>
</div><div class='control-group'>
<label class='control-label' for='inputEmail'>Category</label>
<div class='controls'>
<input id='inputEmail' type='text' name='cat' class='form-control input-sm' value='$row->category'/>
</div>
</div>
</div>
                  <div class='control-group'>
<label class='control-label' for='inputEmail' >Telephone</label>
<div class='controls'>
<input id='inputEmail' type='text' name='tel' class='form-control input-sm' value='$row->phone' readonly/>
</div>
</div>


<hr class='colorgraph'>
<input name='modifbtn' type='Submit' class='btn btn-primary' value='Sauvegarder'/>

&nbsp;
<button type='button' class='btn btn-default' data-dismiss='modal'>
  Fermer
</button>
</form>
</div>
</div>
</div>
</div>



</td>

<td>
<a href='#myModal-1".$num."' role='button' class='btn btn-app btn-danger' data-toggle='modal'><i class='fa fa-remove'></i>Delete</a>
<div class='modal fade' id='myModal-1".$num."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>



<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button>
      <h4 class='modal-title'>Confirmer la suppression</h4>
    </div>
    <div class='modal-body'>
      <p class='error-text'><i class='icon-warning-sign modal-icon'></i>Do you really want to delete the user". $row->phone."?</p>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
      <a href='".$site_url."Listes_admin/suppr/?recordId=".$row->phone."' role='button' class='btn btn-danger'>
      Delete</a>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




</td>
 </tr>";
}
?>


                                                        <?php
} else {
echo "1 results";
}



$this->db->close();

?>


                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Prenom</th>
                                                        <th>Nom</th>
                                                        <th>code<br> pays</th>
                                                        <th>Reseau</th>
                                                        <th>code<br> member</th>
                                                        <th>Mail</th>
                                                        <th>category</th>
                                                        <th>Numero de<br> telephone</th>
                                                        <th>Activé?</th>
                                                        <th>Modifier</th>
                                                        <th>Effacer</th>
                                                    </tr>
                                                </tfoot>
                                            </table>


                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer clearfix">
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.box -->


                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </section>
    </section>

</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>

<script>
    $(function() {
        $('#listeMembres').DataTable()

    })

</script>
<script>
    var javaScriptVar = '<?php echo json_encode($result->result()) ;?>';

    function initMap() {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('You are here.');
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }






        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: {
                lat: -28.024,
                lng: 140.887
            }
        });
        var infoWindow = new google.maps.InfoWindow({
            map: map
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
            return new google.maps.Marker({
                position: location,
                label: labels[i % labels.length]
            });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        });
    }
    var located = JSON.parse(javaScriptVar);
    var locations = [];

    for (var i = 0; i < located.length; i++) {

        //console.log(located[i]['latitude']);

        locations[i] = {}; // creates a new object
        locations[i].lat = Number(located[i]['latitude']);
        locations[i].lng = Number(located[i]['longitude']);

    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">


</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClYkvZ3XUD9EKZv3Z2BLzkr7wBoV2aQ98&callback=initMap">


</script>
