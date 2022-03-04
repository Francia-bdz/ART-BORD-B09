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
<select name='angle' style='padding:2px;' onchange='change2()'>
<?php
$langue = $_REQUEST["numLang"];

if (isset($langue)) {
	$query = "SELECT numAngl, libAngl FROM angle WHERE numLang = ?;" ;
	$result = $db->prepare($query);
	$result->execute([$langue]);
	$allAnglesByLang= $result->fetchAll();

	if ($allAnglesByLang) {
?>
			<option value='-1'>- - - Choisissez un angle - - -</option>
<?php
			foreach($allAnglesByLang as $row){
?>
				<option value="<?= $row['numAngl']; ?>">
					<?= $row['libAngl']; ?>
				</option>
				
				
<?php
			}	// End of foreach
	}else {
?>
			<option value='-1'>- - - Choisissez un angle - - -</option>
<?php
	}	// else
}	// End of if (isset($classe))
?>
</select>