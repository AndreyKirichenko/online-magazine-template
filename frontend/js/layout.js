const SELECTORS = {
  HEADER_IMAGINATOR: '.js-header__imaginator',
  INNER_WRAPPER: '.js-layout__inner-wrapper',
  SCROLL_TOP: '.js-scroll-top',
};

export default function Layout() {
  scrollTopInit();
}

function scrollTopInit() {
  let innerWrapper =  document.querySelector(SELECTORS.INNER_WRAPPER);
  let scrollTop =  document.querySelector(SELECTORS.SCROLL_TOP);
  
  scrollTop.addEventListener('click', () => {
    innerWrapper.scrollTop = 0;
  });
}
