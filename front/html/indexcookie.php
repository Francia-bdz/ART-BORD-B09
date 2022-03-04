<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
	<title>Système des cookies</title>
    <!-- <link href="./css/style.css" rel="stylesheet" type="text/css" /> -->


    <!-- CSS -->
    <style type="text/css">

        
    .cookie-alert{
   position: fixed;
   bottom: 20px;
   right:20px;
   border-radius: 10px;
   background:#2f2f2f;
   color:#fff;
   padding:10px 15px;
   width:280px;
   z-index:100;
}
.cookie-alert a{
   display:block;
   text-align: center;
   padding:5px 10px;
   margin:8px auto 0 auto;
   border-radius: 10px;
   background:transparent;
   border: 2px solid #46A2D9;
   color:#46A2D9;
   transition: all .3s ease;
}
.cookie-alert a:hover{
   background: #46A2D9;
   color:#2f2f2f;
}
@media only screen and (max-width:480px){
   .cookie-alert{
      text-align: center;
      left: 0; right: 0;;
      margin: 0 auto;
      max-width:700px;
      padding:10px 30px;
   }
}

</style>


</head>
<body>
	<h1>Système des cookies</h1>
	<form method="POST" action="#">
		 Username : <input type="text" name="username" />
		 Password : <input type="password" name="password" /> <br/><br/>
		 <input type="submit" value="Login" />
	</form><br/>
<?php
	session_start();
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset ($_SESSION['message']);
	}
?>
	<hr/>
	<h3>Les comptes utilisateurs possibles sont les suivants :</h3>
	<h4>login : michou Pass : 12345<br>
		login : julie Pass : 12345</h4>
<?php
require_once('./footercookie.php');
?>
</body>
</html>