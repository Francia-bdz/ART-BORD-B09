<?php
// CRUD langue
// ETUD
require_once __DIR__ . '../../connect/database.php';

class langue{
	function get_1Langue($numLang){
		global $db;
		
		$query='SELECT * FROM langue NATURAL JOIN PAYS WHERE numLang= ?';
		$request = $db->prepare($query);
		$request->execute([$numLang]);
		return($request->fetch());
	}

	function get_1LangueByPays($numLang){
		global $db;

		$query = 'SELECT * FROM langue ET INNER JOIN PAYS CL ON ET.numLang = CL.numLang WHERE numLang = ?;';
		$result = $db->prepare($query);
		$result->execute([$numLang]);
		return($result->fetch());
	}

	function get_AllLangues(){
		global $db;
		
		$query ='SELECT * FROM langue NATURAL JOIN PAYS;';
		$result = $db->query($query);
		$allLangues = $result->fetchAll();
		return($allLangues);
	}

	function get_AllLanguesByPays(){
		global $db;

		$query = 'SELECT * FROM langue LA INNER JOIN PAYS PA ON LA.numPays = PA.numPays;';
		$result = $db->query($query);
		$allLanguesByPays = $result->fetchAll();
		return($allLanguesByPays);
	}

	function get_AllLanguesByLib1Lang(){
		global $db;
		$query = 'SELECT * FROM langue ORDER BY lib1Lang;';
		$result = $db->query($query);
		$allLanguesByLib1Lang = $result->fetchAll();
		return($allLanguesByLib1Lang);
	}

	// Récup dernière PK NumLang
	function getNextNumLang($numPays) {
		global $db;
	
		// Les 4 premiers caractères de la PK concernent le pays
		// les 4 suivants représentent un numéro de séquence
		// Récup dernière PK utilisée pour le pays concerné
		$numPaysSelect = $numPays;  // exemple : 'CHIN'
		$parmNumLang = $numPaysSelect . '%';
	
		$requete = "SELECT MAX(numLang) AS numLang FROM langue WHERE numLang LIKE '$parmNumLang';";
	
		$result = $db->query($requete);
	
		$numSeqLang = 0;
		if ($result) {
			// Récup résultat requête
			$tuple = $result->fetch();
			$numLang = $tuple["numLang"];
			if (is_null($numLang)) {
				$numLang = 0;
				$strLang = $numPaysSelect;
			} else {
				// Récup dernière PK attribuée
				$numLang = $tuple["numLang"];
				$strLang = substr($numLang, 0, 4);
				$numSeqLang = (int)substr($numLang, 4);
			}
			$numSeqLang++;
	
			// PK reconstituée
			if ($numSeqLang < 10) {
				$numLang = $strLang . "0" . $numSeqLang;
			} else {
				$numLang = $strLang . $numSeqLang;
			}
		}   // End of if ($result)
	
		return $numLang;
	} // End of function

	function create($numLang, $lib1Lang, $lib2Lang, $numPays){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO langue (numLang, lib1Lang, lib2Lang, numPays) VALUES (?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert langue : ' . $e->getMessage());
		}
	}

	function update($numLang, $lib1Lang, $lib2Lang, $numPays){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE langue SET lib1Lang=?, lib2Lang=?, numPays=? WHERE numLang=?';
			$request = $db->prepare($query);
			$request->execute([$lib1Lang,$lib2Lang,$numPays,$numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update langue : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur THEMATIQUE, angle, motcle avec del
	function delete($numLang){
		global $db;

		try {
			$db->beginTransaction();
			$query='DELETE FROM langue WHERE numLang=?';
			$request = $db->prepare($query);
			$request->execute([$numLang]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete langue : ' . $e->getMessage());
		}
	}
}	// End of class

class PAYS{
	function get_AllPays(){
		global $db;

		$query = 'SELECT * FROM PAYS;';
		$result = $db->query($query);
		$allPays = $result->fetchAll();
		return($allPays);
	}

	function get_1Pays($numPays){
		global $db;


		$query='SELECT * FROM PAYS WHERE numPays= ?';
		$request = $db->prepare($query);
		$request->execute([$numPays]);
		return($request->fetch());
	}
}
