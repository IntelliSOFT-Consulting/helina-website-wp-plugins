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
$event_name = get_post_meta( $post_id, 'event_name', true );
$start_date = get_post_meta( $post_id, 'start_date', true );
$end_date = get_post_meta( $post_id, 'end_date', true );
$venue = get_post_meta( $post_id, 'venue', true );
$add_to_calendar = get_post_meta( $post_id, 'add_to_calendar', true );

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
							<div class="col">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">About the <strong class="font-weight-extra-bold">Event</strong></h2>
								</div>
								<?php the_content(); ?>
                                <span class="btn btn-outline btn-info mb-2 avoid-clicks"><strong>Start Date:</strong> <?php echo date("F j, Y", strtotime($start_date)); ?></span>
                                <span class="btn btn-outline btn-info mb-2 avoid-clicks"><strong>End Date:</strong> <?php echo date("F j, Y", strtotime($end_date)); ?></span>
                                <p class="btn btn-outline btn-info mb-2 avoid-clicks"><strong>Venue:</strong> <?php echo $venue; ?></p>
                                <a class="btn btn-outline btn-warning mb-2"  target="_blank" href="<?php echo $add_to_calendar ?>">Add event to your Calendar</a>
							</div>
							
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
						</div>

					</div>
				</section>

				<div class="container">

					<div class="row mt-5 py-3">
                    	
					<?php if( have_rows('focus_areas') ): ?>	
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
                    <?php endif; ?>
                    
                    <?php if( have_rows('select_achievements') ): ?>
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
                    <?php endif; ?>    
                        
						
					</div>
					<div class="row">
						<div class="col py-4">
							<hr class="solid">
						</div>
					</div>
					<div class="row pb-4">
						
						<div class="col mb-4 mb-lg-0">
							<?php if( have_rows('activities') ): ?>
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
                            <?php endif; ?>

						</div>
					</div>
                    
                    <div class="container py-5">
					
                    
					<div class="card mb-4">
									<div class="card-body">
										<div class="row">
											
                                            <?php if( have_rows('member_objectives') ): ?>	
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
                                            <?php endif; ?>
                                            
                                            <?php if( have_rows('member_activities') ): ?>
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
                                            <?php endif; ?>    
										</div>
									</div>
								</div>
                    
					
                    
				</div>

				</div>

				
                
                

				
                

			</div>
<?php endwhile; ?> 
<?php
get_footer();
