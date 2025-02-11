<?php
// @author DELL
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'our_team_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_team_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$description = get_field('description');
$programmatic_or_manual = get_field("programmatic_or_manual");
if ($programmatic_or_manual === 'programmatic') {
  $query_options = get_field("query_options") ?: [];
  $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
  $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
  $args = [
    "post_type" => "teams",
    "posts_per_page" => $number_of_posts,
    "order" => $order,
    "post_status" => "publish",
    "paged" => 1,
    'orderby' => 'date',
  ];
  $the_query = new WP_Query($args);
}
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <?php if ($title) { ?>
  <h1><?= $title ?></h1>
  <?php } ?>
  <?php if ($programmatic_or_manual === "manual") { ?>
    <div class="team-wrapper">
      <div class="team">
        <?php foreach (get_field("team_card") as $card):
          get_template_part("partials/team-card", "", ["post_id" => $card->ID]);
        endforeach; ?>
      </div>
    </div>
  <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>
    <div class="team-wrapper">
      <div class="team">
        <?php while ($the_query->have_posts()) {
          $the_query->the_post();
          get_template_part("partials/team-card", "", ["post_id" => get_the_ID()]);
        } ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  <?php } ?>
</div>
</section>


<!-- endregion akwan_website's Block -->
