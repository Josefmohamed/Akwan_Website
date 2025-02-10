import './style.scss';
import {imageLazyLoading} from "../../scripts/functions/imageLazyLoading";
import {animations} from "../../scripts/general/animations";
import {Swiper} from "swiper";

/**
 * @author DELL
 * @param block {HTMLElement}
 * @returns {Promise<void>}
 */
const ourProjectsBlock = async (block) => {

  // add block code here
  const swiper = new Swiper(block.querySelector('.project-posts-swiper'), {
    slidesPerView: 'auto',
    spaceBetween: 16,
    breakpoints: {
      600: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 4.5,
        spaceBetween: 32,
      },
    },
  });

// testing the new hidden value

    animations(block);
    imageLazyLoading(block);
};

export default ourProjectsBlock;

