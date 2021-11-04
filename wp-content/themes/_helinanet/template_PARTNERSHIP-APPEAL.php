<?php
/*
Template Name: BECOME A PARTNER
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
$third_word = $title_array[2];
?>

<div role="main" class="main">

				

				<div class="container py-5">
					<div class="col-md-8 mx-md-auto text-center">
                    	<h2 class="text-color-dark font-weight-normal text-7 mb-5 pt-0"><?php echo $first_word;?> <?php  echo $second_word; ?> <strong class="font-weight-extra-bold"> <?php  echo $third_word; ?></strong></h2>
                    </div>
                    
					<div class="card mb-4">
									<div class="card-body">
										<div class="row">
											<div class="col">
											  	<form class="contact-form form-with-icons" name="become-a-partner-form" id="submitPartnershipRequest" autocomplete="false" onSubmit="return false;"  action="" method="POST">
													<div id="partner_feedback_err" class="alert alert-danger mt-4" style="display:none;">
														<strong>Error!</strong> There was an error sending your appeal.
														<span class="mail-error-message text-1 d-block"></span>
													</div>
                                                    <div id="partner_feedback_success" class="alert alert-success mt-4" style="display:none;">
														<strong>Success!</strong> Your membership appeal has been sent to us. We will reach out as soon as possible
													</div>
                                                    
                                                     <div class="statusMsg mt-4"></div>

													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">Name of Association</label>
															<div class="position-relative">
																<i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter the name of your association." maxlength="100" class="form-control text-3 h-auto py-2" name="NameOfAssociation" required="required">
															</div>
														</div>
                                                        
                                                        <div class="form-group col-lg-6">
															<label class="form-label">Country</label>
															<div class="position-relative">
																<i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50 z-index-1"></i>
																<div class="custom-select-1">
														      		
                                                                    <?php include get_template_directory() . '/inc/countries.php'; ?>
                                                                    <select class="form-select form-control h-auto" data-msg-required="Country where association is based in." name="Country" required="required">
																	<option value="" selected="selected">Select country where association is based in...</option>
																	<?php
                                                                    	foreach($countries as $key => $value) {
                                                                    ?>
                                                                    	<option value="<?php echo htmlspecialchars($value) ?>" title="<?php echo htmlspecialchars($value) ?>"><?php echo htmlspecialchars($value) ?></option>
                                                                    <?php } ?>
                                                                    </select>
														      	</div>
														    </div>
														</div>
                                                        
													</div>
													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">Full Name</label>
															<div class="position-relative">
																<i class="icons icon-user text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter your full name." maxlength="100" class="form-control text-3 h-auto py-2" name="FullName" required="required">
															</div>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">Designation</label>
															<div class="position-relative">
																<i class="icon-info icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter your designation." maxlength="100" class="form-control text-3 h-auto py-2" name="Designation" required="required">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">Email Address</label>
															<div class="position-relative">
																<i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="EmailAddress" required="required">
															</div>
														</div>
                                                        
                                                        <div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">Phone No.</label>
															<div class="position-relative">
																<i class="icon-phone icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter the phone number." maxlength="100" class="form-control text-3 h-auto py-2" name="PhoneNumber" required="required">
															</div>
														</div>
                                                        
                                                        
													</div>
                                                    
													
                                                    
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1 text-2">Application Appeal</label>
															<div class="position-relative">
																<i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
																<textarea maxlength="5000" data-msg-required="Please enter an appeal to back your application." rows="2" class="form-control text-3 h-auto py-2" name="Appeal" required="required"></textarea>
															</div>
														</div>
													</div>
													
													<div class="row">
														<div class="form-group col">
                                                        	
															<input id="btn_becomepartner" onclick="becomeHelinaPartner()" type="submit" value="Submit Partnership Appeal" class="btn btn-primary" data-loading-text="Loading..." disabled="disabled">
														</div>
													</div>
												</form>
                                                <div class="statusMsg mt-4"></div>
											</div>
										</div>
									</div>
								</div>
                    
					
                    
				</div>

			</div>
        
<?php endwhile; ?>       
<?php get_footer();
