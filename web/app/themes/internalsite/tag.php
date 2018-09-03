<?php 
    if ( have_posts() ){
        while ( have_posts() ) {
            the_title();  //Displays the post title
            the_excerpt(); //Displays the post excerpt
        } 
    } 
?>