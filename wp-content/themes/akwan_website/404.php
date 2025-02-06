<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package akwan_website
 */
get_header();
?>
  <section class="page-not-found">
    <div class="container">
      <div class="content">
        <div class="error-tittle">
          <?=__('404' , 'akwan_website')?>
        </div>
        <h2 class="headline-2 text gradient-animation"> <?=__('Something went wrong. Page not found.', 'akwan_website')?></h2>
        <a href="<?=site_url()?>" class="theme-cta-button"> <?=__('Back to Homepage' , 'akwan_website')?></a>
      </div>
    </div>
  </section>

<?php
get_footer();
