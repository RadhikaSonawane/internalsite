
<?php

/**
*The template for the front page
*
*/


get_header(); // header.php
 
get_template_part('template-parts/front-page', 'slideshow');
get_template_part('template-parts/front-page', 'about');
get_template_part('template-parts/front-page', 'inspiration');
get_template_part('template-parts/front-page', 'tips');

get_footer(); //footer.php
