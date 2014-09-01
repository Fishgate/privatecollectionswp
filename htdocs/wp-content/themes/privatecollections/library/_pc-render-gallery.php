<?php 

/**
 * Outputs the gallery selected by the "Attach Gallery" meta
 * box onto the frontend of the site in the single.php template
 * 
 * @param WP_Post $post The post object.
 */
function pc_gallery_render($post) {
    if (class_exists('nggdb')) :
        // declare an empty array which will hold the gallery results
        $gallery = array();

        // create a new nggdb object 
        global $nggdb;
        $nextg = new $nggdb;
        
        // get post meta of the gallery
        $attached_gallery = get_post_meta( $post->ID, '_pc_attached_gallery', true );
        $product_code = get_post_meta( $post->ID, '_pc_product_code', true );
        
        // check if an attached gallery has been set from the post admin panel
        if($attached_gallery !== "0") {
            // use the previously declared array to prepare the gallery thumbnails and main image sets
            
            foreach($gallery_images = $nextg->get_gallery($attached_gallery) as $image) {
                $thumburl = content_url('gallery/' . $image->slug . $image->thumbFolder . $image->meta_data['thumbnail']['filename']);

                array_push( $gallery, array($image->imageURL, $thumburl) );
            }
            
            // begin rendering the markup for the gallery
            ?>
            <section class="slider">
                <div class="img-overlay-panel" data-prod-code="<?php echo $product_code; ?>" data-prod-thumbnail="<?php $post_thumb = new post_thumbnail(); $post_thumb->thumbnail_size = 'pc-enquiries-thumb'; echo $post_thumb->get_src(); ?>">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php

                            foreach($gallery as $images) {                                                                        
                                echo '<li><img src="'. $images[0] .'" /></li>';
                            }

                            ?>
                        </ul>
                    </div>

                    <div class="overlay">
                        <p>Pin this piece to your enquiry list.</p>
                    </div>
                </div>

                <div id="carousel" class="flexslider">
                    <ul class="slides carousel">
                        <?php

                        foreach($gallery as $thumbs) {                                                                        
                            echo '<li><img src="'. $thumbs[1] .'" /></li>';
                        }

                        ?>
                    </ul>
                </div>
                
            </section>
            <?php
        }
        

    endif;
}

?>