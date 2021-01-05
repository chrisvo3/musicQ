<?php
/**
 * Controller.php
 * Based controller class, every create controllers.
 * If we have login system, we need controller for our users.
 * If we have a blog, we need controller for our posts.
 * etc.
 * Those controllers will actually extend this Controller.php file.
 * So we can use our models and views inside.
 * @package ./app/library
 */

class Controller {

	/**
	 * Load the model and the view
	 */
	public function model( $model ) {

		// require model file.
		require_once '../app/models' . $model . '.php';

		// instantiate model.
		return new $model();
	}

	/**
	 * Load the view (checks for the file)
	 */
	public function view( $view, $data = array() ) {
		
		// try to see if this file exist.
		if ( file_exists( '../app/views' . $view . '.php' ) ) {
			require_once '../app/views/' . $view . '.php';
		} else {
			die( "View does not exists." );
		}

	}
}
