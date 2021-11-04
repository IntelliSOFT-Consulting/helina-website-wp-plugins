<?php
/*
Template Name: LOGIN
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
								<h1 class="font-weight-bold text-dark"><?php the_title(); ?></h1>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb d-block text-center">
									<li><a href="<?php echo site_url(); ?>">Home</a></li>
									<li class="active"><?php the_title(); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row justify-content-md-center">
								<div class="col-md-9">
									<div class="featured-box featured-box-primary text-start mt-0">
										<div class="box-content">
											<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I have an account</h4>
											<form action="#" id="frmSignIn" method="post" class="needs-validation">
												<div class="row">
													<div class="form-group col">
														<label class="form-label">Username or E-mail Address</label>
														<input type="text" name="username" value="" class="form-control form-control-lg" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col">
														<a class="float-end" href="#">(Lost Password?)</a>
														<label class="form-label">Password</label>
														<input type="password" name="password" value="" class="form-control form-control-lg" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-lg-6">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" name="rememberme" class="custom-control-input" id="rememberme">
															<label class="custom-control-label text-2" for="rememberme">Remember Me</label>
														</div>
													</div>
													<div class="form-group col-lg-6">
														<input type="submit" value="Login" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

				</div>

			</div>
        
<?php endwhile; ?>       
<?php get_footer();
