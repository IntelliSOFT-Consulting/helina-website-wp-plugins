<?php
/*
Template Name: FAQs
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

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="font-weight-bold text-dark">FAQs</h1>
							</div>
							
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col">

							<h2 class="font-weight-normal text-7 mb-2"><?php echo $first_word; ?> <strong class="font-weight-extra-bold"><?php echo $second_word; ?></strong></h2>
							<?php the_content(); ?>

							<hr class="solid my-5">

							<div class="toggle toggle-primary m-0" data-plugin-toggle>
                            	<?php $args = array('post_type'=>'faq','posts_per_page'=>-1,'order' => 'DESC'); ?>                            
								<?php
                                $custom_query = new WP_Query($args); //
								$i = 0;
                                while($custom_query->have_posts()) : $custom_query->the_post();
                                    $post_id = $post->ID;
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'square' );
                                   
                                ?>
								<section class="toggle <?php if ($i==0) { echo 'active';} ?>">
									<a class="toggle-title"><?php the_title(); ?></a>
									<div class="toggle-content">
										<?php the_content();  ?>
									</div>
								</section>
								<?php $i++; endwhile; ?>
								
                                
							</div>

						</div>

					</div>

				</div>

			</div>

        
        
        
<?php endwhile; ?>       
<?php
get_footer();
