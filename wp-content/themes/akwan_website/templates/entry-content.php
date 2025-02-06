<?php
/*
 * Template Name: Entry Content
 * */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="entry-content-template-wrapper">
    <div class="container">
      <div class="main-wrapper">
        <h2 class="headline-1 template-title"><?= get_the_title(); ?></h2>
        <div class="entry-content">
          <?php the_content(); ?>

        </div>
      </div>

    </div>
  </div>
<?php endwhile; ?>

<?php get_footer();
