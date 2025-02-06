<?php wp_footer(); ?>
<!--Footer ACF-->
<?php
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$main_logo = get_field('main_logo', 'options');
$second_logo = get_field('second_logo', 'options');
$logo_link = get_field('logo_link', 'options');
$menu_column = get_field('menu_column', 'options');
$menu_title = @$menu_column['menu_title'];
$menu_links = @$menu_column['menu_links'];
$insights_column = get_field('insights_column', 'options');
$insights_title = @$insights_column['insights_title'];
$insights_links = @$insights_column['insights_links'];
$info_column = get_field('info_column', 'options');
$info_title = @$info_column['info_title'];
$address = @$info_column['address'];
$phone_number = @$info_column['phone_number'];
$email = @$info_column['email'];
$address_encoded = urlencode($info_column['address']);
$address_url = "https://www.google.com/maps/search/?api=1&query=$address_encoded";
$copy_right_text = get_field('copy_right_text', 'options');
$privacy_policy = get_field('privacy_policy', 'options');
$cookies_link = get_field('cookies_link', 'options');
$linkedin_link = get_field('linkedin_link', 'options');
$vimeo_link = get_field('vimeo_link', 'options');

?>
<!--region footer-->
<!-- remove footer if page template if full with no header and footer-->
<?php if (!is_page_template('templates/full-width-no-header-footer.php') && !is_singular(['teams', 'books'])): ?>
  <footer class="digihive-theme-footer">
    <div class="container">
      <div class="footer-wrapper">
        <div class="footer-logos">
          <div class="left-logo">
            <?php if ($main_logo) : ?>
              <a href="<?= site_url() . '/' ?>">

                <picture class="main-logo">
                  <?= \Theme\Helpers::get_image($main_logo, 'img-213-44'); ?>
                </picture>
              </a>

            <?php endif; ?>
            <div class="line"></div>
            <?php if ($second_logo) : ?>
              <picture class="second-logo">
                <?= \Theme\Helpers::get_image($second_logo, 'img-136-20'); ?>
              </picture>
            <?php endif; ?>
          </div>
          <div class="right-logo">
            <?php if (\Theme\Helpers::get_key_from_array('title', $logo_link)) { ?>
              <a href="<?= $logo_link['url'] ?>"
                 class="theme-cta-button without-background logo-link">
                <svg width="12" height="15" viewBox="0 0 12 15" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.84629 7.49988C3.87305 7.49988 2.27342 5.94569 2.27342 4.02851C2.27342 2.11132 3.87305 0.557129 5.84629 0.557129C7.81954 0.557129 9.41917 2.11132 9.41917 4.02851C9.41917 5.94569 7.81954 7.49988 5.84629 7.49988ZM11.6931 13.8115C11.6931 14.1601 11.4022 14.4427 11.0434 14.4427C10.6847 14.4427 10.3938 14.1601 10.3938 13.8115C10.3938 11.3714 8.35793 9.39338 5.84653 9.39338C3.33512 9.39338 1.29923 11.3714 1.29923 13.8115C1.29923 14.1601 1.00839 14.4427 0.649614 14.4427C0.290842 14.4427 0 14.1601 0 13.8115C0 10.6743 2.61758 8.13106 5.84653 8.13106C9.07548 8.13106 11.6931 10.6743 11.6931 13.8115ZM8.12001 4.02862C8.12001 5.24864 7.10206 6.23767 5.84636 6.23767C4.59066 6.23767 3.57271 5.24864 3.57271 4.02862C3.57271 2.80859 4.59066 1.81956 5.84636 1.81956C7.10206 1.81956 8.12001 2.80859 8.12001 4.02862Z"
                        fill="#4C8D2E"/>
                </svg>
                <?= $logo_link['title'] ?></a>
            <?php } ?>

          </div>
        </div>
        <div class="footer-links">
          <div class="first-column accordion">
            <?php if ($menu_title) { ?>
              <p
                class="footer-title accordion-head footer-title-wrapper"><?= $menu_title ?>
              <svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L4.5 4L8 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></p><?php } ?>
            <?php if (have_rows('menu_column', 'options')) { ?>
              <?php while (have_rows('menu_column', 'options')) {
                the_row();
                ?>
                <?php if (have_rows('menu_links', 'options')) { ?>
                  <ul class="accordion-body">
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
          <div class="second-column accordion">
            <?php if ($insights_title) { ?>
              <p class="footer-title accordion-head footer-title-wrapper"><?= $insights_title ?>
                <svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L4.5 4L8 1" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>


              </p>
            <?php } ?>
            <?php if (have_rows('insights_column', 'options')) { ?>
              <?php while (have_rows('insights_column', 'options')) {
                the_row();
                ?>
                <?php if (have_rows('insights_links', 'options')) { ?>
                  <ul class="accordion-body">
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
          <div class="third-column">
            <?php if ($info_title) : ?>
              <p class="footer-title"><?= $info_title ?></p>
            <?php endif; ?>
            <?php if ($address): ?>
              <a class="address" href="<?= $address_url ?>"><?= $address ?> </a>
            <?php endif; ?>
            <?php if (\Theme\Helpers::get_key_from_array('title', $phone_number)) : ?>
              <a href="tel:<?= $phone_number['url'] ?>" class="phone-number"><?= $phone_number['title'] ?></a>
            <?php endif; ?>
            <?php if (\Theme\Helpers::get_key_from_array('title', $email)) : ?>
              <a href="mailto:<?= $email['url'] ?>"
                 class="footer-link email"><?= $email['title'] ?> </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="copy-right-wrapper">
          <?php if ($copy_right_text) { ?>
            <p><?= $copy_right_text ?></p>
          <?php } ?>
          <?php if (\Theme\Helpers::get_key_from_array('title', $privacy_policy)) { ?>
            <a href="<?= $privacy_policy['url'] ?>"
               class="footer-link"><?= $privacy_policy['title'] ?></a>
          <?php } ?>
          <?php if (\Theme\Helpers::get_key_from_array('title', $cookies_link)) { ?>
            <a href="<?= $cookies_link['url'] ?>"
               class="footer-link"><?= $cookies_link['title'] ?></a>
          <?php } ?>

          <div class="icons">
            <?php if ($linkedin_link) { ?>
              <a href="<?= $linkedin_link ?>" class="footer-icon">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M16.8724 9.9877V16.2906H13.2559V10.4097C13.2559 8.93196 12.7327 7.92405 11.4241 7.92405C10.4249 7.92405 9.82974 8.60396 9.56853 9.26081C9.473 9.4957 9.44849 9.82285 9.44849 10.1517V16.2906H5.83038C5.83038 16.2906 5.87942 6.33104 5.83038 5.29836H9.44849V6.85635L9.42482 6.89222H9.44849V6.85635C9.92865 6.10896 10.7867 5.0404 12.7082 5.0404C15.0878 5.0404 16.8724 6.61206 16.8724 9.9877ZM2.04659 0C0.809846 0 0 0.819994 0 1.8988C0 2.95369 0.786176 3.79845 1.99925 3.79845H2.02292C3.28503 3.79845 4.06867 2.95369 4.06867 1.8988C4.04669 0.819994 3.28588 0 2.04744 0H2.04659ZM0.214719 16.2906H3.83113V5.29836H0.214719V16.2906Z"
                    fill="white"/>
                </svg>

              </a>
            <?php } ?>
            <?php if ($vimeo_link) { ?>
              <a href="<?= $vimeo_link ?>" class="footer-icon">
                <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M16.9918 3.47023C16.9161 5.15826 15.7603 7.46972 13.5248 10.4034C11.2134 13.4679 9.25792 15 7.65821 15C6.66761 15 5.82866 14.0671 5.14389 12.2006C4.68625 10.4898 4.22912 8.77906 3.77164 7.06818C3.26283 5.20274 2.7173 4.26881 2.13402 4.26881C2.00686 4.26881 1.5618 4.54176 0.799855 5.08557L0 4.03447C0.838955 3.28244 1.66669 2.53059 2.481 1.7777C3.59994 0.79133 4.43992 0.272615 4.99973 0.220172C6.32285 0.0905369 7.13716 1.01304 7.44282 2.98786C7.77313 5.11845 8.00161 6.44371 8.13013 6.96243C8.51145 8.73007 8.93101 9.61277 9.3895 9.61277C9.74531 9.61277 10.2798 9.03954 10.9924 7.89307C11.7044 6.74625 12.0857 5.87377 12.1372 5.2744C12.2385 4.28474 11.8571 3.7887 10.9924 3.7887C10.5855 3.7887 10.1659 3.88424 9.73426 4.07306C10.5696 1.28149 12.166 -0.0742335 14.5222 0.00313242C16.2689 0.055402 17.0924 1.21104 16.9918 3.47023Z"
                    fill="white"/>
                </svg>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php endif; ?>
</main>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
