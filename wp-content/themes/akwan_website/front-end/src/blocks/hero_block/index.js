import './style.scss';
import {imageLazyLoading} from "../../scripts/functions/imageLazyLoading";
import {animations} from "../../scripts/general/animations";

/**
 *
 * @param block {HTMLElement}
 * @returns {Promise<void>}
 */
const heroBlock = async (block) => {

  animations(block);
  imageLazyLoading(block);
};

export default heroBlock;

