<?php
if(isset($_COOKIE['accept_cookie'])){
   $showCookie = false;
}else{
   $showCookie = true;
}
require_once('./footer.php');
?>

<?php 
if($showCookie){
?>
   <div class="cookie-alert">
      En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies nous permettant de vous proposer des contenus et services adaptés à vos centres d’intérêts.<br />
      <a href="./php/acceptCookie.php">J'accepte</a>
   </div>
<?php 
}
