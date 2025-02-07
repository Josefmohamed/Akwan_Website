<?php
// @author DELL
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'hero_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/hero_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$description = get_field('description');
$cta_button = get_field('cta_button');
$image = get_field('image');
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <div class="cards-wrapper">
    <div class="left-content">
      <?php if ($title) { ?>
      <h2><?= $title ?></h2>
      <?php } ?>
      <?php if ($description) { ?>
      <div class="description"><?= $description ?></div>
      <?php } ?>
      <?php if (!empty($cta_button) && is_array($cta_button)) { ?>
        <a class="cta-button light-cta" href="<?= $cta_button['url'] ?>" target="<?= $cta_button['target'] ?>"><?= $cta_button['title'] ?></a>
      <?php } ?>

    </div>
    <div class="right-image">
      <?php if (!empty($image) && is_array($image)) { ?>
        <picture class="image image-wrapper cover-image aspect-ratio">
          <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
        </picture>
      <?php } ?>
    </div>
  </div>
</div>
</section>


<!-- endregion akwan_website's Block -->
