<?php
global $bgClass;
$bgClass = 'white-bg';
get_header();
global $post;
$post_id = get_the_ID();
$author_id = $post->post_author;
$thumbnail_id = get_post_thumbnail_id();
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$author_name = get_the_author_meta('display_name', $author_id);
$author_url = get_author_posts_url($author_id);
$excerpt = get_the_excerpt($post_id);
$title = get_field('title', $post_id);
$author_position = get_the_author_meta('position', $author_id);
$post_tags = get_the_tags($post_id);
// current post type
$current_post_type = get_post_type($post);
// attachment
$display_attachment = get_field('display_attachment', $post_id);
$attachment_url = $display_attachment === 'file' ? get_field('attachment_file', $post_id) : get_field('attachment_url', $post_id);
// get archive page depend on current cpt
$archive_page = get_field($current_post_type . '_archive_page', 'options');
//$cat_terms = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids')) ?? array();
//$tag_terms = wp_get_post_terms(get_the_ID(), 'post_tag', array('fields' => 'ids')) ?? array();
?>
<?php if (have_posts()): the_post(); ?>
  <div class="single-post-container">
  <div class="container">
  <div class="single-post-wrapper">
  <?php if (is_array($post_tags) && !is_wp_error($post_tags)) { ?>
    <span class="has-label">
            <?= $post_tags[0]->name ?>
          </span>
  <?php } ?>
  <h2 class="post-title">
    <?= get_the_title() ?>
  </h2>
  <div class="post-date">
    <?= get_the_date() ?>
  </div>
  <?php if (has_post_thumbnail()): ?>
    <picture class="post-featured-image aspect-ratio">
      <?php echo \Theme\Helpers::get_post_thumbnail($post_id, 'large') ?>
    </picture>
  <?php endif; ?>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <!--        sharing-->
  <div class="post-share-links">
  <?php if ($archive_page): ?>
    <a class="back-articles" href="<?= $archive_page ?>"> < Back to
      <?= str_replace('_', ' ', $current_post_type !== 'post' ?: 'blog') ?></a>
  <?php endif; ?>
  <div class="sharing">
  <?php if ($attachment_url) { ?>
    <a download="<?= $attachment_url ?>" href="<?= $attachment_url ?>"
       target="_blank">
      <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
           xmlns="http://www.w3.org/2000/svg">
        <circle cx="24" cy="24" r="24" fill="#001407"/>
        <path
          d="M24 28L18 22.3081L19.1418 21.2209L23.1493 25.1221L23.1493 17L24.8507 17L24.8507 25.1221L28.8582 21.2209L30 22.3081L24 28Z"
          fill="white"/>
        <rect x="18" y="29" width="12" height="2" fill="white"/>
      </svg>

    </a>
  <?php } ?>
