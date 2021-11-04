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
$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'blog' );
$theme = get_post_meta( $post_id, 'theme', true );
$conference_submission_link = get_post_meta( $post_id, 'conference_submission_link', true );
$conference_website = get_post_meta( $post_id, 'conference_website', true );
$conference_start_date = get_post_meta( $post_id, 'conference_start_date', true );
$conference_end_date = get_post_meta( $post_id, 'conference_end_date', true );

// Load field value.
$start_date_string = get_field('conference_start_date');
// Create DateTime object from value (formats must match).
$start_date = DateTime::createFromFormat('Ymd', $start_date_string);
$conf_date = date("Y-m-d", strtotime($conference_start_date));

$venue = get_post_meta( $post_id, 'venue', true );
$title = get_the_title(); // This must be!, because this is the return - the_title would be echo
$title_array = explode(' ', $title);
$first_word = $title_array[0];
$second_word = $title_array[1];

?>

<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(<?php echo $img[0]; ?>);">
					<div class="container">
						<div class="row">
							<div class="col-md-6 order-2 order-md-1 align-self-center p-static">
								<h1><?php echo $first_word; ?> <strong><?php echo $second_word; ?></strong></h1><br />
                                <br />
                                
								<span class="sub-title"><strong style="font-size:30px;">Theme:</strong> <?php echo $theme; ?></span>
							</div>
							<div class="col-md-6 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb breadcrumb-light d-block text-md-end hidden">
									<li><a href="<?php echo site_url(); ?>">Home</a></li>
									<li class="active"><?php the_title(); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				
				
                
				<section class="section-default border-0 my-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-1">

						<div class="row align-items-center">
							
							<div class="col">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-7 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">About the <strong class="font-weight-extra-bold">Conference</strong></h2>
								</div>
								<?php the_content(); ?>
							</div>
						</div>

					</div>
				</section>

				<div class="container">

					<div class="row mt-0 py-3">
                    <h4>Theme</h4>	
					<section class="call-to-action featured featured-primary mb-5">
					<div class="col-sm-9 col-lg-9">
                        <div class="call-to-action-content">
                            <h3><?php echo $theme; ?></h3>
                            <p class="mb-0"><?php the_title(); ?></p>
                        </div>
                    </div>
                    <?php
					$date_var = $conf_date;
					if (new DateTime() > new DateTime($date_var)) { ?>
						<?php //current date time has passed $date_var
						//echo "current date time has passed ".$date_var;?>
					
					<?php } else { ?>
						<div class="col-sm-3 col-lg-3">
                        <div class="call-to-action-btn">
                            <a href="<?php echo $conference_submission_link ?>" target="_blank" class="btn btn-modern text-2 btn-primary">Register Now</a>
                        </div>
                    </div>
					
					<?php } ?>
                    
                    </section>
                    
						
					</div>
                    <div class="row">
                    <h4>Key information</h4>
						<section class="call-to-action call-to-action-default mb-5 zero-padding">		
								
                                <div class="">
									
                                    
                                    <ul class="list mt-4 remove-all-spaces">
                                    	
                                        	<li class="btn btn-outline btn-info"><h3 class="line-height-3"><a href="<?php echo $conference_website; ?>" target="_blank" >Conference partner <strong>website</strong></a></h3> </li>
                                        
                                       
                                                    <li class="btn btn-outline btn-info avoid-clicks"><h3 class="line-height-3">Start <strong>date:</strong> <?php echo date("F j, Y", strtotime($conference_start_date)); ?></h3> </li>
                                      
                                        
                                       
                                                    <li class="btn btn-outline btn-info avoid-clicks"><h3 class="line-height-3">End <strong>date:</strong> <?php echo date("F j, Y", strtotime($conference_end_date)); ?></h3></li>
                                       
                                    </ul>
                                    
								</div>
							</section>	
							</div>
                     <?php $pictures = get_field('photos'); //print_r($pictures); ?>
                     <?php if((!empty($pictures))): ?>
                    <div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                    <h4>Photos</h4>
                    			
						                 <?php foreach($pictures as $photo ): ?>  
                                            <div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
                                            	
                                                <div class="portfolio-item">
                                                    <span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
                                                        <span class="thumb-info-wrapper border-radius-0">
                                                            <img src="<?php echo $photo['sizes']['medium']; ?>" class="img-fluid border-radius-0" alt="">
                                                            <span class="thumb-info-action">
                                                                <a href="<?php echo $photo['sizes']['large']; ?>" class="lightbox-portfolio">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                                                </a>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                           <?php endforeach; ?>
                                		
								
                                
							</div>
                     <?php endif; ?>	
					<div class="row">
						<div class="col py-4">
							<hr class="solid">
						</div>
					</div>
					
                    
				</div>

				
                
                

				
                

			</div>
<?php endwhile; ?> 
<?php
get_footer();
