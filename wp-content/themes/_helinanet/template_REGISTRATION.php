<?php
/*
Template Name: CREATE ACCOUNT
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
							
						</div>
					</div>
				</section>

				<div class="container py-4">
					<?php if (! is_user_logged_in()) { ?>
					<div class="row justify-content-md-center">
								<div class="col-md-9">
									<div class="featured-box featured-box-primary text-start mt-0">
										<div class="box-content">
                                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
                                        <p class="alert alert-success" id="successMsg" style="display:none;">You have successfully registered on HELINA</p>
                                        <div class="login-pagey__form-container" id="registrationContainer">
                    						<div id="error-message"></div>
											
											<form name="st-register-form" method="post" class="needs-validation">
												<div class="row">
													<div class="form-group col">
														<label class="form-label">E-mail Address</label>
														<input type="text" name="mail" id="st-email" value="" class="form-control form-control-lg" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-lg-6">
														<label class="form-label">Username</label>
														<input type="text" autocomplete="off" name="username" id="st-username" value="" class="form-control form-control-lg" required>
													</div>
													<div class="form-group col-lg-6">
														<label class="form-label">Password</label>
														<input type="password" name="password" id="st-psw" value="" class="form-control form-control-lg" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-lg-9">
														<div class="custom-control custom-checkbox">
															<!--<input type="checkbox" name="terms" class="custom-control-input" id="terms">-->
															<label class="custom-control-label text-2" for="terms"><!--I have read and agree to the <a href="#">terms of service</a>--></label>
														</div>
													</div>
													<div class="form-group col-lg-3">
														
                                                        <button type="button" class="btn btn-primary btn-modern float-end" id="register-me" >Create account</button>
													</div>
												</div>
											</form>
                                            </div>
										</div>
									</div>
								</div>
							</div>
					<?php } else  { ?>
                    
                        <article class="login-pagey__right">
                            <h1 class="login-pagey__heading">You are registered and logged in</h1>
                            <div class="login-pagey__google-login">
                                <a href="<?php echo site_url(); ?>/my-details" class="btn no-box-shadow">Go to your dashboard</a>
                            </div>
                       </article>
                
                <?php } ?>
				</div>

			</div>
        
<?php endwhile; ?>       
<?php get_footer();
