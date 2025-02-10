<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="description" content="<?php if (is_single()) {
    single_post_title('', true);
  } else {
    bloginfo('name');
    echo " - ";
    bloginfo('description');
  } ?>"/>
  <meta
    content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0"
    name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <!-- fix container-->
  <style>
    html {
      --design-width: 1440;
      --tablet-width: 992;
      --mobile-width: 600;
      --sMobile-width: 375;
      font-size: calc((100vw / var(--sMobile-width)) * 10);
      width: 100vw;
      overflow-x: hidden;
      scrollbar-color: rgb(90, 90, 90) rgba(0, 0, 0, 0.2);
      scrollbar-width: thin;
    }

    html.modal-opened {
      overflow: hidden;
    }

    @media screen and (min-width: 375px) {
      html {
        font-size: 10px;
      }
    }


    @supports (-moz-appearance:none) {
      @media screen and (min-width: 992px) {
        html {
          width: calc(100vw - 8px);
        }
      }
    }

  </style>
  <!-- Third party code ACF-->
  <?php

  $code_in_head_tag = get_field('code_in_head_tag', 'options');
  $code_before_body_tag_after_head_tag = get_field('code_before_body_tag_after_head_tag', 'options');
  $code_after_body_tag = get_field('code_after_body_tag', 'options');
  ?>
  <?php wp_head(); ?>
  <?= $code_in_head_tag ?>
</head>
<?php flush(); ?>
<?= $code_before_body_tag_after_head_tag ?>
<!--preloader style-->
<style>
  body:not(.loaded) {
    opacity: 0;
  }

  body:not(.loaded) * {
    transition: none !important;
  }

  body {
    transition: opacity .5s;
  }

  [modal-content] {
    display: none !important;
  }

  .page-transition {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    pointer-events: none;
    opacity: 0;
    background-color: #001407;
    /*clip-path: polygon(0% 0%, 0% 100%, 0% 100%, 0% 0%);*/
  }
</style>
<!--end preloader style-->
<!-- ACF Fields -->
<?php
// get page name
global $post, $bgClass;
$header_logo_light = get_field('header_logo_light', 'options');
$header_logo_dark = get_field('header_logo_dark', 'options');

?>
<!-- END ACF -->
<body data-barba="wrapper" <?php body_class(); ?>>
<div class="page-transition"></div>
<a skip-to-main-content
   href="#main-content"> <?= __('Skip to main content', 'akwan_website') ?></a>
<?= $code_after_body_tag ?>
<main id="main-content" class="theme-wp-site-blocks"
      data-barba="container" data-barba-namespace="<?= $post?->post_name ?>"
      data-body-class="<?= implode(' ', get_body_class()) ?>"
      data-header-class="<?= $bgClass ?>">
  <!-- remove header if page template if full with no header and footer-->
  <header class="akwan_website-header <?= $bgClass ?>">
    <div class="container">
      <div class="header-wrapper">
        <!--     logo-->
        <?php if ($bgClass === 'white-bg') { ?>
          <?php if ($header_logo_dark) { ?>
            <a href="<?= site_url() . '/' ?>" class="main-logo">
              <?= \Theme\Helpers::get_image($header_logo_dark, 'img-250-250'); ?>
            </a>
          <?php } ?>
        <?php } else { ?>
          <?php if ($header_logo_light) { ?>
            <a href="<?= site_url() . '/' ?>" class="main-logo">
              <?= \Theme\Helpers::get_image($header_logo_light, 'img-250-250'); ?>
            </a>
          <?php } ?>
        <?php } ?>
        <!-- burger menu and cross-->
        <button aria-label="Open Menu Links" class="burger-menu hide-only-lg">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <!--     links  -->
        <nav class="navbar">
          <div class="navbar-wrapper">
            <?php if (have_rows('menu_links', 'options')) { ?>
              <ul class="primary-menu">
                <?php while (have_rows('menu_links', 'options')) {
                  the_row();
                  $menu_link = get_sub_field('menu_link');
                  $has_sub_menu = get_sub_field('has_menu');
                  ?>
                  <?php if ($menu_link) { ?>
                    <li
                      class="menu-item  <?= ($has_sub_menu) ? 'menu-item-has-children' : '' ?>">
                      <?php if ($has_sub_menu) { ?>
                        <div class="arrow">
                          <svg width="9" height="5" viewBox="0 0 9 5"
                               fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4L4.5 1L1 4" stroke="white"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                          </svg>
                        </div>
                      <?php } ?>
                      <a class="header-link" href="<?= $menu_link['url'] ?>"`
                         target="<?= $menu_link['target'] ?>">
                        <?= $menu_link['title'] ?></a>
                      <?php if ($has_sub_menu && have_rows('submenu', 'options')) { ?>
                        <ul class="sub-menu">
                          <?php while (have_rows('submenu', 'options')) {
                            the_row();
                            $submenu_link = get_sub_field('submenu_link');
                            ?>
                            <?php if ($submenu_link) { ?>
                              <li class="menu-item-in-sub-menu">
                                <a class="header-sublink"
                                   href="<?= $submenu_link['url'] ?>"
                                   target="<?= $submenu_link['target'] ?>">
                                  <?= $submenu_link['title'] ?>
                                </a>
                              </li>
                            <?php } ?>
                          <?php } ?>
                        </ul>
                      <?php } ?>
                    </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            <?php } ?>
          </div>
        </nav>
      </div>
    </div>
  </header>
