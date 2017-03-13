const SELECTORS = {
  GALLERY_SOURCE: '.gallery',
  GALLERY_SOURCE_LINK: '.gallery a'
};

export default function Gallery() {
  let imagesList = parseImages();
  // console.log(imagesList);
}

function parseImages() {
  let images = [];
  
  let imageLinks = Array.prototype.slice.call(document.querySelectorAll(SELECTORS.GALLERY_SOURCE_LINK));
  
  console.log('imageLinks', imageLinks.map((link) => {
    return {
      href: link.getAttribute('href'),
      href: link.querySelector('img').getAttribute('src')
    }
  }));
  return images;
}