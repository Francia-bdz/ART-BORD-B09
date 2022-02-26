<?php
// CRUD MEMBRE
// ETUD
// A tester sur Blog'Art
require_once __DIR__ . '../../CONNECT/database.php';

class MEMBRE{
	function get_1Membre($numMemb){
		global $db;

		$query='SELECT * FROM MEMBRE NATURAL JOIN STATUT WHERE numMemb= ?';
		$result = $db->prepare($query);
		$result->execute([$numMemb]);
		return($result->fetch());
	}

	function get_1MembreByEmail($eMailMemb){
		global $db;

		$query='SELECT * FROM MEMBRE NATURAL JOIN STATUT WHERE eMailMemb= ?';
		$result = $db->prepare($query);
		$result->execute([$eMailMemb]);
		return($result->fetch());
	}

	function get_AllMembres(){
		global $db;

		$query ='SELECT * FROM MEMBRE NATURAL JOIN STATUT ORDER BY numMemb;';
		$result = $db->query($query);
		$allMembres = $result->fetchAll();
		return($allMembres);
	}

	function get_ExistPseudo($pseudoMemb) {
		global $db;

		$query='SELECT * FROM MEMBRE WHERE pseudoMemb= ?';
		$request = $db->prepare($query);
		$request->execute([$pseudoMemb]);
		return($request->rowCount());
	}

	function get_AllMembersByStat() {
		global $db;

		$query ='SELECT * FROM MEMBRE NATURAL JOIN STATUT ORDER BY numMemb;';
		$result = $db->query($query);
		$allMembersByStat = $result->fetchAll();
		return($allMembersByStat);
	}

	function get_NbAllMembersByidStat($idStat){
		global $db;

		$query = 'SELECT COUNT(*) FROM MEMBRE where idStat=? ;';
		$result = $db->prepare($query);
		$result->execute([$idStat]);
		$allNbMembersByStat = $result;
		return($allNbMembersByStat->fetch());
	}

	function get_AllMembresByEmail($eMailMemb){
		global $db;

		$query='SELECT * FROM MEMBRE WHERE eMailMemb= ?';
		$result = $db->prepare($query);
		$result->execute([$eMailMemb]);
		return($result->fetchAll());
	}

	// Inscription membre
	function create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $accordMemb, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO MEMBRE (prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, idStat) VALUES (?,?,?,?,?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $accordMemb, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert MEMBRE : ' . $e->getMessage());
		}
	}

	function update($numMemb, $prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat){
		global $db;

		try {
			$db->beginTransaction();
			
				$query='UPDATE MEMBRE SET prenomMemb=?, nomMemb=?, passMemb=?, eMailMemb=?,idStat=? WHERE numMemb=?';
				$request = $db->prepare($query);
				$request->execute([$prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat, $numMemb]);
				$db->commit();
				$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update MEMBRE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur COMMENT avec del
	function delete($numMemb){
		global $db;
		
		try {
			$db->beginTransaction();

			$query='DELETE FROM MEMBRE WHERE numMemb=?';
			$request = $db->prepare($query);
			$request->execute([$numMemb]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete MEMBRE : ' . $e->getMessage());
		}
	}
}	// End of class
