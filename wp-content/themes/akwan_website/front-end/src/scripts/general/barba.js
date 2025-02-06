import barbajs from '@barba/core'
import {gsap} from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

let popState = {'status': false};
window.addEventListener('popstate', () => {
  popState.status = true;
});
export const pageCleaningFunctions = [];
export const barba = (reInvokableFunction) => {
  gsap.registerPlugin(ScrollTrigger);
  if (document.querySelector('[data-barba]')) {
    console.log('barbajs Init');

    // barbajs.init({
    //   transitions: [crossFade, projectEffect],
    //   timeout: 0,
    //   prevent: ({el}) => el.classList?.contains('ab-item'),
    // });

    barbajs.init({
      transitions: [{
        name: 'opacity-transition',
        leave(data) {
          const pageTransition = document.querySelector('.page-transition');
          return gsap.timeline()
            .to(pageTransition, {opacity: 1})
            .call(() => popState.status ? (popState.status = false) : window.scrollTo(0, 0))
        },
        enter(data) {
          gsap.set(data.next.container, {opacity: 0});
          gsap.set(data.current.container, {zIndex: -1, position: 'absolute'});
          const pageTransition = document.querySelector('.page-transition');
          // check if html has class modal opened
          if (document.documentElement.classList.contains('modal-opened')) {
            document.documentElement.classList.remove('modal-opened')
          }
          // add body classes
          document.body.className = 'loaded ' + data.next.container.dataset.bodyClass;
          return gsap.timeline()
            .set(data.next.container, {opacity: 1})
            .set(data.current.container, {opacity: 0})
            // .call(() => popState.status ? (popState.status = false) : window.scrollTo(0, 0))
            .to(pageTransition, {opacity: 0})
        }
      }],
      timeout: 0,
      prevent: ({el}) => el.classList?.contains('ab-item'),
    });

    barbajs.hooks.afterLeave(() => {
      // window.scrollTo(0, 0);
      window.dispatchEvent(new Event('will-leave'));
      for (let scrollTrigger of ScrollTrigger.getAll()) {
        scrollTrigger.kill();
      }
      while (pageCleaningFunctions.length) {
        pageCleaningFunctions.pop()();
      }
      ScrollTrigger.update();
    });

    barbajs.hooks.beforeEnter(data => {
      // window.scrollTo(0, 0);
      reInvokableFunction(data.next.container);
    });

  } else {
    console.log('no barbajs container');
  }
}
