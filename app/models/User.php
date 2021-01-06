<?php
/**
 * User Model (singular)
 * 
 * @package ./app/library
 */

class User {

	/**
	 * instantiate database connection
	 */
	private $db;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->db = new Database;
	}

	/**
	 * Get users
	 */
	public function get_users() {
		$this->db->query( "SELECT * FROM users" );

		$result = $this->db->resultSet();

		return $result;
	}
}