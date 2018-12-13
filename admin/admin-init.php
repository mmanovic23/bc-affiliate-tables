<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*---------------------------------------*\
    Register Affiliate Table post type.
\*---------------------------------------*/
function at_setup_post_type() {

    // register the "table" custom post type.
    register_post_type('affiliate_table',	
                       array(
                           'labels'      => array(
                               'name'			=> __('Affiliate Tables'),
                               'singular_name'	=> __('Affiliate Table'),
                               'add_new' 		=> __('Add new table'),
                               'add_new_item' 	=> __('Add new table'),
                               'edit_item' 		=> __('Edit table'),
                               'new_item' 		=> __('New table'),
                               'view_item' 		=> __('View table'),
                               'all_items' 		=> __('All tables'),
                               'not_found' 		=> __('No tables found'),
                           ),
                           'public'			=> true,
                           'has_archive'	=> true,
                           'menu_icon'		=> 'dashicons-editor-table',
                       )
    );
}
add_action( 'init', 'at_setup_post_type' );



/*----------------------------------------*\
    Affiliate Table Post type Template.
\*----------------------------------------*/
function at_get_custom_post_type_template($single_template) {
     global $post;

     if ($post->post_type == 'affiliate_table') {
          $single_template = AT_PATH . 'single-affiliate_table.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'at_get_custom_post_type_template' );



/*----------------------------------------*\
    Set no-index for custom Post Type.
\*----------------------------------------*/
function at_noindex_for_custom_post()
{
	if ( is_singular( 'affiliate_table' ) ) {
		echo '<meta name="robots" content="noindex, follow">';
	}
}
add_action('wp_head', 'at_noindex_for_custom_post');



/*-------------------------------------------*\
    Create a Example Affiliate Table Post.
\*-------------------------------------------*/
function at_example_post() {

	// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = get_current_user_id();
	$slug = 'affiliate-table-example';
	$title = 'Affiliate Table Example';

	// If the page doesn't already exist, then create it
	if( is_null(get_page_by_title( $title, OBJECT, 'affiliate_table' ) ) ) {

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'affiliate_table'
			)

		);

		$settings = array(
			'column_1_header_title' => 'Betting Site',
			'column_2_header_title' => 'New Customer Offer',
			'column_3_header_title' => 'Key Features',
			'column_4_header_title' => 'Go To Site & Sign Up',
			'table_header_background_color' => '#e5e5e5',
			'table_header_text_color' => '#000000',
			'sign_up_text' =>  'Sign Up',
			'our_score_text' =>  'Our Score',
			'go_to_text' =>  'Go to',
			'create_your_account_text' =>  'Create your account',
			'read_the_full_review_text' =>  'Read the full review',
			'review_text' =>  'Review',
			'show_text' =>  'Show',
			'hide_text' =>  'Hide',
			'tc_apply' => 'T&C Apply'
        );

		$row = array(
			'brand_operator_name' =>  'Unibet',
			'brand_logo_image' => false,
			'brand_logo_background' =>  '#278900',
			'brand_offer_title' =>  'Table Row Title',
			'cta_affiliate_link' =>  '/goto/hahahahahaha',
			'cta_button_text' =>  'CTA Button Text',
			'include_star_rating' =>  'yes',
			'star_rating' =>  '4',
			'first_pointer_visible' =>  'First Pointer',
			'second_pointer_visible' =>  'Second Pointer',
			'third_pointer_visible' =>  'Third Pointer',
			'put_a_ribbon_on_this_table_row' =>  'yes',
			'ribbon_text' =>  'Ribbon Text',
			'ribbon_color' =>  '#dd9933',
			'include_our_score' =>  'yes',
			'our_score' =>  '7.8',
			'first_pointer' =>  'First Pointer - Dropdown',
			'second_pointer' =>  'Second Pointer - Dropdown',
			'third_pointer' =>  'Third Pointer - Dropdown',
			'review_exist' =>  'no',
			'mini_review' => null,
			'mini_review_title' =>  'Mini Review Title',
			'mini_review_content' =>  'Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content',
			'operator_screenshot' => false,
			'tc_popup_title' =>  'T&C Popup Title',
			'tc_popup_content' =>  'T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content T&C Popup Content',
			'tc_link' =>  '/Terms',
			'tc_button_text' =>  'T&C Button Text'
		);

		$row2 = array(
			'brand_operator_name' =>  'Unibet',
			'brand_logo_image' => false,
			'brand_logo_background' =>  '#dd3333',
			'brand_offer_title' =>  'Ladbrokes offers £50 on sign-up!',
			'cta_affiliate_link' =>  '/goto/ladbrokes',
			'cta_button_text' =>  'Bet Now',
			'include_star_rating' =>  'yes',
			'star_rating' =>  '4',
			'first_pointer_visible' =>  'Paypal payment support',
			'second_pointer_visible' =>  'Asian Market',
			'third_pointer_visible' =>  'Easy To use interface',
			'put_a_ribbon_on_this_table_row' =>  'yes',
			'ribbon_text' =>  'Sponsored',
			'ribbon_color' =>  '#81d742',
			'include_our_score' =>  'yes',
			'our_score' =>  '7.8',
			'first_pointer' =>  'Accepts Paypal',
			'second_pointer' =>  'Asian Market',
			'third_pointer' =>  'Live Matches',
			'review_exist' =>  'no',
			'mini_review' => null,
			'mini_review_title' =>  'Mini Review Title',
			'mini_review_content' =>  'Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content',
			'operator_screenshot' => false,
			'tc_popup_title' =>  'Terms & Conditions',
			'tc_popup_content' =>  'New customers only. Real money deposit required. Credit or debit card only. Deposit and bonus amount must be wagered 6 times (min odds 4/5) prior to bonus funds and associated winnings becoming withdrawable New Customer Offer, T&C’s Apply 18+. Please Gamble Responsibly.',
			'tc_link' =>  '/terms',
			'tc_button_text' =>  'Terms & Conditions'
		);

		add_row('table_settings', $settings, $post_id);
		add_row('comparison_affiliate_table', $row, $post_id);
		add_row('comparison_affiliate_table', $row2, $post_id);


	} else {

    		// Arbitrarily use -2 to indicate that the page with the title already exists
    		$post_id = -2;

	} 

}



