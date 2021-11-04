<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HelinaNet
 */

?>

	<footer id="footer" class="footer-texts-more-lighten mt-0">
				<div class="container">
					<div class="row py-4 my-2">
						<div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
							<h5 class="text-4 text-color-light mb-3">CONTACT INFO</h5>
							<ul class="list list-unstyled">
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">ADDRESS</span> 
									Department of Biostatistics, School of Public Health, University of Ghana, Legon,
Accra P.O Box LG 13 Legon Accra, GA/R Ghana P. O Box LG 13 Legon Accra, GA/R
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">PHONE</span>
									<a href="tel:+254711466263"> (+254) 711 466 263</a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">EMAIL</span>
									<a href="mailto:admin@helina.org"><span class="__cf_email__" data-cfemail="">admin@helina.org</span></a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">WORKING DAYS/HOURS </span>
									Mon - Fri / 8:00AM - 5:00PM
								</li>
							</ul>
							<ul class="social-icons social-icons-clean-with-border social-icons-medium">
                            	<li class="social-icons-linkedin">
									<a href="https://www.linkedin.com/groups/8274552/" class="no-footer-css" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
								</li>
								<li class="social-icons-twitter mx-2">
									<a href="https://twitter.com/helinanet" class="no-footer-css" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
								</li>
								
							</ul>
						</div>
						<div class="col-md-6 col-lg-2 mb-5 mb-lg-0">
							<h5 class="text-4 text-color-light mb-3">USEFUL LINKS</h5>
							<ul class="list list-unstyled mb-0">
                            	<li class="mb-0"><a href="<?php echo site_url(); ?>/about-us">About Us</a></li>
								<li class="mb-0"><a href="<?php echo site_url(); ?>/working-groups">How We Work</a></li>
								
								<li class="mb-0"><a href="<?php echo site_url(); ?>/country-membership">Country Membership</a></li>
								<li class="mb-0"><a href="<?php echo site_url(); ?>/conferences">Conferences</a></li>
								<li class="mb-0"><a href="<?php echo site_url(); ?>/events">Events</a></li>
								<li class="mb-0"><a href="<?php echo site_url(); ?>/knowledge-centre">FAQs</a></li>
								
							</ul>
						</div>
						<div class="col-md-6 col-lg-4 mb-5 mb-md-0 d-none">
							<h5 class="text-4 text-color-light mb-3">LATEST EVENTS</h5>
                            <?php
								$args = array('post_type'=>'event','posts_per_page'=>3,'order' => 'DESC');
							?>
							<?php
							$custom_query = new WP_Query($args); //
							while($custom_query->have_posts()) : $custom_query->the_post();
								$post_id = $post->ID;
								$event_name = get_post_meta( $post_id, 'event_name', true );
								$venue = get_post_meta( $post_id, 'venue', true );
								$start_date = get_post_meta( $post_id, 'start_date', true );
								$end_date = get_post_meta( $post_id, 'end_date', true );
							?>
							<article class="mb-3">
								<a href="<?php the_permalink(); ?>" class="text-color-light text-3-5"><?php the_title(); ?></a>
								<p class="line-height-2 mb-0"><a href="<?php the_permalink(); ?>"><?php echo date("F j, Y", strtotime($start_date)); ?></a> in <a href="<?php the_permalink(); ?>"><?php echo $venue; ?></a></p>
							</article>
							<?php endwhile; ?>
                        
						</div>
						<div class="col-md-6 col-lg-4">
							<h5 class="text-4 text-color-light mb-3">SUBSCRIBE NEWSLETTER</h5>
							<p class="mb-2">Get all the latest information on events, sales and offers. Sign up for newsletter:</p>
							<div class="alert alert-success d-none" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>
							<div class="alert alert-danger d-none" id="newsletterError"></div>
							<form id="subscribe" autocomplete="false" onSubmit="return false;"  method="post" class="form-style-5 opacity-10" action="" method="POST">
								<div class="row">
									<div class="form-group col">
										<input class="form-control" placeholder="Email Address" name="newsletter" id="email" type="email" />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<button type="submit" id="btn_subscribe" name="submit" class="btn btn-primary btn-rounded btn-px-4 btn-py-2 font-weight-bold">SUBSCRIBE</button>
									</div>
								</div>
							</form>
                            <div class="subscribeStatusMsg alert "></div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="footer-copyright footer-copyright-style-2 pt-2 pb-5">
                    	<div class="row">
							<div class="col-12 text-center">
								<p class="mb-0">This site was developed for HELINA by <a href="http://www.intellisoftkenya.com/" target="_blank">IntelliSOFT Consulting Limited</a>. IntelliSOFT is a Health Informatics and Digital Health firm with the mission to develop, implement and sustain health IT solutions for Africa.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-12 text-center">
								<p class="mb-0">Copyright &copy; <?php echo date("Y"); ?> HELINA. All rights reserved</p>
							</div>
						</div>
					</div>
				</div>
                
                
                
                <div id="have-questions-call">
                      <span class="arrow-box right">
                        <div class="arrow-box-header">
                         Let us know what you think about our new website
                        </div>
                      <div class="arrow-box-content">
                      
                      <div class="card mb-4">
									<div class="card-body">
										<div class="row">
											<div class="col">
											  	<form class="contact-form form-style-3 form-fields-rounded" id="shareComment" name="serverless-form" action="" method="POST" novalidate="novalidate">
													<div class="contact-form-success alert alert-success d-none mt-4">
														<strong>Success!</strong> Your message has been sent to us.
													</div>

													<div id="feedback_err" class="alert alert-danger mt-4" style="display:none;">
														<strong>Error!</strong> There was an error sending your message.
														<span class="mail-error-message text-1 d-block"></span>
													</div>
                                                    <div id="feedback_success" class="alert alert-success mt-4" style="display:none;">
														<strong>Success!</strong> Your message has been sent to us.
													</div>

													<div id="fieldArea">
                                                    
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label class="form-label mb-1 text-2"><strong>Your Comment</strong></label>
                                                                <textarea maxlength="5000" data-msg-required="Please enter your review message here." rows="8" class="form-control text-3 h-auto py-2" name="websiteReviewMessage" id="websiteReviewMessage" required="" placeholder="The website is ..."></textarea>
                                                            </div>
                                                        </div>
													
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <input type="submit" value="Submit Feedback" id="btn_submitchat" class="btn btn-primary" data-loading-text="Loading..." onClick="submitWebComment()" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
												</form>
                                                	
											</div>
										</div>
									</div>
								</div>
                        
                        
                        </div>
                        
                      </span>
                      <div class="img-circle-container">
                        <img src="data:image/png;base64,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"
                          width="30px" class="img-circle" style="
                        /* background: hsla(198,100%,68%,0.7); */
                        margin: 10px;
                    "> </span>
                      </div>
                    </div>
			</footer>
		</div>


		
		<?php wp_footer(); ?>
        
		<!-- Vendor -->
        <script src="<?php bloginfo('template_directory'); ?>/vendor/jquery/jquery.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/lazysizes/lazysizes.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/vide/jquery.vide.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/vendor/vivus/vivus.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php bloginfo('template_directory'); ?>/js/theme.js"></script>
		<!-- Current Page Vendor and Views -->
		<script src="<?php bloginfo('template_directory'); ?>/js/views/view.contact.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php bloginfo('template_directory'); ?>/js/theme.init.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/form-processing.js"></script>


		



<script>
//Newsletter Subscriptions
$(document).ready(function(e){
    // Submit form data via Ajax
	var btn=$('#btn_subscribe');
	var oldtext = btn.text();
	var newtext = "SUBSCRIBE";
    $("#subscribe").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php bloginfo('template_directory'); ?>/app/newsletter/subscribe.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#btn_subscribe').attr("disabled","disabled");
				 btn.text('PROCESSING');
            },
            success: function(response){ //console.log(response);
                $('.subscribeStatusMsg').html('');
                if(response.status == 1){
                    $('#subscribe')[0].reset();
					$('.spinner-border').hide();
					btn.text(newtext);
					//syncMailchimp($data);
                    $('.subscribeStatusMsg').html('<span class="alert-success">'+response.message+'</span>');
                }else{
					btn.text(oldtext);
					$('.spinner-border').hide();
                    $('.subscribeStatusMsg').html('<span class="alert-danger">'+response.message+'</span>');					
                }
                //$('#subscribe').css("opacity","");
                $("#btn_subscribe").removeAttr("disabled");
				btn.text(newtext);
            }
        });
    });
});
</script>
</body>
</html>
