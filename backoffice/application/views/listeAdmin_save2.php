<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
    <?php 
function randomString($length=10 ) 
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

        <script src="<?php echo base_url('lib/jquery-1.7.2.min.js" type="text/javascript') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('lib/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
        <!-- Demo page code -->

        <style type="text/css">
            #line-chart {
                height: 300px;
                width: 800px;
                margin: 0px auto;
                margin-top: 1em;
            }

            .brand {
                font-family: georgia, serif;
            }

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
                            <li><a tabindex="-1" href="">Admin</a></li>
                            <li class="divider"></li>

                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo base_url('index.php/Login/logout') ?>">Logout</a></li>
                        </ul>
                    </li>

                </ul>
                <a class="brand" href="Listes_admin"><span class="second">ILINK-</span> <span class="first">App.com</span></a>
            </div>
        </div>




        <div class="sidebar-nav">
            <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
            <ul id="dashboard-menu" class="nav nav-list collapse in">

                <li><a href="Member_code_admin">Acceuil</a></li>
                <li><a href="Listes_admin">Refresh</a></li>
                <li><a id='modal' href='#modal-container' type='button' role='button' data-toggle='modal'>Admin</a>
                    <div class='modal fade' id='modal-container' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-body'>
                                    <form name="form_login" action="Admin/add" method="post" role="form">
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
                                                <input type="submit" name="ad" value="Enregistrer" class="btn  btn-info " />
                                                <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>

                <li>
                    <a id='modal-497394' href='#modal-container-497394' type='button' role='button' data-toggle='modal'>Ajouter</a>

                    <div class='modal fade' id='modal-container-497394' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>


                                <div class='modal-body'>
                                    <h4 class='modal-title' id='myModalLabel'>
                                        Ajouter
                                        <hr class='colorgraph'>
                                    </h4>

                                    <form action="Listes_admin/ajoutbtn" id='form-horizontal' method='POST'>

                                        <div class='control-group'>
                                            <label class='control-label' for='inputEmail'>Nom</label>
                                            <div class='controls'>
                                                <input id='inputEmail' type='text' name='nm' class='form-control input-sm' required/>
                                            </div>
                                        </div>
                                        <div class='control-group'>
                                            <label class='control-label' for='inputEmail'>prenom</label>
                                            <div class='controls'>
                                                <input id='inputEmail' type='text' name='prnm' class='form-control input-sm' required/>
                                            </div>

                                            <div class='control-group'>
                                                <label class='control-label' for='inputEmail'>Code Pays</label>
                                                <div class='controls'>
                                                    <select id='inputEmail' type='text' name='cdpays' class='form-control input-sm' required>
                                                <option value='237'>237</option>
                                                <option value='241' selected>241</option>
                                                <option value='243'>243</option>
                                                <option value='245'>245</option>
                                                <option value='253'>253</option>
                                            </select>

                                                </div>
                                            </div>
                                            <div class='control-group'>
                                                <label class='control-label' for='inputEmail'>Reseau</label>
                                                <div class='controls'>

                                                    <select id='inputEmail' type='text' name='reso' class='form-control input-sm' required>
                                                    <option value='Airtel'>Airtel</option>
                                                    <option value='Asur'>Asur</option>
                                                    <option value='Libertis'>Libertis</option>
                                                    <option value='Moov'>Moov</option>
                                                    <option value='MTN'>MTN</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class='control-group'>
                                                <label class='control-label' for='inputEmail'>Code Membre</label>
                                                <div class='controls'>
                                                    <input id='inputEmail' type='text' name='cmbre' class='form-control input-sm' value=' <?php echo randomString(10);?>' />

                                                </div>
                                            </div>
                                            <div class='control-group'>
                                                <label class='control-label' for='inputEmail'>Email</label>
                                                <div class='controls'>
                                                    <input id='inputEmail' type='text' name='maill' class='form-control input-sm' required/>
                                                </div>
                                            </div>
                                            <div class='control-group'>
                                                <label class='control-label' for='inputEmail'>Category</label>
                                                <div class='controls'>
                                                    <select id='inputEmail' type='text' name='cat' class='form-control input-sm' required>
                                                    <option value='Hyper'>Hyper</option>
                                                    <option value='Superviseur'>Superviseur</option>
                                                    <option value='geolocated'>Geolocated</option>
                                                  </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class='control-group'>
                                            <label class='control-label' for='inputEmail'>Telephone</label>
                                            <div class='controls'>
                                                <input id='inputEmail' type='text' name='tel' class='form-control input-sm' required/>
                                            </div>
                                        </div>


                                        <hr class='colorgraph'>
                                        <input name='ajbtn' type='Submit' class='btn btn-primary' value='Sauvegarder' /> &nbsp;
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>
								Fermer
							</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <a id='modal-2' href='#modal-container-2' type='button' data-toggle='modal'>Changer votre Mot de Passe</a>
                    <div class='modal fade' id='modal-container-2' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-body'>
                                    <form name="form_login" action="Admin/add" method="post" role="form">
                                        <fieldset>

                                            <h2>Reinitialiser votre Mot de PASSE</h2>
                                            <hr class="colorgraph">
                                            <div class="form-group">

                                                <input name="nm" type="text" id="MAIL" class="form-control input-lg" value="addresse Email" required/>
                                            </div>

                                            <hr class="colorgraph">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <input type="submit" name="ad" value="Enregistrer" class="btn  btn-info " />
                                                <button class='btn' data-dismiss='modal' aria-hidden='true'>Annuler</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>



        </div>


        <div class="content">

            <div class="header">
                <h2 class="page-title">Generer des Utilisateurs</h2>
            </div>

            <ul class="breadcrumb">
                <li><a href="Listes_admin">Listes d'Utilisateurs</a> <span class="divider">/</span></li>
                <li class="active">Utilisateurs</li>&nbsp;<span class="label label-warning"><?php echo $this->db->count_all('users');?></span>
                <li>

                    <form name="" action="Search" method="post" role="form" class="form-inline">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="cherch" value="Rechercher" class="btn btn-sm btn-info " />
                        <input name="searchbtn" type="text" id="username" class=" input-sm" value="" required />&nbsp;

                    </form>
                </li>
            </ul>


            <div class="container-fluid">
                <div class="row-fluid">
                    <?php

