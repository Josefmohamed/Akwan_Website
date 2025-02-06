<?php
/*
 * Template Name: Full Width
 * */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="full-width-template">
    <h1 class="headline-1 template-title"><?= get_the_title(); ?></h1>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile;

get_footer();
