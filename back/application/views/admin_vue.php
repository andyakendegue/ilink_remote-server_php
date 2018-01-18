<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Creer un compte admin</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<link rel = "stylesheet" type = "text/css" 
   href = "https://ilink-app.com/back/testt/css/bootstrap.css">
<link rel = "stylesheet" type = "text/css" 
   href = "https://ilink-app.com/back/testt/css/main.css">

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

   <script type="text/javascript"  src="https://ilink-app.com/back/testt/js/bootstrap.min.js"></script>


	
</head>
<body>
<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
       
        <br><br>
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
          <div class="row">
              
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="ad" value="Enregistrer" class="btn  btn-info "/>
              <a href='Member_code_admin'>
                 <input type='button' name='btncod'  class=' btn btn-primary' value='Back'></input></a>
			 
            </div>
            
          </div>
        </fieldset>
      </form>
      
    </div>
  </div>
</div>



</body>
</html>