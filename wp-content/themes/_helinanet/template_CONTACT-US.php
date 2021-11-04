<?php
/*
Template Name: CONTACT US
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
$address = get_post_meta( $post_id, 'address', true );
$phone = get_post_meta( $post_id, 'phone', true );
$email = get_post_meta( $post_id, 'email', true );
$business_hours = get_post_meta( $post_id, 'business_hours', true );
?>

<div role="main" class="main">
<section class="page-header page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(<?php echo $img[0]; ?>);">
<div class="container">
    <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
            <h1><?php echo $first_word; ?> <strong><?php echo $second_word; ?></strong></h1>
            <span class="sub-title"><?php echo summary(get_the_content()); ?></span>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
            <ul class="breadcrumb breadcrumb-light d-block text-md-end">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active"><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>
</section>
<div class="container">

<div class="row py-4">
    <div class="col-lg-6">

        <h2 class="font-weight-bold text-8 mt-2 mb-0">Enquiries</h2>
        <p class="mb-4"></p>

        <form class="contact-form form-style-3" id="contactForm" name="contact-us" action="" method="POST" novalidate="novalidate" data-toggle="validator" onSubmit="return false;">
            <div id="contact_feedback_err" class="alert alert-danger mt-4" style="display:none;">
                <strong>Error!</strong> There was an error sending your appeal.
                <span class="mail-error-message text-1 d-block"></span>
            </div>
            <div id="contact_feedback_success" class="alert alert-success mt-4" style="display:none;">
                <strong>Success!</strong> Your message has been sent to us.
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label class="form-label mb-1 text-2">Full Name</label>
                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="Name" required>
                </div>
                <div class="form-group col-lg-6">
                    <label class="form-label mb-1 text-2">Email Address</label>
                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="EmailAddress" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label class="form-label mb-1 text-2">Subject</label>
                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="Subject" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label class="form-label mb-1 text-2">Message</label>
                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 h-auto py-2" name="Message" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <input type="submit" value="Send Message" class="btn btn-primary btn-modern" onclick="contactUs()" id="btn_contactus" data-loading-text="Loading..." disabled="disabled">
                </div>
            </div>
        </form>

    </div>
    <div class="col-lg-6">

        <div>
            <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
            <ul class="list list-icons list-icons-style-2 mt-2">
                <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> <?php echo $address; ?></li>
                <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> <?php echo $phone; ?></li>
                <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:<?php echo $email; ?>"><span class="__cf_email__"><?php echo $email; ?></span></a></li>
            </ul>
        </div>
		
        <?php if( have_rows('business_hours') ): ?>
        <div>
            <h4 class="pt-5">Business <strong>Hours</strong></h4>
            <ul class="list list-icons list-dark mt-2">
            	<?php $i = 1; ?>
				<?php while( have_rows('business_hours') ): the_row(); 
                ?>
                <li><i class="far fa-clock top-6"></i> <?php echo ucfirst(get_sub_field('hours')); ?></li>
                <?php $i++; endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>

       
    </div>

</div>

</div>

			

</div>
        
<?php endwhile; ?>       
<?php get_footer();
