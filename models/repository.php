<?php

require_once('color.php');

class Repository
{
	private $db;

	function __construct($USERNAME, $PASSWORD, $DATABASE)
	{
		$this->db = new PDO('mysql:'
			. 'host=localhost;' 
			. 'charset=utf8;'
			. 'dbname=' . $DATABASE,
			$USERNAME,
			$PASSWORD
		);
	}

	function __destruct()
	{
		//setting handle to null closes connection
		$this->db = null;
	}

	public function FindAllColors()
	{
		return $this->db
			->query('SELECT name FROM Colors' 
				. ' ORDER BY hue_order;')
			->fetchAll(PDO::FETCH_CLASS, 'Color');
	}

	public function TotalVotesByColor($color)
	{
		$sql = 'SELECT SUM(votes) AS sum '
			. 'FROM Votes '
			. 'WHERE color = :color;';
		$statement = $this->db->prepare($sql);
		$statement->execute(array(':color' => $color));
		return $statement->fetch()['sum'] ?: 0;
	}
};
