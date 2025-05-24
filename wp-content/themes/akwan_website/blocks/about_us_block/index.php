<?php
// @author DELL
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'about_us_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/about_us_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<picture class="cover-image">
  <img src="  <?= get_template_directory_uri() . '/images/backgrounds/hero-image-2.png' ?>" alt="hero-image">
</picture>

<div class="content-wrapper">
  <?php if ($title) { ?>
    <h2 class="about-us-title akwan-h2"><?= $title ?></h2>
  <?php } ?>
  <?php if ($description) { ?>
    <div class="about-us-title-description paragraph-14"><?= $description ?></div>
  <?php } ?>
</div>
</section>


<!-- endregion akwan_website's Block -->
