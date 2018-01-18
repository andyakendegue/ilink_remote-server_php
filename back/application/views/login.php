<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>ILINK Login </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<link rel = "stylesheet" type = "text/css" href = "https://ilink-app.com/back/testt/css/bootstrap.css">
<link rel = "stylesheet" type = "text/css" href = "https://ilink-app.com/back/testt/css/main.css">

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript"  src="https://ilink-app.com/back/testt/js/bootstrap.min.js"></script>


</head>
<!-- NAVBAR
================================================== -->

<body>
	
<a href='https://ilink-app.com/back/testt/'  id="t"><br>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   	<img src="images/logo.png" class="img-rounded" alt="Cinque Terre" width="100" height="100"></a><br>

<div class="container">
  <div class="row" style="margin-top:20px">
  
     
  
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
       
       <form name="form_login" action="index.php/Login/validate" method="post"  role="form">
    
        <fieldset>
            
          <h2>Se Connecter</h2>
       
          <hr class="colorgraph">
          <div class="form-group">
              <input name="maill" type="text" id="username" class="form-control input-lg" value="Email" required>
          </div>
          <div class="form-group">
              <input type="password" name="password" id="password" class="form-control input-lg" value="Password" required>
          </div>
          
          
          <hr class="colorgraph">
          <div class="row">
              
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="Submit" value="Entrer" class="btn btn-sm btn-info " /> 
			 
            </div>
            
          </div>
        </fieldset>
      </form>
      
    </div>
  </div>
</div>

      





</body>
</html>
