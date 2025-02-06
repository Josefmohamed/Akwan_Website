<?php
/*
 * Template Name: Full Width With Hero
 * */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="full-width-template-with-hero">
    <?php get_template_part( "blocks/hero_block/index" ); ?>
    <div class="entry-content">
      <object data="" type="svg"></object>
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile;

get_footer();
