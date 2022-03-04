<?php
// CRUD commentPLUS
// ETUD
require_once __DIR__ . '../../connect/database.php';

class commentPLUS{
	function get_AllCommentPlusByArticle($numArt){
		global $db;

		$query='SELECT * FROM commentPLUS NATURAL JOIN article WHERE numArt=?';
		$result = $db->query($query);
		$result->execute([$numArt]);
		return($result->fetchAll());
	}

	function get_AllCommentPlus(){
		global $db;
		$query='SELECT * FROM article AR INNER JOIN commentPLUS CP ON CP.numArt= AR.numArt INNER JOIN comment CO ON CO.numSeqCom=CP.numSeqCom INNER JOIN membre ME ON CO.numMemb=ME.numMemb';
		$result = $db->query($query);
		return($result->fetchAll());
	}

	function create($numSeqCom, $numArt, $numSeqComR, $numArtR){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'INSERT INTO commentPLUS (numSeqCom, numArt, numSeqComR, numArtR) VALUES (?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $numSeqComR, $numArtR]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert commentPLUS : ' . $e->getMessage());
		}
	}
}	// End of class
