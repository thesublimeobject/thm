<?php
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