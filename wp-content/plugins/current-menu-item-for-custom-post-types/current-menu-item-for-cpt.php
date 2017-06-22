<?php
/**
 * Plugin Name: Current Menu Item for Custom Post Types
 * Description: Allows you to highlight the current menu item by assigning a page to a custom post type.
 * Author: Roland Murg
 * Version: 1.4
 */
 
  
function cmicpt_menu(){
    add_submenu_page( 'options-general.php', __('Current Menu Item for Post Types','cmicpt'), __('Current Menu Item for Post Types','cmicpt'), 'activate_plugins', 'current-menu-item-cpt', 'cmicpt_view' );
} 
add_action('admin_menu', 'cmicpt_menu');

function cmicpt_admin_enqueue_files() {
    wp_enqueue_style( 'cmicpt-style', plugins_url('',__FILE__) . '/css/cmicpt-admin.css' );
}
add_action( 'admin_print_styles-settings_page_current-menu-item-cpt', 'cmicpt_admin_enqueue_files' );  

function cmicpt_settings_link($links) { 
    $link = '<a href="options-general.php?page=current-menu-item-cpt">Settings</a>'; 
    array_unshift($links, $link); 
    return $links; 
}
add_filter("plugin_action_links_" . plugin_basename(__FILE__), 'cmicpt_settings_link' );

function getDataSettingName(){

    if(function_exists('pll_current_language')){
        return 'cmicpt-data-' . pll_current_language();
    }
    if(function_exists('icl_object_id')){
        return 'cmicpt-data-' .ICL_LANGUAGE_CODE;
    }
    
    return 'cmicpt-data';
}

function cmicpt_view(){
       
    $dataSettingName = getDataSettingName();    
    $cmicptClass = json_decode( get_site_option( 'cmicpt-class' ) );
    $cmicptData = json_decode( get_site_option( $dataSettingName ) );
    $postTypes = get_post_types( array( 'public' => true, '_builtin' => false), 'objects', 'and' );    
    if(isset($cmicptClass->showBuiltin) && $cmicptClass->showBuiltin == 1) {
        $postTypesBuiltIn = get_post_types( array( 'public' => true, '_builtin' => true), 'objects', 'and' );    
        $postTypes = (object) array_merge((array) $postTypesBuiltIn, (array) $postTypes);
    }   
    
    if(!empty($_POST['submit']) && $_POST['submit'] != ''){
        $cmicptClasses['item'] = esc_html( str_replace( '.', '', $_POST['custom_class_name'] ) );    
        $cmicptClasses['parent'] = esc_html( str_replace( '.', '', $_POST['custom_parent_class_name'] ) );
        $cmicptClasses['showBuiltin'] = ( isset( $_POST['show_builtin_post_types'] ) ) ? esc_html( $_POST['show_builtin_post_types'] ) : '' ;      
        update_site_option('cmicpt-class', json_encode( $cmicptClasses ) );
        $cmicptClass = json_decode( get_site_option( 'cmicpt-class' ) );
        $postTypes = get_post_types( array( 'public' => true, '_builtin' => false), 'objects', 'and' );
        if($cmicptClass->showBuiltin == 1) {
            $postTypesBuiltIn = get_post_types( array( 'public' => true, '_builtin' => true), 'objects', 'and' );    
            $postTypes = (object) array_merge((array) $postTypesBuiltIn, (array) $postTypes);
        }     
        $cmicptData = array();
        foreach($postTypes as $postType){
            if(!empty($_POST[$postType->name]) && $_POST[$postType->name] != ''){
                $cmicptData[$postType->name] = $_POST[$postType->name];  
            }
        } 
        update_site_option($dataSettingName, json_encode( $cmicptData ) );                   
        $cmicptData = json_decode( get_site_option( $dataSettingName ) );
                
                
    }
                
    require_once 'include/view.php';
}
require_once 'include/filter.php';
