<?php
/*
Shortcodes for Private Collections wesite yo.
*/

function pc_highlight_txt($atts, $content) {
    return "<span style=\"color: #d0ac2e;\">$content</span>";
}

add_shortcode('highlight', 'pc_highlight_txt');

?>
