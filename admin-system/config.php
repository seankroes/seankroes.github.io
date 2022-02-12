<?php
ini_set( "display_errors", true );
date_default_timezone_set( "US/Eastern" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=billbrue_blog" );
define( "DB_USERNAME", "billbrue_billbru" );
define( "DB_PASSWORD", ";R0Uu1'9o,5]h-8>5" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 250);
define( "ADMIN_USERNAME", "billbrue" );
define( "ADMIN_PASSWORD", ";R0Uu1'9o,5]h-8>5" );
require("Article.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>