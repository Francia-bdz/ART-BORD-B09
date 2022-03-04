<?php
/*
*   Script : ajaxEtudiant.php
*   Example : 2 listbox dynamiques liées via AJAX
*/
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
// connexion
require_once __DIR__ . '/../../connect/database.php';
?>
<select name='commentaire' style='padding:2px;'>
<?php
$article = $_REQUEST["numArt"];

if (isset($article)) {
	$query = "SELECT numSeqCom, libCom FROM COMMENT WHERE numArt = ?;" ;
	$result = $db->prepare($query);
	$result->execute([$article]);
	$allCommentairesByArt= $result->fetchAll();

	if ($allCommentairesByArt) {
?>
			<option value='-1'>- - - Choisissez un commentaire- - -</option>
<?php
			foreach($allCommentairesByArt as $row){
?>
				<option value="<?= $row['numSeqCom']; ?>">
					<?= $row['libCom']; ?>
				</option>
				
				
<?php
			}	// End of foreach
	}else {
?>
			<option value='-1'>- - - Choisissez un commentaire - - -</option>
<?php
	}	// else
}	// End of if (isset($classe))
?>
</select>