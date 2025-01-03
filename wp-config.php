<?php

define('WP_HOME',               'https://example.com');
define('WP_SITEURL',            'https://example.com');

define('FS_METHOD',             'direct');
define('WP_MEMORY_LIMIT',       '1024M');
define('WP_MAX_MEMORY_LIMIT',   '1024M');

define('DB_HOST',               'localhost');
define('DB_USER',               'root');
define('DB_PASSWORD',           '');
define('DB_NAME',               'example_db');
define('DB_CHARSET',            'utf8');
define('DB_COLLATE',            '');

// define( 'DB_HOST', '127.0.0.1:3307' );
// or
// define( 'DB_HOST', 'localhost:3307' );



$table_prefix =                 'wp_';

define('DISABLE_WP_CRON',       true);

define('WP_DEBUG',              true);
define('WP_DEBUG_LOG',          true);
define('WP_DEBUG_DISPLAY',      false);

// Fatal Error Handler
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );   // 5.2 and later define( 'WP_DEBUG', true );


/* putenv('TMPDIR = /tmp'); */
define('WP_TEMP_DIR',           '/tmp');

define('WP_ENV',                'local'); // development || production 

@ini_set('max_input_vars', 20000);
define('WP_ALLOW_REPAIR', true);

define('WP_CACHE', false);

define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/blog/wp-content' );
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/blog/wp-content/plugins' );
define( 'PLUGINDIR', dirname(__FILE__) . '/blog/wp-content/plugins' );
define( 'WP_PLUGIN_URL', 'http://example/blog/wp-content/plugins' );
define( 'UPLOADS', 'blog/wp-content/uploads' );

define( 'AUTOSAVE_INTERVAL', 160 ); // Seconds

// Disable Post Revisions
define( 'WP_POST_REVISIONS', false );

// Specify the Number of Post Revisions
// define( 'WP_POST_REVISIONS', 3 );

define( 'COOKIE_DOMAIN', 'www.example.com' );

// enable multisite functionality
define( 'WP_ALLOW_MULTISITE', true );

// Redirect Nonexistent Blogss
define( 'NOBLOGREDIRECT', 'http://example.com' );


