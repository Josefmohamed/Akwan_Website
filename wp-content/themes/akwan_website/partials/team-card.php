<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$post_permalink = get_the_permalink($post_id);
?>
<a class="mentors-card" href="<?= $post_permalink ?>">
  <picture class="aspect-ratio">
    <?= \Theme\Helpers::get_post_thumbnail($post_id, 'img-384-384') ?>
  </picture>
  <?php if ($post_title) { ?>
    <h3 class="mentors-card-title"><?= $post_title ?></h3>
  <?php } ?>
  <button class="mentors-card-link theme-cta-link"><?= __('Full Bio', 'akwan_website') ?></button>
</a>

