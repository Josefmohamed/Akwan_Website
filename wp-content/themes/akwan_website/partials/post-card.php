<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$post_date = get_the_date(' F j, Y', $post_id);
$post_permalink = get_permalink($post_id);
?>
<div id="post-id-<?= $post_id ?>" class="related-card">
  <a href="<?= $post_permalink ?>" class="thought-leadership-card">
    <picture class="aspect-ratio image">
      <?= \Theme\Helpers::get_post_thumbnail($post_id, 'img-384-280') ?>
    </picture>
    <?php if ($post_date) { ?>
      <h3 class="thought-leadership-date paragraph"><?= $post_date ?></h3>
    <?php } ?>
    <?php if ($post_title) { ?>
      <h4 class="thought-leadership-description"><?= $post_title ?></h4>
    <?php } ?>
  </a>
</div>
