<?php
// CRUD COMMENTPLUS
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class COMMENTPLUS{
	function get_AllCommentPlusByArticle($numArt){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetchAll());
	}

	function get_AllCommentPlusR(){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetchAll());
	}

	function create($numSeqCom, $numArt, $numSeqComR, $numArtR){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'INSERT INTO COMMENTPLUS (numSeqCom, numArt, numSeqComR, numArtR) VALUES (?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $numSeqComR, $numArtR]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert COMMENTPLUS : ' . $e->getMessage());
		}
	}
}	// End of class
