<?php
get_header();
?>

<div class="container">
<div class="row">
    <div class="col-md-9">

<?php if (have_posts()){ ?>
    <h2> Search Results for: <?php the_search_query(); ?></h2>
<?php while (have_posts()) { the_post()?>

  <?php get_template_part('partials/content', get_post_format());?>

    <?php } ?>

    <?php }else { ?>

<!-- nu har vi konst -->
Sorry we have  no article that you are looking for.
 <?php } ?>



    </div> <!-- end col-md-9 -->
 <div class="col-md-3">
 <?php get_sidebar();?>
 </div>

    </div>  <!-- end row -->
</div>





<?php
get_footer();
?>
