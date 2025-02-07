<?php wp_footer(); ?>
<!--Footer ACF-->
<?php
$footer_logo = get_field('footer_logo', 'options');
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$main_logo = get_field('main_logo', 'options');
$menu_column = get_field('menu_column', 'options');
$menu_title = @$menu_column['menu_title'];
$menu_links = @$menu_column['menu_links'];
$insights_column = get_field('insights_column', 'options');
$insights_title = @$insights_column['insights_title'];
$insights_links = @$insights_column['insights_links'];
$info_column = get_field('info_column', 'options');
$info_title = @$info_column['info_title'];
$copy_right_text = get_field('copy_right_text', 'options');

?>
<!--region footer-->
<!-- remove footer if page template if full with no header and footer-->
<?php if (!is_page_template('templates/full-width-no-header-footer.php') && !is_singular(['teams', 'books'])): ?>
  <footer class="digihive-theme-footer">
    <div class="container">
      <div class="footer-wrapper">
        <?php if ($footer_logo) : ?>
          <a href="<?= site_url() . '/' ?>" class="image-wrapper footer-logo">
            <?= \Theme\Helpers::get_image($footer_logo, 'large'); ?>
          </a>
        <?php endif; ?>
        <div class="footer-links">

          <div class="first-column">
            <?php if ($menu_title) { ?>
              <p
                class="footer-title footer-title-wrapper"><?= $menu_title ?>
              </p><?php } ?>
            <?php if (have_rows('menu_column', 'options')) { ?>
              <?php while (have_rows('menu_column', 'options')) {
                the_row();
                ?>
                <?php if (have_rows('menu_links', 'options')) { ?>
                  <ul class="footer-links">
                    <?php while (have_rows('menu_links', 'options')) {
                      the_row();
                      $menu_link = get_sub_field('menu_link');
                      ?>
                      <?php if (\Theme\Helpers::get_key_from_array('title', $menu_link)) { ?>
                        <li><a href="<?= $menu_link['url'] ?>"
                               class="footer-link"><?= $menu_link['title'] ?></a>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                <?php } ?>
              <?php } ?>
            <?php } ?>
          </div>


          <div class="second-column">
            <?php if ($insights_title) { ?>
              <p class="footer-title footer-title-wrapper"><?= $insights_title ?>
              </p>
            <?php } ?>
            <?php if (have_rows('insights_column', 'options')) { ?>
              <?php while (have_rows('insights_column', 'options')) {
                the_row();
                ?>
                <?php if (have_rows('insights_links', 'options')) { ?>
                  <ul class="footer-links">
                    <?php while (have_rows('insights_links', 'options')) {
                      the_row();
                      $insight_link = get_sub_field('insight_link');
                      ?>
                      <?php if (\Theme\Helpers::get_key_from_array('title', $insight_link)) { ?>
                        <li><a href="<?= $insight_link['url'] ?>"
                               class="footer-link"><?= $insight_link['title'] ?></a>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                <?php } ?>
              <?php } ?>
            <?php } ?>
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
    </div>
  </footer>
<?php endif; ?>
</main>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
