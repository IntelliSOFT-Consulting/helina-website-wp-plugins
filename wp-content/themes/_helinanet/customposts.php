<?php
//Custom post type sliders
function custom_post_sliders() {
  $labels = array(
    'name'               => _x( 'Sliders', 'post type general name' ),
    'singular_name'      => _x( 'Slider', 'post type singular name' ),
    'add_new'            => _x( 'Add  Slider', 'Slider' ),
    'add_new_item'       => __( 'Add Slider' ),
    'edit_item'          => __( 'Edit Slider' ),
    'new_item'           => __( 'New Slider' ),
    'all_items'          => __( 'All Sliders' ),
    'view_item'          => __( 'View Sliders' ),
    'search_items'       => __( 'Search Sliders' ),
    'not_found'          => __( 'No Sliders found' ),
    'not_found_in_trash' => __( 'No Sliders found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Sliders'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Sliders description',
    'public'        => true,
    'menu_position' => 5,
	'menu_icon'     => 'dashicons-images-alt',
    'supports'      => array( 'title','thumbnail'),
    'has_archive'   => false,
	//'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'slider', $args ); 
}
add_action( 'init', 'custom_post_sliders' );

//Custom post type hotels
function custom_post_wg() {
  $labels = array(
    'name'               => _x( 'Work Group', 'post type general name' ),
    'singular_name'      => _x( 'Work Group', 'post type singular name' ),
    'add_new'            => _x( 'Add  Work Group', 'Work Group' ),
    'add_new_item'       => __( 'Add Work Group' ),
    'edit_item'          => __( 'Edit Work Group' ),
    'new_item'           => __( 'New Work Group' ),
    'all_items'          => __( 'All Work Groups' ),
    'view_item'          => __( 'View Work Groups' ),
    'search_items'       => __( 'Search Work Groups' ),
    'not_found'          => __( 'No Work Group found' ),
    'not_found_in_trash' => __( 'No Work Group found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Working Groups'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the working group description',
    'public'        => true,
    'menu_position' => 5,
	'menu_icon'     => 'dashicons-groups',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	//'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'working-group', $args ); 
}
add_action( 'init', 'custom_post_wg' );

//Custom post type restaurants
function custom_post_conferences() {
  $labels = array(
    'name'               => _x( 'Conferences', 'post type general name' ),
    'singular_name'      => _x( 'Conference', 'post type singular name' ),
    'add_new'            => _x( 'Add Conference', 'Conference' ),
    'add_new_item'       => __( 'Add Conference' ),
    'edit_item'          => __( 'Edit Conference' ),
    'new_item'           => __( 'New Conference' ),
    'all_items'          => __( 'All Conferences' ),
    'view_item'          => __( 'View Conference' ),
    'search_items'       => __( 'Search Conferences' ),
    'not_found'          => __( 'No Conference found' ),
    'not_found_in_trash' => __( 'No Conference found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Conferences'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Conference description',
    'public'        => true,
    'menu_position' => 5,
	'menu_icon'     => 'dashicons-media-interactive',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'conference', $args ); 
}
add_action( 'init', 'custom_post_conferences' );





//Custom post type activities
function custom_post_membership() {
  $labels = array(
    'name'               => _x( 'Members', 'post type general name' ),
    'singular_name'      => _x( 'Member', 'post type singular name' ),
    'add_new'            => _x( 'Add Member', 'Location' ),
    'add_new_item'       => __( 'Add Member' ),
    'edit_item'          => __( 'Edit Member' ),
    'new_item'           => __( 'New Member' ),
    'all_items'          => __( 'All Members' ),
    'view_item'          => __( 'View Member' ),
    'search_items'       => __( 'Search Member' ),
    'not_found'          => __( 'No Member found' ),
    'not_found_in_trash' => __( 'No Member found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Member Countries'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Member description',
    'public'        => true,
    'menu_position' => 5,
	'menu_icon'     => 'dashicons-location-alt',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'member', $args ); 
}
add_action( 'init', 'custom_post_membership' );

//Custom post type activities
function custom_post_events() {
  $labels = array(
    'name'               => _x( 'Events', 'post type general name' ),
    'singular_name'      => _x( 'Event', 'post type singular name' ),
    'add_new'            => _x( 'Add Event', 'Event' ),
    'add_new_item'       => __( 'Add Event' ),
    'edit_item'          => __( 'Edit Event' ),
    'new_item'           => __( 'New Event' ),
    'all_items'          => __( 'All Events' ),
    'view_item'          => __( 'View Event' ),
    'search_items'       => __( 'Search Events' ),
    'not_found'          => __( 'No event found' ),
    'not_found_in_trash' => __( 'No event found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the event description',
    'public'        => true,
    'menu_position' => 4,
	'menu_icon'     => 'dashicons-palmtree',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'event', $args ); 
}
add_action( 'init', 'custom_post_events' );

//Custom post type custom_post_news
function custom_post_partners() {
  $labels = array(
    'name'               => _x( 'Partners', 'post type general name' ),
    'singular_name'      => _x( 'Partner', 'post type singular name' ),
    'add_new'            => _x( 'Add Partner', 'Partner' ),
    'add_new_item'       => __( 'Add Partner' ),
    'edit_item'          => __( 'Edit Partner' ),
    'new_item'           => __( 'New Partner' ),
    'all_items'          => __( 'All Partners' ),
    'view_item'          => __( 'View Partner' ),
    'search_items'       => __( 'Search Partners' ),
    'not_found'          => __( 'No Partner found' ),
    'not_found_in_trash' => __( 'No Partner found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Partners'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Partner description',
    'public'        => true,
    'menu_position' => 4,
	'menu_icon'     => 'dashicons-awards',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
  );
  register_post_type( 'partner', $args ); 
}
add_action( 'init', 'custom_post_partners' );



//Custom post type custom_post_newsletter
function custom_post_newsletter() {
  $labels = array(
    'name'               => _x( 'Newsletters', 'post type general name' ),
    'singular_name'      => _x( 'Newsletter', 'post type singular name' ),
    'add_new'            => _x( 'Add Newsletter', 'Newsletter' ),
    'add_new_item'       => __( 'Add Newsletter' ),
    'edit_item'          => __( 'Edit Newsletter' ),
    'new_item'           => __( 'New Newsletter' ),
    'all_items'          => __( 'All Newsletters' ),
    'view_item'          => __( 'View Newsletter' ),
    'search_items'       => __( 'Search Newsletters' ),
    'not_found'          => __( 'No Newsletter found' ),
    'not_found_in_trash' => __( 'No Newsletter found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Newsletters'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Newsletter description',
    'public'        => true,
    'menu_position' => 4,
	'menu_icon'     => 'dashicons-media-archive',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'newsletter', $args ); 
}
add_action( 'init', 'custom_post_newsletter' );

//Custom post type custom_post_faq
function custom_post_faq() {
  $labels = array(
    'name'               => _x( 'FAQs', 'post type general name' ),
    'singular_name'      => _x( 'FAQ', 'post type singular name' ),
    'add_new'            => _x( 'Add FAQ', 'FAQ' ),
    'add_new_item'       => __( 'Add FAQ' ),
    'edit_item'          => __( 'Edit FAQ' ),
    'new_item'           => __( 'New FAQ' ),
    'all_items'          => __( 'All FAQs' ),
    'view_item'          => __( 'View FAQ' ),
    'search_items'       => __( 'Search FAQs' ),
    'not_found'          => __( 'No FAQ found' ),
    'not_found_in_trash' => __( 'No FAQ found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Knowledge Centre'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the FAQ description',
    'public'        => true,
    'menu_position' => 4,
	'menu_icon'     => 'dashicons-format-quote',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'faq', $args ); 
}
add_action( 'init', 'custom_post_faq' );


//Custom post type custom_post_board
function custom_post_board() {
  $labels = array(
    'name'               => _x( 'Board', 'post type general name' ),
    'singular_name'      => _x( 'Board', 'post type singular name' ),
    'add_new'            => _x( 'Add Board Member', 'Newsletter' ),
    'add_new_item'       => __( 'Add Board Member' ),
    'edit_item'          => __( 'Edit Board Member' ),
    'new_item'           => __( 'New Board Member' ),
    'all_items'          => __( 'All Board Members' ),
    'view_item'          => __( 'View Board Members' ),
    'search_items'       => __( 'Search Board Members' ),
    'not_found'          => __( 'No Board Member found' ),
    'not_found_in_trash' => __( 'No Board Member found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Board Members'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Board Member description',
    'public'        => true,
    'menu_position' => 4,
	'menu_icon'     => 'dashicons-businessman',
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false,
	//'taxonomies'	=> array('post_tag' ),
  );
  register_post_type( 'board-member', $args ); 
}
add_action( 'init', 'custom_post_board' );





// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'crunchify_create_events_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function crunchify_create_events_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Working Group', 'taxonomy general name' ),
    'singular_name' => _x( 'Working Group', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Working Groups' ),
    'all_items' => __( 'All Working Groups' ),
    'parent_item' => __( 'Parent Working Group' ),
    'parent_item_colon' => __( 'Parent Working Group:' ),
    'edit_item' => __( 'Edit Working Group' ), 
    'update_item' => __( 'Update Working Group' ),
    'add_new_item' => __( 'Add Working Group' ),
    'new_item_name' => __( 'New Working Group Name' ),
    'menu_name' => __( 'Working Groups' ),
	'featured_image'        => __( 'Event image', 'woocommerce' ),
	'set_featured_image'    => __( 'Set Event image', 'woocommerce' ),
	'remove_featured_image' => __( 'Remove Event image', 'woocommerce' ),
	'use_featured_image'    => __( 'Use as Event image', 'woocommerce' ),
  ); 	
 
  register_taxonomy('groups',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'groups' ),
	'supports'          => array( 'thumbnail' ),
  ));
}



