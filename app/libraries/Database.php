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

	/**
	 * Allows to write queries
	 * $sql
	 */
	public function query( $sql ) {
		// prepare() take one argument.
		$this->statement = $this->db_handler->prepare( $sql );
	}

	/**
	 * Bind param with value for type is equal to data type
	 */
	public function bind( $paremeter, $value, $type = null ) {
		switch( is_null( $type ) ) {
			case is_int( $value ):
				$type = PDO::PARAM_INT;
				break;
			case is_bool( $value ):
				$type = PDO::PARAM_BOOL;
				break;
			case is_null( $value ):
				$type = PDO::PARAM_NULL;
				break;
			default:
				$type = PDO::PARAM_STR;
		}

		$this->statement->bindValue( $parameter, $value, $type );
	}

	/**
	 * Execute the prepared statement
	 */
	public function execute() {
		return $this->statement->execute();
	}

	/**
	 * Return an array
	 */
	public function result_set() {
		$this->execute();
		return $this->statement->fetchALL( PDO::FETCH_OBJ );
	}

	/**
	 * Return a specific row as an object
	 */
	public function single() {
		$this->execute();
		return $this->statement->fetch( PDO::FETCH_OBJ );
	}

	/**
	 * Get the row counts
	 */
	public function row_count() {
		return $this->statement->rowCount();
	}

}