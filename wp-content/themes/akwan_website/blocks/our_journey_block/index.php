<?php
// @author DELL
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'our_journey_block';
if (isset($block)) {
  $id = 'block_' . uniqid();
  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }

// Create class attribute allowing for custom "className" and "align" values.
  if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
  }
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_journey_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$sub_title = get_field('sub_title');
$title = get_field('title');
$description = get_field('description');
$cta_button = get_field('cta_button');
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <?php if ($sub_title) { ?>
  <h4 class="journey-sub-title"><?= $sub_title ?></h4>
  <?php } ?>
  <div class="content-wrapper flex-col gab-40">
    <?php if ($title) { ?>
    <h5 class="journey-title"><?= $title ?></h5>
    <?php } ?>
    <?php if ($description) { ?>
    <div class="journey-description"><?= $description ?></div>
    <?php } ?>
    <?php if (!empty($cta_button) && is_array($cta_button)) { ?>
      <a class="cta-button light-cta tab-btn journey-btn" href="<?= $cta_button['url'] ?>" target="<?= $cta_button['target'] ?>"><?= $cta_button['title'] ?></a>
    <?php } ?>
  </div>
</div>
</section>


<!-- endregion akwan_website's Block -->
