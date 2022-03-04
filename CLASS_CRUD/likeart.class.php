<?php
// CRUD likeart
// ETUD
require_once __DIR__ . '../../connect/database.php';

class likeart{
	function get_1LikeArt($numMemb, $numArt){
		global $db;

		$query='SELECT * FROM likeart WHERE (numMemb= ? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numMemb, $numArt]);
		return($result->fetch());
	}

	function get_AllLikesArt(){
		global $db;
		$query ='SELECT * FROM likeart;';
		$result = $db->query($query);
		$allLikesArt = $result->fetchAll();
		return($allLikesArt);
	}

	function get_AllLikesArtByNumArt(){
		global $db;

		$query = 'SELECT * FROM membre ME INNER JOIN likeart LKA ON ME.numMemb = LKA.numMemb INNER JOIN ARTICLE ART ON LKA.numArt = ART.numArt ;';
		$result = $db->query($query);
		$allLikesArtByNumArt = $result->fetchAll();
		return($allLikesArtByNumArt);
	}

	function get_AllLikesArtByNumMemb(){
		global $db;

		$query = 'SELECT * FROM membre ME INNER JOIN likeart LKA ON ME.numMemb = LKA.numMemb INNER JOIN ARTICLE ART ON LKA.numArt = ART.numArt ;';
		$result = $db->query($query);
		$allLikesArtByNumMemb = $result->fetchAll();
		return($allLikesArtByNumMemb);
	}

	function get_nbLikesArtByArticle($numArt){
		global $db;

		$query = 'SELECT COUNT(*) FROM likeart where numArt=? ;';
		$result = $db->prepare($query);
		$result->execute([$numArt]);
		return($result->fetchAll());
	}

	function get_nbLikesArtByMembre($numMemb){
		global $db;

		$query = 'SELECT COUNT(*) FROM likeart where numMemb=? ;';
		$result = $db->prepare($query);
		$result->execute([$numMemb]);
		return($result->fetchAll());
	}

	function create($numMemb, $numArt, $likeA){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO likeart (numMemb, numArt, likeA) VALUES (?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb, $numArt, $likeA]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert likeart : ' . $e->getMessage());
		}
	}

	function update($numMemb, $numArt, $likeA){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE likeart SET numArt=?, likeA=? WHERE numMemb=?';
			$request = $db->prepare($query);
			$request->execute([$numArt, $likeA, $numMemb]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update likeart : ' . $e->getMessage());
		}
	}

	// Create et Update en même temps
	function createOrUpdate($numMemb, $numArt){
		global $db;

		try {
			$db->beginTransaction();

			$query='INSERT OR UPDATE likeart WHERE (numMemb=? AND numArt=?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb,$numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert Or Update likeart : ' . $e->getMessage());
		}
	}

	// AUTORISE UNIQUEMENT POUR le super-admin / admin => En mode DEV (avant la mise en prod)
	function delete($numMemb, $numArt){
		global $db;
		
		try {
			$db->beginTransaction();

			$query='DELETE FROM likeart WHERE (numMemb=? AND numArt=?)';
			$request = $db->prepare($query);
			$request->execute([$numMemb, $numArt]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete likeart : ' . $e->getMessage());
		}
	}
}	// End of class
