<?php

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

		$row = array(
			'brand_operator_name' =>  'Unibet',
			'brand_logo_image' => false,
			'brand_logo_background' =>  '#278900',
			'brand_offer_title' =>  'Brand Offer Title',
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
			'sign_up_text' =>  'Sign Up',
			'include_our_score' =>  'yes',
			'our_score' =>  '7.8',
			'our_score_text' =>  'Our Score',
			'go_to_text' =>  'Go to',
			'create_your_account_text' =>  'Create your account',
			'read_the_full_review_text' =>  'Read the full review',
			'review_text' =>  'Review',
			'show_text' =>  'Show',
			'hide_text' =>  'Hide',
			'first_pointer' =>  'First Pointer - Dropdown',
			'second_pointer' =>  'Second Pointer - Dropdown',
			'third_pointer' =>  'Third Pointer - Dropdown',
			'review_exist' =>  'no',
			'mini_review' => null,
			'mini_review_title' =>  'Mini Review Title',
			'mini_review_content' =>  'Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review ContentMini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review ContentMini Review ContentMini Review ContentMini Review Content',
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
			'brand_offer_title' =>  'Ladbrokes',
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
			'sign_up_text' =>  'Sign Up',
			'include_our_score' =>  'yes',
			'our_score' =>  '7.8',
			'our_score_text' =>  'Our Score',
			'go_to_text' =>  'Go to',
			'create_your_account_text' =>  'Create your account',
			'read_the_full_review_text' =>  'Read the full review',
			'review_text' =>  'Review',
			'show_text' =>  'Show',
			'hide_text' =>  'Hide',
			'first_pointer' =>  'Accepts Paypal',
			'second_pointer' =>  'Asian Market',
			'third_pointer' =>  'Live Matches',
			'review_exist' =>  'no',
			'mini_review' => null,
			'mini_review_title' =>  'Mini Review Title',
			'mini_review_content' =>  'Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review ContentMini Review Content Mini Review Content Mini Review Content Mini Review Content Mini Review ContentMini Review ContentMini Review ContentMini Review ContentMini Review Content',
			'operator_screenshot' => false,
			'tc_popup_title' =>  'Terms & Conditions',
			'tc_popup_content' =>  'New customers only. Real money deposit required. Credit or debit card only. Deposit and bonus amount must be wagered 6 times (min odds 4/5) prior to bonus funds and associated winnings becoming withdrawable New Customer Offer, T&C’s Apply 18+. Please Gamble Responsibly.',
			'tc_link' =>  '/terms',
			'tc_button_text' =>  'Terms & Conditions'
		);

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


?>