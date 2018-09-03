<?php
get_header(); // header.php
?>

<div class="container">
	<?php if (have_posts()) { ?>
	<!-- Now we know there is one or more entries-->
		<?php while(have_posts()) { the_post(); ?>
		<!-- Now we are in a single post -->
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
		<?php } ?>
	<?php } else { ?>
    <!-- Now we have found that there is NO POST to retrieve on this page -->
    Sorry, there is no content on this page.
	<?php } ?>
</div>

<?php
get_footer();
?>