import { ref } from 'vue';
import { SectionTextFull, SectionImageSmall, SectionImageFull, SectionImageCarousel, SectionVideoEmbed, SectionGridGallery, SectionInfoBox, SectionCTA, SectionMap, SectionInfoSection, SectionCards, SectionDownloads, SectionTeaserBoxes, SectionTextImage, SectionAccordion, SectionLogoWall, SectionBlock, SectionH2 } from './elements';

export const hideSections = ref<boolean>(false);

export { default as Content } from './Content.vue';
export { default as Drawers } from './Drawers.vue';

export * from './elements';


// why do we use this?
const sections = {
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
    h2: SectionH2,
};

export { sections };