<?php endif; ?>
  <a data-shareto="<?php _e('Twitter', 'akwan_website') ?>"
     rel="nofollow" target="_blank"
     href="https://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>%20-%20<?php echo wp_get_shortlink() ?>">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
         xmlns="http://www.w3.org/2000/svg">
      <circle cx="24" cy="24" r="24" fill="#1D9BF0"/>
      <path
        d="M32.8724 18.6993C32.2519 18.9865 31.5853 19.1805 30.8846 19.2682C31.6076 18.8163 32.1486 18.1052 32.4064 17.2674C31.7272 17.6888 30.9837 17.9854 30.2084 18.1444C29.6871 17.563 28.9965 17.1776 28.244 17.0481C27.4914 16.9186 26.719 17.0522 26.0466 17.4282C25.3742 17.8042 24.8395 18.4016 24.5255 19.1275C24.2114 19.8534 24.1356 20.6673 24.3099 21.4428C22.9334 21.3706 21.5869 20.997 20.3577 20.3461C19.1285 19.6952 18.0441 18.7817 17.1748 17.6647C16.8776 18.2003 16.7067 18.8211 16.7067 19.4824C16.7063 20.0777 16.8467 20.6638 17.1153 21.1888C17.3839 21.7139 17.7724 22.1615 18.2463 22.4921C17.6967 22.4739 17.1591 22.3187 16.6784 22.0397V22.0862C16.6784 22.9211 16.9549 23.7303 17.461 24.3765C17.9672 25.0227 18.6718 25.4661 19.4553 25.6315C18.9454 25.7756 18.4108 25.7968 17.8919 25.6936C18.1129 26.4119 18.5436 27.0401 19.1234 27.4902C19.7033 27.9402 20.4034 28.1897 21.1258 28.2035C19.8996 29.2089 18.3852 29.7542 16.8263 29.7518C16.5502 29.7519 16.2743 29.735 16 29.7014C17.5824 30.764 19.4244 31.3279 21.3056 31.3258C27.6738 31.3258 31.1551 25.817 31.1551 21.0393C31.1551 20.884 31.1514 20.7273 31.1447 20.572C31.8219 20.0606 32.4064 19.4272 32.8709 18.7016L32.8724 18.6993Z"
        fill="white"/>
    </svg>
  </a>
  <a data-shareto="<?php _e('Linkedin', 'akwan_website') ?>"
     rel="nofollow" target="_blank"
     href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_shortlink() ?>&amp;title=<?php echo urlencode(get_the_title()) ?>&amp;summary=<?php echo urlencode(wp_strip_all_tags(get_the_excerpt())) ?>&amp;source=<?php echo urlencode(get_bloginfo('name')) ?>">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
         xmlns="http://www.w3.org/2000/svg">
      <circle cx="24" cy="24" r="24" fill="#0E76A8"/>
      <path
        d="M31.8779 25.6031V31.3477H28.5818V25.9876C28.5818 24.6408 28.1049 23.7222 26.9122 23.7222C26.0015 23.7222 25.4591 24.3419 25.221 24.9406C25.134 25.1546 25.1116 25.4528 25.1116 25.7525V31.3477H21.814C21.814 31.3477 21.8587 22.2703 21.814 21.3291H25.1116V22.7491L25.09 22.7818H25.1116V22.7491C25.5492 22.0679 26.3313 21.094 28.0826 21.094C30.2515 21.094 31.8779 22.5264 31.8779 25.6031ZM18.3653 16.5C17.2381 16.5 16.5 17.2474 16.5 18.2306C16.5 19.1921 17.2165 19.962 18.3222 19.962H18.3437C19.4941 19.962 20.2083 19.1921 20.2083 18.2306C20.1883 17.2474 19.4948 16.5 18.3661 16.5H18.3653ZM16.6957 31.3477H19.9918V21.3291H16.6957V31.3477Z"
        fill="white"/>
    </svg>
  </a>
  </div>
  </div>
<?php if ($current_post_type === 'post' || $current_post_type === 'articles') { ?>
  <?php if (get_the_author() && function_exists('get_coauthors')): ?>
    <div class="author-details">
      <h3 class="author-main">Authors</h3>
      <?php $coauthors = get_coauthors();
      if (is_array($coauthors) && !empty($coauthors)):
        foreach ($coauthors as $coauthor) {
          ?>
          <div class="author-card">
            <div
              class="author-gravatar"><?= get_avatar($coauthor->user_email, 'img-80-80'); ?></div>
            <div class="author-name-position">
              <div class="author-name"><?= $coauthor->display_name; ?></div>
              <h4 class="author-position"> <?= $author_position ?></h4>
            </div>
          </div>
        <?php }
      endif;
      ?>
    </div>
  <?php endif; ?>
<?php } ?>
  </div>
<?php
$args = array(
  'post_type' => $current_post_type,
  'posts_per_page' => 3,
  'order' => 'DESC',
  'orderby' => 'ID',
  'post__not_in' => array($post->ID),
//        'tax_query' => array(
//          'relation' => 'OR',
//          array(
//            'taxonomy' => 'post_tag',
//            'field' => 'term_id',
//            'terms' => $tag_terms,
//            'include_children' => false,
//          ),
//          array(
//            'taxonomy' => 'category',
//            'field' => 'term_id',
//            'terms' => $cat_terms,
//            'include_children' => false,
//          ),
//        ),
);
$relatedPosts = new WP_Query($args); ?>
<?php if ($relatedPosts->have_posts()): ?>
  <div class="related-posts">
    <div class="has-label"><?= __('Thought Leadership', 'akwan_website') ?></div>
    <h2 class="related-title"><?= __('You may also like...', 'akwan_website') ?></h2>
    <div class="related-wrapper">
      <?php while ($relatedPosts->have_posts()) {
        $relatedPosts->the_post();
        get_template_part("partials/post-card", '', array('post_id' => get_the_ID()));
      }
      wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>
  </div>
  </div>
<?php //endif; ?>
<?php get_footer();
