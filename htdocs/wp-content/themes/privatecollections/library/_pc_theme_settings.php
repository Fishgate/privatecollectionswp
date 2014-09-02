<?php

if(!current_user_can('manage_options')){ wp_die('You do not have sufficient permissions to access this page.'); } 

if(isset($_POST['update_settings']) && $_POST['update_settings'] == true) {
    //General settings
    update_option('facebook_url',           esc_attr($_POST['facebook_url']));
    update_option('twitter_url',            esc_attr($_POST['twitter_url']));
    update_option('youtube_url',            esc_attr($_POST['youtube_url']));
    update_option('apply_form_emails',      esc_attr($_POST['apply_form_emails']));
    update_option('contact_form_emails',    esc_attr($_POST['contact_form_emails']));

    //Contact settings
        //Stellenboch
        update_option('stell_num',      esc_attr($_POST['stell_num']));
        update_option('stell_fax',      esc_attr($_POST['stell_fax']));
        update_option('stell_email',    esc_attr($_POST['stell_email']));
        update_option('stell_gps',      esc_attr($_POST['stell_gps']));
        update_option('stell_address',  esc_attr($_POST['stell_address']));

        //pretoria
        update_option('pre_num',      esc_attr($_POST['pre_num']));
        update_option('pre_fax',      esc_attr($_POST['pre_fax']));
        update_option('pre_email',    esc_attr($_POST['pre_email']));
        update_option('pre_gps',      esc_attr($_POST['pre_gps']));
        update_option('pre_address',  esc_attr($_POST['pre_address']));

    //Homepage features
    update_option('feature_soma',   esc_attr($_POST['feature_soma']));
    update_option('feature_market', esc_attr($_POST['feature_market']));
    update_option('feature_treat',  esc_attr($_POST['feature_treat']));

}

?>
<style>
   .form-table th {
        padding: 20px 30px;
    }

    .sub-table {
        padding: 20px 30px;
    }
</style>

<div class="wrap">  
    <h2><?php bloginfo('title'); ?> - Theme Settings</h2>

    <?php if(isset($_POST['update_settings']) && $_POST['update_settings'] == true) { ?>
        <div class="updated settings-error" id="setting-error-settings_updated"><p><strong>Settings saved.</strong></p></div>
    <?php } ?>

    <div class="metabox-holder">
        <div class="postbox">
            <div id="isa_general" class="group" style="display: block;">
                <form action="" method="post">
                    <h3>General Options</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Facebook</th>
                            <td><input name="facebook_url" value="<?php echo stripslashes(get_option('facebook_url')); ?>" class="regular-text" type="text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Twitter</th>
                            <td><input name="twitter_url" value="<?php echo stripslashes(get_option('twitter_url')); ?>" class="regular-text" type="text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Youtube</th>
                            <td><input name="youtube_url" value="<?php echo stripslashes(get_option('youtube_url')); ?>" class="regular-text" type="text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Apply form notifications</th>
                            <td>
                                <input name="apply_form_emails" value="<?php echo stripslashes(get_option('apply_form_emails')); ?>" class="regular-text" type="text" />
                                <span class="description">&nbsp;&nbsp;Seperate multiple email addresses with a comma e.g. "john@gmail.com, jane@gmail.com"</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Contact form notifications</th>
                            <td>
                                <input name="contact_form_emails" value="<?php echo stripslashes(get_option('contact_form_emails')); ?>" class="regular-text" type="text" />
                                <span class="description">&nbsp;&nbsp;Seperate multiple email addresses with a comma e.g. "john@gmail.com, jane@gmail.com"</span>
                            </td>
                        </tr>
                    </table>

                    <h3>Contact Information</h3>
                    <table class="sub-table">
                       <tr>
                           <td>
                               <h3>Cape Town</h3>
                               <table class="form-table">
                                    <tr>
                                        <th scope="row">Telephone Number</th>
                                        <td><input name="stell_num" value="<?php echo stripslashes(get_option('stell_num')); ?>" class="regular-text" type="text" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fax Number</th>
                                        <td><input name="stell_fax" value="<?php echo stripslashes(get_option('stell_fax')); ?>" class="regular-text" type="text" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email Address</th>
                                        <td><input name="stell_email" value="<?php echo stripslashes(get_option('stell_email')); ?>" class="regular-text" type="text" /></td>
                                    </tr>    
                                    <tr>
                                        <th scope="row">GPS Co-ordinates</th>
                                        <td><input name="stell_gps" value="<?php echo stripslashes(get_option('stell_gps')); ?>" class="regular-text" type="text" /></td>
                                    </tr> 
                                    <tr>
                                        <th scope="row">Physical Address</th>
                                        <td><textarea name="stell_address" class="regular-text" cols="38" rows="5"><?php echo stripslashes(get_option('stell_address')); ?></textarea></td>
                                    </tr>                           
                                </table>
                           </td>
                           <td>
                               <h3>Johannesburg</h3>
                               <table class="form-table">
                                    <tr>
                                        <th scope="row">Telephone Number</th>
                                        <td><input name="pre_num" value="<?php echo stripslashes(get_option('pre_num')); ?>" class="regular-text" type="text" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fax Number</th>
                                        <td><input name="pre_fax" value="<?php echo stripslashes(get_option('pre_fax')); ?>" class="regular-text" type="text" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email Address</th>
                                        <td><input name="pre_email" value="<?php echo stripslashes(get_option('pre_email')); ?>" class="regular-text" type="text" /></td>
                                    </tr>    
                                    <tr>
                                        <th scope="row">GPS Co-ordinates</th>
                                        <td><input name="pre_gps" value="<?php echo stripslashes(get_option('pre_gps')); ?>" class="regular-text" type="text" /></td>
                                    </tr> 
                                    <tr>
                                        <th scope="row">Physical Address</th>
                                        <td><textarea name="pre_address" class="regular-text" cols="38" rows="5"><?php echo stripslashes(get_option('pre_address')); ?></textarea></td>
                                    </tr> 
                                </table>
                           </td>
                       </tr>
                    </table>

                    <h3>Homepage Features</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Somatology</th>
                            <td>
                                <input <?php if ( get_option('feature_soma') == "on" ) echo "checked"; ?> type="checkbox" name="feature_soma" id="soma_checkbox" class="checkbox">
                                <label for="soma_checkbox"> Feature latest "Somatology" news items on the home page</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Marketing</th>
                            <td>
                                <input <?php if ( get_option('feature_market') == "on" ) echo "checked"; ?> type="checkbox" name="feature_market" id="marketing_checkbox" class="checkbox">
                                <label for="marketing_checkbox"> Feature latest "Marketing" news items on the home page</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Treatments</th>
                            <td>
                                <input <?php if ( get_option('feature_treat') == "on" ) echo "checked"; ?> type="checkbox" name="feature_treat" id="treatments_checkbox" class="checkbox">
                                <label for="treatments_checkbox"> Feature latest "Treatments" news items on the home page</label>
                            </td>
                        </tr>                            
                    </table>

                    <div style="padding-left: 10px">
                        <input type="hidden" name="update_settings" value="true" />
                        <p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit"></p>                            
                    </div>
                </form>
            </div>
            <!-- #isa_general close -->
        </div>
        <!-- .postbox close -->
    </div>
    <!-- .metabox-holder close -->
</div>
<!-- .wrap close -->