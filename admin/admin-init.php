<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*---------------------------------------*\
    Register Affiliate Table post type.
\*---------------------------------------*/
function at_setup_post_types() {

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
           'menu_icon'		=> 'dashicons-list-view',
       )
    );


	// register the "offer boxes" custom post type.
	register_post_type('offer_boxes',
		array(
			'labels'      => array(
				'name'			=> __('Offer Boxes'),
				'singular_name'	=> __('Offer Boxes'),
				'add_new' 		=> __('Add new boxes'),
				'add_new_item' 	=> __('Add new boxes'),
				'edit_item' 	=> __('Edit boxes'),
				'new_item' 		=> __('New offer boxes'),
				'view_item' 	=> __('View boxes'),
				'all_items' 	=> __('All offer boxes'),
				'not_found' 	=> __('No offer boxes found'),
			),
            'public'		=> true,
			'has_archive'	=> true,
			'menu_icon'		=> 'dashicons-list-view',
		)
	);
}
add_action( 'init', 'at_setup_post_types' );



/*----------------------------------------*\
    Affiliate Table Post type Template.
\*----------------------------------------*/
function at_get_custom_post_type_template($single_template) {
    global $post;

    if ($post->post_type == 'affiliate_table') {
        $single_template = AT_PATH . 'templates/single-affiliate_table.php';
        return $single_template;
    }
    if ($post->post_type == 'offer_boxes') {
        $single_template = AT_PATH . 'templates/single-offer_boxes.php';
        return $single_template;
    }

}
add_filter( 'single_template', 'at_get_custom_post_type_template' );



/*----------------------------------------*\
    Set no-index for custom Post Type.
\*----------------------------------------*/
function at_noindex_for_custom_post()
{
	if ( is_singular( 'affiliate_table' ) || is_singular('offer_boxes') ) {
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



/*-------------------------------------------------------------------------------------------*\
    Function creates post duplicate as a draft and redirects then to the edit post screen.
\*-------------------------------------------------------------------------------------------*/
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}

	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;

	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {

		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );

		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}


		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );



/*-----------------------------------------------------------------*\
    Add the duplicate link to action list for post_row_actions.
\*-----------------------------------------------------------------*/
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts') && $post->post_type=='affiliate_table' || current_user_can('edit_posts') && $post->post_type=='offer_boxes') {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );



/*---------------------------*\
    Plugin activation hook.
\*---------------------------*/
function at_plugin_install() {

    // Register post type at plugin install
    at_setup_post_types();

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
	unregister_post_type( 'offer_boxes' );

    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( AT_PATH .'bc-affiliate-table.php', 'at_plugin_deactivation' );



/*-----------------------------------------------------------------------------*\
   In admin post list pages: Add custom columns to post types.
\*-----------------------------------------------------------------------------*/
function at_custom_columns($column) {
    global $post;
	if ($post->post_type=='affiliate_table'){
		$column['shortcode_id_at'] = 'Shortcode';
		return $column;
	}
	if ($post->post_type=='offer_boxes'){
		$column['shortcode_id_bo'] = 'Shortcode';
		return $column;
	}
}
add_filter( 'manage_affiliate_table_posts_columns', 'at_custom_columns' );
add_filter( 'manage_offer_boxes_posts_columns', 'at_custom_columns' );



/*---------------------------------------------------------------------------*\
   In admin post list pages: Insert custom columns content.
\*---------------------------------------------------------------------------*/
function custom_at_column( $column, $post_id ) {
    
	if ($column == 'shortcode_id_at') {
        echo '[affiliate-table id='. $post_id .']';    
    }

	if ($column == 'shortcode_id_bo') {
		echo '[offer-boxes id='. $post_id .']';
	}
}
add_action( 'manage_affiliate_table_posts_custom_column' , 'custom_at_column', 10, 2 );
add_action( 'manage_offer_boxes_posts_custom_column' , 'custom_at_column', 10, 2 );



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
        #menu-posts-affiliate_table > a > div.wp-menu-image.dashicons-before.dashicons-list-view::before,
        #menu-posts-offer_boxes > a > div.wp-menu-image.dashicons-before.dashicons-list-view::before{
            color: #00d084;
        }
    </style>
<?php
}
add_action('admin_head', 'at_admin_custom_css');



/*---------------------------------------------------------*\
    Populate Select field for the Offer Boxes Shortcode.
\*---------------------------------------------------------*/
function acf_load_affiliate_table_rows_into_offer_boxes_select_fields( $field ) {

		//var_dump($field);

		// reset choices
		$field['choices'] = array();

		$query = new WP_Query( array(
			'post_type'      => 'affiliate_table',
			'posts_per_page' => 100
		) );

		//var_dump($query);
		while ( $query->have_posts() ) : $query->the_post();
			if ( have_rows( 'comparison_affiliate_table', get_the_ID() ) ) {
				while ( have_rows( 'comparison_affiliate_table', get_the_ID() ) ) {

					// instantiate row
					the_row();

					// vars
					//$value = get_sub_field( 'brand_operator_name' );

					$label = get_sub_field( 'brand_operator_name' );
					$value = get_the_ID().'_'.(string)get_row_index();
					//var_dump($value);
					//var_dump($label);

					$title = get_the_title();

					// append to choices
					$field['choices'][ $value ] = $title . ' - ' . $label;

				}
			}

		endwhile;

		wp_reset_query();

		//var_dump($field);

		// return the field
		return $field;

}
add_filter('acf/load_field/key=field_5c275f77795b9', 'acf_load_affiliate_table_rows_into_offer_boxes_select_fields');
add_filter('acf/load_field/key=field_5c275f87795ba', 'acf_load_affiliate_table_rows_into_offer_boxes_select_fields');
add_filter('acf/load_field/key=field_5c275f92795bb', 'acf_load_affiliate_table_rows_into_offer_boxes_select_fields');



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



/*function add_my_options_pages() {
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Offer Boxes',
			'menu_title' 	=> 'Offer Boxes',
			'menu_slug' 	=> 'offer-boxes',
			'capability' 	=> 'edit_posts',
			'redirect' 	=> false,
			'parent_slug'	=> 'edit.php?post_type=affiliate_table',
			'position'	=> false,
			'icon_url' 	=> 'dashicons-images-alt2',
		));

	}
}
add_action('init', 'add_my_options_pages');*/




?>