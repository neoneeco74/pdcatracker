<?php

class Model{
	
	static $connections = array();	
	
	public $conf = 'default';
	public $table = false;
	public $_db;
	public $primaryKey = 'id';
	
	
	public function __construct(){
		
		//J'initialise quelques variables
		if($this->table === false){		//si je n'ai pas initialisé le nom du modele
			$this->table = strtolower(get_class($this)).'s'; // permet d'appeler Post en posts, en bdd
		}
		//var_dump($this->table);
		
		
		//Jme connecte à la base
		$conf = Conf::$databases[$this->conf];
		if(isset(Model::$connections[$this->conf])){
			$this->_db = Model::$connections[$this->conf];
			return true;
		}
		try{
			//$db = new PDO('mysql:host='.$conf['host'].';port=3308;dbname='.$conf['database'].';charset=utf8','.$conf['login'].', '.$conf['password']);
			
			//$pdo = new PDO('mysql:host=lab;port=3308;dbname=lab_24_projet_pdcatracker_new;charset=utf8', 'root', '');
			$pdo = new PDO('mysql:host=localhost;port=3308;dbname=neoneeco_pdcatracker;charset=utf8', 'neoneeco_neoneec', 'toeboveokx666');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
			
			
			Model::$connections[$this->conf] = $pdo;
			$this->_db = $pdo;
			//var_dump($this->_db);
			//echo "Base chargé et connecté PDO iciiiiii";
			
		}catch(PDOException $e){
			if(Conf::$debug >= 1){
				die($e->getMessage());
			}
			else{
				die('Impossible de se connecter');
			}
		}
		//echo "Base chargé et connecté";
		

		
	}

	public function find($req){
		
		$sql = 'SELECT ';
		//die($this->table);
		
		if(isset($req['fields'])){
			if(is_array($req['fields'])){
				$sql .= implode(', ',$req['fields']);
			} else {
				$sql .= $req['fields'];
			}
		} else {
			$sql .= '*';
		}
		
		$sql .= ' FROM '.$this->table.' as '.get_class($this).' ';
		
		
		// Construction de la condition pour eviter les injections
		if(isset($req['conditions'])){
			$sql .= 'WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions'];
			}
			else {
				$cond = array();
				foreach($req['conditions'] as $k => $v){
					if(!is_numeric($v)){
						$v = '"'.addslashes($v).'"';
					}
					
					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ', $cond);
			}
			
		}
		
		if(isset($req['limit'])){
			$sql .= 'LIMIT '.$req['limit'];
		}		
		
		$pre = $this->_db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
		//unset($sql);
	}
		
	public function findFirst($req){
		return current($this->find($req)); // current: recuepre l'element courrant du tableau donc le premier
	}
	
	public function findCount($conditions){
		$res = $this->findFirst(array(
			'fields' => 'COUNT('.$this->primaryKey.') as count',
			'conditions' => $conditions
		));
		return $res->count;
		
	}
}