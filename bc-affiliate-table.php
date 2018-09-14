<?php
/**
 * Plugin Name: BC Affiliate Tables
 * Description: BC Affiliate comparison tables.
 * Version: 1.1.3
 * Author: Better Collective - Hanning Høegh
 * License: GPL2
 */

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;



/*--------------*\
    Constants.
\*--------------*/
if(!defined ('AT_PATH')) define( 'AT_PATH', plugin_dir_path( __FILE__ ) );
if(!defined ('AT_URL')) define( 'AT_URL', plugin_dir_url( __FILE__ ) );



/*-----------------*\
    File includes.
\*-----------------*/
include_once( AT_PATH . 'main.php');
include_once( AT_PATH . 'admin/admin-init.php');



/*---------------------------*\
    Plugin update checker.
\*---------------------------*/
require 'plugin-update-checker/plugin-update-checker.php';
$at_className = PucFactory::getLatestClassVersion('PucGitHubChecker');
$at_myUpdateChecker = new $at_className(
    'https://github.com/SmileyJoey/bc-affiliate-tables/',
    __FILE__,
    'master'
);



/*--------------------------------------------------------------------------------------------------------*\
    Load plugin scripts / styles if the Table shortcode is used or if it is a Post Type Affiliate Table.
\*--------------------------------------------------------------------------------------------------------*/
function at_plugin_scripts_stylesheets() {
	
    global $post;
    if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'affiliate-table') || 'affiliate_table' == get_post_type() ) {

        wp_enqueue_style('bc-affiliate-tables-css', AT_URL . 'css/main.min.css' );
        wp_enqueue_style('bootstrap-css', AT_URL . 'css/bootstrap.min.css' );
		wp_enqueue_style('tooltipster-bundle-css', AT_URL . 'css/tooltipster.bundle.min.css' );
		wp_enqueue_style('tooltipster-follower-css', AT_URL . 'css/tooltipster-follower.min.css' );

		wp_enqueue_script( 'at-custom-js', AT_URL . 'js/main.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'bootstrap-js', AT_URL . 'js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'rateyo-js', AT_URL . 'js/jquery.rateyo.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'tooltipster-js', AT_URL . 'js/tooltipster.bundle.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'tooltipster-follower-js', AT_URL . 'js/tooltipster-follower.min.js', array( 'jquery', 'tooltipster-js' ), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'at_plugin_scripts_stylesheets');



/*--------------------------------------------------------------*\
    NOTICE ABOUT ACF PRO IF ACF IS NOT INSTALLED AND ACTIVATED
\*--------------------------------------------------------------*/
function at_check_if_acf_exists() {

    if( !class_exists('acf') ) : ?>
        <div class="notice notice-error is-dismissible">
            <p>You need to install &amp; activate ACF PRO to make BC Affiliate Tables plugin work!</p>
            <p>Additionally, make sure this site uses Bootstrap CSS.</p>
            <p>In Spanish: Installo ACF PRO Plugino, if no-o, then'o no work-o! No comprende? Contacto Hanningo</p>
        </div>
    <?php endif;
}
add_action('admin_init', 'at_check_if_acf_exists');



/*----------------------------------------------------------------*\
    Helper function. Check if given field group already exists.
\*----------------------------------------------------------------*/
function at_is_field_group_exists($value, $type='post_title') {

	$exists = false;
	if ($field_groups = get_posts(array('post_type'=>'acf'))) {
	    foreach ($field_groups as $field_group) {
	        if ($field_group->$type == $value) {
	            $exists = true;
	        }
	    }
	}
	return $exists;
}



/*---------------------------------------------------------------------------*\
    If group field "Affiliate Table" doesn't exists, load JSON group field.
\*---------------------------------------------------------------------------*/
$fieldGroup = 'Affiliate Table';

if ( at_is_field_group_exists($fieldGroup) == false ) {

	// Load ACF Settings from JSON file.
	function at_acf_json_load_point( $paths ) {

	    // append path
	    $paths[] = AT_PATH . 'acf-json';
	    return $paths;
	}
	add_filter('acf/settings/load_json', 'at_acf_json_load_point');


	// Save ACF Settings to JSON file.
	function at_acf_json_save_point( $path ) {
	    if( isset($_POST['acf_field_group']['key']) && $_POST['acf_field_group']['key'] == "group_47y741b7w925s" )
	        $path = AT_PATH . 'acf-json';
	    return $path;
	}
	add_filter('acf/settings/save_json', 'at_acf_json_save_point');

}



/*---------------------*\
    Output the table.
\*---------------------*/
function at_shortcodes_init()
{
    function table_shortcode( $atts = [] )
    {
    	// normalize attribute keys, lowercase
	    $atts = array_change_key_case((array)$atts, CASE_LOWER);
	 
	    // override default attributes with user attributes
	    $at_atts = shortcode_atts([
			'id' => '',
		], $atts);

    	ob_start();
    	at_output_table(esc_html( $atts['id'] ));
		$output = ob_get_contents();
		ob_end_clean();
        return $output;
    }
    add_shortcode('affiliate-table', 'table_shortcode');
}
add_action('init', 'at_shortcodes_init');

?>