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
function call_addCodeMeta() {
    new addCodeMeta();
}

if(is_admin()) {
    add_action('load-post.php', 'call_addCodeMeta');
    add_action('load-post-new.php', 'call_addCodeMeta');
}

/**
 * The Class
 */
class addCodeMeta {
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
                'pc_product_code', 
                __('Product Code', 'bonestheme'), 
                array($this, 'render_meta_box_content'),
                'post', 
                'normal',
                'high'
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
       if( !isset($_POST['pc_product_code_meta_nonce']) ){
           return;
       }

       // verify that the nonce is valid.
       if( !wp_verify_nonce($_POST['pc_product_code_meta_nonce'], 'pc_product_code_meta') ){
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

       if( !isset($_POST['pc_product_code']) ) {
           return;
       }

       // sanitize user input.
       $pc_attach_gallery_data = sanitize_text_field( $_POST['pc_product_code'] );

       // update the meta field in the database.
       update_post_meta( $post_id, '_pc_product_code', $pc_attach_gallery_data );
    }
    
    
    /**
     * render the meta box frontend content
     * 
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content($post) {
        // add an nonce field so we can check for it later.
        wp_nonce_field( 'pc_product_code_meta', 'pc_product_code_meta_nonce' );

        /*
        * Use get_post_meta() to retrieve an existing value
        * from the database and use the value for the form.
        */
        $current_value = get_post_meta( $post->ID, '_pc_product_code', true );

        echo '<p>' . __('Please enter a unique product code.', 'bonestheme') . '</p>';
        echo '<input type="text" name="pc_product_code" id="pc_product_code" value="'. $current_value .'">';
    }
    
}


?>
