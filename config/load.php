<?php

// Load WP from outside of the object context
use li3_wordpress\extensions\data\Wordpress;

require Wordpress::config('wordpress_path') . '/wp-load.php';


?>