<?php
/*
Template Name: Single Affiliate Table Template
Template Post Type: affiliate_table
*/

get_header();

?>

<div class="table-container">
	<?php echo do_shortcode('[affiliate-table id=' . $post->ID . ']'); ?>
</div>

<style type="text/css">
.table-container {
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