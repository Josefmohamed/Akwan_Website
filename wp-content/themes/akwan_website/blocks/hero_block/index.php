<?php
$id = '';
$className = $dataClass = 'hero_block';
if (isset($block)) {
// Create id attribute allowing for custom "anchor" value.
  $id = $block['id'];
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
 *
 *
 *
 ****************************/
$title = get_the_title();
$excerpt = get_the_excerpt();
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<?php if ($title): ?>
  <h1><?= $title ?></h1>
<?php endif; ?>
<?php if ($excerpt): ?>
  <div><?= $excerpt ?></div>
<?php endif ?>
<?php if (has_post_thumbnail()) {
  echo \Theme\Helpers::get_post_thumbnail(get_the_ID(), 'large');
} ?>






</section>


<!-- endregion akwan_website's Block -->
