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

    <form id="pc-contact-form">
        <div class="cf">
            <input id="enquire_name" class="m-all t-1of2 d-1of2" value="Name:" type="text" data-default="Name:">
            <input id="enquire_email" class="m-all t-1of2 d-1of2 last" value="Email Address:" type="text" data-default="Email Address:">
        </div>
        
        <textarea id="enquire_message" class="d-all t-all m-all" data-default="Message:">Message:</textarea>
        
        <div class="cart-container cf"></div>
        
        <input class="submit-btn" type="submit" value="Submit" />
        
    </form>
        

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
    ob_start();
    ?>

    <div class="m-1of2 t-1of2 d-1of2 contact-details-block">
        <h3>Cape Town</h3>
        Tel: +27 (0)21 421 0298<br />
        Fax: +27 (0)21 421 0269<br />
        22 Hudsen Street<br />
        cnr Waterkant<br />
        Green Point<br />
        8001<br />
        South Africa
    </div>

    <div class="m-1of2 t-1of2 d-1of2 last contact-details-block">
        <h3>Johannesburg</h3>
        Tel: +27 (0)11 447 9356<br />
        1 Corlett Drive<br />
        Corner Oxford Road<br />
        Illovo<br />
        2196<br />
        South Africa
    </div>

    <div style="margin: 0 0 1.5em;" class="clearfix"></div>

    <?php    
    $output = ob_get_contents();
    ob_end_clean();
    
    return $output;
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