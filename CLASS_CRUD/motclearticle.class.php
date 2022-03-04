<?php
// CRUD motclearticle
// ETUD
require_once __DIR__ . '../../connect/database.php';

class motclearticle{
	function get_AllMotClesByNumArt($numArt){
		global $db;

		$query = 'SELECT * FROM motclearticle NATURAL JOIN article WHERE numArt=? ;';
		$result = $db->prepare($query);
		$result->execute([$numArt]);
		$allMotClesByNumArt = $result->fetchAll();
		return($allMotClesByNumArt);
	}

	function get_AllMotClesByLibTitrArt($libTitrArt){
		global $db;

		$query = 'SELECT * FROM motclearticle NATURAL JOIN article WHERE libTitrArt=? ;';
		$result = $db->prepare($query);
		$result->execute([$libTitrArt]);
		$allMotClesByLibTitrArt = $result->fetchAll();
		return($allMotClesByLibTitrArt);
	}

	function get_AllArtsByNumMotCle($numMotCle){
		global $db;

		$query = 'SELECT * FROM motclearticle NATURAL JOIN motcle WHERE numMotCle=? ;';
		$result = $db->prepare($query);
		$result->execute([$numMotCle]);
		$allArtsByNumMotCle = $result->fetchAll();
		return($allArtsByNumMotCle);
	}

	function get_AllArtsByLibMotCle($libMotCle){
		global $db;

		
		$query = 'SELECT * FROM motclearticle NATURAL JOIN motcle WHERE libMotCle=? ;';
		$result = $db->prepare($query);
		$result->execute([$libMotCle]);
		$allArtsByLibMotCle = $result->fetchAll();
		return($allArtsByLibMotCle);
	}

	function create($numArt, $numMotCle){
		global $db;

		try {
			$db->beginTransaction();

			$query='INSERT FROM motclearticle WHERE (numArt=? AND numMotCle=?) ';
			$request = $db->prepare($query);
			$request->execute([$numArt,$numMotCle]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert motclearticle : ' . $e->getMessage());
		}
	}

	function delete($numArt, $numMotCle){
		global $db;

		try {
			$db->beginTransaction();

			$query='DELETE FROM motclearticle WHERE (numArt=? AND numMotCle=?) ';
			$request = $db->prepare($query);
			$request->execute([$numArt,$numMotCle]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete motclearticle : ' . $e->getMessage());
		}
	}
}	// End of class
