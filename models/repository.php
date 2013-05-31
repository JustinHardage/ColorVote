<?php

require_once('color.php');

class Repository
{
	const DEFAULT_VOTE_COUNT = 0;
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
		//PDO automatically sanitizes data inserted into placeholders
		//no need for old mysql_escape functions
		$sql = 'SELECT SUM(votes) AS sum '
			. 'FROM Votes '
			. 'WHERE color = :color;';
		$statement = $this->db->prepare($sql);
		$statement->execute(array(':color' => $color));
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		//empty check doesn't work here; aggregate functions always return a row
		return $result && $result['sum'] ? $result['sum'] : Repository::DEFAULT_VOTE_COUNT;
	}
}
