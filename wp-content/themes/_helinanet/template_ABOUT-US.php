<?php
/*
Template Name: About Us
*/
get_header();
global $post;

?>
<?php
while ( have_posts() ) : the_post();
$post_id = $post->ID;
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'highlight' );
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

				
                
				<section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
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
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Who <strong class="font-weight-extra-bold">We Are</strong></h2>
								</div>
								<?php the_content(); ?>
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
					<div class="row">
						<div class="col py-4">
							<hr class="solid">
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 mx-md-auto text-center">

							<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-2">Our <strong class="font-weight-extra-bold">Objectives</strong></h2>
							

							<section class="timeline" id="timeline">
                            	<?php if( have_rows('objectives') ): ?>
								<div class="timeline-body">
                                	<?php $i = 1; ?>
                                	<?php while( have_rows('objectives') ): the_row(); 
										$class = ($i %2 == 0) ? 'right' : 'left';
										$image = get_sub_field('image');
									?>
                                        <?php //echo wp_get_attachment_image( $image, 'full' ); ?>
                                        
                                        
                                        <div class="timeline-date">
                                            <h3 class="text-primary font-weight-bold"><?php echo $i; ?></h3>
                                        </div>
                                        <article class="timeline-box <?php echo $class; ?> text-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                                            <div class="timeline-box-arrow"></div>
                                            <div class="p-2">
                                                <p class="mb-0 text-2"><?php echo ucfirst(get_sub_field('objective')); ?></p>
                                            </div>
										</article>
                                    <?php $i++; endwhile; ?>
                                
								</div>
                                <?php endif; ?>
							</section>

						</div>
					</div>
                    
                    <div class="container py-5">
					<div class="col-md-8 mx-md-auto text-center">
                    	<h2 class="text-color-dark font-weight-normal text-7 mb-5 pt-2">Our <strong class="font-weight-extra-bold">Priority Areas</strong></h2>
                    </div>
                    <?php if( have_rows('priority_areas') ): ?>
						<?php $i = 0; ?>
                    	<?php while( have_rows('priority_areas') ): the_row(); ?>
                        
                        <?php
						if ($i % 3 == 0) {
								echo '<div class="row pb-4 mt-2">';
							}
						?>
                                                
						<div class="col-lg-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" style="animation-delay: 100ms;">
							<div class="feature-box feature-box-style-2">
								<div class="feature-box-icon">
									<i class="far fa-arrow-alt-circle-right"></i>
								</div>
								<div class="feature-box-info">
									<p><?php echo ucfirst(get_sub_field('priority')); ?></p>
								</div>
							</div>
						</div>
                        <?php if ($i % 3 == 2) {
                            echo '</div>';
                        } ?>
                        <?php $i++; endwhile; ?>
						
					
                    
					<?php endif; ?>
                    
					
                    
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
                
				
				    
				<div class="container">
                	<div class="col-md-8 mx-md-auto text-center">
                    	<h2 class="text-color-dark font-weight-normal text-7 mb-4 pt-2">Our <strong class="font-weight-extra-bold">Partners</strong></h2>
                    </div>
					<div class="row py-0 my-0">
                    	
						<div class="col">
                       
                            
                            <div class="owl-carousel owl-theme stage-margin rounded-nav" data-plugin-options="{'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
								<?php
                                    $args = array('post_type'=>'partner','posts_per_page'=>-1,'order' => 'DESC');
                                ?>
                                <?php
                                $custom_query = new WP_Query($args); //
                                while($custom_query->have_posts()) : $custom_query->the_post();
                                    $post_id = $post->ID;
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
                                    $author_id = $post->post_author;
                                    $website = get_post_meta( $post_id, 'website', true );
                                    $email = get_post_meta( $post_id, 'email', true );
                                    $phone = get_post_meta( $post_id, 'phone', true );
                                    $linkedin = get_post_meta( $post_id, 'linkedin', true );
                                    $twitter = get_post_meta( $post_id, 'twitter', true );
                                ?>
                                <div>
									<a href="<?php echo $website; ?>" target="_blank"><img class="img-fluid" src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>"></a>
								</div>
                                <?php $i++;  endwhile; ?>
								
                                
							</div>
							
						</div>
					</div>
                    
                    		<div class="row align-items-center mb-4 pt-2">
								
								<div class="col-sm-12">

									<button class="btn btn-modern btn-primary text-center-button" data-bs-toggle="modal" data-bs-target="#formModal">
										<span>Become a <strong>Partner</strong></span>
									</button>

									<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="formModalLabel">Become a <strong>Partner</strong></h4>
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

			</div>

        
        
        
<?php endwhile; ?>       
<?php
get_footer();
