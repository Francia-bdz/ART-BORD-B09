<?php
// CRUD LIKECOM
// ETUD
require_once __DIR__ . '../../connect/database.php';

class LIKECOM{
	function get_1LikeCom($numMemb, $numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM LIKECOM WHERE (numMemb= ? AND numSeqCom=? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numMemb,$numSeqCom ,$numArt]);
		return($result->fetch());
	}

	function get_1LikeComPlusMemb($numMemb, $numSeqCom, $numArt){
		
		global $db;
	
		$query='SELECT * FROM LIKECOM NATURAL JOIN membre WHERE (numMemb= ? AND numSeqCom=? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numMemb,$numSeqCom ,$numArt]);
		return($result->fetch());
	}

	function get_1LikeComPlusCom($numMemb, $numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM LIKECOM NATURAL JOIN COMMENT WHERE (numMemb= ? AND numSeqCom=? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numMemb,$numSeqCom ,$numArt]);
		return($result->fetch());
	}

	function get_1LikeComPlusArt($numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM LIKECOM NATURAL JOIN ARTICLE WHERE (numSeqCom=? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numSeqCom ,$numArt]);
		return($result->fetch());
	}

	function get_AllLikesCom(){
		global $db;

		$query ='SELECT * FROM membre ME INNER JOIN LIKECOM LKC ON ME.numMemb = LKC.numMemb INNER JOIN ARTICLE ART ON LKC.numArt = ART.numArt INNER JOIN COMMENT CO ON CO.numSeqCom=LKC.numSeqCom;';
		$result = $db->query($query);
		$allLikesCom = $result->fetchAll();
		return($allLikesCom);
	}

	function get_AllLikesComByComment($numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM LIKECOM WHERE (numSeqCom=? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numSeqCom, $numArt]);
		return($result->fetchAll());
	}

	function get_AllLikesComByMembre($numMemb){
		global $db;

		$query='SELECT * FROM LIKECOM NATURAL JOIN membre WHERE numMemb=?';
		$result = $db->prepare($query);
		$result->execute([$numMemb]);
		return($result->fetchAll());
	}

	function create($numMemb, $numSeqCom, $numArt, $likeC){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO LIKECOM (numMemb, numSeqCom, numArt, likeC) VALUES (?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb, $numSeqCom, $numArt, $likeC]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert LIKECOM : ' . $e->getMessage());
		}
	}

	function update($numMemb, $numSeqCom, $numArt, $likeC){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE LIKECOM SET numSeqCom=?, numArt=?, likeC=? WHERE numMemb=?';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $likeC, $numMemb]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update LIKECOM : ' . $e->getMessage());
		}
	}

	// Create et Update en même temps
	function createOrUpdate($numMemb, $numSeqCom, $numArt){
		global $db;

		try {
			$db->beginTransaction();

			$query='INSERT OR UPDATE LIKECOM WHERE (numMemb=? AND numSeqCom=? AND numArt=?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb,$numSeqCom,$numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert Or Update LIKECOM : ' . $e->getMessage());
		}
	}

	// AUTORISE UNIQUEMENT POUR le super-admin / admin
	function delete($numMemb, $numSeqCom, $numArt){
		global $db;
		
		try {
			$db->beginTransaction();

			$query='DELETE FROM LIKECOM WHERE (numMemb=? AND numSeqCom=? AND numArt=?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb, $numSeqCom,$numArt]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete LIKECOM : ' . $e->getMessage());
		}
	}
}	// End of class
