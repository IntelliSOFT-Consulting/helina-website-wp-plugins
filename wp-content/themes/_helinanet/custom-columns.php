<?php

add_filter( 'manage_edit-hotels_columns', 'add_columns' );
/**
 * Add columns to management page
 manage_edit-{your-custom-post-type-name}_columns
 manage_post_posts_columns
 *
 * @param array $columns
 *
 * @return array
 */
function add_columns( $columns ) {
    $columns['location'] = 'Location';
	$columns['map'] = 'Map';
	$columns['price'] = __( 'Price', 'kids365' );
	$columns['image'] = __( 'Thumbnail', 'kids365' );
    return $columns;
}

add_action( 'manage_hotels_posts_custom_column', 'columns_content', 10, 2 );
 
/**
 * Set content for columns in management page
 *
 * @param string $column_name
 * @param int $post_id
 *
 * @return void
 */
function columns_content( $column_name, $post_id ) {
    
	if ( 'location' === $column_name ) {
		$location = get_post_meta( $post_id, 'location', true );
    	echo empty( $location ) ? 'Not set': ' ' . get_the_title( $location );	
	} 
	
	if ( 'map' === $column_name ) {
		$map = get_post_meta( $post_id, 'google_map', true );
    	echo empty( esc_attr($map)) ? 'Not set': ' ' . esc_attr($map['address']);	
	} 
	
	if ( 'price' === $column_name ) {
		$price = get_post_meta( $post_id, 'price', true );
    	echo empty( $price ) ? 'Not set': '' .  $price,''  . '';
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
	
	if (  'image' === $column_name ) {
		$_thumb = get_the_post_thumbnail( $post_id, array(40, 40) );
		//echo get_the_post_thumbnail( $post_id, array(80, 80) );
    	echo empty( $_thumb ) ? 'Not set': '' . $_thumb;
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
  
  
}


///Restaurants

add_filter( 'manage_edit-restaurants_columns', 'add_columns_restaurants' );
/**
 * Add columns to management page
 manage_edit-{your-custom-post-type-name}_columns
 manage_post_posts_columns
 *
 * @param array $columns
 *
 * @return array
 */
function add_columns_restaurants( $columns ) {
    $columns['location'] = 'Location';
	$columns['map'] = 'Map';
	//$columns['price'] = __( 'Price', 'kids365' );
	$columns['image'] = __( 'Thumbnail', 'kids365' );
    return $columns;
}

add_action( 'manage_restaurants_posts_custom_column', 'columns_content_restaurants', 10, 2 );
 
/**
 * Set content for columns in management page
 *
 * @param string $column_name
 * @param int $post_id
 *
 * @return void
 */
function columns_content_restaurants( $column_name, $post_id ) {
    
	if ( 'location' === $column_name ) {
		$location = get_post_meta( $post_id, 'location', true );
    	echo empty( $location ) ? 'Not set': ' ' . get_the_title( $location );	
	} 
	
	if ( 'map' === $column_name ) {
		$map = get_post_meta( $post_id, 'google_map', true );
    	echo empty( esc_attr($map)) ? 'Not set': ' ' . esc_attr($map['address']);	
	} 
	
	if ( 'price' === $column_name ) {
		$price = get_post_meta( $post_id, 'price', true );
    	echo empty( $price ) ? 'Not set': '' .  $price, ''  . '';
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
	
	if (  'image' === $column_name ) {
		$_thumb = get_the_post_thumbnail( $post_id, array(40, 40) );
		//echo get_the_post_thumbnail( $post_id, array(80, 80) );
    	echo empty( $_thumb ) ? 'Not set': '' . $_thumb;
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
  
  
}



///Activities

add_filter( 'manage_edit-activities_columns', 'add_columns_activities' );
/**
 * Add columns to management page
 manage_edit-{your-custom-post-type-name}_columns
 manage_post_posts_columns
 *
 * @param array $columns
 *
 * @return array
 */
function add_columns_activities( $columns ) {
    $columns['location'] = 'Location';
	$columns['map'] = 'Map';
	$columns['price'] = __( 'Price', 'kids365' );
	$columns['image'] = __( 'Thumbnail', 'kids365' );
    return $columns;
}

add_action( 'manage_activities_posts_custom_column', 'columns_content_activities', 10, 2 );
 
/**
 * Set content for columns in management page
 *
 * @param string $column_name
 * @param int $post_id
 *
 * @return void
 */
function columns_content_activities( $column_name, $post_id ) {
    
	if ( 'location' === $column_name ) {
		$location = get_post_meta( $post_id, 'location', true );
    	echo empty( $location ) ? 'Not set': ' ' . get_the_title( $location );	
	} 
	
	if ( 'map' === $column_name ) {
		$map = get_post_meta( $post_id, 'google_map', true );
    	echo empty( esc_attr($map)) ? 'Not set': ' ' . esc_attr($map['address']);	
	} 
	
	if ( 'price' === $column_name ) {
		$price = get_post_meta( $post_id, 'price', true );
    	echo empty( $price ) ? 'Not set': ' ' .  $price, ''  . '';
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
	
	if (  'image' === $column_name ) {
		$_thumb = get_the_post_thumbnail( $post_id, array(40, 40) );
		//echo get_the_post_thumbnail( $post_id, array(80, 80) );
    	echo empty( $_thumb ) ? 'Not set': '' . $_thumb;
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
  
  
}


///Events

add_filter( 'manage_edit-events_columns', 'add_columns_events' );
/**
 * Add columns to management page
 manage_edit-{your-custom-post-type-name}_columns
 manage_post_posts_columns
 *
 * @param array $columns
 *
 * @return array
 */
function add_columns_events( $columns ) {
    $columns['location'] = 'Location';
	$columns['map'] = 'Map';
	$columns['price'] = __( 'Price', 'kids365' );
	$columns['image'] = __( 'Thumbnail', 'kids365' );
    return $columns;
}

add_action( 'manage_events_posts_custom_column', 'columns_content_events', 10, 2 );
 
/**
 * Set content for columns in management page
 *
 * @param string $column_name
 * @param int $post_id
 *
 * @return void
 */
function columns_content_events( $column_name, $post_id ) {
    
	if ( 'location' === $column_name ) {
		$location = get_post_meta( $post_id, 'location', true );
    	echo empty( $location ) ? 'Not set': ' ' . get_the_title( $location );	
	} 
	
	if ( 'map' === $column_name ) {
		$map = get_post_meta( $post_id, 'google_map', true );
    	echo empty( esc_attr($map)) ? 'Not set': ' ' . esc_attr($map['address']);	
	} 
	
	if ( 'price' === $column_name ) {
		$price = get_post_meta( $post_id, 'price', true );
    	echo empty( $price ) ? 'Not set': ' ' .  $price, ''  . '';
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
	
	if (  'image' === $column_name ) {
		$_thumb = get_the_post_thumbnail( $post_id, array(40, 40) );
		//echo get_the_post_thumbnail( $post_id, array(80, 80) );
    	echo empty( $_thumb ) ? 'Not set': '' . $_thumb;
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
  
  
}

///Locations

add_filter( 'manage_edit-locations_columns', 'add_columns_locations' );
/**
 * Add columns to management page
 manage_edit-{your-custom-post-type-name}_columns
 manage_post_posts_columns
 *
 * @param array $columns
 *
 * @return array
 */
function add_columns_locations( $columns ) {
    //$columns['location'] = 'Location';
	$columns['map'] = 'Map';
	//$columns['price'] = __( 'Price', 'kids365' );
	$columns['image'] = __( 'Thumbnail', 'kids365' );
    return $columns;
}

add_action( 'manage_locations_posts_custom_column', 'columns_content_locations', 10, 2 );
 
/**
 * Set content for columns in management page
 *
 * @param string $column_name
 * @param int $post_id
 *
 * @return void
 */
function columns_content_locations( $column_name, $post_id ) {
    
	if ( 'location' === $column_name ) {
		$location = get_post_meta( $post_id, 'location', true );
    	echo empty( $location ) ? 'Not set': ' ' . get_the_title( $location );	
	} 
	
	if ( 'map' === $column_name ) {
		$map = get_post_meta( $post_id, 'google_map', true );
    	echo empty( esc_attr($map)) ? 'Not set': ' ' . esc_attr($map['address']);	
	} 
	
	if ( 'price' === $column_name ) {
		$price = get_post_meta( $post_id, 'price', true );
    	echo empty( $price ) ? 'Not set': ' ' .  $price, ''  . '';
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
	
	if (  'image' === $column_name ) {
		$_thumb = get_the_post_thumbnail( $post_id, array(40, 40) );
		//echo get_the_post_thumbnail( $post_id, array(80, 80) );
    	echo empty( $_thumb ) ? 'Not set': '' . $_thumb;
		//echo ' ' . number_format( $_sale_price, 0, '.', ',' ) . ' p/m';
		
	} 
  
  
}