/*---------------------------*\
    Plugin activation hook.
\*---------------------------*/
function at_plugin_install() {

    // Register post type at plugin install
    at_setup_post_type();

    // Create Example Post
    at_example_post();
 
    // clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook( AT_PATH .'bc-affiliate-table.php', 'at_plugin_install' );



/*-----------------------------*\
    Plugin deactivation hook.
\*-----------------------------*/
function at_plugin_deactivation() {

    // Delete Example Post
 	//    $example_post = get_page_by_title('Affiliate Table Example', OBJECT, 'affiliate_table');
 	//    if( !is_null($example_post) ){
 	//    	wp_delete_post($example_post->ID);
	// }

    // unregister the post type, so the rules are no longer in memory
    unregister_post_type( 'affiliate_table' );

    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( AT_PATH .'bc-affiliate-table.php', 'at_plugin_deactivation' );



/*-----------------------------------------------------------------------------*\
   In 'Affiliate Table' admin post list page: Add custom columns to post type.
\*-----------------------------------------------------------------------------*/
function at_custom_columns($column) {

    $column['shortcode_id'] = 'Shortcode';
    return $column;
}
add_filter( 'manage_affiliate_table_posts_columns', 'at_custom_columns' );



/*---------------------------------------------------------------------------*\
   In 'Affiliate Table' admin post list page: Insert custom columns content.
\*---------------------------------------------------------------------------*/
function custom_at_column( $column, $post_id ) {
    
	if ($column == 'shortcode_id') {	        
        echo '[affiliate-table id='. $post_id .']';    
    }
}
add_action( 'manage_affiliate_table_posts_custom_column' , 'custom_at_column', 10, 2 );



/*---------------------*\
    Admin CSS Styles.
\*---------------------*/
function at_admin_custom_css() {
?>
    <style>
        body.post-type-affiliate_table #at_table_rows tr:nth-child(odd) > td.acf-row-handle.order,
        body.post-type-affiliate_table #at_table_rows tr:nth-child(odd) > td.acf-row-handle.remove,
        body.post-type-affiliate_table #at_table_rows tr:nth-child(odd) > td.acf-fields > .acf-tab-wrap{
            background-color: #d8d8d8;
            color: #000000;
        }
        body.post-type-affiliate_table #at_table_rows tr:nth-child(even) > td.acf-row-handle.order,
        body.post-type-affiliate_table #at_table_rows tr:nth-child(even) > td.acf-row-handle.remove,
        body.post-type-affiliate_table #at_table_rows tr:nth-child(even) > td.acf-fields > .acf-tab-wrap{
            background-color: #a7a7a7;
            color: #000000;
        }
        body.post-type-affiliate_table #at_table_rows .acf-repeater.-row > table > tbody > tr > td{
            border-top-color: #000000;
        }
        body.post-type-affiliate_table #at_table_rows .acf-table{
            border: #000000 solid 1px;
        }
    </style>
<?php
}
add_action('admin_head', 'at_admin_custom_css');



/*-----------------------------------------------------*\
    Populate Select field for the 3 Boxes Shortcode.
\*-----------------------------------------------------*/
/*function acf_load_color_field_choices( $field ) {

	// reset choices
	$field['choices'] = array();

	// if has rows
	if( have_rows('comparison_affiliate_table', 'option') ) {
		// while has rows
		while( have_rows('comparison_affiliate_table', 'option') ) {

			// instantiate row
			the_row();

			// vars
			$value = get_sub_field('brand_operator_name');
			$label = get_sub_field('brand_operator_name');

			// append to choices
			$field['choices'][ $value ] = $label;

		}
	}
	// return the field
	return $field;
}
add_filter('acf/load_field/type=select', 'acf_load_color_field_choices');*/



/*-------------------------*\
    Post Sidebar Sticky.
\*-------------------------*/
function sticky_admin_sidebar_script ( $hook ) {
    // Only load on new or edit post screen or acf options pages
    if ( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) && substr($hook, 0, 24) != 'options_page_acf-options' && substr($hook, 0, 25) != 'toplevel_page_acf-options' ) {
        return;
    }
    // Load the script
    wp_enqueue_script( 'sticky_admin_sidebars', AT_URL . 'admin/sticky-admin-sidebar.js', array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'sticky_admin_sidebar_script' );


?>