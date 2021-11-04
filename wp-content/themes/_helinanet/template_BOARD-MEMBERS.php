<?php
/*
Template Name: BOARD MEMBERS
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
                                <h1>Leadership & Governance</strong></h1>
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

				<div class="container py-4">

					<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="team" data-option-key="filter">
						<li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Profiles</a></li>						
					</ul>

					<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
						<div class="row team-list sort-destination" data-sort-id="team">
                        
							<?php $args = array('post_type'=>'board-member','posts_per_page'=>-1,'order' => 'DESC'); ?>                            
							<?php
							$custom_query = new WP_Query($args); //
							while($custom_query->have_posts()) : $custom_query->the_post();
								$post_id = $post->ID;
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'square' );
								$title = get_post_meta( $post_id, 'title', true );
								$email = get_post_meta( $post_id, 'email', true );
								$phone = get_post_meta( $post_id, 'phone', true );
								$linkedin = get_post_meta( $post_id, 'linkedin', true );
								$twitter = get_post_meta( $post_id, 'twitter', true );
							?>
							<div class="col-12 col-sm-6 col-lg-4 isotope-item">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
									<span class="thumb-info-wrapper">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo $img[0]; ?>" class="img-fluid" alt="<?php the_title(); ?>">
											<span class="thumb-info-title">
												
												<span class="thumb-info-type"><?php echo $title; ?></span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
                                    	<h4 class="card-title mb-1 text-4 font-weight-bold"><?php the_title(); ?></h4>
										<span class="thumb-info-caption-text"><?php echo summary(get_the_content()); ?><a href="<?php the_permalink(); ?>" class="text-decoration-none" style="z-index:10;position: relative;">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a></span>
                                        
										<span class="thumb-info-social-icons mb-4">
											<a target="_blank" href="https://www.facebook.com/"><i class="fa fa-envelope"></i><span>Email</span></a>
											<a href="http://www.linkedin.com/"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
							</div>		
                            <?php endwhile; ?>
							
                            
						</div>

					</div>

				</div>

			</div>

        
        
        
<?php endwhile; ?>       
<?php
get_footer();
