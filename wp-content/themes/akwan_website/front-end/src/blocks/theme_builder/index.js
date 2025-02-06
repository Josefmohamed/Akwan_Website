import './style.scss';
import {youtubePlayer} from "../../scripts/general/youtube-player";
import {vimeoPlayer} from "../../scripts/general/vimeo-player";
import {imageLazyLoading} from "../../scripts/functions/imageLazyLoading";
import {animations} from "../../scripts/general/animations";


/**
 *
 * @param block {HTMLElement}
 * @returns {Promise<void>}
 */
const themeBuilder = async (block) => {
  // add block code here
  const themeBuilderEmbedVideos = block.querySelectorAll('.theme-builder-embed-video');
  if (themeBuilderEmbedVideos.length > 0) {
    for (let themeBuilderVideo of themeBuilderEmbedVideos) {
      const themeBuilderVideoType = themeBuilderVideo.dataset.videoType;
      const themeBuilderVideoUrl = themeBuilderVideo.dataset.videoUrl;
      if (themeBuilderVideoType === 'youtube') {
        youtubePlayer(themeBuilderVideo, themeBuilderVideoUrl)
      } else if (themeBuilderVideoType === 'vimeo') {
        vimeoPlayer(themeBuilderVideo, themeBuilderVideoUrl)
      }
    }
  }

  animations(block);
  imageLazyLoading(block);
};

export default themeBuilder;

