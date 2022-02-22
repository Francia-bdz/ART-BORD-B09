<?php 

<br/><br/>
<label><b>&nbsp;&nbsp;&nbsp;Quelle Angle :&nbsp;&nbsp;</b></label>
<div id='angle' style='display:inline'>
  <select size="1" name="angle" title="Sélectionnez l'angle !" style="padding:2px; border:solid 1px black; color:steelblue; border-radius:5px;">
  <option value='-1'>- - - Aucun - - -</option>
  </select>
</div>
<br /><br /><br />
<!-- FIN Listbox Angle -->

<!-- JAVA AJAX -->
<script type='text/javascript'>
function getXhr() {
  var xhr = null;
if(window.XMLHttpRequest){ // Firefox & autres
   xhr = new XMLHttpRequest();
}else
    if(window.ActiveXObject){ // IE / Edge
       try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
       }catch(e){
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
       }
    }else{
       alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
       xhr = false;
    }
return xhr;
}	// End of function

/**
* Méthode appelée sur le click du bouton/listbox
*/
function change() {
var xhr = getXhr();
// On définit quoi faire quand réponse reçue
xhr.onreadystatechange = function() {
    // test si tout est reçu et si serveur est ok
    if(xhr.readyState == 4 && xhr.status == 200){
        di = document.getElementById('angle');
        di.innerHTML = xhr.responseText;
    }
}

// Traitement en POST
xhr.open("POST","./ajaxAngle.php",true);
// pour le post
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
// poster arguments : ici, numClas
numClas = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;

// Recup numClas à classe (PK) à passer en "m" à etudiant (FK)
xhr.send("numLang="+numLang);
}	// End of function
</script>
  <!-- FIN JAVA AJAX -->

