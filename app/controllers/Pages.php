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
		// look for file called 'User'.
		$this->user_model = $this->model( 'User' );
	} 

	/**
	 * Index
	 */
	public function index() {
		$users = $this->user_model->get_users();

		$data = array(
			'title' => 'Home Page',
			'user'  => $users,
		);

		$this->view( 'pages/index', $data );
	}

	/**
	 * About page
	 */
	public function about() {
		$this->view( 'pages/about' );
	}

}
