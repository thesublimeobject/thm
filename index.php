<?php
    get_header(); 
    while (have_posts()): the_post();
        if (have_rows('block')): 
            while (have_rows('block')): the_row();
                if (get_row_layout() == 'banner'):
                    get_template_part( 'inc/loop', 'banner' );
                endif;
            endwhile;   
        endif;
    endwhile;
    get_footer();
?>