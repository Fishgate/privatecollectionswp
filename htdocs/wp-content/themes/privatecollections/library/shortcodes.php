<?php
/*
Shortcodes for Private Collections
*/

/*
 * 
 * 
 */
function pc_highlight_txt($atts, $content) {
    return "<span style=\"color: #d0ac2e;\">$content</span>";
}
add_shortcode('highlight', 'pc_highlight_txt');

/*
 * 
 * 
 */
function pc_contact_form() {
    ob_start();
    ?>

    <div>
        <form>
            <input class="error" value="Name:" type="text">
            <input class="success" value="Name:" type="text">
            <input disabled="disabled" value="Name:" type="text">
            <input value="Email Address:" type="text">
            <textarea>Message:</textarea>
        </form>
    </div>

    <?php    
    $output = ob_get_contents();
    ob_end_clean();
    
    return $output;
}
add_shortcode('contact-form', 'pc_contact_form');

/*
 * 
 * 
 */
function pc_contact_details($atts, $content) {
    return "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eros sapien, feugiat et nibh eget, porta pellentesque erat. Ut vel mauris turpis. Quisque semper commodo nibh commodo sodales. Aenean tempus pharetra enim, quis molestie lacus laoreet in. In mattis velit orci. Suspendisse erat justo, lacinia gravida lectus nec, adipiscing gravida leo. Maecenas varius metus vel tellus condimentum congue.";
}
add_shortcode('contact-details', 'pc_contact_details');

/*
 * 
 * 
 */
function d_1of2($atts, $content) {
    $args = shortcode_atts( array(
        'class' => ''
    ), $atts );
    
    $class = $args['class'];
    $content = preg_replace('#^<\/p>|<p>$#', '', $content);
    
    if($class === "last"){
        return "<div class=\"d-1of2 $class\">$content</div><div class=\"clearfix\"></div>";
    }else{
        return "<div class=\"d-1of2 $class\">$content</div>";
    }
    
}
add_shortcode('one-half', 'd_1of2');

?>
