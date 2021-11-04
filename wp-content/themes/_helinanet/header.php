<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HelinaNet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
    <!-- Favicon -->
        
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&amp;display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-elements.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-blog.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/skins/corporate.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/custom.css">

    <!-- Head Libs -->
    <script src="<?php bloginfo('template_directory'); ?>/vendor/modernizr/modernizr.min.js"></script>
    <?php if (is_page('events') ):?>
    <!-- EVENTS Calendar -->
     <link href='<?php bloginfo('template_directory'); ?>/lib/main.css' rel='stylesheet' />
	 <script src='<?php bloginfo('template_directory'); ?>/lib/main.js'></script>
     <script>
   document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialDate: '<?php echo date('Y-m-d'); ?>',
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      events: {
        url: '<?php bloginfo('template_directory'); ?>/data/get-events.php',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block'
        }
      },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }
    });

    calendar.render();
  });

</script>
	 <style>
	  #script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	  }
	
	  #loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	  }
	
	  #calendar {
		max-width: 1100px;
		margin:5px auto;
		padding: 0 10px;
	  }

	</style>
    <!-- End of code -->
	<?php endif; ?>
   


	<?php wp_head(); ?>
</head>

<body data-plugin-page-transition>
		<div class="body">
			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-top header-top-default bg-color-primary">
						<div class="container">
							<div class="header-row py-2">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												
                                                
                                                <li class="nav-item">
                                                	<a class="nav-link ps-0 text-light opacity-8" href="https://www.linkedin.com/groups/8274552/" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                                                </li>
                                                <li class="nav-item">
                                                	<a class="nav-link ps-0 text-light opacity-8 ps-0" href="https://twitter.com/helinanet" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                                                </li>
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills text-uppercase text-2">
                                            	<li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                	<a class="nav-link ps-0 text-light opacity-8" href="https://forums.helinanet.org/" target="_blank"><i class="fas fa-angle-right"></i> HELINA Talk</a>
                                                </li>
                                                <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                	<a class="nav-link ps-0 text-light opacity-8" href="https://elearning.helinanet.org/"><i class="fas fa-angle-right"></i> HELINA Learn</a>
                                                </li>
												<li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link ps-0 text-light opacity-7" href="<?php echo site_url(); ?>/about-us"><i class="fas fa-angle-right"></i> About Us</a>
												</li>
												
                                                <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                	<a class="nav-link ps-0 text-light opacity-9" href="<?php echo site_url(); ?>/join-helina"><i class="fas fa-angle-right"></i> Become a member</a>
                                                </li>
												
                                                <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                	<a class="nav-link ps-0 text-light opacity-9" href="<?php echo site_url(); ?>/become-a-partner"><i class="fas fa-angle-right"></i> Become a partner</a>
                                                </li>
												<!--<li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                	<a class="nav-link text-light opacity-9 pe-0" href="<?php echo site_url(); ?>/profile"><i class="fas fa-angle-right"></i> Profile</a>
                                                </li>-->
                                                
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container header-container-md container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="<?php echo site_url(); ?>">
											<img alt="HELINA" width="" height="80" data-sticky-width="" data-sticky-height="60" src="https://i2.wp.com/helinanet.org/wp-content/uploads/2020/03/cropped-helina-logo.a-1.png?fit=800%2C228&ssl=1">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-no-transform header-nav-bottom-line-active-text-dark header-nav-bottom-line-effect-1 order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-text-size-2 header-nav-main-text-weight-600 header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="">
														<a class="" href="<?php echo site_url(); ?>">
															Home
														</a>
														
													</li>
													
                                                    <li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo site_url(); ?>/working-groups">
															How We Work
														</a>
														<ul class="dropdown-menu">
                                                            <li><a class="" href="<?php echo site_url(); ?>/about-us">About Us</a></li>                                                       
                                                            <li class="dropdown-submenu">
																<a class="dropdown-item" href="<?php echo site_url(); ?>/working-groups">Working Groups</a>
																<ul class="dropdown-menu">
                                                                	<?php
																		$args = array('post_type'=>'working-group','posts_per_page'=>10,'order' => 'DESC');
																	?>
																	<?php
																	$custom_query = new WP_Query($args); //
																	$count = $custom_query->found_posts;
																	while($custom_query->have_posts()) : $custom_query->the_post();
																		$post_id = $post->ID;
																	?>
																		<li><a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                                    <?php endwhile; ?>
                                                                    <?php if ($count > 10) { ?>
																		<li><a class="dropdown-item" href="<?php echo site_url(); ?>/working-groups">More...</a></li>
                                                                    <?php } ?>
                                                                    	
																</ul>
															</li>
                                                            
                                                            <li class="dropdown-submenu">
																<a class="dropdown-item" href="<?php echo site_url(); ?>/country-membership">Country Membership</a>
																<ul class="dropdown-menu">
																	<?php
																		$args = array('post_type'=>'member','posts_per_page'=>10,'order' => 'ASC');
																	?>
																	<?php
																	$custom_query = new WP_Query($args); //
																	$count = $custom_query->found_posts;
																	while($custom_query->have_posts()) : $custom_query->the_post();
																		$post_id = $post->ID;
																	?>
																		<li><a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                                    <?php endwhile; ?>
																	<?php if ($count > 10) { ?>
																		<li><a class="dropdown-item" href="<?php echo site_url(); ?>/country-membership">More...</a></li>
                                                                    <?php } ?>
																</ul>
															</li>
															
															<li><a class="" href="<?php echo site_url(); ?>/leadership-governance">Leadership & Governance</a></li>
                                                            
														</ul>
													</li>
                                                    
                                                    <li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo site_url(); ?>/conferences">
															Conferences
														</a>
														<ul class="dropdown-menu">
                                                        <?php
															$args = array('post_type'=>'conference','posts_per_page'=>10,'order' => 'DESC');
														?>
														<?php
														$custom_query = new WP_Query($args); //
														$i = 0;
														while($custom_query->have_posts()) : $custom_query->the_post();
															$post_id = $post->ID;
														?>
                                                        	<?php if ($i == 0) { ?>
                                                            <li>
                                                        		<a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?> <!--<span class="tip tip-dark">ongoing</span>--></a>
															</li>
                                                            
                                                            <?php } else { ?>
                                                        	<li>
                                                        		<a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
															</li>
                                                            <?php } ?>
                                                        <?php $i++;endwhile; ?>
														<?php if ($count > 10) { ?>
                                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/conferences">More...</a></li>
                                                        <?php } ?>
														</ul>
													</li>
                                                    
                                                    
                                                    
                                                    <li>
														<a class="" href="<?php echo site_url(); ?>/events">
															HELINA Events
														</a>
													</li>
                                                    
                                                    <li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?php echo site_url(); ?>/news">
															News & Publications
														</a>
														<ul class="dropdown-menu">
															<li>
																<a class="dropdown-item" href="<?php echo site_url(); ?>/news">
																	News
																</a>
															</li>
                                                            
                                                            <li>
																<a class="dropdown-item" href="https://www.jhia-online.org/index.php/jhia" target="_blank">
																	JHIA
																</a>
															</li>
                                                            
                                                                                                                       
                                                            <li>
																<a class="dropdown-item" href="<?php echo site_url(); ?>/newsletters">
																	Newsletters
																</a>
															</li>
                                                            
                                                            <li>
																<a class="dropdown-item" href="<?php echo site_url(); ?>/journals">
																	Journals
																</a>
															</li>
                                                            
                                                        </ul>
                                                    </li>
                                                    
                                                    <li>
														<a class="" href="<?php echo site_url(); ?>/contact-us">
															Contact Us
														</a>
													</li>
													
                                                    
													
                                                    
													
                                                    
													
                                                    
													
                                                    
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
									<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
										<div class="header-nav-feature header-nav-features-search d-inline-flex">
											<a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
											<div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
												<form role="search" action="<?php echo home_url( '/' ); ?>" method="get">
													<div class="simple-search input-group">
														<input class="form-control text-1" id="headerSearch" name="s" type="search" value="" placeholder="Search...">
														<button class="btn" type="submit">
															<i class="fas fa-search header-nav-top-icon text-color-dark"></i>
														</button>
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
			</header>