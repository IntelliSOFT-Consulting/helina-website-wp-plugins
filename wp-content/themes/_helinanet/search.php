<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HelinaNet
 */

get_header();
?>

<div role="main" class="main">
				<?php if ( have_posts() ) : ?>
				<section class="page-header page-header-modern page-header page-header-modern bg-color-primary page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-light text-10"><strong>Search</strong></h1>
								
                                
							</div>
							
						</div>
					</div>
				</section>
				<hr class="m-0">

				<div class="container py-5 mt-3">

					<div class="row">
						<div class="col">
							<h2 class="font-weight-normal text-7 mb-0">
                            <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Showing results for %s', '_cio' ), '<strong class="font-weight-extra-bold">' . get_search_query() . '</strong>' );
                            ?>
                            </h2>
							<!--<p class="lead mb-0">6 results found.</p>-->
						</div>
					</div>
					<div class="row">
						<div class="col pt-2 mt-1">
							<hr class="my-4">
						</div>
					</div>
					<div class="row">
						<div class="col">

							<ul class="simple-post-list m-0">
								
                                <?php
								while ( have_posts() ) :
								the_post();
				
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content-search', get_post_type() ); ?> 
								
								<?php endwhile; ?>
							</ul>
                            <?php 
							 else :
					
								get_template_part( 'template-parts/content', 'none' );
					
							endif;
							?>

							<!--<ul class="pagination float-end">
								<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
							</ul>-->
                            <?php if (function_exists("pagination")) {
								pagination($custom_query->max_num_pages);
							} ?>

						</div>
					</div>
				</div>

				<section class="section section-default border-0 m-0">
					<div class="container py-4">

						<div class="row pb-4">
							<div class="col">
								<form action="<?php echo home_url( '/' ); ?>" method="get">
									<div class="input-group input-group-lg">
										<input class="form-control h-auto" placeholder="Search..." name="s" id="s" type="text">
										<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
									</div>
								</form>								
							</div>
						</div>

					</div>
				</section>

			</div>
<?php
//get_sidebar();
get_footer();
