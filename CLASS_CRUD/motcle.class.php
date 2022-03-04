<?php
// CRUD motcle
// ETUD
require_once __DIR__ . '../../connect/database.php';

class motcle{
	function get_1MotCle($numMotCle){
		global $db;

		$query='SELECT * FROM motcle NATURAL JOIN langue WHERE numMotCle= ?';
		$request = $db->prepare($query);
		$request->execute([$numMotCle]);
		return($request->fetch());
	}

	function get_1MotCleByLang($numMotCle){
		global $db;

		$query='SELECT * FROM motcle NATURAL JOIN langue WHERE numLang= ?';
		$request = $db->prepare($query);
		$request->execute([$numMotCle]);
		return($request->fetch());
	}

	function get_AllMotCles(){
		global $db;

		$query ='SELECT * FROM motcle NATURAL JOIN langue ORDER BY numMotCle;';
		$result = $db->query($query);
		$allMotCles = $result->fetchAll();
		return($allMotCles);
	}

	function get_AllMotsClesByLang(){
		global $db;

		$query='SELECT * FROM motcle NATURAL JOIN langue ORDER BY lib1Lang';
		$result = $db->query($query);
		$allMotsClesByLang=$result->fetchAll();
		return($allMotsClesByLang);
	}

	function get_NbAllMotsClesBynumLang($numLang){
		global $db;

		$query = 'SELECT COUNT(*) FROM motcle where numLang=? ;';
		$result = $db->prepare($query);
		$result->execute([$numLang]);
		$allNbMotsClesBynumLang = $result;	
		return($allNbMotsClesBynumLang->fetch());
	}

	// Sortir mots clés déjà sélectionnés dans motcle (TJ) dans article
	// ppour le drag and drop
	function get_MotsClesNotSelect($listNumMotcles) {
		global $db;

		/*
		Pour numArt = 1 :
		SELECT numMotCle, libMotCle FROM motcle WHERE numMotCle NOT IN (1, 6, 8, 9, 10, 11, 12, 13);
		*/
		// Recherche mot clé (INNER JOIN) dans tables motclearticle
		$textQuery = 'SELECT numMotCle, libMotCle FROM motcle WHERE numMotCle NOT IN (' . $listNumMotcles . ');';
		$result = $db->prepare($textQuery);
		$result->execute([$listNumMotcles]);
		$allMotsClesNotSelect = $result->fetchAll();
		return($allMotsClesNotSelect);
	}

	// Récupérer next PK de la table motcle
	function getNextNumMotCle($numLang) {
		global $db;
	
		// Découpage FK langue
		$libLangSelect = substr($numLang, 0, 4);
		$parmNumLang = $libLangSelect . '%';
	
		$requete = "SELECT MAX(numLang) AS numLang FROM motcle WHERE numLang LIKE '$parmNumLang';";
		$result = $db->query($requete);
	
		if ($result) {
			$tuple = $result->fetch();
			$numLang = $tuple["numLang"];
			if (is_null($numLang)) {    // New lang dans motcle
				// Récup dernière PK utilisée
				$requete = "SELECT MAX(numMotCle) AS numMotCle FROM motcle;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numMotCle = $tuple["numMot"];
	
				$numMotCleSelect = (int)substr($numMotCle, 4, 2);
				// No séquence suivant langue
				$numSeq1MotCle = $numMotCleSelect + 1;
				// Init no séquence motcle pour nouvelle lang
				$numSeq2MotCle = 1;
			} else {
				// Récup dernière PK pour FK sélectionnée
				$requete = "SELECT MAX(numMotCle) AS numMot FROM motcle WHERE numLang LIKE '$parmNumLang';";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numMotCle = $tuple["numMotCle"];
	
				// No séquence actuel langue
				$numSeq1MotCle = (int)substr($numMotCle, 4, 2);
				// No séquence actuel motcle
				$numSeq2MotCle = (int)substr($numMotCle, 6, 2);
				// No séquence suivant motcle
				$numSeq2MotCle++;
			}
	
			$libMotCleSelect = "MTCL";
			// PK reconstituée : MTCL + no seq langue
			if ($numSeq1MotCle < 10) {
				$numMotCle = $libMotCleSelect . "0" . $numSeq1MotCle;
			} else {
				$numMotCle = $libMotCleSelect . $numSeq1MotCle;
			}
			// PK reconstituée : MOCL + no seq langue + no seq mot clé
			if ($numSeq2MotCle < 10) {
				$numMotCle = $numMotCle . "0" . $numSeq2MotCle;
			} else {
				$numMotCle = $numMotCle . $numSeq2MotCle;
			}
		}   // End of if ($result) / no seq langue
		return $numMotCle;
	} // End of function

	function create($libMotCle, $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO motcle (libMotCle, numLang) VALUES (?,?)';
			$request = $db->prepare($query);
			$request->execute([$libMotCle, $numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert motcle : ' . $e->getMessage());
		}
	}

	function update($numMotCle, $libMotCle, $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE motcle SET libMotCle=?, numLang=? WHERE numMotCle=?';
			$request = $db->prepare($query);
			$request->execute([$libMotCle, $numLang, $numMotCle]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update motcle : ' . $e->getMessage());
		}
	}

	function delete($numMotCle){
		global $db;
		
		try {
			$db->beginTransaction();

			$query='DELETE FROM motcle WHERE numMotCle=?';
			$request = $db->prepare($query);
			$request->execute([$numMotCle]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete motcle : ' . $e->getMessage());
		}
	}
}	// End of class
