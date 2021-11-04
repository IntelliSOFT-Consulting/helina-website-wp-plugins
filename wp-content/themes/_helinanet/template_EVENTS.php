<?php
/*
Template Name: EVENTS
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

				<section class="page-header page-header-modern page-header-md bg-transparent border-top border-bottom">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="font-weight-bold text-dark"><?php the_title(); ?></h1>
							</div>
							
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row justify-content-md-center">
								<div class="col-md-9">
									<div id='loading'>loading...</div>

  									<div id='calendar'></div>
								</div>
							</div>

				</div>

			</div>
        
<?php endwhile; ?>       
<?php get_footer();
