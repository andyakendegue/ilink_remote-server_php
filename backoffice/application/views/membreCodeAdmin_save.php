<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
function randomString1($length=10 ) 
        {
                $str = "";
                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < $length; $i++) {
                        $rand = mt_rand(0, $max);
                        $str .= $characters[$rand];
                }
                return $str;

        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ILINK-App</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('lib/font-awesome/css/font-awesome.css') ?>">

    <script src="<?php echo base_url('lib/jquery-1.7.2.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript"  src="<?php echo base_url('lib/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/ico/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/ico/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/ico/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/ico/apple-touch-icon-57-precomposed.png') ?>">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php  $s=$this->session->userdata('Email'); echo $s;?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                            <a tabindex="-1" href="">Admin</a>
                            </li>
                            <li class="divider"></li>
                              
                           <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo base_url('index.php/Login/logout') ?>">Logout</a></li>
                        </ul>
                   
                    
                </ul>
                <a class="brand" href="Member_code_admin"><span class="second">ILINK-</span> <span class="first">App.com</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a id='modal' href='#modal-container' type='button' role='button' data-toggle='modal'>Admin</a>
                <div class='modal fade' id='modal-container' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                
              <div class='modal-body'>
                <form name="form_login" action="Admin/add" method="post"  role="form">
            <fieldset>
                
              <h2>Creer un admin</h2>
              <hr class="colorgraph">
              <div class="form-group">
                
                  <input name="nm" type="text" id="username" class="form-control input-lg" value="Nom" required/>
              </div>
              <div class="form-group">
          
                  <input type="password" name="password" id="password" class="form-control input-lg" value="Password" required/>
              </div>
             <hr class="colorgraph">
              
                  
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <input type="submit" name="ad" value="Enregistrer" class="btn  btn-info "/>
                  <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
                </div>
            </fieldset>
          </form>
             
            </li>
            
           
            <li ><a href="CodesG">Codes</a></li>
            <li ><a href="Listes_admin">Listes des Utilisateurs</a></li>
            <li ><a href="Member_code_admin">Refresh</a></li>
            <li >
                <a id='modal-497394' href='#modal-container-497394' type='button' role='button' data-toggle='modal'>Ajouter</a>
			
			<div class='modal fade' id='modal-container-497394' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						
							
						<div class='modal-body'>
						  <h4 class='modal-title' id='myModalLabel'>
								Ajouter
								 <hr class='colorgraph'>
							</h4>
						
							<form action="Member_code_admin/ajdemnd" id='form-horizontal'   method='POST' >
                  
                  <div class='control-group'>
					 <label class='control-label' for='inputEmail'>CodeID</label>
					<div class='controls'>
                                            <input id='inputEmail' type='text' name='cd' class='form-control input-sm' value=''>
                                         
                                        </div>
				</div>
				
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail'>Category</label>
					<div class='controls'>
						<select id='inputEmail' type='text' name='cate' class='form-control input-sm' value='' required>
                                                    <option value='Hyper'>Hyper</option>
                                                    <option value='Superviseur'>Super</option>
                                                  </select>

					</div>
				</div>
				
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail' >Nombre d'utilisation</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='nbrcod' class='form-control input-sm' value='' required/>
					</div>
                                </div>
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail' >Numero de Telephone</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='nbrphone' class='form-control input-sm' value='' required/>
					</div>
				</div>
			<div class='control-group'>
					 <label class='control-label' for='inputEmail' >Statut</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='stat' class='form-control input-sm' value='en cours' required/>
					</div>
				</div>
           
				      <hr class='colorgraph'> 
							<input name='ajbtn' type='Submit' class='btn btn-primary' value='Sauvegarder'/>
								
							&nbsp;
							<button type='button' class='btn btn-default' data-dismiss='modal'>
								Fermer
							</button> 
   </form>
		</div>
						</div></div>
						</div>
            </li>
            <li>
            <a id='modal-2' href='#modal-container-2' type='button' data-toggle='modal'>Changer votre Mot de Passe</a>
                                <div class='modal fade' id='modal-container-2' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                
              <div class='modal-body'>
                <form name="form_login" action="Member_code_admin/mailling" method="post"  role="form">
            <fieldset>
                
              <h2>Reinitialiser votre Mot de PASSE</h2>
              <hr class="colorgraph">
              <div class="form-group">
                
                  <input name="nm" type="text" id="MAIL" class="form-control input-lg" value="Addresse Email" required/>
              </div>
              
             <hr class="colorgraph">
               <div class="col-xs-6 col-sm-6 col-md-6">
                  <input type="submit" name="smaill" value="Enregistrer" class="btn  btn-info "/>
                  <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
                </div>
            </fieldset>
          </form>
                            </div>
						</div></div>
						</div>
            </li>
            
        </ul>

        
        
    </div>
    

    
    <div class="content">
        
        <div class="header">
          <h1 class="page-title">Dashboard</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="Member_code_admin">Member Admin</a> <span class="divider">/</span></li>
            <li class="active">Dashboard</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
      
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&#10007;</button>
        <strong>Welcome to this platform </strong> Hope you like it!
    </div>

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Denieres Statistiques</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php   echo $this->db->count_all_results('users');?></p>
                        <p class="detail">Utilisateurs Simple</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $this->db->count_all_results('users_simple');?></p>
                        <p class="detail">Utilisateurs</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php  $this->db->like('Statut', 'en cours'); echo $this->db->count_all_results('demande_superviseur');?></p>
                        <p class="detail">Demande non Traite&eacute;s</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php  echo $this->db->count_all_results('codeGenerer');?></p>
                        <p class="detail">Nombre de Codes gener&eacute;s</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

