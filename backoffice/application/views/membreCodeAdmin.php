<link rel="stylesheet" href="<?php echo base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
    $site_url = base_url();

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
                        Unvalidated and validated codes
                        <small>on demand manipulation</small>
                    </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Codes demand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php

 $sql2 = $this->db->get('demande_superviseur');
 $numrows=$sql2->num_rows();
 $num = 3000;
 if ($numrows > 0) {



 ?>
                            <table id="validated" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>PHONE</th>
                                        <th>CodeID</th>
                                        <th>Category</th>
                                        <th>Nmbre<br>d'utili<br>sateur</th>
                                        <th>Statut</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

 				 // output data of each row
       foreach($sql2->result() as $row) {
          $num ++;
          //$member_code = randomString1(10);
          echo "<tr>
          <td> $row->phone</td>
          <td >$row->code </td>
          <td>$row->categorie</td>
          <td>$row->nbrecode</td>
           <td >$row->Statut   </td>
         <td>
                <div class='container-fluid'>
 	<div class='row'>
 		<div class='col-md-12'>
 			 <a id='modal-497395".$num."' href='#modal-container-497395".$num."' class='btn btn-block btn-primary' role='button' data-toggle='modal'><i class='fa fa-edit'></i></a>

 			<div class='modal fade' id='modal-container-497395".$num."' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
 				<div class='modal-dialog'>
 					<div class='modal-content'>


 						<div class='modal-body'>
                                                 <h4 class='modal-title' id='myModalLabel'>
 								<p  style='text-align:center; font-family:myriam pro;
                                                                             font-size:22pt; color:gray'>Generation de Codes
                                                                 <hr class='colorgraph'>
 							</h4>

 							<form action='Member_code_admin/enregist' id='form-horizontal'   method='POST' >

 				<div class='control-group'>
 					 <label class='control-label' for='inputEmail'>CodeID</label>
 					<div class='controls'>
                                             <input id='inputEmail' type='text' name='cd' class='form-control input-sm' value='$row->code'>

                                         </div>
 				</div>

                                 <div class='control-group'>
 					 <label class='control-label' for='inputEmail'>Category</label>
 					<div class='controls'>
 						<select id='inputEmail' type='text' name='cate' class='form-control input-sm' value='$row->categorie'>
                                                     <option value='Hyper'>Hyper</option>
                                                     <option value='Superviseur'>Super</option>
                                                   </select>

 					</div>
 				</div>

                                 <div class='control-group'>
 					 <label class='control-label' for='inputEmail' >Nombre d'utilisation</label>
 					<div class='controls'>
 						<input id='inputEmail' type='text' name='nbrcod' class='form-control input-sm' value='$row->nbrecode'/>
 					</div>
                                 </div>
                                 <div class='control-group'>
 					 <label class='control-label' for='inputEmail' >Numero de Telephone</label>
 					<div class='controls'>
 						<input id='inputEmail' type='text' name='nbrphone' class='form-control input-sm' value='$row->phone'/>
 					</div>
 				</div>
 			<div class='control-group'>
 					 <label class='control-label' for='inputEmail' >Statue</label>
 					<div class='controls'>
 						<input id='inputEmail' type='text' name='stat' class='form-control input-sm' value='traiter'/>
 					</div>
 				</div>

 						<hr class='colorgraph'>
 							<input type='submit' name='enrig' class='btn btn-primary' value='Enregistrer'/>
 							&nbsp;
 							<button type='button' class='btn btn-default' data-dismiss='modal'>
 								Fermer
 							</button>
 							</form>

 						</div>
 						</div>
 					</div>

 				</div>

 			</div>


          </td>
          <td>
          <a href='#myModal-1".$num."' role='button' class='btn btn-block btn-danger' data-toggle='modal'><i class='fa fa-remove'></i></a>
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
           <a href='".$site_url."Member_code_admin/delete/?recordId=".$row->phone."' role='button' class='btn btn-danger'>
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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>PHONE</th>
                                        <th>CodeID</th>
                                        <th>Category</th>
                                        <th>Nmbre<br>d'utili<br>sateur</th>
                                        <th>Statut</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>

                            <?php

 }

 else {
      echo "Aucune demandes!";
 }
                 ?>




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-xs-6">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Validated codes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php

  $sql1 = $this->db->query('SELECT * FROM codemembre');

  $numrows=$sql1->num_rows();
  $num = 0;

  if ($numrows > 0) {
  ?>

                            <table id="unvalidated" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Nombre<br>de<br>Code</th>
                                        <th>Phone</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

           // output data of each row
       foreach($sql1->result() as $row) {
       $num ++;
           echo "<tr>
          <td> $row->code </td>
           <td>$row->categorie </td>
           <td>$row->nbrecode</td>
            <td>$row->phone</td>
            <td>
              <a href='#myModal-2".$num."' role='button' class='btn btn-block btn-danger' data-toggle='modal'><i class='fa fa-remove'></i></a>
               <div class='modal smallfade' id='myModal-2".$num."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>



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
            <a href='".$site_url."Member_code_admin/suppress/?recordId=".$row->phone."' role='button' class='btn btn-danger'>
            Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->

  </div>

            </td>

               </tr>  ";

       }

       ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Nombre<br>de<br>Code</th>
                                        <th>Phone</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>


                    </div>
                </div>
            </div>

            <?php


  }

  else {
       echo "No validated members...";
  }

  $this->db->close();

  ?>





        </div>
        <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->


</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>
<script>
    $(function() {
        $('#unvalidated').DataTable()
        $('#validated').DataTable()

    })

</script>
