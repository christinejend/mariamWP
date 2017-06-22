<div class="wrap cmicpt-wrap">
    <h2>Current Menu Item for Custom Post Types</h2>
    <?php if(!empty($_POST['submit']) && $_POST['submit'] != ''):?>
    <div class="notice notice-success is-dismissible"> 
    	<p><strong>Settings saved.</strong></p>
    	<button type="button" class="notice-dismiss">
    		<span class="screen-reader-text">Dismiss this notice.</span>
    	</button>
    </div>
    <?php endif;?>
    <?php if((function_exists('pll_current_language') && !pll_current_language()) || (function_exists('icl_object_id') && ICL_LANGUAGE_CODE == 'all')):?>
        <div id="setting-error-settings_updated" class="error settings-error"> 
            <p><strong>Please select a language from the admin bar.</strong></p>
        </div>
    <?php else:?>
    <form method="post" action="options-general.php?page=current-menu-item-cpt">
       
        <table class="form-table">
            <tbody>                
                <?php $pages = get_posts( array( 'numberposts' => -1, 'post_type' => 'page', 'suppress_filters' => false ) );?>
                <tr>   
                    <th colspan="2">
                        <h3>Assign custom post types to pages</h3>
                        <p>Select which page will be active in the nav menu when you are on the single page of a custom post type.</p>
                    </th>
                </tr>
                
                <?php foreach($postTypes as $postType):?>
                <tr>
                    <th scope="row">
                        <label title="<?php echo $postType->labels->name;?> (<?php echo $postType->name;?>)" for="<?php echo $postType->name;?>">Assign "<strong><?php echo $postType->labels->name;?></strong>" to</label>
                    </th>
                    <td>
                        <select name="<?php echo $postType->name;?>" id="<?php echo $postType->name;?>">
                            <option value=""></option>
                            <?php foreach($pages as $page):?>
                                <option value="<?php echo $page->ID;?>"<?php if(!empty($cmicptData->{$postType->name}) && $cmicptData->{$postType->name} == $page->ID):?> selected="selected"<?php endif;?>><?php echo $page->post_title;?></option>
                            <?php endforeach;?>	
                        </select>
                    </td>
                </tr>
                <?php endforeach;?>
                
                <tr>   
                    <th colspan="2"><h3>Options</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="custom_class_name">Custom Item Class</label>
                    </th>
                    <td>
                        <input class="regular-text ltr" type="text" name="custom_class_name" id="custom_class_name" value="<?php echo (isset($cmicptClass->item)) ? $cmicptClass->item : '';?>" /><br />
                        <small>You can enter multiple classes separated by a space. The default class is <em>current-menu-item</em>.</small>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="custom_parent_class_name">Custom Parent Class</label>
                    </th>
                    <td>
                        <input class="regular-text ltr" type="text" name="custom_parent_class_name" id="custom_parent_class_name" value="<?php echo (isset($cmicptClass->parent)) ? $cmicptClass->parent : '';?>" /><br />
                        <small>You can enter multiple classes separated by a space. The default class is <em>current-menu-ancestor</em>.</small>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="show_builtin_post_types">Show built-in Post Types?</label>
                    </th>
                    <td>
                        <input name="show_builtin_post_types" type="checkbox" id="show_builtin_post_types" value="1" <?php echo (isset($cmicptClass->showBuiltin) && $cmicptClass->showBuiltin == 1) ? 'checked="checked"' : '';?> />                        
                    </td>
                </tr>
            </tbody>
        </table>
    
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" /></p>
    </form>
    <?php endif;?>
    
    <div class="cmicpt-leave-review">Found this plugin useful? <a href="https://wordpress.org/plugins/current-menu-item-for-custom-post-types/#reviews" target="_blank">Consider leaving a review on Wordpress.org</a>. Thank you :)</div>
    
</div>