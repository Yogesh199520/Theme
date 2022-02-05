<?php
/*==============================*/
// @package WaterFront Law
// @author Think EQ
/*==============================*/
$obj = get_queried_object();

get_header();

do_action('modules',$obj);

get_footer();

?>