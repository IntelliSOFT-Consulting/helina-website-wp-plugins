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
$post_slug = $post->post_name;
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'highlight' );
$focus_areas = get_post_meta( $post_id, 'focus_areas', true );
$select_achievements = get_post_meta( $post_id, 'select_achievements', true );
$activities = get_post_meta( $post_id, 'activities', true );
$email = get_post_meta( $post_id, 'email', true );
?>
<div role="main" class="main">
				<section class="page-header page-header-classic page-header-sm">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 data-title-border><?php the_title(); ?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="<?php echo site_url(); ?>">Home</a></li>
									<li class="active"><?php the_title(); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				
                
				<section class="section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-4">

						<div class="row align-items-center">
							<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
								<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									<div>
										<img alt="<?php the_title(); ?>" class="img-fluid" src="<?php echo $img[0]; ?>">
									</div>
									
                                    
								</div>
							</div>
							<div class="col-md-6">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">What we <strong class="font-weight-extra-bold">Do</strong></h2>
								</div>
								<?php the_content(); ?>
							</div>
                            
                            
						</div>
					</div>
				</section>
                
                <div class="container">
                <div class="row align-items-center">
                            
                            <div class="col">

									<div class="heading heading-border heading-middle-border">
                                        <h4><?php the_title(); ?> <strong><i class="far fa-calendar-alt"></i> Events</strong></h4>
                                    </div>
									<ul class="list">
                                    	<?php 
										$query = new WP_Query( array(
											'post_type' => 'event',          // name of post type.
											'tax_query' => array(
												array(
													'taxonomy' => 'groups', 'field' => 'term_id','terms' => $post_slug)
											)
										) );
										
										
										while ( $query->have_posts() ) : $query->the_post();
										$event_id = $post->ID;
										$start_date = get_post_meta( $event_id, 'start_date', true );
										$end_date = get_post_meta( $event_id, 'end_date', true );
										$venue = get_post_meta( $event_id, 'venue', true );
										?>
										<a href="<?php the_permalink(); ?>"><li class="btn btn-outline btn-info"><?php the_title(); ?> <br /><strong>Start Date:</strong> <?php echo date("F j, Y", strtotime($start_date)); ?></li></a>
                                        
                                        <?php endwhile; wp_reset_query(); ?>
									</ul>

								</div>
                            
                            
						</div>
                </div>
				<?php if( have_rows('focus_areas') || have_rows('select_achievements') || have_rows('activities')  ): ?>	
				<div class="container">

					<div class="row mt-5 py-3">
                    	
					
                    <?php if( have_rows('focus_areas') ) : ?>
					<div class="col-lg-6">
                    	<h4>Focus Areas</h4>
						
                        <ul class="list list-icons">
                        	<?php $i = 1; ?>
							<?php while( have_rows('focus_areas') ): the_row(); 
                                $class = ($i %2 == 0) ? 'right' : 'left';
                            ?>
                            <li><i class="fas fa-check"></i> <?php echo ucfirst(get_sub_field('key_focus_areas_statements')); ?></li>
                            <?php $i++; endwhile; ?>                            
                        </ul>

                    </div>
                    <?php  endif; ?>
                    
                    
                    <?php if( have_rows('select_achievements') ) : ?>
                    <div class="col-lg-6">
                    	<h4>Achievements</h4>
						
                        <ul class="list list-icons">
                        	<?php $i = 1; ?>
							<?php while( have_rows('select_achievements') ): the_row(); 
                                $class = ($i %2 == 0) ? 'right' : 'left';
                            ?>
                            <li><i class="fas fa-check"></i> <?php echo ucfirst(get_sub_field('achievement')); ?></li>
                            <?php $i++; endwhile; ?>                            
                        </ul>
                    </div>
                    <?php  endif; ?>
                      
                        
						
					</div>
					<div class="row">
						<div class="col py-4">
							<hr class="solid">
						</div>
					</div>
					<div class="row pb-4">
						
						<div class="col mb-4 mb-lg-0">
							
                            <div class="col-md-8 mx-md-auto text-center">
                                <h2 class="text-color-dark font-weight-normal text-7 mb-2 pt-2">Our <strong class="font-weight-extra-bold">Activities</strong></h2>
                            </div>
							                
							<div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
                            	<?php $i = 1; ?>
								<?php while( have_rows('activities') ): the_row(); 
                                    $class = ($i %2 == 0) ? 'right' : 'left';
                                    $image = get_sub_field('image');
                                ?>
								<div class="card card-default">
									<div class="card-header" id="collapse100Heading<?php echo $i; ?>">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse100<?php echo $i; ?>">
												<?php echo $i; ?> - <?php echo ucfirst(get_sub_field('activity_title')); ?>
											</a>
										</h4>
									</div>
									<div id="collapse100<?php echo $i; ?>" class="collapse" aria-labelledby="collapse100Heading<?php echo $i; ?>" data-bs-parent="#accordion100">
										<div class="card-body">
											<p class="mb-0"><?php echo ucfirst(get_sub_field('activity_description')); ?></p>
										</div>
									</div>
								</div>
                                <?php $i++; endwhile; ?>
							</div>
                            

						</div>
					</div>
                    
                    <div class="container py-5">
					<div class="col-md-8 mx-md-auto text-center">
                    	<h2 class="text-color-dark font-weight-normal text-7 mb-5 pt-2">Join <strong class="font-weight-extra-bold"><?php the_title();?></strong></h2>
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!--<form class="contact-form form-with-icons" id="submitRequest" autocomplete="false" onSubmit="return false;"  action="" method="POST">
                                       
                                       
                                        
                                         <div class="statusMsg mt-4"></div>

                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Name of Association</label>
                                                <div class="position-relative">
                                                    <i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                    <input type="text" value="" data-msg-required="Please enter the name of your association." maxlength="100" class="form-control text-3 h-auto py-2" name="association">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-lg-6">
                                                <label class="form-label">Country</label>
                                                <div class="position-relative">
                                                    <i class="icons icon-location-pin text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50 z-index-1"></i>
                                                    <div class="custom-select-1">
                                                        
                                                        <?php include get_template_directory() . '/inc/countries.php'; ?>
                                                        <select class="form-select form-control h-auto" data-msg-required="Country where association is based in." name="country">
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
                                                    <input type="text" value="" data-msg-required="Please enter your full name." maxlength="100" class="form-control text-3 h-auto py-2" name="member_name">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Designation</label>
                                                <div class="position-relative">
                                                    <i class="icon-info icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                    <input type="text" value="" data-msg-required="Please enter your designation." maxlength="100" class="form-control text-3 h-auto py-2" name="designation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Email Address</label>
                                                <div class="position-relative">
                                                    <i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Phone No.</label>
                                                <div class="position-relative">
                                                    <i class="icon-phone icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
                                                    <input type="text" value="" data-msg-required="Please enter the phone number." maxlength="100" class="form-control text-3 h-auto py-2" name="phone_number">
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label mb-1 text-2">Application Appeal</label>
                                                <div class="position-relative">
                                                    <i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
                                                    <textarea maxlength="2000" data-msg-required="Please enter an appeal to back your application." rows="3" class="form-control text-3 h-auto py-2" name="application_appeal"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="hidden" name="working_group" value="<?php the_title(); ?>" />
                                                <input id="btn_partnership" type="submit" value="Submit Membership Appeal" class="btn btn-primary" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </form>-->
                                    <!--<div class="statusMsg mt-4"></div>-->
                                    <form class="contact-form form-with-icons" name="become-a-member-form" id="submitMembershipRequest" autocomplete="false" onSubmit="return false;"  action="" method="POST">
													<div id="member_feedback_err" class="alert alert-danger mt-4" style="display:none;">
														<strong>Error!</strong> There was an error sending your appeal.
														<span class="mail-error-message text-1 d-block"></span>
													</div>
                                                    <div id="member_feedback_success" class="alert alert-success mt-4" style="display:none;">
														<strong>Success!</strong> Your membership appeal has been sent to us. We will reach out as soon as possible
													</div>
                                                    
                                                     <!--<div class="statusMsg mt-2"></div>-->

													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1">Name of Association</label>
															<div class="position-relative">
																<i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter the name of your association." maxlength="100" class="form-control text-3 h-auto py-2" name="NameOfAssociation" id="NameOfAssociation"  required="required" >
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
															<label class="form-label mb-1">Full Name</label>
															<div class="position-relative">
																<i class="icons icon-user text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter your full name." maxlength="100" class="form-control text-3 h-auto py-2" name="FullName" id="FullName" required="required">
															</div>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label mb-1">Designation</label>
															<div class="position-relative">
																<i class="icon-info icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter your designation." maxlength="100" class="form-control text-3 h-auto py-2" name="Designation" required="required">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1">Email Address</label>
															<div class="position-relative">
																<i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="EmailAddress" required="required">
															</div>
														</div>
                                                        
                                                        <div class="form-group col-lg-6">
															<label class="form-label mb-1">Phone No.</label>
															<div class="position-relative">
																<i class="icon-phone icons text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" value="" data-msg-required="Please enter the phone number." maxlength="100" class="form-control text-3 h-auto py-2" name="PhoneNumber" required="required">
															</div>
														</div>
                                                        
                                                        
													</div>
                                                    
													
                                                    
                                                    
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1">Application Appeal</label>
															<div class="position-relative">
																<i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
																<textarea maxlength="5000" data-msg-required="Please enter an appeal to back your application." rows="2" class="form-control text-3 h-auto py-2" name="Appeal"></textarea>
                                                                <input type="hidden" name="SelectedWorkingGroup" value="<?php the_title(); ?>" />
															</div>
														</div>
													</div>
													
													<div class="row">
														<div class="form-group col">
                                                        	<input id="btn_becomemember" onclick="becomeHelinaMember()" type="submit" value="Submit Membership Appeal" class="btn btn-primary" data-loading-text="Loading..." disabled="disabled">
														</div>
													</div>
												</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
					
                    
				</div>
					
                     
				</div>
                <?php endif; ?>
					<div class="container py-0">
						<div class="col-md-8 mx-md-auto text-center">
                    	<h2 class="text-color-dark font-weight-normal text-7 mb-5 pt-2">Other <strong class="font-weight-extra-bold">Working Groups</strong></h2>
                    </div>
                        	<?php
								$obj = get_queried_object();
								$postid = $obj->ID;
							?>
                            
							<?php $args = array('post_type'=>'working-group','posts_per_page'=>-1,'post__not_in' => array( $postid ),'order' => 'DESC'); ?>                            
							<?php
							$custom_query = new WP_Query($args); //
							$i = 0;
							while($custom_query->have_posts()) : $custom_query->the_post();
								$post_id = $post->ID;
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'square' );
								$title = get_post_meta( $post_id, 'title', true );
								$email = get_post_meta( $post_id, 'email', true );
								$phone = get_post_meta( $post_id, 'phone', true );
								$linkedin = get_post_meta( $post_id, 'linkedin', true );
								$twitter = get_post_meta( $post_id, 'twitter', true );
							?>
                            <?php
								if ($i % 3 == 0) {
										echo '<div class="row pb-4 mt-2">';
									}
								?>
							<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                            
                                <div class="card border-radius-0 bg-color-light border-0 box-shadow-1">
								 <div class="card-body card-body-mini">
                                        <h4 class="card-title mb-1 text-4 font-weight-bold"><?php the_title(); ?></h4>
                                        <!--<p class="card-text"><?php echo summary(get_the_content()); ?></p>-->
                                        <br />
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-modern" style="z-index:10;position: relative;">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                    </div>
                                </div>

							</div>
                            <?php if ($i % 3 == 2) {
                            echo '</div>';
                        } ?>
                        <?php $i++; endwhile; ?>
							
                            
						

				</div>
				
                
                

				
                

			</div>
<?php endwhile; ?> 
<?php
get_footer();
