const SELECTORS = {
  POST_IMAGE: '.post__main-image',
  GALLERY: '.gallery',
  GALLERY_THUMBNAIL: '.gallery__thumbnail',
  GALLERY_SOURCE_LINK: '.gallery__thumbnail-link'
};

let postImage = document.querySelector(SELECTORS.POST_IMAGE);
let galleryContainer = document.querySelector(SELECTORS.GALLERY);
let galleryData = parseGalleryData();

export default function Gallery() {
  if (!galleryContainer) return;
  
  postImage.parentNode.removeChild(postImage);
  galleryContainer.innerHTML = '';
}

function parseGalleryData() {
  let galleryData = parseImages();
  let postThumbnail = parsePostThumbnail();
  
  galleryData.unshift(postThumbnail);
  
  return galleryData;
}

function parseImages() {
  let imageLinks = Array.prototype.slice.call(document.querySelectorAll(SELECTORS.GALLERY_SOURCE_LINK));

  let result = imageLinks.map((link) => {
    return {
      alt: link.getAttribute('alt'),
      orig: link.getAttribute('href'),
      thumb: link.querySelector(SELECTORS.GALLERY_THUMBNAIL).getAttribute('src')
    }
  });
  
  return result;
}

function parsePostThumbnail() {
  if (postImage) {
    let src = postImage.getAttribute('src');
    
    return {
      orig: src,
      thumb: src
    };
  }
  
  return null;
}

function renderGallery() {
  let html='';
  
}
