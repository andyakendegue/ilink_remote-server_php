<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ilink-App</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="https://ilink-app.com/back/testt/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://ilink-app.com/back/testt/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://ilink-app.com/back/testt/stylesheets/theme.css">
    <link rel="stylesheet" href="https://ilink-app.com/back/testt/lib/font-awesome/css/font-awesome.css">

    <script src="https://ilink-app.com/back/testt/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script type="text/javascript"  src="https://ilink-app.com/back/testt/lib/lib/bootstrap/js/bootstrap.min.js"></script>
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
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
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
                            <li><a tabindex="-1" href="">Admin</a></li>
                            <li class="divider"></li>
                          
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="https://ilink-app.com/back/testt/index.php/Login/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="CodesG"><span class="second">ILINK-</span> <span class="first">App.com</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
             <li ><a href="CodesG">Refresh</a></li>  
            <li ><a href="Admin">Mot de Passe</a></li>
            
            <li >
                <a id='modal-497394' href='#modal-container-497394' type='button' role='button' data-toggle='modal'>Ajouter</a>
			
			<div class='modal fade' id='modal-container-497394' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						
							
						<div class='modal-body'>
						  <h4 class='modal-title' id='myModalLabel'>
								Ajouter une Demande
								 <hr class='colorgraph'>
							</h4>
						
							<form action="Member_code/ajdemnd" id='form-horizontal'   method='POST' >
                  
                  <div class='control-group'>
					 <label class='control-label' for='inputEmail'>CodeID</label>
					<div class='controls'>
                                            <input id='inputEmail' type='text' name='cd' class='form-control input-sm' value=''>
                                         
                                        </div>
				</div>
				
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail'>Category</label>
					<div class='controls'>
						<select id='inputEmail' type='text' name='cate' class='form-control input-sm' value=''>
                                                    <option value='Hyper'>Hyper</option>
                                                    <option value='Superviseur'>Super</option>
                                                    <option value='Superviseur'>Geolocated</option>
                                                  </select>

					</div>
				</div>
				
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail' >Nombre d'utilisation</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='nbrcod' class='form-control input-sm' value=''/>
					</div>
                                </div>
                                <div class='control-group'>
					 <label class='control-label' for='inputEmail' >Numero de Telephone</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='nbrphone' class='form-control input-sm' value=''/>
					</div>
				</div>
			<div class='control-group'>
					 <label class='control-label' for='inputEmail' >Statut</label>
					<div class='controls'>
						<input id='inputEmail' type='text' name='stat' class='form-control input-sm' value='en cours'/>
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
            <?php 
       if($this->input->post('btnretour'))
		{    
      $t="";
      $t=$this->session->userdata('Email');
      $query= $this->db->query("SELECT * FROM membres WHERE EMAIL='$t'");
      
      $numrows=$query->num_rows();
      if($numrows!=0)
      {
      foreach ($query->result_array() as $row)
      {
        $d=$row['Email'];
        $c=$row['category'];
      }
      $simple="simple";
      $super="super";
      if($t==$d && $c==$simple){
      redirect('https://ilink-app.com/back/testt/index.php/Member_code');
      }
      else{
       redirect('https://ilink-app.com/back/testt/index.php/Member_code_admin');
      }
      }
     }
     
?>
            
        </ul>

        
        
    </div>
    
    
    <div class="content">
        
        <div class="header">
            <h2 class="page-title">Generer des Codes</h2>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="CodeG">Codes</a> <span class="divider">/</span></li>
            <li class="active">Utilisateurs</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
 <form name="form_login"  action="CodesG/codes" method="post"  role="form">
        
       <h2>Remplissez le formulaire</h2>
          <hr class="colorgraph">
          Entrer un chiffre:
     <input id='inputEmail' type='text' name='c' class='form-control input-sm' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     Entrer votre code ID:
     <input id='inputEmail' type='text' name='a' class='form-control input-sm' />
     
    <hr class='colorgraph'> 
    <input name='b'  type='submit' class='btn btn-primary' value='Codes'/>&nbsp;&nbsp;
  
    <input type='submit' name='btnback'  class=' btn btn-primary' value='Retour'></input></a>
    
 
  </form>
 

        
<?php

$sql1 = $this->db->query('SELECT * FROM codeGenerer');

$numrows=$sql1->num_rows();
$num=0;

if ($numrows > 0) {
    
    
?>
                                
                    <table class="table" class="form-control"><h1>Table des CODES</h1>
				<thead>
					<tr class="label-info">
               <th>ID</th><th>Code</th><th>Nouveau Code</th><th>Statut</th><th>Effacer</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				
				 // output data of each row
     foreach($sql1->result() as $row) {
     $num ++;
         echo "<tr>
         
         <td>  $row->id</td>
         <td class='warning'> $row->CodeID </td>
         <td >$row->CodeAssoc</td>
         <td class='warning'>$row->Statut</td>
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
        <a href='CodesG/suppr/?recordId=$row->CodeID' role='button' class='btn btn-danger'>
        Effacer</a>
    </div>
</div>
            
            </td>
         
            </tr>   ";
		
     }

     ?>
 
<?php 
}
     
else {
     echo "0 codes...";
}

$this->db->close();

?> 

 </table>

                    
                   
                    
       
     <footer>
                        <footer>
                        <hr>

                        
                        <p class="pull-right">A product of ILINK Company</p>

                        <p>&copy; 2016 </p>
                    </footer>
      </footer>
      

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    </div>
    </div>
    </div>
    </div>
  </body>
</html>

