<?
if (!u()){
?>

<link rel="stylesheet" href="//<?php echo $_SERVER['SERVER_NAME']?>/template/boot/css/login.css">
<!-- Login -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="//<?php echo $_SERVER['SERVER_NAME']?>/template/boot/js/login.js"></script>
<!-- login -->
	<div class="signin-form">

 <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading"><?php
    echo $_SESSION[ERROR]?$_SESSION[ERROR]:"Base Registratie"; //show our sesion error above the login form
$_SESSION[ERROR]="";
	?></h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="username" class="form-control" placeholder="Gebruiker" name="username" id="username" />
        <span id="check-username"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Inloggen
   </button> 
        </div>  
      
      </form>

    </div>
    
</div>
<?php
}
if (u())
{
echo "<h1>".$_SESSION[ERROR]."</h1>";
$_SESSION[ERROR] ="";
?>
Welkom , je bent ingelogt als gebruiker , anders zie je deze pagina niet<br><br>
kijk naar <a href="../example">Voorbeeld</a> om een voorbeeld te zien van groepen
<?
}// Einde start sessie
?>

