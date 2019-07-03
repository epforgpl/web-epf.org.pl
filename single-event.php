<?php
	
	$custom_pages_ids = array(5456, 4793);
	$page_id = (int) get_the_ID();
	
	$theme_file = in_array($page_id, $custom_pages_ids) ? 
		'single-event-5456.php' : 
		'single-event-default.php';
		
	include( $theme_file );