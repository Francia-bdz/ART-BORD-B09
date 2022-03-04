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
<select name='thematique' style='padding:2px; ' >
<?php
$langue = $_REQUEST["numLang"];

if (isset($langue)) {
	$query = "SELECT numThem, libThem FROM THEMATIQUE NATURAL JOIN langue WHERE numLang= ?;" ;
	$result = $db->prepare($query);
	$result->execute([$langue]);
	$allThematiquesByLang= $result->fetchAll();

	if ($allThematiquesByLang) {
?>
			<option value='-1'>- - - Choisissez une thématique - - -</option>
<?php
			foreach($allThematiquesByLang as $row){
?>
				<option value="<?= $row['numThem']; ?>">
					<?= $row['libThem']; ?>
				</option>
<?php
			}	// End of foreach
	}else {
?>
			<option value='-1'>- - - Choisissez une thématique - - -</option>
<?php
	}	// else
}	// End of if (isset($classe))
?>
</select>