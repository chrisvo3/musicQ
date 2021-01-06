<?php
/**
 * Config file
 * Basic stuff like database program, uproot, URL root,
 * so we don't have to define our url root very single time.
 * @package ./app/config
 */

// Database params.
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'musicq' );

/**
 * These define will be the constant that can be change in here and effect everywhere else.
 */

// APP ROOT.
// first dirname: remove the .php etc of the file at the end of the URL.
// second dirnam: remove the file name at the end of the url.
// examle: bookstore.com/app/config.php -> bookstore.com/app/config -> bookstore.com/app.
define( 'APPROOT', dirname( dirname( __FILE__ ) ) );

// URL ROOT - dynamic links.
define( 'URLROOT', 'localhost/musicq' );

// Sitename.
define( 'SITENAME', 'MusicQ' );

