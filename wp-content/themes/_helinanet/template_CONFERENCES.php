<?php
/*
Template Name: CONFERENCES
*/
get_header();
global $post;
?>
<?php
while ( have_posts() ) : the_post();
$post_id = $post->ID;
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'highlight' );
$title = get_the_title(); // This must be!, because this is the return - the_title would be echo
$title_array = explode(' ', $title);
$first_word = $title_array[0];
$second_word = $title_array[1];
?>

<div role="main" class="main">
        <section class="page-header page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(<?php echo $img[0]; ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                                <h1><?php echo $first_word; ?> <strong><?php echo $second_word; ?></strong></h1>
                                <span class="sub-title"><?php echo summary(get_the_content()); ?></span>
                            </div>
                            <div class="col-md-4 order-1 order-md-2 align-self-center">
                                <ul class="breadcrumb breadcrumb-light d-block text-md-end">
                                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                                    <li class="active"><?php the_title(); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </section>

				<div class="container py-1">
						
                        
							<?php $args = array('post_type'=>'conference','posts_per_page'=>-1,'order' => 'DESC'); ?>                            
							<?php
							$custom_query = new WP_Query($args); //
							$i = 0;
							while($custom_query->have_posts()) : $custom_query->the_post();
								$post_id = $post->ID;
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumb' );
								$theme = get_post_meta( $post_id, 'theme', true );
								$conference_submission_link = get_post_meta( $post_id, 'conference_submission_link', true );
								$conference_website = get_post_meta( $post_id, 'conference_website', true );
								$conference_start_date = get_post_meta( $post_id, 'conference_start_date', true );
								$conference_end_date = get_post_meta( $post_id, 'conference_end_date', true );
							?>
                            <?php if ($i % 3 == 0) { echo '<div class="row pb-4 mt-2">';} ?>
							<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                            
                                <div class="card card-background-image-hover border-0" style="background-image: url(<?php echo $img[0]; ?>);">                                
								 <div class="card-body">
                                        <h4 class="card-title mb-1 text-4 font-weight-bold"><?php the_title(); ?></h4>
                                        <p class="card-text"><?php echo summary(get_the_content()); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-modern" style="z-index:10;position: relative;">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                    </div>
                                </div>

							</div>
                            <?php if ($i % 3 == 2) { echo '</div>'; } ?>
                        <?php $i++; endwhile; ?>

				</div>

</div>
        
<?php endwhile; ?>       
<?php get_footer();
