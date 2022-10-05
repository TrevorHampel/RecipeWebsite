<?php
class Database {

    protected $connection;
	protected $query;

	public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'recipedatabase', $charset = 'utf8') {
		$this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
		}
		$this->connection->set_charset($charset);
	}

    function selectAssc($sql){
        $result = $this->connection->query($sql);
        $returnArray = array();
        while ($row = $result->fetch_assoc()) {
            $returnArray[] = $row;
        }
        return $returnArray;
    }

    function update($sql){
        $this->connection->query($sql);
    }

    function insert($sql){
        $this->connection->query($sql);
    }

    function delete($sql){
        $this->connection->query($sql);
    }

}
