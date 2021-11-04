<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HelinaNet
 */
 
get_header();
?>
<?php
while ( have_posts() ) : the_post();
$post_id = $post->ID;
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'highlight' );
$title = get_post_meta( $post_id, 'title', true );
$email = get_post_meta( $post_id, 'email', true );
$phone = get_post_meta( $post_id, 'phone', true );
$linkedin = get_post_meta( $post_id, 'linkedin', true );
$twitter = get_post_meta( $post_id, 'twitter', true );


?>
<div role="main" class="main">

				<div class="container pt-5">

					<div class="row py-4 mb-2">
						<div class="col-md-7 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?php the_title(); ?></h2>
							</div>
							<div class="overflow-hidden mb-3">
								<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500"><?php echo $title; ?></p>
							</div>
							
                            <?php the_content(); ?>
							<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
							<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
								<div class="col-lg-6">
									<a href="#" class="btn btn-modern btn-primary mt-3">Get In Touch</a>
								</div>
								<div class="col-sm-6 text-lg-end my-4 my-lg-0">
									<strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
									<ul class="social-icons float-lg-end">
										<li class="social-icons-twitter"><a href="https://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
										<li class="social-icons-linkedin"><a href="https://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
							<img src="<?php echo $img[0]; ?>" class="img-fluid mb-2" alt="">
						</div>
					</div>
				</div>

				

				

			</div>
<?php endwhile; ?> 
<?php
get_footer();
