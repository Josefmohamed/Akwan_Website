<?php wp_footer(); ?>
<!--Footer ACF-->
<?php
$footer_logo = get_field('footer_logo', 'options');
$footer_info = get_field('footer_info', 'options');
$first_column = get_field('first_column', 'options');
$second_column = get_field('second_column', 'options');
$copy_right_text = get_field('copy_right_text', 'options');
?>
<!--region footer-->
<!-- remove footer if page template if full with no header and footer-->
  <footer class="akwan_website-footer">
    <div class="container">
      <div class="footer-wrapper">
        <div class="left-content flex-col">
          <?php if ($footer_logo) : ?>
            <a href="<?= site_url() . '/' ?>" class="image-wrapper footer-logo">
              <?= \Theme\Helpers::get_image($footer_logo, 'large'); ?>
            </a>
          <?php endif; ?>
          <?php if ($footer_info) { ?>
          <h4 class="footer-info paragraph-12"><?= $footer_info ?></h4>
          <?php } ?>
        </div>
        <div class="right-content">
          <?php
          if (have_rows('first_column', 'options')) :
            while (have_rows('first_column', 'options')) :
              the_row();
              ?>
              <?php if (have_rows('footer_link')) : ?>
              <div class="links-wrapper flex-col gab-20">
                <?php while (have_rows('footer_link')) : the_row();
                  $link = get_sub_field('link');
                  ?>
                  <?php if ($link) { ?>
                    <div class="link-wrapper">
                      <a class="paragraph-14 fw-600 link" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>">
                        <?= $link['title'] ?>
                      </a>
                    </div>
                  <?php } ?>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
            <?php endwhile;
          endif; ?>
          <?php
          if (have_rows('second_column', 'options')) :
            while (have_rows('second_column', 'options')) :
              the_row();
              ?>
              <?php if (have_rows('footer_link')) : ?>
              <div class="links-wrapper flex-col gab-20">
                <?php while (have_rows('footer_link')) : the_row();
                  $link = get_sub_field('link');
                  ?>
                  <?php if ($link) { ?>
                    <div class="link-wrapper">
                      <a class="text-sm medium link capital-text" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>">
                        <?= $link['title'] ?></a>
                    </div>
                  <?php } ?>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
            <?php endwhile;
          endif; ?>

        </div>
      </div>
      <div class="copy-right-social-links">
        <?php if ($copy_right_text) { ?>
          <p><?= $copy_right_text ?></p>
        <?php } ?>
        <?php if (have_rows('social_links', 'options')) { ?>
          <div class="social-links-wrapper">
            <?php while (have_rows('social_links', 'options')) {
              the_row();
              $url = get_sub_field('url');
              $icon = get_sub_field('icon');
              ?>
              <a href="<?= $url ?>" target="_blank" class="social-link" aria-label=" (opens in a new tab)">
                <?php if (!empty($icon) && is_array($icon)) { ?>
                  <picture class="icon-wrapper cover-image">
                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                  </picture>
                <?php } ?>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </footer>
</main>
</body>
</html>