</div>
    <div class="row-fluid">
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">Demandes<span class="label label-warning"><?php echo $this->db->count_all('demande_superviseur');?></span></a>
        <div id="tablewidget" class="block-body collapse in">
           <?php

$sql2 = $this->db->get('demande_superviseur');
$numrows=$sql2->num_rows();
$num = 0;
if ($numrows > 0) {
    
    
    
?>
                  
                 
              <table class="table" >
				<thead>
                                  
					<tr class='alert-info'>  
            <th>PHONE</th><th>CodeID</th><th>Category</th><th>Nmbre<br>d'utili<br>sateur</th><th>Statut</th><th class='icon-pencil'></th><th>&#10007;</th>
					</tr>
				</thead>
              
            <?php 
				
				 // output data of each row
      foreach($sql2->result() as $row) {
         $num ++;
         $member_code = randomString1(10);
         echo "<tr>
         <td class='warning'> $row->phone</td>
         <td >$row->code </td>
         <td class='warning'>$row->categorie</td>
         <td>$row->nbrecode</td>
          <td  class='warning' >$row->Statut   </td>
        <td class='warning'>
               <div class='container-fluid'>
	<div class='row'>
		<div class='col-md-12'>
			 <a id='modal-497395".$num."' href='#modal-container-497395".$num."' role='button' class='icon-pencil' data-toggle='modal'></a>
			
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
         <td class='warning'>
         <a href='#myModal-1".$num."' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
            <div class='modal small hide fade' id='myModal-1".$num."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&#10007;</button>
        <h3 id='myModalLabel'>Confirmer la suppression</h3>
    </div>
    <div class='modal-body'>
        <p class='error-text'><i class='icon-warning-sign modal-icon'></i>Voulez vous vraiment effacer</p>
    </div>
    <div class='modal-footer'>
        <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
        <a href='Member_code_admin/delete/?recordid=$row->phone' role='button' class='btn btn-danger'>
        Effacer</a>
    </div>
</div>
            </td>
          <br>
              </tr>      ";
		
     }
       
     ?>
     </table>
                                
              <?php 
	
}
     
else {
     echo "Aucune demandes!";
}                   
                ?> 
          
   
    </div>
    </div>
    
    <div class="block span6">
        <a href="#widget1container" class="block-heading" data-toggle="collapse">Codes' Table </a>
      <div id="widget1container" class="block-body collapse in">
          <?php

$sql1 = $this->db->query('SELECT * FROM codemembre');

$numrows=$sql1->num_rows();

if ($numrows > 0) {
    
    
?>
                                
        <table class="table">
				<thead>
					<tr class='alert-info'>
                <th>Code</th><th>Category</th><th>Nombre<br>de<br>Code</th><th>Phone</th><th>&#10007;</th>
					</tr>
				</thead>
				
			<?php 
				
				 // output data of each row
     foreach($sql1->result() as $row) {
     $num ++;
         echo "<tr>
        <td class='warning'> $row->code </td>
         <td >$row->categorie </td>
         <td class='warning'>$row->nbrecode</td>
          <td>$row->phone</td>
          <td class='warning'>
            <a href='#myModal-2".$num."' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
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
        <a href='Member_code_admin/suppr/?recordId=$row->phone' role='button' class='btn btn-danger'>
        Effacer</a>
    </div>
</div>

          </td>
          <br>
             </tr>  ";
		
     }

     ?>
            
                     </table>
                    
    
		</div>
	</div>
</div>

<?php 
	

}
     
else {
     echo "0 codes...";
}

$this->db->close();

?>
        </div>
    </div>


                  
                    <footer>
                        <hr>

                        
                        <p class="pull-right">A product of ILINK Company</p>

                        <p>&copy; 2016 </p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>                                    