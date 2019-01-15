<?php
/**
 * Plugin Name: BC Affiliate Tables
 * Description: BC Affiliate comparison tables.
 * Version: 2.0.1
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
include_once( AT_PATH . 'admin/admin-init.php');



/*---------------------------*\
    Plugin update checker.
\*---------------------------*/
require 'includes/plugin-update-checker/plugin-update-checker.php';
$at_myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/SmileyJoey/bc-affiliate-tables/',
	__FILE__,
	'master'
);
$at_myUpdateChecker->setBranch('master');



/*---------------------------------------*\
    Register plugin scripts / styles.
\*---------------------------------------*/
function at_plugin_scripts_stylesheets() {
        wp_register_style('at-main', AT_URL . 'build/css/main.min.css' );
		wp_register_script( 'at-js', AT_URL . 'build/js/main.min.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'at_plugin_scripts_stylesheets');



/*----------------------------------------*\
    If ACF doesnt exist, include ACF.
\*----------------------------------------*/
if ( !class_exists('acf') ) {

        // 1. customize ACF path
        function at_acf_settings_path( $path ) {

            // update path
            $path = AT_PATH . 'includes/acf/';

            // return
            return $path;

        }
        add_filter( 'acf/settings/path', 'at_acf_settings_path' );


        // 2. customize ACF dir
        function at_acf_settings_dir( $dir ) {

            // update path
            $dir = plugins_url() . '/bc-affiliate-tables/includes/acf/';

            // return
            return $dir;

        }
        add_filter( 'acf/settings/dir', 'at_acf_settings_dir' );


        // 4. Include ACF
        include_once( AT_PATH . 'includes/acf/acf.php' );

}



/*---------------------------------------------------------------------------*\
    If group field "Affiliate Table" doesn't exists, load JSON group field.
\*---------------------------------------------------------------------------*/

// Load ACF Settings from JSON file.
function at_acf_json_load_point( $paths ) {

    // append path
    $paths[] = AT_PATH . 'includes/acf-json';
	// var_dump($paths);
    return $paths;
}
add_filter('acf/settings/load_json', 'at_acf_json_load_point');



// Save ACF Settings to JSON file.
function at_acf_json_save_point( $path ) {
    if( isset($_POST['acf_field_group']['key']) && $_POST['acf_field_group']['key'] == "group_5b17c4fcecb0c" || isset($_POST['acf_field_group']['key']) && $_POST['acf_field_group']['key'] == "group_5c275e87b66ec" )
        $path = AT_PATH . 'includes/acf-json';
    return $path;

}
add_filter('acf/settings/save_json', 'at_acf_json_save_point');



/*--------------------------------*\
            Shortcodes.
\*--------------------------------*/
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

	    wp_enqueue_style('at-main');
	    wp_enqueue_script('at-js');
	    include_once( AT_PATH . 'view/shortcode-table.php');

    	ob_start();
    	at_output_table(esc_html( $at_atts['id'] ));
		$output = ob_get_contents();
		ob_end_clean();
        return $output;
    }
    add_shortcode('affiliate-table', 'table_shortcode');

	function boxes_shortcode( $atts = [] )
	{
		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array)$atts, CASE_LOWER);

		// override default attributes with user attributes
		$at_atts = shortcode_atts([
			'id' => '',
		], $atts);

		wp_enqueue_style('at-main');
		wp_enqueue_script('at-js');
		include_once( AT_PATH . 'view/shortcode-boxes.php');

		ob_start();
		at_output_boxes(esc_html( $at_atts['id'] ));
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	add_shortcode('offer-boxes', 'boxes_shortcode');
}
add_action('init', 'at_shortcodes_init');

?>