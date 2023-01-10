import { ref } from 'vue';

export const hideSections = ref<boolean>(false);

export { default as Content } from './Content.vue';
export { default as Drawers } from './Drawers.vue';

export * from './elements';

import SectionTextFull from './elements/TextFull/SectionTextFull.vue';
import SectionTextImage from './elements/TextImage/SectionTextImage.vue';
import SectionInfoBox from './elements/InfoBox/SectionInfoBox.vue';
import SectionCTA from './elements/CTA/SectionCTA.vue';
import SectionDownloads from './elements/Downloads/SectionDownloads.vue';
import SectionMap from './elements/Map/SectionMap.vue';
import SectionInfoSection from './elements/InfoSection/SectionInfoSection.vue';
import SectionImageSmall from './elements/ImageSmall/SectionImageSmall.vue';
import SectionImageFull from './elements/ImageFull/SectionImageFull.vue';
import SectionVideoEmbed from './elements/VideoEmbed/SectionVideoEmbed.vue';
import SectionGridGallery from './elements/GridGallery/SectionGridGallery.vue';
import SectionCards from './elements/Cards/SectionCards.vue';
import SectionAccordion from './elements/Accordion/SectionAccordion.vue';
import SectionTeaserBoxes from './elements/TeaserBoxes/SectionTeaserBoxes.vue';
import SectionLogoWall from './elements/LogoWall/SectionLogoWall.vue';
import SectionImageCarousel from './elements/ImageCarousel/SectionImageCarousel.vue';
import SectionBlock from './elements/Block/SectionBlock.vue';
import { SectionH2 } from './elements';

const sections = {
    h2: SectionH2,
    text_full: SectionTextFull,
    image_small: SectionImageSmall,
    image_full: SectionImageFull,
    image_carousel: SectionImageCarousel,
    video_embed: SectionVideoEmbed,
    grid_gallery: SectionGridGallery,
    info_box: SectionInfoBox,
    cta: SectionCTA,
    map: SectionMap,
    info_section: SectionInfoSection,
    cards: SectionCards,
    downloads: SectionDownloads,
    teaser_boxes: SectionTeaserBoxes,
    text_image: SectionTextImage,
    accordion: SectionAccordion,
    logo_wall: SectionLogoWall,
    block: SectionBlock,
};

export { sections };
