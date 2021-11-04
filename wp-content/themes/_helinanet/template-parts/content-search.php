<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HelinaNet
 */

?>

<!-- #post-<?php the_ID(); ?> -->
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-info">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="post-meta">
             <span class="text-dark text-uppercase font-weight-semibold"><?php printf( __( 'The post type is: %s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?></span> | <?php _helinanet_posted_on(); ?>
        </div>
    </div>
</li>
