<?php
// CRUD angle
// ETUD
require_once __DIR__ . '../../connect/database.php';

class angle{
	function get_1Angle(string $numAngl) {
		global $db;

		$query='SELECT * FROM angle NATURAL JOIN langue WHERE numAngl= ?';
		$result = $db->prepare($query);
		$result->execute([$numAngl]);
		return($result->fetch());
	}

	function get_1AngleByLang(string $numAngl) {
		global $db;

		$query='SELECT * FROM angle AN INNER JOIN LA langue ON AN.numLang=LA.numLang WHERE numAngl= ?';
		$result = $db->prepare($query);
		$result->execute([$numAngl]);
		return($result->fetch());
	}

	function get_AllAngles() {
		global $db;

		$query ='SELECT * FROM angle ORDER BY libAngl;';
		$result = $db->query($query);
		$allAngles = $result->fetchAll();
		return($allAngles);
	}

	function get_AllAnglesByLang() {
		global $db;

		$query='SELECT * FROM angle AN INNER JOIN langue LA ON AN.numLang=LA.numLang ORDER BY lib1Lang';
		$result = $db->query($query);
		$allAnglesByLang=$result->fetchAll();
		return($allAnglesByLang);
	}

	function get_NbAllAnglesBynumLang(string $numLang) {
		global $db;

		$query = 'SELECT COUNT(*) FROM angle where numLang=? ;';
		$result = $db->prepare($query);
		$result->execute([$numLang]);
		$allNbAnglesBynumLang = $result;
		return($allNbAnglesBynumLang->fetch());
	}

	//  Récupérer la prochaine PK de la table angle
	function getNextNumAngl($numLang) {
		global $db;
	
		// Découpage FK langue
		$libLangSelect = substr($numLang, 0, 4);
		$parmNumLang = $libLangSelect . '%';
	
		$requete = "SELECT MAX(numLang) AS numLang FROM angle WHERE numLang LIKE '$parmNumLang';";
		$result = $db->query($requete);
	
		if ($result) {
			$tuple = $result->fetch();
			$numLang = $tuple["numLang"];
			if (is_null($numLang)) {    // New lang dans angle
				// Récup dernière PK utilisée
				$requete = "SELECT MAX(numAngl) AS numAngl FROM angle;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numAngl = $tuple["numAngl"];
	
				$numAnglSelect = (int)substr($numAngl, 4, 2);
				// No séquence suivant langue
				$numSeq1Angl = $numAnglSelect + 1;
				// Init no séquence angle pour nouvelle lang
				$numSeq2Angl = 1;
			} else {
				// Récup dernière PK pour FK sélectionnée
				$requete = "SELECT MAX(numAngl) AS numAngl FROM angle WHERE numLang LIKE '$parmNumLang' ;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numAngl = $tuple["numAngl"];
	
				// No séquence actuel langue
				$numSeq1Angl = (int)substr($numAngl, 4, 2);
				// No séquence actuel langue
				$numSeq2Angl = (int)substr($numAngl, 6, 2);
				// No séquence suivant angle
				$numSeq2Angl++;
			}
	
			$libAnglSelect = "ANGL";
			// PK reconstituée : ANGL + no seq langue
			if ($numSeq1Angl < 10) {
				$numAngl = $libAnglSelect . "0" . $numSeq1Angl;
			} else {
				$numAngl = $libAnglSelect . $numSeq1Angl;
			}
			// PK reconstituée : ANGL + no seq langue + no seq angle
			if ($numSeq2Angl < 10) {
				$numAngl = $numAngl . "0" . $numSeq2Angl;
			} else {
				$numAngl = $numAngl . $numSeq2Angl;
			}
		}   // End of if ($result) / no seq angle
		return $numAngl;
	} // End of function

	function create(string $numAngl, string $libAngl, string $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO angle (numAngl, libAngl, numLang) VALUES (?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numAngl, $libAngl, $numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert angle : ' . $e->getMessage());
		}
	}

	function update(string $numAngl, string $libAngl, string $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE angle SET numLang=?, libAngl=? WHERE numAngl=?';
			$request = $db->prepare($query);
			$request->execute([$numLang, $libAngl, $numAngl]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update angle : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur THEMATIQUE, angle, motcle avec del
	function delete(string $numAngl){
		global $db;

		try {
			$db->beginTransaction();

			$query='DELETE FROM angle WHERE numAngl=?';
			$request = $db->prepare($query);
			$request->execute([$numAngl]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete angle : ' . $e->getMessage());
		}
	}
}		// End of class

