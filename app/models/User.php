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
}