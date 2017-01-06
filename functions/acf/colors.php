<?php
/*--------------------------------------------------------*\
    Set background color select menu
    from Global Options

    Note: In Global Options set a content field named
    colors_for_select_menus to your background colors
    in val : label format. E.g.,

    bg--blue : Blue

    This function automatically replaces the val/label choice
    for any field that is 
    1. A select field
    2. named background--color
\*--------------------------------------------------------*/
function acf_load_color_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();
    
    
    // get the textarea value from options page without any formatting
    $choices = get_field('colors_for_select_menus', 'option', false);

    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices);

    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            $exploded = explode( " : " , $choice );
            $field['choices'][ $exploded[0] ] = $exploded[1];
        }   
    }
    
    // return the field
    return $field;
    
}
add_filter('acf/load_field/name=background--color', 'acf_load_color_field_choices');