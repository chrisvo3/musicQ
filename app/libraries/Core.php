<?php
/**
 * Core App Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 * ---
 * Main app core class that create URL, loads the core controller
 * that will be use later, also to format the URl
 * @package ./app/library
 */

class Core {

	/**
	 * This page will automatically load if there are no other controller in controller folder.
	 * @var $curr_controller
	 */
	protected $curr_controller = 'Pages';

	/**
	 * Inside the page controller, it will load the index method automatically.
	 * @var $curr_method
	 */
	protected $curr_method = 'index';

	/**
	 * The current controller and method will change if the URl changes.
	 * @var $params
	 */
	protected $params = [];

	/**
	 * Constructor
	 */
	public function __construct() {
		// print_r( $this->get_url() );

		// get the array of url from the get_url() function.
		// Look in BLL'Controllers' for first value, ucwords will capitalize first letter
		if ( file_exists( '../app/controllers/' . ucwords( $url[0] ) . '.php' ) ) {

			// if exists, will set as controller.
			$this->curr_controller = ucwords( $url[0] );

			// unset 0 Index.
			unset( $url[0] );
		}

		// require the controller.
		require_once '../app/controllers' . $this->curr_controller . '.php';

		// instantiate it.
		$this->curr_controller = new $this->curr_controller; 
	}

	/**
	 * Function get_url will get the urls to be put inside array $params.
	 */
	public function get_url() {

		// get rip of the ending slash at the end.
		// if it isset, then strip the ending slash.
		if ( isset( $_GET['url'] ) ) {

			// get the current url and then strip it.
			$url = rtrim( $_GET['url'], '/' );

			// Allows you to filter variables as string/number
			// not allowing characters that the URL should not have (signs liek dollar signs etc).
			$url = filter_var( $url, FILTER_SANITIZE_URL );

			// breaking it into an array.
			$url = explore( '/', $url );

			return $url;
		}
	}

}
