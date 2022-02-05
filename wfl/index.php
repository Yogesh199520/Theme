<?php
/*==============================*/
// @package Booth Golf and Leisure
// @author Think EQ
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
get_header();

$pid = get_option('page_for_posts');
$obj = get_queried_object();

do_action('modules',$pid);

get_footer();
?>