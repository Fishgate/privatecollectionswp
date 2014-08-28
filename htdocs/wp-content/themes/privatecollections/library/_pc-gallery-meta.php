<?php

/**
 * Creates a custom meta box for the Private Collections theme on posts.
 * This meta box will allow users to select a gallery that has been setup
 * in the Nextgen Gallery plugin to be featured in the gallery area of the
 * single.php template file. It will be used to show off furniture pieces.
 * 
 *  Author: Kyle Vermeulen <kyle@source-lab.co.za>
 *  Reference: http://codex.wordpress.org/Function_Reference/add_meta_box
 *             http://www.nextgen-gallery.com/
 * 
 */

/**
 * call the class on the post edit screen
 */
function call_addGalleryMeta() {
    new addGalleryMeta();
}

if(is_admin()) {
    add_action('load-post.php', 'call_addGalleryMeta');
    add_action('load-post-new.php', 'call_addGalleryMeta');
}

/**
 * addGalleryMeta Class
 */
class addGalleryMeta {
    /**
     * hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action('save_post', array($this, 'save'));
    }
    
    /**
     * register the meta box on posts
     */
    public function add_meta_box() {
        add_meta_box(
                'pc_gallery_attachment', 
                __('Attach Gallery', 'bonestheme'), 
                array($this, 'render_meta_box_content'),
                'post', 
                'side'
        );
    }
    
    /**
     * save the meta when the post is saved
     * 
     * @param int $post_id The ID of the post being saved
     */
    public function save($post_id) {
        /**
        * We need to verify this came from our screen and with proper authorization,
        * because the save_post action can be triggered at other times.
        */

       // check if our nonce is set.
       if( !isset($_POST['pc_attach_gallery_meta_nonce']) ){
           return;
       }

       // verify that the nonce is valid.
       if( !wp_verify_nonce($_POST['pc_attach_gallery_meta_nonce'], 'pc_attach_gallery_meta') ){
           return;
       }

       // if this is an autosave, our form has not been submitted, so we don't want to do anything.
       if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
           return;
       }

       // check the user's permissions.
       if( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ){
           if ( !current_user_can('edit_page', $post_id) ){
               return;
           }
       }else {
           if( !current_user_can('edit_post', $post_id) ){
               return;
           }
       }

       /* it's safe for us to save the data now. */

       if( !isset($_POST['pc_attach_gallery']) ) {
           return;
       }

       // sanitize user input.
       $pc_attach_gallery_data = sanitize_text_field( $_POST['pc_attach_gallery'] );

       // update the meta field in the database.
       update_post_meta( $post_id, '_pc_attached_gallery', $pc_attach_gallery_data );
    }
    
    
    /**
     * render the meta box frontend content
     * 
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content($post) {
        //check if nextgen-gallery is active
        if( !is_plugin_active( 'nextgen-gallery/nggallery.php' ) ) :
            // plugin not active, cant do anything
            echo '<p>' . __('This theme requires <a target="_blank" href="http://www.nextgen-gallery.com/">Nextgen Gallery</a> to be active. Please install and activate Nextgen Gallery to use this feature.', 'bonestheme') . '</p>';

        else:
            // plugin is active, hooray!
            global $nggdb;
            $nextg = new $nggdb;

            $galleries = $nextg->find_all_galleries('name', 'ASC');

            // check if any galleries are added
            if (count($galleries) <= 0):
                // no galleries found, add some galleries please!
                echo '<p>' . __('There are currently no galleries setup in Nextgen Gallery. Please setup a gallery to make use of this feature.', 'bonestheme') . '</p>';
            else:
                // add an nonce field so we can check for it later.
                wp_nonce_field( 'pc_attach_gallery_meta', 'pc_attach_gallery_meta_nonce' );

                /*
                * Use get_post_meta() to retrieve an existing value
                * from the database and use the value for the form.
                */
                $current_value = get_post_meta( $post->ID, '_pc_attached_gallery', true );

                echo '<p>' . __('Please select a gallery you would like to feature on this post', 'bonestheme') . '</p>';

                echo '<select name="pc_attach_gallery" id="attached-gallery">';
                echo '<option value="0">-- Select --</option>';

                // galleries are found, generate the select menu
                foreach($galleries as $gallery) {
                    if($gallery->gid == $current_value) {
                        echo '<option selected="selected" value="'.$gallery->gid.'">'.$gallery->name.'</option>';
                    }else{
                        echo '<option value="'.$gallery->gid.'">'.$gallery->name.'</option>';
                    }
                }

                echo '</select>';
                
                if($current_value !== "0") {
                    echo '<p><a href="'.admin_url('admin.php?page=nggallery-manage-gallery&mode=edit&gid='.$current_value).'">Click here</a> to edit currently selected gallery.</p>';
                }

            endif;

        endif;
    }
    
}


?>
