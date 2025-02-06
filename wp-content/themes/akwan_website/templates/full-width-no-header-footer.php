<?php
/*
 * Template Name: Full Width No Header & Footer
 * */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="full-width-template-no-header-footer">
    <h1 class="headline-1 template-title"><?= get_the_title(); ?></h1>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile;

get_footer();
