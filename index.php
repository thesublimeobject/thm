<?php
    get_header(); 
    while (have_posts()): the_post();
        if (have_rows('block')): 
            while (have_rows('block')): the_row();

                get_template_part( 'modules/' . get_row_layout() );
                
            endwhile;   
        endif;
    endwhile;
    get_footer();
?>