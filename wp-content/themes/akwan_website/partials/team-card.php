<?php
$post_id = @$args['post_id'] ?: get_the_ID();
//$post_title = get_the_title($post_id);
//$post_permalink = get_the_permalink($post_id);

$member_image = get_field('member_image', $post_id);
$member_name = get_field('member_name', $post_id);
$member_job = get_field('member_job', $post_id);
$member_description = get_field('member_description', $post_id);
?>
<div class="team-cards">
  <picture class="aspect-ratio member-image">
<!--    --><?//= \Theme\Helpers::get_post_thumbnail($post_id, 'img-384-384') ?>

    <img src="<?= $member_image['url'] ?>" alt="<?= $member_image['alt'] ?>">

  </picture>
  <div class="member-content">
    <?php if ($member_name) { ?>
    <h3><?= $member_name ?></h3>
    <?php } ?>
    <?php if ($member_job) { ?>
      <h4><?= $member_job ?></h4>
    <?php } ?>
    <?php if ($member_description) { ?>
    <div class="member-description"><?= $member_description ?></div>
    <?php } ?>
  </div>
</div>

