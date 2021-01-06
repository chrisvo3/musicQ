<?php
/**
 * Databse.php
 * Adding PDO class database connection, a couple different methods
 * to add our Crud functionality to our methods.
 * Only the model will be able to access the Database.php file.
 * @package ./app/library
 */

class Database {
	/**
	 * Database host
	 * @var $db_host
	 */
	private $db_host = DB_HOST;

	/**
	 * Database user
	 * @var $db_user
	 */
	private $db_user = DB_USER;

	/**
	 * Database pass
	 * @var $db_pass
	 */
	private $db_pass = DB_PASS;

	/**
	 * Database name
	 * @var $db_name
	 */
	private $db_name = DB_NAME;

	/**
	 * Database statement
	 * @var $statement
	 */
	private $statement;

	/**
	 * Database handler
	 * @var $db_handler
	 */
	private $db_handler;

	/**
	 * Database error
	 * @var $error
	 */
	private $error;

	/**
	 * Constructor
	 * run our connection whenever we call the database file.
	 */
	public function __construct() {

		// variable con .
		$conn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;

		// this .
		$options = array(
			// Attribute persistence => true.
			// preventing the driver crashing and giving timeouts.
			// when we atempting to connect to the database.
			// look if there is already establish connection to the database.
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
		);

		try {
			$this->db_handler = new PDO( $conn, $this->db_user, $this->db_pass, $options );
		} catch ( PDOException $e ) {
			$this->error = $e->getMessage();
			echo esc_html( $this->error );
		}
	}
}