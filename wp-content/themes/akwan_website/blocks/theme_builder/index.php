<?php
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if ( ! empty( $block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$dataClass = 'theme_builder';
$className = 'theme_builder';
if ( ! empty( $block['className'] ) ) {
  $className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
  $className .= ' align' . $block['align'];
}
if ( get_field( 'is_screenshot' ) ) :
  /* Render screenshot for example */
  echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/theme_builder/screenshot.png" >';

  return;
endif;

/****************************
 *     Custom ACF Meta      *
 ****************************/
$theme_builder_options = get_field( 'theme_builder_options' );
$theme_builder_style   = '';
$content_width         = \Theme\Helpers::get_key_from_array( 'content_width', $theme_builder_options );
$content_alignment     = \Theme\Helpers::get_key_from_array( 'content_alignment', $theme_builder_options );
if ( $content_width ) {
  $theme_builder_style .= "max-width:$content_width%;";
}
if ( $content_alignment ) {
  if ( $content_alignment === 'center' ) {
    $theme_builder_style .= "margin-left:auto;margin-right:auto";
  } elseif ( $content_alignment === 'end' ) {
    $theme_builder_style .= "margin-left:auto;";
  }
}
?>
<!-- region akwan_website's Block -->
<?php general_settings_for_blocks( $id, $className, $dataClass ); ?>
<div class="container">
  <blockquote>qdwdqdqwdqw</blockquote>
  <ul>
    <li>88888</li>
  </ul>
  <div class="theme-builder-wrapper" <?= $theme_builder_style ? "style='$theme_builder_style'" : '' ?>>
    <?php if ( have_rows( 'theme_builder' ) ): ?>
      <?php while ( have_rows( 'theme_builder' ) ):
        the_row(); ?>

        <?php if ( get_row_layout() == 'text_editor' ):
        $text_editor = get_sub_field( 'text_editor' );
        $space_between_elements = get_sub_field( 'space_between_elements_in_text_editor_vertically' );
        if ( $space_between_elements ) { ?>
          <style>
            @media screen and (min-width: 992px) {
              .theme-text-editor-<?= get_row_index() ?> > *:not(:last-child) {
                margin-bottom: <?=$space_between_elements / 10?>rem !important;
              }
            }
          </style>
        <?php } ?>
        <?php if ( $text_editor ) { ?>
        <div class="wysiwyg-block theme-text-editor-<?= get_row_index() ?>"><?= $text_editor ?></div>
      <?php } ?>
      <?php endif; ?>

        <?php if ( get_row_layout() == 'cta' ):
        $cta_type = get_sub_field( 'cta_type' );
        $cta = get_sub_field( 'cta' );
        if ( \Theme\Helpers::get_key_from_array( 'url', $cta ) ) { ?>
          <a href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?: '_blank' ?>"
             class="<?= $cta_type ?>"><?= $cta['title'] ?></a>
        <?php }
      endif; ?>

        <?php if ( get_row_layout() == 'image' ):
        $image = get_sub_field( 'image' );
        $image_attributes = array( "style" => '' );
        global $theme_color_pallets;

        // region styles
        $styles = get_sub_field( 'styles' );
        // endregion styles
        // region settings
        $image_sizes      = \Theme\Helpers::get_all_image_sizes();
        $image_size       = get_sub_field( 'image_size' );
        $image_dimensions = get_sub_field( 'image_dimensions' );
        if ( $image_dimensions && $image_dimensions !== '100' ) {
          $width      = round( (int) $image_dimensions * ( $image_sizes[ $image_size ]['width'] ) ) / 100;
          $height     = round( ( (int) $image_dimensions * $image_sizes[ $image_size ]['height'] ) ) / 100;
          $image_size = array( $width, $height );
        }
        // endregion settings
        // region border
        $border_width  = get_sub_field( 'border_width' );
        $border_color  = get_sub_field( 'border_color' );
        $border_style  = get_sub_field( 'border_style' );
        $border_radius = get_sub_field( 'border_radius' );
        if ( $border_width && $border_color ) {
          $image_attributes['style'] = \Theme\Helpers::get_key_from_array( $border_color, $theme_color_pallets ) ? 'border-color:var(' . $theme_color_pallets[ $border_color ] . ');' : 'border-color:' . $border_color . ';';
          $image_attributes['style'] .= 'border-width:' . $border_width . 'px;';
          if ( $border_style ) {
            $image_attributes['style'] .= "border-style:$border_style;";
          }
        }
        if ( $border_radius || $styles === 'rounded' ) {
          $border_radius             = $styles === 'rounded' ? '50%;' : "$border_radius" . 'px;';
          $image_attributes['style'] .= "border-radius:$border_radius";
        }
        // endregion border
        //region radius
        // endregion radius
        //region layout
        $layout_color = get_sub_field( 'layout_color' );
        // endregion layout
        //region caption
        $caption = \Theme\Helpers::get_key_from_array( 'caption', $image );
        // endregion caption

        // detect if image attributes style ie empty
        if ( ! $image_attributes['style'] ) {
          unset( $image_attributes['style'] );
        }
        ?>
        <?php if ( \Theme\Helpers::get_key_from_array( 'id', $image ) ) { ?>
        <fieldset class="theme-builder-image">
          <?= wp_get_attachment_image( $image['id'], $image_size, false, $image_attributes ); ?>
          <?php if ( $caption ) { ?>
            <figcaption class="theme-builder-image-caption headline-6"><?= $caption ?></figcaption>
          <?php } ?>
        </fieldset>
      <?php } ?>
      <?php endif; ?>

        <?php if ( get_row_layout() == 'gallery' ):
        $gallery = get_sub_field( 'gallery' );

        //region settings
        $columns         = get_sub_field( 'columns' );
        $crop_images     = get_sub_field( 'crop_images' );
        $link_to         = get_sub_field( 'link_to' );
        $open_in_new_tab = get_sub_field( 'open_in_new_tab' );
        $image_size      = get_sub_field( 'image_size' );
        //endregion settings
        // region dimensions
        $block_spacing = get_sub_field( 'block_spacing' );
        $horizontal    = \Theme\Helpers::get_key_from_array( 'horizontal', $block_spacing ?? array() ) ?
          $block_spacing['horizontal'] / 10 . 'rem'
          : '';
        $vertical      = \Theme\Helpers::get_key_from_array( 'vertical', $block_spacing ?? array() ) ?
          $block_spacing['vertical'] / 10 . 'rem'
          : '';
        // endregion dimensions
        ?>
        <?php if ( $gallery && ! empty( $gallery ) ) { ?>
        <figure style="--wp--style--unstable-gallery-gap:<?= $horizontal ?: '5rem' ?>;gap:<?= $vertical ?: '' ?>
          var(--wp--style--unstable-gallery-gap)" class="<?= $columns ? "columns-$columns" : 'columns-default' ?> has-nested-images <?= $crop_images ? 'is-cropped' : '' ?> is-layout-flex wp-block-gallery">
          <?php foreach ( $gallery as $image ): ?>
            <figure class="wp-block-image">
              <?php if ( $link_to && $link_to !== 'none' ): ?>
                <a href="<?php echo esc_url( $image[ $link_to ] ); ?>" target="<?= $open_in_new_tab ?? '_self' ?>">
                  <?= wp_get_attachment_image( $image['id'], $image_size ); ?>
                </a>
              <?php else:
                echo wp_get_attachment_image( $image['id'], $image_size );
              endif; ?>
              <?php if ( \Theme\Helpers::get_key_from_array( 'caption', $image ) ) { ?>
                <figcaption class="wp-element-caption"><?= $image['caption'] ?></figcaption>
              <?php } ?>
            </figure>
          <?php endforeach; ?>
        </figure>
      <?php } ?>
      <?php endif; ?>

        <?php if ( get_row_layout() == 'video' ):
        $video_type      = get_sub_field( 'video_type' );
        $video_style     = '';
        $video_width     = get_sub_field( 'video_width' );
        $video_alignment = get_sub_field( 'video_alignment' );
        if ( $video_width ) {
          $video_style .= "max-width:$video_width%;";
        }
        if ( $video_alignment ) {
          if ( $video_alignment === 'center' ) {
            $video_style .= "margin-left:auto;margin-right:auto";
          } elseif ( $video_alignment === 'end' ) {
            $video_style .= "margin-left:auto;";
          }
        }
        $video_style = $video_style ? "style='$video_style'" : '';
        if ( $video_style ) {
          echo "<div $video_style>";
        }
        switch ( $video_type ) {
          case 'youtube':
            $video_url  = get_sub_field( 'youtube_url' );
            $video_html = "<div class='theme-builder-youtube-video aspect-ratio'><div class='theme-builder-embed-video' data-video-url='$video_url' data-video-type='$video_type'></div></div>";
            echo $video_url ? $video_html : '';
            break;
          case 'vimeo':
            $video_url  = get_sub_field( 'vimeo_url' );
            $video_html = "<div class='theme-builder-embed-video' data-video-url='$video_url' data-video-type='$video_type'></div>";
            echo $video_url ? $video_html : '';
            break;
          case 'html_video':
            $html_video      = get_sub_field( 'html_video' );
            $html_video_type = \Theme\Helpers::get_key_from_array( 'type', $html_video );
            $video_url       = \Theme\Helpers::get_key_from_array( $html_video_type, $html_video );
            $video_html      = "<div class='theme-builder-default-video aspect-ratio'>
            <video src='$video_url' type='video/mp4' playsinline controls></video>
            </div>";
            echo $video_url ? $video_html : '';
            break;
        }
        if ( $video_style ) {
          echo "</div>";
        }
      endif; ?>

        <?php if ( get_row_layout() == 'spacer' ):
        $spacer = get_sub_field( 'spacer' );
        ?>
        <?php if ( $spacer ) { ?>
        <div class="theme-builder-spacer" aria-hidden="true" style="height: <?= $spacer / 10 . 'rem' ?>;"></div>
      <?php } ?>
      <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
</section>

