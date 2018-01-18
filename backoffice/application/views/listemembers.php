
 <!-- DataTables -->
 <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">








<section class="content">
  <div class="row">


    <div class="col-md-12">
      <div class="box">
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
        <div class="box-header with-border">
          <h3 class="box-title">All the simple members</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <?php

$result=$this->db->get('users_simple');

$numrows=$result->num_rows();
$num = 0;
if ($numrows > 0) {


?>


              <table id="listeMembres" class="table table-bordered table-striped">
                  <thead>
                      <tr class="label-primary">
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>code<br> pays</th>
                          <th>Reseau</th>
                          <th>code<br> member</th>
                          <th>Mail</th>
                          <th>category</th>
                          <th>Numero de<br> telephone</th>
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

<td>  $row->firstname</td>
<td>  $row->lastname </td>
<td >$row->country_code </td>
<td>$row->network</td>
<td > $row->member_code</td>
<td>$row->email </td>
<td > $row->category</td>
<td>$row->phone</td>
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

<form action='Listes_members/modif' id='form-horizontal'   method='POST' >

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
      <a href='".$site_url."Listes_members/suppr/?recordId=".$row->phone."' role='button' class='btn btn-danger'>
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
    $(function () {
      $('#listeMembres').DataTable()

    })
  </script>
