<?php
// CRUD COMMENT
// ETUD
require_once __DIR__ . '../../connect/database.php';

class COMMENT{
	function get_1Comment($numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM COMMENT WHERE (numSeqCom= ? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numSeqCom, $numArt]);
		return($result->fetch());
	}

	function get_AllCommentsByArticle($numArt){
		global $db;

		$query = 'SELECT * FROM COMMENT NATURAL JOIN MEMBRE where numArt=?';
		$result = $db->prepare($query);
		$result->execute([$numArt]);
		return($result->fetchAll());
	}

	function get_AllCommentsByNumArt($numArt){
		global $db;

		$query='SELECT * FROM COMMENT NATURAL JOIN ARTICLE WHERE numArt=?';
		$result = $db->query($query);
		$result->execute([$numArt]);
		$allCommentsByNumArt=$result->fetchAll();
		return($allCommentsByNumArt);
	}

	function get_1CommentByNumSeqComNumArt($numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM COMMENT NATURAL JOIN ARTICLE WHERE (numSeqCom= ? AND numArt= ?)';
		$result = $db->prepare($query);
		$result->execute([$numSeqCom, $numArt]);
		return($result->fetch());
	}

	function get_AllCommentsByNumSeqComNumArt($numSeqCom, $numArt){
		global $db;

		$query='SELECT * FROM COMMENT NATURAL JOIN ARTICLE WHERE (numSeqCom= ? AND numArt= ?)';
		$result = $db->query($query);
		$result->execute([$numSeqCom, $numArt]);
		$allCommentsByNumSeqComNumArt=$result->fetchAll();
		return($allCommentsByNumSeqComNumArt);
	}

	function get_AllCommentsByArticleByMemb(){
		global $db;

		$query='SELECT * FROM COMMENT NATURAL JOIN MEMBRE';
		$result = $db->query($query);
		$allCommentsByArticleByMemb=$result->fetchAll();
		return($allCommentsByArticleByMemb);
	}

	function get_NbAllCommentsBynumMemb($numMemb){
		global $db;
		
		$query = 'SELECT COUNT(*) FROM COMMENT where numMemb=? ;';
		$result = $db->prepare($query);
		$result->execute([$numMemb]);
		$allNbMembersByStat = $result;
		return($allNbMembersByStat->fetch());
	}

	// Fonction : recupérer next numéro séquence de article recherché (PK COMMENT)
	// Commentaire suivant sur un article
	// => Pour table COMMENT & table COMMENTPLUS
	function getNextNumCom($numArt) {
		global $db;

		//récup id de l'article et num séquence comment
		$queryText = "SELECT CO.numArt, MAX(numSeqCom) AS numSeqCom FROM ARTICLE AR INNER JOIN COMMENT CO ON AR.numArt = CO.numArt WHERE AR.numArt = ?;";
		$result = $db->prepare($queryText);
		$result->execute(array($numArt));

		if ($result) {
			$tuple = $result->fetch();
			$numArtCom = $tuple["numArt"];
			$numSeqCom = $tuple["numSeqCom"];
			// New comment dans COMMENT ou REPONSE pour ARTICLE
			if (is_null($numArtCom)) { // si l'id de l'article est null
				// Init no séquence
				$numSeqCom = 1; //première fois qu'on rentre un commentaire pour cet article
			} else {
			if ((!is_null($numArtCom)) AND (!is_null($numSeqCom))) { //si num de sequence existe alors numéro de séquence++
				// No séquence suivant
				$numSeqCom++;
			} else {
				// Pbl cohérence select NumArt & NumCom
				return -1;
			}
			}
			return $numSeqCom;
		}   // End of if ($result)
		else {
		return -1;  // Pbl select / BDD
		}
	} // End of function

	// comment en attente : Moderation affComOK à FALSE
	function create($numSeqCom, $numArt, $dtCreCom, $libCom, $numMemb){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO COMMENT (numSeqCom, numArt, dtCreCom, libCom , numMemb) VALUES (?,?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $dtCreCom, $libCom, $numMemb]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert COMMENT : ' . $e->getMessage());
		}
	}

	// Moderation : TRUE si comment affiché, FALSE sinon
	// et remarques possibles admin si non affiché
	function update($numSeqCom, $numArt, $attModOK, $dtModCom, $notifComKOAff, $delLogiq){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE COMMENT SET numArt=?, attModOK=?, dtModCom=?, notifComKOAff=?, delLogiq=? WHERE numSeqCom=?';
			$request = $db->prepare($query);
			$request->execute([$numArt, $attModOK, $dtModCom, $notifComKOAff, $delLogiq, $numSeqCom]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update COMMENT : ' . $e->getMessage());
		}
	}

	// Create et Update en même temps => Del logique du Comment
	function createOrUpdate($numSeqCom, $numArt){
		global $db;

		try {
			$db->beginTransaction();

			$query='INSERT OR UPDATE COMMENT WHERE (numSeqCom=? AND numArt=?)';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom,$numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert Or Update COMMENT : ' . $e->getMessage());
		}
	}

	// A priori : del comment impossible (sauf si choix admin après modération) => Cf. createOrUpdate() ci-dessus
	function delete($numSeqCom, $numArt){	// OU à utiliser pour del logique : del => update
		global $db;

		try {
			$db->beginTransaction();

			$query='DELETE FROM COMMENT WHERE (numSeqCom=? AND numArt=?) ';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom,$numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete COMMENT : ' . $e->getMessage());
		}
	}
}	// End of class
