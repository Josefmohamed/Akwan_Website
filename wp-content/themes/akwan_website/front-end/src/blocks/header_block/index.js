import './style.scss';
import {gsap} from "gsap";
import {imageLazyLoading} from '../../scripts/functions/imageLazyLoading';
import {animations} from '../../scripts/general/animations';
import DrawSVGPlugin from "gsap/DrawSVGPlugin";

gsap.registerPlugin(DrawSVGPlugin)

/**
 *
 * @param block {HTMLElement}
 * @returns {Promise<void>}
 */
export default async (header) => {

  // region save headerSticky height
  header.classList.add('header-sticky');
  window.headerSticky = header?.getBoundingClientRect()?.height - 2 ?? 0;
  header.classList.remove('header-sticky');
  // endregion save headerSticky height


  const burgerMenu = header.querySelector('.burger-menu');
  const menuLinks = header.querySelector('.navbar');


  if (!burgerMenu) return;
  const burgerTl = gsap.timeline({paused: true});
  const burgerSpans = burgerMenu.querySelectorAll('span');
  gsap.set(burgerSpans, {transformOrigin: 'center'});
  burgerTl
    .to(burgerSpans, {
      y: gsap.utils.wrap([`0.8rem`, 0, `-0.8rem`]),
      duration: 0.25,
    })
    .set(burgerSpans, {autoAlpha: gsap.utils.wrap([1, 0, 1])})
    .to(burgerSpans, {rotation: gsap.utils.wrap([45, 0, -45])})
    .set(burgerSpans, {rotation: gsap.utils.wrap([45, 0, 135])});
  burgerMenu.addEventListener('click', function () {
    if (burgerMenu.classList.contains('burger-menu-active')) {
      // region allow page scroll
      document.documentElement.classList.remove('modal-opened');
      // endregion allow page scroll
      burgerMenu.classList.remove('burger-menu-active');
      menuLinks.classList.remove('header-links-active');
      header.classList.remove('header-active');
      burgerTl.reverse();
    } else {
      burgerMenu.classList.add('burger-menu-active');
      menuLinks.classList.add('header-links-active');
      header.classList.add('header-active');
      burgerTl.play();
      // region prevent page scroll
      document.documentElement.classList.add('modal-opened');
      // endregion prevent page scroll
      gsap.fromTo(menuLinks.querySelectorAll('.menu-item'), {
        y: 30,
        autoAlpha: 0,
      }, {
        y: 0,
        autoAlpha: 1,
        stagger: .05,
        duration: .4,
        delay: .5,
      });
    }
  });

  // region open sub menu in responsive
  const menuItems = header.querySelectorAll('.menu-item-has-children');
  const mobileMedia = window.matchMedia('(max-width: 992px)');
  menuItems.forEach((menuItem) => {
    const menuItemBody = menuItem.querySelector('.sub-menu');
    menuItem?.addEventListener('click', (e) => {

      if (!mobileMedia.matches || !menuItemBody || e.target.classList.contains('header-link') || e.target.closest('.sub-menu,.menu-item-in-sub-menu a')) return;
      const isOpened = menuItem?.classList.toggle('menu-item-active');
      if (!isOpened) {
        gsap.to(menuItemBody, {height: 0});
      } else {
        gsap.to(Array.from(menuItems).map(otherMenuItem => {
          const otherMenuItemBody = otherMenuItem.querySelector('.sub-menu');
          if (otherMenuItemBody && menuItem !== otherMenuItem) {
            otherMenuItem?.classList.remove('menu-item-active');
            gsap.set(otherMenuItem, {zIndex: 1});
          }
          return otherMenuItemBody;
        }), {height: 0});
        gsap.set(menuItem, {zIndex: 2});
        gsap.to(menuItemBody, {height: 'auto'});
      }
    });
  });


  // endregion open sub menu in responsive

  // logo animation
  const lineOne = header.querySelector(".line-1")
  const lineTwo = header.querySelector(".line-2")
  const lineThree = header.querySelector(".line-3")

  const logoAnimation = gsap.timeline({
      delay: .5,
      repeat: -1,
      repeatDelay: .2,
      yoyo: true,
      defaults: {
        duration: .7,
        ease: "power3.out"
      }
    }
  )
    .from(lineOne, {
      drawSVG: 0
    })
    .from(lineTwo, {
      drawSVG: "100% 100%"
    }, "<30%")
    .from(lineThree, {
      x: -110,
      opacity: 0
    }, "<30%")
    .call(null, [], "<3");


  // prevent link if it's the same link of current page
  header.querySelectorAll('a').forEach(anchor => {
    anchor.addEventListener('click', event => {
      event.preventDefault()
      if ((anchor.href === window.location.href || anchor.href === window.location.href + '#' || anchor.href === window.location.href.slice(0, -1))) {
        event.preventDefault();
        event.stopPropagation();
      }
    });
  });


  animations(header);
  imageLazyLoading(header);
};

