 <?php
// CRUD USER
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class USER{
	function get_1User($pseudoUser, $passUser){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllUsers(){
		global $db;

		// select
		// prepare
		// execute
		return($allUsers);
	}

	// Inutile car la PK (pseudo, pass) est forcément unique
	function get_ExistPseudo($pseudoUser) {
		global $db;

		$query = 'SELECT * FROM USER WHERE pseudoUser = ?;';
		$result = $db->prepare($query);
		$result->execute(array($pseudoUser));
		return($result->rowCount());
	}

	// function get_AllUsersByStat(){
	// 	global $db;

	// 	// select
	// 	// prepare
	// 	// execute
	// 	return($allUsersByStat);
	// }

	function get_NbAllUsersByidStat($idStat){
		global $db;
		$query = 'SELECT COUNT(*) FROM USER where idStat=? ;';
		$result = $db->prepare($query);
		$result->execute([$idStat]);
		$allNbUsersByidStat = $result;
		return($allNbUsersByidStat->fetch());
	}

	function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO USER (pseudoUser, passUser, nomUser, prenomUser , emailUser, idStat) VALUES (?,?,?,?,?)';
			$request = $db->prepare($query);
			$request->execute([$pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert USER : ' . $e->getMessage());
		}
	}

	function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			$query='UPDATE USER SET passUser=?, nomUser=?, prenomUser=?, emailUser=?, idStat=? WHERE pseudoUser=?';
			$request = $db->prepare($query);
			$request->execute([$pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update USER : ' . $e->getMessage());
		}
	}

	function delete($pseudoUser, $passUser){
		global $db;
		
		try {
			$db->beginTransaction();

			// delete
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete USER : ' . $e->getMessage());
		}
	}
}	// End of class