$result=$this->db->get('users');

$numrows=$result->num_rows();
$num = 0;
if ($numrows > 0) {
    
    
?>


                        <table class="table" width='800'>
                            <thead>
                                <tr class="label-info">
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
				
				 // output data of each row
     foreach($result->result() as $row) {
         $num++;
         echo "<tr>
         
         <td>  $row->firstname</td>
         <td class='active'>  $row->lastname </td>
         <td >$row->country_code </td>
         <td class='label-active'>$row->network</td>
         <td > $row->member_code</td>
         <td class='label-active'>$row->email </td>
         <td > $row->category</td>
         <td class='label-active'>$row->phone</td>
        <td >
       
            <div class='container-fluid'>
	<div class='row'>
		<div class='col-md-12'>
			 <a id='modal-497395".$num."' href='#modal-container-497395".$num."' role='button' class='icon-pencil' role='button' data-toggle='modal'></a>
			
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
				
			</div>
			
  
       
      </td>
      
        <td class='active'>
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
        <a <a href='Listes_admin/suppr/?recordId=$row->phone' role='button' class='btn btn-danger'>
        Effacer</a>
    </div>
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



                        </table>






                        <footer>
                            <hr>


                            <p class="pull-right">A product of ILINK Company</p>

                            <p>&copy; 2016 </p>
                        </footer>



                        <script src="<?php echo base_url('lib/bootstrap/js/bootstrap.js') ?>"></script>
                        <script type="text/javascript">
                            $("[rel=tooltip]").tooltip();
                            $(function() {
                                $('.demo-cancel-click').click(function() {
                                    return false;
                                });
                            });

                        </script>
                </div>
            </div>
        </div>


    </body>

    </html>
