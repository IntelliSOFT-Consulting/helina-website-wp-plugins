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
$focus_areas = get_post_meta( $post_id, 'focus_areas', true );
$select_achievements = get_post_meta( $post_id, 'select_achievements', true );
$activities = get_post_meta( $post_id, 'activities', true );
$email = get_post_meta( $post_id, 'email', true );
$country = get_post_meta( $post_id, 'country', true );
$date_joined = get_post_meta( $post_id, 'date_joined', true );
$member_website = get_post_meta( $post_id, 'member_website', true );
$facebook = get_post_meta( $post_id, 'facebook', true );
$twitter = get_post_meta( $post_id, 'twitter', true );
$linkedin = get_post_meta( $post_id, 'linkedin', true );

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
				
                
				<section class="section-default border-0 my-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-4">

						<div class="row align-items-center">
							<div class="col-md-7">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">What we <strong class="font-weight-extra-bold">Do</strong></h2>
								</div>
								<?php the_content(); ?>
							</div>
							
                            <div class="col-3 col-sm-4 col-lg-2">
								<div class="featured-boxes featured-boxes-modern-style-2 featured-boxes-modern-style-2-hover-only featured-boxes-modern-style-primary m-0 mb-4 pb-3">
									<div class="featured-box featured-box-no-borders featured-box-box-shadow">
										
											<span class="box-content px-1 py-4 text-center d-block">
												<span class="text-primary text-8 position-relative top-3 mt-3"><i class="far fa-map"></i></span>
												<span class="elements-list-shadow-icon text-default"><i class="far fa-map"></i></span>
												<span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2"><?php echo $country; ?></span>
											</span>
										
									</div>
								</div>
							</div>
                            
                            
                            <div class="col-3 col-sm-4 col-lg-2">
								<div class="featured-boxes featured-boxes-modern-style-2 featured-boxes-modern-style-2-hover-only featured-boxes-modern-style-primary m-0 mb-4 pb-3">
									<div class="featured-box featured-box-no-borders featured-box-box-shadow">
										<a href="<?php echo $member_website ?>" target="_blank" class="text-decoration-none">
											<span class="box-content px-1 py-4 text-center d-block">
												<span class="text-primary text-8 position-relative top-3 mt-3"><i class="fas fa-external-link-alt"></i></span>
												<span class="elements-list-shadow-icon text-default"><i class="fas fa-external-link-alt"></i></span>
												<span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2">Register via member website</span>
											</span>
										</a>
									</div>
								</div>
							</div>
                            
                            
                            
                            
                            
                            
						</div>

					</div>
				</section>

				<div class="container">
					<?php if( have_rows('focus_areas') || have_rows('select_achievements') ): ?>	
					<div class="row mt-5 py-3">
                    	
					
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
                       
                        
						
					</div>
                    <?php endif; ?> 
                    
                    <?php if( have_rows('activities') ): ?>
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
                    <?php endif; ?>
                    <?php if( have_rows('member_objectives') || have_rows('member_activities') ) : ?>	
                    <div class="container py-0">
					
                    
					<div class="card mb-4">
									<div class="card-body">
										<div class="row">
											
                                            
                                            <div class="col-lg-6">
                                                <h4>Focus Areas</h4>
                                                
                                                <ul class="list list-icons">
                                                    <?php $i = 1; ?>
                                                    <?php while( have_rows('member_objectives') ): the_row(); 
                                                        $class = ($i %2 == 0) ? 'right' : 'left';
                                                    ?>
                                                    <li><i class="fas fa-check"></i> <?php echo ucfirst(get_sub_field('objectives')); ?></li>
                                                    <?php $i++; endwhile; ?>                            
                                                </ul>
                        
                                            </div>
                                            
                                            
                                            
                                            <div class="col-lg-6">
                                                <h4>Achievements</h4>
                                                
                                                <ul class="list list-icons">
                                                    <?php $i = 1; ?>
                                                    <?php while( have_rows('member_activities') ): the_row(); 
                                                        $class = ($i %2 == 0) ? 'right' : 'left';
                                                    ?>
                                                    <li><i class="fas fa-check"></i> <?php echo ucfirst(get_sub_field('activity')); ?></li>
                                                    <?php $i++; endwhile; ?>                            
                                                </ul>
                                            </div>
                                             
										</div>
									</div>
								</div>
                    
					
                    
				</div>
                <?php endif; ?>

				</div>

				
                
                

				
                

			</div>
<?php endwhile; ?> 
<?php
get_footer();
