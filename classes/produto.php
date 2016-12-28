<?php
//if(!defined('INITIALIZED'))
//	exit;

// class for 'lists' only, to use it you must set list filter:
// $yourList->setFilter(new SQL_Filter(new SQL_Field('id', 'players'), SQL_Filter::EQUAL, new SQL_Field('id', 'player_deaths')));
class Produto extends ObjectData
{
	public static $table = 'produto';
	public $data = array('id' => null, 'nome' => null, 'preco' => null, 'detalhes' => null);
	public static $fields = array('nome', 'preco', 'detalhes');
	//public static $extraFields = array(array('id', 'players'), array('name', 'players'));

    public function __construct($id = null)
    {
		if($id != null)
			$this->load($id);
    }

	public function load($id)
	{
		$search_string = $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($id);
		$fieldsArray = array();
		foreach(self::$fields as $fieldName)
			$fieldsArray[$fieldName] = $this->getDatabaseHandler()->fieldName($fieldName);
		$this->data = $this->getDatabaseHandler()->query('SELECT ' . implode(', ', $fieldsArray) . ' FROM ' . $this->getDatabaseHandler()->tableName(self::$table) . ' WHERE ' . $search_string);
	}

	public function loadAll()
	{
		//$search_string = $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($id);
		$fieldsArray = array();
		foreach(self::$fields as $fieldName)
			$fieldsArray[$fieldName] = $this->getDatabaseHandler()->fieldName($fieldName);
		$this->data = $this->getDatabaseHandler()->query('SELECT ' . implode(', ', $fieldsArray) . ' FROM ' . $this->getDatabaseHandler()->tableName(self::$table));
	}

	public function save($forceInsert = false)
	{
		if(!isset($this->data['id']) || $forceInsert)
		{
			$keys = array();
			$values = array();
			foreach(self::$fields as $key)
				if($key != 'id')
				{
					$keys[] = $this->getDatabaseHandler()->fieldName($key);
					$values[] = $this->getDatabaseHandler()->quote($this->data[$key]);
				}
			$this->getDatabaseHandler()->query('INSERT INTO ' . $this->getDatabaseHandler()->tableName(self::$table) . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $values) . ')');
			$this->setID($this->getDatabaseHandler()->lastInsertId());
		}
		else
		{
			$updates = array();
			foreach(self::$fields as $key)
				if($key != 'id')
					$updates[] = $this->getDatabaseHandler()->fieldName($key) . ' = ' . $this->getDatabaseHandler()->quote($this->data[$key]);
			$this->getDatabaseHandler()->query('UPDATE ' . $this->getDatabaseHandler()->tableName(self::$table) . ' SET ' . implode(', ', $updates) . ' WHERE ' . $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($this->data['id']));
		}
	}

	public function isLoaded()
	{
		return isset($this->data['id']);
	}

	public function setAchievementID($value){$this->data['id'] = $value;}
	public function getAchievementID(){return $this->data['id'];}
	public function setNome($value){$this->data['nome'] = $value;}
	public function getNome(){return $this->data['nome'];}
	public function setPreco($value){$this->data['preco'] = $value;}
	public function getPreco(){return $this->data['preco'];}
	public function setDetalhes($value){$this->data['detalhes'] = $value;}
	public function getDetalhes(){return $this->data['detalhes'];}
}
