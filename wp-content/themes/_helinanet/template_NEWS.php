<?php
/*
Template Name: NEWS
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

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-dark font-weight-bold text-8"><?php the_title(); ?></h1>
								<span class="sub-title text-dark"><?php the_content(); ?></span>
							</div>
							
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts">

								<div class="row">
                                <?php
								  $args = array('post_type'=>'post','posts_per_page'=>10,'order' => 'DESC');
								?>
								<?php
									$custom_query = new WP_Query($args); //
									$i = 0;
									while($custom_query->have_posts()) : $custom_query->the_post();
									$post_id = $post->ID;
									$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'featured' );
									$highlight_text = get_post_meta( $post_id, 'highlight_text', true );
									$sub_text = get_post_meta( $post_id, 'sub_text', true );
									$tagline = get_post_meta( $post_id, 'tagline', true );
									$cta = get_post_meta( $post_id, 'cta', true );
									//echo $i;
								?> 

									<div class="col-md-4 col-lg-3">
										<article class="post post-medium border-0 pb-0 mb-5">
											<div class="post-image">
												<a href="<?php the_permalink(); ?>">
													<img src="<?php echo $img[0]; ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="<?php the_title(); ?>" />
												</a>
											</div>

											<div class="post-content">
												<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<p><?php echo summary(get_the_content()); ?></p>
											</div>
										</article>
									</div>
								<?php $i++;  endwhile; ?>  
							
								</div>
	
								<!--<div class="row">
									<div class="col">
										<ul class="pagination float-end">
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>-->

							</div>
						</div>

					</div>

				</div>

			</div>
        
<?php endwhile; ?>       
<?php get_footer();
