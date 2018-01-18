<!-- DataTables -->
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">



      <div class="content-header">
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
          <h1>Generate Codes</h1>
      </div>


<section class="content">


      <div class="box box-danger">
        <div class="box-header with-border">
              <h3 class="box-title">Fill the form</h3>
            </div>

<div class="box-body">
            <form name="form_login"  action="<?php echo base_url('codesG/generateCode') ?>" method="post">


      <div class="row">
                      <div class="col-xs-3">
                        <input class="form-control" placeholder="Enter a number" type='text' name='c'/>
                      </div>
                      <div class="col-xs-4">
                        <input class="form-control" placeholder="Enter the member code" type='text' name='a'/>
                      </div>
                      <div class="col-xs-5">
                        <input class="btn btn-block btn-danger" name='b'  type='submit'  value='Generate'/>
                      </div>


                  </div>








  </form>
  </div>
  </div>



<div class="box">
  <div class="box-header">
              <h3 class="box-title">All Generated codes</h3>
            </div>



<div class="box-body">



  <?php

  $sql1 = $this->db->query('SELECT * FROM codeGenerer');

  $numrows=$sql1->num_rows();
  $num=0;

  if ($numrows > 0) {


  ?>

    <table id="codesGenerated" class="table table-bordered table-striped" >
      <thead>
        <tr>

             <th>ID</th>
             <th>Code</th>
             <th>Nouveau Code</th>
             <th>Statut</th>
             <th>Effacer</th>
        </tr>
      </thead>
      <tbody>
      <?php

       // output data of each row
   foreach($sql1->result() as $row) {
   $num ++;
       echo "<tr>

       <td>  $row->id</td>
       <td> $row->CodeID </td>
       <td >$row->CodeAssoc</td>
       <td>$row->Statut</td>
        <td>

          <a href='#myModal-2".$num."' role='button' data-toggle='modal'><i class='fa fa-remove'></i></a>
           <div class='modal small hide fade' id='myModal-2".$num."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&#10007;</button>
      <h3 id='myModalLabel'>Confirmer la suppression</h3>
  </div>
  <div class='modal-body'>
      <p class='error-text'><i class='icon-warning-sign modal-icon'></i>Voulez vous vraiment effacer</p>
  </div>
  <div class='modal-footer'>
      <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
      <a href='CodesG/suppr/?recordId=$row->CodeID' role='button' class='btn btn-danger'>
      Effacer</a>
  </div>
  </div>

          </td>

          </tr>   ";

   }

   ?>

  <?php
  } else {
   echo "No Datas generated";
  }

  $this->db->close();

  ?>
  </tbody>
  <tfoot>
  <tr>
    <th></th>
    <th>ID</th>
    <th>Code</th>
    <th>Nouveau Code</th>
    <th>Statut</th>
    <th>Effacer</th>
  </tr>
  </tfoot>
  </table>
  </div>

  </div>
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
    $('#codesGenerated').DataTable()

  })
</script>
