<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HelinaNet
 */

get_header();
?>

<div role="main" class="main">
				<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{ 'autoplay': false}" data-dynamic-height="['450px','450px','450px','550px','500px']" style="height: 550px;">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							<?php
							  $args = array('post_type'=>'slider','posts_per_page'=>3,'order' => 'DESC');
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
							<!-- Carousel Slide <?php echo $i; ?> -->
							
                            
                            <div class="owl-item position-relative overflow-hidden">
								<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToRight" data-appear-animation-duration="13s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url(<?php echo $img[0]; ?>); background-size: cover; background-position: center;"></div>
								<div class="container position-relative z-index-3 h-100">
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-lg-7">
											<div class="d-flex flex-column align-items-center">
                                            	 <?php if (!empty ($highlight_text)) { ?>
												<h2 class="text-color-light font-weight-extra-bold text-12-5 line-height-1 text-center mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"><?php echo $highlight_text; ?></h2>
                                                <?php } ?>
                                                <?php if (!empty ($tagline)) { ?>
												<p class="text-4-5 text-color-light font-weight-light text-center mb-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 30}"><?php echo $tagline; ?></p>
                                                 <?php } ?>
                                                <?php if (!empty ($cta)) { ?>
												<a href="<?php echo $cta; ?>" target="_blank" class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2500" data-plugin-options="{'minWindowWidth': 0}">MORE INFORMATION <i class="fas fa-arrow-right ms-2"></i></a>
                                                <?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?php $i++;  endwhile; ?>  

						</div>
					</div>
					<!--<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev"></button>
						<button type="button" role="presentation" class="owl-next"></button>
					</div>-->
					
				</div>
				
				
                
                <section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">
					<div class="container py-0">

						<div class="row align-items-center">
							<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250">
								<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									
                                    <div>
										<img alt="" class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/generic/2019/13.jpg">
									</div>
									<div>
										<img alt="" class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/generic/2019/9.jpg">
									</div>
                                    <div>
										<img alt="" class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/generic/2019/12.jpg">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Who <strong class="font-weight-extra-bold">We Are</strong></h2>
								</div>
                                <?php
								  $args = array('post_type'=>'page','pagename'=>'about-us');
								?>
								<?php
									$custom_query = new WP_Query($args); //
									$i = 0;
									while($custom_query->have_posts()) : $custom_query->the_post();
									$post_id = $post->ID;
									$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'featured' );
									//echo $i;
								?> 
								
								<?php the_content(); ?>
								<a href="<?php echo site_url(); ?>/about-us" class="btn btn-dark font-weight-semibold btn-px-4 btn-py-2 text-2">LEARN MORE</a>
                                <?php $i++;  endwhile; ?>
								
							</div>
						</div>

					</div>
				</section>
                <div class="container">

					<div class="row mt-5 py-3">
                    	<?php
						  $args = array('post_type'=>'page','pagename'=>'about-us');
						?>
						<?php
							$custom_query = new WP_Query($args); //
							$i = 0;
							while($custom_query->have_posts()) : $custom_query->the_post();
							$post_id = $post->ID;
							$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'featured' );
							$vision = get_post_meta( $post_id, 'vision', true );
							$mission = get_post_meta( $post_id, 'mission', true );
							$priority_areas = get_post_meta( $post_id, 'priority_areas', true );
							$core_values = get_post_meta( $post_id, 'core_values', true );
							$objectives = get_post_meta( $post_id, 'objectives', true );
							//echo $i;
						?> 
                        
                        <div class="col-md-8">
								<div class="overflow-hidden mb-2">
									<h4 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="1200" style="animation-delay: 1200ms;">Core <strong class="font-weight-extra-bold">Values</strong></h4>
								</div>
								<?php echo first_paragraph($core_values); ?>
                                <?php if( have_rows('helinas_core_values') ): ?>
                                <ul class="list list-icons list-icons-style-3">
                                	<?php while( have_rows('helinas_core_values') ): the_row(); 
										$class = ($i %2 == 0) ? 'right' : 'left';
										$image = get_sub_field('image');
									?>
                                    <li><i class="fas fa-check"></i> <?php echo ucfirst(get_sub_field('value')); ?></li>
                                    <?php $i++; endwhile; ?>
                                </ul>
                                <?php endif; ?>
							</div>
                            
                            
						<div class="col-md-4">
							<div class="toggle toggle-primary toggle-simple m-0" data-plugin-toggle>
								
								<section class="toggle active mt-0">
									<a class="toggle-title">Our Vision</a>
                                    
									<div class="toggle-content">
										<p><?php echo $vision; ?></p>
									</div>
                                   
								</section>
								<section class="toggle active mt-0">
									<a class="toggle-title">Our Mission</a>
									<div class="toggle-content">
										<p><?php echo $mission; ?></p>
									</div>
								</section>
                                 
							</div>
						</div>
						
                        
                        <?php $i++;  endwhile; ?>
					</div>
					
					

				</div>
                
                

				<div class="container">
					<div class="row py-5 my-5">
						<div class="col-md-12 order-2 order-md-1 text-center text-md-start">
                        	<h2 class="text-color-dark font-weight-normal text-6 mb-2 text-center">HELINA <strong class="font-weight-extra-bold">Board</strong></h2>
							<div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 4}, '1200': {'items': 4}}, 'margin': 25, 'loop': true,'autoplay': true,'autoplay': true, 'autoplayTimeout': 10000, 'nav': true, 'dots': false, 'stagePadding': 40}">
                            
								<?php
                                    $args = array('post_type'=>'board-member','posts_per_page'=>-1,'order' => 'DESC');
                                ?>
                                <?php
                                $custom_query = new WP_Query($args); //
                                while($custom_query->have_posts()) : $custom_query->the_post();
                                    $post_id = $post->ID;
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'square' );
                                    $author_id = $post->post_author;
                                    $title = get_post_meta( $post_id, 'title', true );
                                    $email = get_post_meta( $post_id, 'email', true );
                                    $phone = get_post_meta( $post_id, 'phone', true );
                                    $linkedin = get_post_meta( $post_id, 'linkedin', true );
                                    $twitter = get_post_meta( $post_id, 'twitter', true );
                                ?>
								<div>
									<a href="<?php the_permalink(); ?>"><img class="img-fluid rounded-0 mb-4" src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>" /></a>
									<h4 class="font-weight-medium text-color-dark text-4 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<p class="text-2 mb-0"><?php echo $title; ?></p>
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="z-index:10;position: relative;">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
								</div>
								<?php endwhile; ?>
                                
							</div>
						</div>
                        
						
						
						
					</div>
				</div>
                
                <div class="container mb-0 pt-0">
                <!--<section class="call-to-action call-to-action-default mb-5 zero-padding">		
                    
                    <div class="">
                    	<ul class="list mt-4 remove-all-spaces">
                             <a href="" target="_blank" >
                                        <li class="btn btn-outline btn-info"><h3 class="line-height-3">Become a <strong>Member</strong></h3> </li>
                            </a>
                            
                            <a href="" target="_blank" >
                                        <li class="btn btn-outline btn-info"><h3 class="line-height-3">Become a <strong>Partner</strong></h3></li>
                            </a>
                            
                        </ul>
                    </div>
                    
                    
                    
                    
                    
                </section>-->
                <div class="row align-items-center mb-0 pt-0">
								
								<div class="col">

									<button class="btn btn-modern btn-primary btn-xl text-center-button-cta" data-bs-toggle="modal" id="openModal1" data-bs-target="#formModal">
										Become a <strong>Member</strong>
									</button>

									<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="formModalLabel">Become a <strong>Member</strong></h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
												</div>
												<div class="modal-body">
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
                                                        	<p class="mb-2">Select preffered Working Group</p>
                                                            <?php $args = array('post_type'=>'working-group','posts_per_page'=>-1,'order' => 'DESC'); ?>                            
															<?php
                                                            $custom_query = new WP_Query($args); //
                                                            $i = 0;
                                                            while($custom_query->have_posts()) : $custom_query->the_post();
                                                                $post_id = $post->ID;
                                                            ?>
															<div class="form-check form-check-inline">
																<label class="form-check-label">
																	<input class="form-check-input" type="radio" name="SelectedWorkingGroup" data-msg-required="Please select at least one option." id="tabContent9Radio<?php echo $i; ?>" value="<?php the_title(); ?>" required=""> <?php the_title(); ?>
																</label>
															</div>
															<?php $i++; endwhile; ?>
															
														</div>
													</div>
                                                    
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1">Application Appeal</label>
															<div class="position-relative">
																<i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
																<textarea maxlength="5000" data-msg-required="Please enter an appeal to back your application." rows="2" class="form-control text-3 h-auto py-2" name="Appeal"></textarea>
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
                                
                                
                                
                                <div class="col">

									<button class="btn btn-modern btn-primary btn-xl text-center-button-cta" data-bs-toggle="modal" data-bs-target="#formModal2">
										<span>Become a <strong>Partner</strong></span>
									</button>

									<div class="modal fade" id="formModal2" tabindex="-1" role="dialog" aria-labelledby="formModalLabel2" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="formModalLabel2">Become a <strong>Partner</strong></h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
												</div>
												<div class="modal-body">
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
												</div>
												
                                                
											</div>
										</div>
									</div>
									
								</div>
				      </div>
                </div>
                <div class="container container-xl-custom py-5 my-5">
					<div class="row justify-content-center">
						<div class="col-xl-8 text-center mb-4">
							<h2 class="font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeIn">Explore Sections </h2>
							
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-10 px-lg-5">
							<div class="row">
								<div class="col-md-6 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInRightShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="<?php bloginfo('template_directory'); ?>/img/static/helina_grp.jpg" class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Working Groups</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="<?php echo site_url(); ?>/working-groups" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">View Working Groups <i class="fa fa-arrow-right ms-2 ps-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-6 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInLeftShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="<?php bloginfo('template_directory'); ?>/img/static/helina_grp.jpg" class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Country Membership</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="<?php echo site_url(); ?>/country-membership" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">View Country Membership <i class="fa fa-arrow-right ms-2 ps-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-4 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInLeftShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="<?php bloginfo('template_directory'); ?>/img/static/helina_grp.jpg" class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Conferences</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="<?php echo site_url(); ?>/conferences" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">View Conferences <i class="fa fa-arrow-right ms-2 ps-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-4 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="<?php bloginfo('template_directory'); ?>/img/static/helina_grp.jpg" class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Events</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="<?php echo site_url(); ?>/events" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">View Events <i class="fa fa-arrow-right ms-2 ps-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-4 px-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="<?php bloginfo('template_directory'); ?>/img/static/helina_grp.jpg" class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Knowledge Centre</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="<?php echo site_url(); ?>/knowledge-centre" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">View Knowledge Centre <i class="fa fa-arrow-right ms-2 ps-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
                                
                                
                                
                                
                                
                                
                                
							</div>
						</div>
					</div>
				</div>
				

				
			</div>

<?php
//get_sidebar();
get_footer();
