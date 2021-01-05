<?php
/**
 * Page 
 */

class Pages {

	/**
	 * Constructor
	 */
	public function __construct() {
		// echo 'Loaded';
	}

	/**
	 * Index
	 */
	public function index() {
		// echo 'Home Page';
		$data = array(
			'title' => 'Home Page',
			'name'  => 'Dary',
		);

		$this->view( 'pages/index', $data );
	}

	/**
	 * 
	 */
	public function about() {
		// echo 'About';
		$this->view( 'pages/about' );
	}

}
