<?php
/**
 * Require
 * Requiring all the necessary files that we need liek lirbary config etc.
 * For folder structures.
 * @package ./app
 */

// require libraries from folder libraries.
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

// Instantiate core class.
$init = new Core();
