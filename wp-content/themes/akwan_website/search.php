<?php
/*
 * Template Name: Search Page
 * */
get_header();
?>
  <section data-section-class="wp_search_block" class="wp_search_block">
    <div class="container">
      <div class="wp-search-form">
        <?php get_search_form(); ?>
      </div>
      <?php if (have_posts() && @$_GET['s'] != '') { ?>
        <h1 class="headline-1">
          <?php _e('Search results for: ', 'akwan_website'); ?>
          <p class="paragraph"><?php echo get_search_query(); ?></p>
        </h1>
      <?php } ?>
      <?php if (have_posts() && @$_GET['s'] != '') { ?>
        <div class="row row-cols-1 row-cols-md-3">
          <?php
          while (have_posts()) :
            the_post();
            get_template_part("partials/collection-card");
            // End the loop.
          endwhile;
          ?>
        </div>
      <?php } else {
        echo '<h2 class="headline-1 no-results">We couldn\'t find what you were looking for. Please try typing in another keyword.</h2>';
      } ?>
    </div>
  </section>
<?php
get_footer();
