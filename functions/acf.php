<?php

/*--------------------------------------------------------*\
    Add Options Page for Global Site Options
\*--------------------------------------------------------*/

if ( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'global-theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}

/*--------------------------------------------------------*\
    Customize Color Picker Presets
\*--------------------------------------------------------*/
add_action( 'acf/input/admin_head', function() {
    echo "<script type='text/javascript' src='ca/bld/acfColors.js'></script>";
});

// add_action( 'acf/input/admin_head', function()
// {
//     $colors = [
//       "#669933",
//       "#A5C867",
//       "#54A1AA",
//       "#E59421",
//       "#DF74b1",
//     ];

//     $colors = json_encode($colors);

//     echo <<<ENDSCRIPT
//     <script>
//         function setColorPicker() {
//             try {
//                 jQuery('.wp-color-picker').iris( 'option', 'palettes', {$colors} );
//             } catch(e) {}
//         }
//         jQuery(function(){
//             try {
//                 setColorPicker();

//                 acf.add_action('append', function(){
//                     setColorPicker();
//                 });
//             }
//             catch (e) {}
//         });
//     </script>
// ENDSCRIPT;
// }, 1000);


/*--------------------------------------------------------*\
    Relevansii Search Plugin
    Allow custom field content to show in search excerpt
\*--------------------------------------------------------*/
// add_filter('relevanssi_excerpt_content', function($content, $post, $query) {

//     global $wpdb; 

//     $fields = $wpdb->get_results("SELECT DISTINCT(meta_key) as meta_key, meta_value 
//         FROM umjn_postmeta 
//         WHERE post_id = $post->ID 
//         AND meta_key NOT LIKE '\_%'
//         AND ( 
//          meta_key LIKE '%\_content' OR
//          meta_key LIKE '%\_title' OR
//          meta_key LIKE '%\_subtitle' OR
//          meta_key LIKE '%\_description' OR
//          meta_key LIKE '%\_name'
//         )
//         AND meta_key NOT LIKE '%\_is%'
//         AND meta_key NOT LIKE '%\_has%'", OBJECT_K);

//     foreach($fields as $field) { 
//         $content .= ' ' . $field->meta_value;
//     }

//     return $content; 
// }, 10, 3); 