<?php
// CRUD statut

require_once __DIR__ . '../../connect/database.php';

class statut{
	function get_1Statut($idStat){
		global $db;

		$query='SELECT * FROM statut WHERE idStat= ?';
		$request = $db->prepare($query);
		$request->execute([$idStat]);
		return($request->fetch());
	}

	function get_AllStatuts(){
		global $db;
		$query ='SELECT * FROM statut;';
		$result = $db->query($query);
		$allStatuts= $result->fetchAll();
		return($allStatuts);
	}

	function create($libStat){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO statut(libStat) VALUES (?)';
			$request = $db->prepare($query);
			$request->execute([$libStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert statut : ' . $e->getMessage());
		}
	}

	function update($idStat, $libStat){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE statut SET libStat=? WHERE idStat=?';
			$request = $db->prepare($query);
			$request->execute([$libStat, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update statut : ' . $e->getMessage());
		}
	}

	function delete($idStat){
		global $db;
		
		try {
			$db->beginTransaction();

			$query='DELETE FROM statut WHERE idStat=?';
			$request = $db->prepare($query);
			$request->execute([$idStat]);
			$count = $request->rowCount(); //
			$db->commit();
			$request->closeCursor();
			return($count); //
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete statut : ' . $e->getMessage());
		}
	}
}	// End of class
