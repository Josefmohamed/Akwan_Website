<?php
get_header();
$post_id = get_the_ID();
if (have_posts()) {
  while (have_posts()) {
    the_post();
    ?>
    <div class="single-mentor" role="main">
      <?php
      include get_template_directory() . '/blocks/single_book_block/index.php';
      ?>
    </div>
    <?php
  }
} else {
  echo 'No posts found';
}
get_footer();
?>
