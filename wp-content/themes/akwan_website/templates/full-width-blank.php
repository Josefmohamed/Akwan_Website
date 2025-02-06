<?php
/*
 * Template Name: Full Width Blank
 * */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="full-width-template-blank">
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile;

get_footer();
