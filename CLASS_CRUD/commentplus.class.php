<?php
// CRUD COMMENTPLUS
// ETUD
require_once __DIR__ . '../../connect/database.php';

class COMMENTPLUS{
	function get_AllCommentPlusByArticle($numArt){
		global $db;

		$query='SELECT * FROM COMMENTPLUS NATURAL JOIN ARTICLE WHERE numArt=?';
		$result = $db->query($query);
		$result->execute([$numArt]);
		return($result->fetchAll());
	}

	function get_AllCommentPlus(){
		global $db;
		$query='SELECT * FROM ARTICLE AR INNER JOIN COMMENTPLUS CP ON CP.numArt= AR.numArt INNER JOIN COMMENT CO ON CO.numSeqCom=CP.numSeqCom INNER JOIN MEMBRE ME ON CO.numMemb=ME.numMemb';
		$result = $db->query($query);
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
