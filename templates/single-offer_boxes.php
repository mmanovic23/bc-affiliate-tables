<?php
/*
Template Name: Single Offer Boxes Template
Template Post Type: offer_boxes
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

?>

	<div class="offer-boxes-container">
		<?php echo do_shortcode('[offer-boxes id=' . $post->ID . ']'); ?>
	</div>

	<style type="text/css">
		.offer-boxes-container {
			position: relative;
			margin-left: auto;
			margin-right: auto;
			padding-right: 15px;
			padding-left: 15px;
			max-width: 1200px;
		}
	</style>

<?php

get_footer();

?>