<?php
//      CUSTOM POST TYPE 1
add_action('init', 'ootb_tenant_register');

    function ootb_tenant_register() {
        $labels = array(
            'name' => _x('Tenants', 'post type general name'),
            'singular_name' => _x('Tenant', 'post type singular name'),
            'add_new' => _x('Add Tenant', 'tenant'),
            'add_new_item' => __('Add New Tenant'),
            'edit_item' => __('Edit Tenant'),
            'new_item' => __('New Tenant'),
            'view_item' => __('View Tenant'),
            'search_items' => __('Search Tenants'),
            'not_found' =>  __('No Tenants found'),
            'not_found_in_trash' => __('No Tenants found in Trash'), 
            'parent_item_colon' => ''
        );

        $args = array(
            'label' => __('Tenant'),
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        );

        register_post_type( 'tenant' , $args );

        register_taxonomy("business", array("tenant"), array(
            "hierarchical" => true, 
            "label" => "Business Type", 
            "singular_label" => "Business", 
            "rewrite" => true)
        );
    }

add_action("add_meta_boxes", "ootb_admin_init");
add_action('save_post', 'ootb_save_tenant_options');

function ootb_admin_init(){
    add_meta_box("gallerymeta", "Tenant Directory Data", "ootb_tenant_meta_options", "tenant", "normal", "low");
}


function ootb_tenant_meta_options(){
    global $post;
    $custom = get_post_custom($post->ID);
    $location = $custom["location"][0];
    $shortdesc = $custom["shortdesc"][0];
    $website = $custom["website"][0];
    $email = $custom["email"][0];
    $twitter = $custom["twitter"][0];
    $facebook = $custom["facebook"][0];
    $smallpictureurl = $custom["smallpictureurl"][0];
    $contactname = $custom["contactname"][0];
    $landlinephone = $custom["landlinephone"][0];
    $mobilephone = $custom["mobilephone"][0];
    $largepictureurl = $custom["largepictureurl"][0];
    $picturealttag = $custom["picturealttag"][0];
?>

<div class="form-wrap">

    <div class="form-field">    
        <label for="location">Location :</label>
        <select name="location" style="width: 200px;">
            <option <?php if($location == "Please select...") echo "selected"; ?> value="Please select...">Please select...</option>
            <option <?php if($location == "Out of the Blue Drill Hall") echo "selected"; ?> value="Out of the Blue Drill Hall">Out of the Blue Drill Hall</option>
            <option <?php if($location == "Portobello Powerhouse") echo "selected"; ?> value="Portobello Powerhouse">Portobello Powerhouse</option>
        </select>
        <p>Location of Business</p>
    </div>

    <div class="form-field">
        <label for="shortdesc">Short Description :</label>
        <textarea name="shortdesc"><?php echo $shortdesc; ?></textarea>
        <p>Short description of the business which will appear on the directory homepage.</p>
    </div>

    <div class="form-field">
        <label for="website">Website Address :</label>
        <input name="website" value="<?php echo $website; ?>" />
        <p>Website address including http://www.</p>
    </div>

    <div class="form-field">
        <label for="email">E-mail Address :</label>
        <input name="email" value="<?php echo $email; ?>" />
        <p>Business contact address.</p>
    </div>

    <div class="form-field">
        <label for="twitter">Twitter URL :</label>
        <input name="twitter" value="<?php echo $twitter; ?>" />
        <p>Twitter URL including http://www.</p>
    </div>

    <div class="form-field">
        <label for="facebook">Facebook URL :</label>
        <input name="facebook" value="<?php echo $facebook; ?>" />
        <p>Facebook URL including http://www.</p>
    </div>

    <div class="form-field">
        <label for="smallpictureurl">Small Picture URL :</label>
        <input name="smallpictureurl" value="<?php echo $smallpictureurl; ?>" />
        <p>250 x 250 Picture URL</p>
    </div>

    <div class="form-field">
        <label for="largepictureurl">Large Picture URL :</label>
        <input name="largepictureurl" value="<?php echo $largepictureurl; ?>" />
        <p>500 x 500 Picture URL</p>
    </div>

    <div class="form-field">
        <label for="picturealttag">Picture Alt Tag :</label>
        <input name="picturealttag" value="<?php echo $picturealttag; ?>" />
        <p>Alt tag for both images.</p>
    </div>

    <div class="form-field">
        <label for="contactname">Business contact name :</label>
        <input name="contactname" value="<?php echo $contactname; ?>" />
        <p>Business contact name.</p>
    </div>

    <div class="form-field">
        <label for="landlinephone">Landline Telephone Number :</label>
        <input name="landlinephone" value="<?php echo $landlinephone; ?>" />
        <p>Landline telephone number.</p>
    </div>

    <div class="form-field">
        <label for="mobilephone">Mobile Telephone Number :</label>
        <input name="mobilephone" value="<?php echo $mobilephone; ?>" />
        <p>Mobile telephone number.</p>
    </div>

</div>

<?php

    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'wpse28341' );

}


function ootb_save_tenant_options( $post_id ) {
    global $post;   

    //skip auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Use nonce for verification
    if ( !wp_verify_nonce( $_POST['wpse28341'], plugin_basename( __FILE__ ) ) )
        return;

    //check for you post type only
    if( $post->post_type == "tenant" ) {
            if( isset($_POST['location']) ) { update_post_meta( $post->ID, 'location', $_POST['location'] );}
            if( isset($_POST['shortdesc']) ) { update_post_meta( $post->ID, 'shortdesc', $_POST['shortdesc'] );}
            if( isset($_POST['website']) ) { update_post_meta( $post->ID, 'website', $_POST['website'] );}
            if( isset($_POST['email']) ) { update_post_meta( $post->ID, 'email', $_POST['email'] );}
            if( isset($_POST['twitter']) ) { update_post_meta( $post->ID, 'twitter', $_POST['twitter'] );}
            if( isset($_POST['facebook']) ) { update_post_meta( $post->ID, 'facebook', $_POST['facebook'] );}
            if( isset($_POST['contactname']) ) { update_post_meta( $post->ID, 'contactname', $_POST['contactname'] );}
            if( isset($_POST['smallpictureurl']) ) { update_post_meta( $post->ID, 'smallpictureurl', $_POST['smallpictureurl'] );}
            if( isset($_POST['landlinephone']) ) { update_post_meta( $post->ID, 'landlinephone', $_POST['landlinephone'] );}
            if( isset($_POST['mobilephone']) ) { update_post_meta( $post->ID, 'mobilephone', $_POST['mobilephone'] );}
            if( isset($_POST['largepictureurl']) ) { update_post_meta( $post->ID, 'largepictureurl', $_POST['largepictureurl'] );}
            if( isset($_POST['picturealttag']) ) { update_post_meta( $post->ID, 'picturealttag', $_POST['picturealttag'] );}
    }
}